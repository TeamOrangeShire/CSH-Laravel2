<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CshUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class Authenticate extends Controller
{
    //BackEnd
    public function AdminLogin(Request $req){
       $user = CshUser::where('user_username', $req->username)->first();
       if($user){
          if(Hash::check($req->password, $user->user_password)){
           
            $cookie = Cookie::make('admin_id', $user->user_id, 60*24*31);
          
            $status = 'success';
          }else{
            $status = 'incorrect';
          }
       }else{
        $status = 'not found';
       }

       return response()->json(['status'=>$status])->withCookie($cookie);
    }

    public function AdminVerify(Request $req){
       $user = CshUser::where('user_type', 'Super Admin')->first();

       if(Hash::check($req->superAdmin, $user->user_password)){
        $status = 'success';
       }else{
        $status = 'failed';
       }

       return response()->json(['status'=>$status]);
    }

    public function AdminSignup(Request $req){
        $user = new CshUser();
        $user->user_name = $req->name;
        $user->user_username = $req->username;
        $user->user_password = Hash::make($req->password);
        $user->user_position = $req->position;
        $user->user_pic = 'none';
        $user->user_remember = '';
        $user->user_type = 'Employee';
        $user->user_status = 1;
        $user->save();

        Session::put('admin_id', $user->user_id);

        return response()->json(['status'=>'success']);
        }

        
    //FrontEnd
    public function Dashboard(Request $req){
      $userId = $req->cookie('admin_id');
          if($userId){
            return view('admin.index', ['user'=>$userId]);
          }else{
            return redirect()->route('adminLogin');
          }
  }

  public function Attendance(Request $req){
    $userId = $req->cookie('admin_id');
        if($userId){
          return view('admin.attendance', ['user'=>$userId]);
        }else{
          return redirect()->route('adminLogin');
        }
  }

  public function PipeLine(Request $req){
    $userId = $req->cookie('admin_id');
        if($userId){
          $state = $req->route('state');
          return view('admin.pipeline', ['user'=>$userId, 'state'=>strtoupper($state)]);
        }else{
          return redirect()->route('adminLogin');
        }
  }
}
