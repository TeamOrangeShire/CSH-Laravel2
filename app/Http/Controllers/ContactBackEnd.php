<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
class ContactBackEnd extends Controller
{
    public function SubmitMessage(Request $request){
        $name = $request->name;
        $email =$request->email;
        $message = $request->message;

        if(empty($name) || empty($email) || empty($message)){
            return response()->json(['status'=>'empty']);
        }else{
            Mail::to('info@coresupporthub.com')->send(new ContactMail($name, $email, $message));
            return response()->json(['status'=>'success']);
        }
        
    }
}
