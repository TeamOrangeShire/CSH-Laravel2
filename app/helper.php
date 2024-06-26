<?php
use Carbon\Carbon;
use App\Models\CshEmailConfig;
use Illuminate\Support\Facades\Config;

function GenToken($length = 16) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    
    return $randomString;
}


function PastTimeCalc($date){
    $now = Carbon::now()->format('Y-m-d H:i:s');

    $nowTime = Carbon::parse($now);
    $dateTime = Carbon::parse($date);
    
    $diffInHours = $dateTime->diffInHours($nowTime);
    $diffInMinutes = $dateTime->diffInMinutes($nowTime);
    $diffInDays= $dateTime->diffInDays($nowTime);

   return [$diffInHours, $diffInMinutes, $diffInDays];
 }

 function timeDifference($startTime, $endTime) {
    $start = parseTime($startTime);
    $end = parseTime($endTime);

    $diff = $end - $start;
    if ($diff < 0) {
        $diff += 24 * 60 * 60 * 1000;
    }

    $hours = floor($diff / (60 * 60 * 1000));
    $minutes = floor(($diff % (60 * 60 * 1000)) / (60 * 1000));

    return ['hours' => $hours, 'minutes' => $minutes];
}

function parseTime($time) {
    $parts = explode(':', $time);
    $hour = (int)$parts[0];
    $minute = (int)$parts[1];
    $isPM = strpos($time, 'PM') !== false;

    $totalMinutes = $hour * 60 + $minute;

    if ($isPM && $hour !== 12) {
        $totalMinutes += 12 * 60; 
    } elseif (!$isPM && $hour === 12) {
        $totalMinutes -= 12 * 60; 
    }

    return $totalMinutes * 60 * 1000; 
}

function EmailCred($id){
        $credentials = CshEmailConfig::where('user_id', $id)->first();
        $port = is_numeric($credentials->econf_port) ? (int)$credentials->econf_port : null;

        Config::set('mail.mailers.smtp.host', $credentials->econf_host);
        Config::set('mail.mailers.smtp.port', $port);
        Config::set('mail.mailers.smtp.username', $credentials->econf_username);
        Config::set('mail.mailers.smtp.password', $credentials->econf_password);
        Config::set('mail.mailers.smtp.encryption', $credentials->econf_encryption);
        Config::set('mail.from.address', $credentials->econf_from_address);
        Config::set('mail.from.name', config('app.name'));
}
