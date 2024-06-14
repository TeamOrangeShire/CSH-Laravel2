<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\CshAttendance;

class AdminBackEnd extends Controller
{
    public function ScanAttendance(Request $req){
        $user = $req->user_id;
        $check = CshAttendance::where('user_id', $user)->where('att_status', 0)->first();
        if($req->code === 'OiFT2qnVVpEn0tmmrkANKHJO6cSOmvQk'){
            
            if($check){
                $status = 'StillLogged';
                $action = '';
                $data = ['',''];
            }else{
                $att = new CshAttendance();
                $att->user_id = $user;
                $att->att_time_in = Carbon::now()->setTimezone('Asia/Hong_Kong')->format('h:i A');
                $att->att_time_out = '';
                $att->att_date = Carbon::now()->setTimezone('Asia/Hong_Kong')->format('d/m/Y');
                $att->att_total_time = '';
                $att->att_status = 0;
                $att->save();
                
                $status = 'success';
                $action = 'login';
                $data = [Carbon::now()->setTimezone('Asia/Hong_Kong')->format('h:i A'), Carbon::now()->setTimezone('Asia/Hong_Kong')->format('d/m/Y')];
            }
          
        }

        if($req->code === 'FV7urv439FTNmtBVcSiwAzR7cvberU0M'){
            if(!$check){
                $status = 'NotLogged';
                $action = '';
                $data = ['',''];
            }else{
                $time = timeDifference($check->att_time_in, Carbon::now()->setTimezone('Asia/Hong_Kong')->format('h:i A'));
                $totalTime = $time['hours']. "Hrs & " . $time['minutes'] . 'Mins';
                $check->update([
                   'att_time_out'=> Carbon::now()->setTimezone('Asia/Hong_Kong')->format('h:i A'),
                   'att_total_time'=>$totalTime,
                   'att_status'=>1,
                ]);

                $status = 'success';
                $action = 'logout';
                $data = ['',''];
            }
         
        }

        return response()->json(['status'=> $status, 'action'=>$action, 'data'=>$data]);

    }
}
