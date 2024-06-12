<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CshUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Authenticate extends Controller
{
    //BackEnd
    public function AdminLogin(Request $req){
       $user = CshUser::where('user_username', $req->username)->first();
       if($user){
          if(Hash::check($req->password, $user->user_password)){
            Session::put('admin_id', $user->user_id);
            $status = 'success';
          }else{
            $status = 'incorrect';
          }
       }else{
        $status = 'not found';
       }

       return response()->json(['status'=>$status]);
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
    public function Dashboard(){
      if(Session::has('admin_id')){
          return view('admin.index');
      }else{
          return redirect()->route('adminLogin');
      }
  }

  public function Attendance(){
    if(Session::has('admin_id')){
      return view('admin.attendance ');
  }else{
      return redirect()->route('adminLogin');
  }
  }
}
