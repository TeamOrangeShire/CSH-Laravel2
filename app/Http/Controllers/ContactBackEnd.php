<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Models\CshEmailConfig;
use Illuminate\Support\Facades\Config;
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
            // $credentials = CshEmailConfig::where('user_id', session('admin_id'))->first();
            // $port = is_numeric($credentials->econf_port) ? (int)$credentials->econf_port : null;

            // Config::set('mail.mailers.smtp.host', $credentials->econf_host);
            // Config::set('mail.mailers.smtp.port', $port);
            // Config::set('mail.mailers.smtp.username', $credentials->econf_username);
            // Config::set('mail.mailers.smtp.password', $credentials->econf_password);
            // Config::set('mail.mailers.smtp.encryption', $credentials->econf_encryption);
            // Config::set('mail.from.address', $credentials->econf_username);
            // Config::set('mail.from.name', config('app.name'));

            Mail::to('info@coresupporthub.com')->send(new ContactMail($name, $email, $message));
            return response()->json(['status'=>'success']);
        }
        
    }
}
