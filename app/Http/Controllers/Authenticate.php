<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CshUser;
use App\Models\CshEmailConfig;
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
          
            return response()->json(['status'=>'success'])->withCookie($cookie);
          }else{
            return response()->json(['status'=>'incorrect']);
          }
       }else{
        return response()->json(['status'=>'not found']);
       }

       
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
        $user->user_emp_id = $req->IDNum;
        $user->user_name = $req->name;
        $user->user_username = $req->username;
        $user->user_password = Hash::make($req->password);
        $user->user_position = $req->position;
        $user->user_pic = 'none';
        $user->user_remember = '';
        $user->user_type = 'Employee';
        $user->user_status = 1;
        $user->save();

        $config = new CshEmailConfig;
        $config->user_id = $user->user_id;
        $config->econf_host = 'smtpout.secureserver.net';
        $config->econf_port = '465';
        $config->econf_encryption = 'ssl';
        $config->save();

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

  public function AttendanceMonitoring(Request $req){
    $userId = $req->cookie('admin_id');
        if($userId){
          return view('admin.attendanceMonitoring', ['user'=>$userId]);
        }else{
          return redirect()->route('adminLogin');
        }
  }

  public function EmailMonitoring(Request $req){
    $userId = $req->cookie('admin_id');
        if($userId){
          return view('admin.emailMonitoring', ['user'=>$userId]);
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

  public function EmpProfile(Request $req){
    $userId = $req->cookie('admin_id');
        if($userId){
          return view('admin.empProfile', ['user'=>$userId, 'employee'=>$req->user]);
        }else{
          return redirect()->route('adminLogin');
        }
  }

  public function Masterlist(Request $req){
    $userId = $req->cookie('admin_id');
        if($userId){
          return view('admin.masterlist', ['user'=>$userId, 'employee'=>$req->user]);
        }else{
          return redirect()->route('adminLogin');
        }
  }
  public function User(Request $req){
    $userId = $req->cookie('admin_id');
        if($userId){
          return view('admin.user', ['user'=>$userId]);
        }else{
          return redirect()->route('adminLogin');
        }
  }
  public function UserSetting(Request $req){
    $userId = $req->cookie('admin_id');
        if($userId){
          return view('admin.userSetting', ['user'=>$userId]);
        }else{
          return redirect()->route('adminLogin');
        }
  }
}
