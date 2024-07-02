<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Models\CshPipeline;
use App\Jobs\SendEmailJob;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// Schedule::call(function () {
// $pipeline = CshPipeline::where('pl_active', 1)->where('pl_status', 'Prospect')->where('pl_status', '!=', 'DNC')->get();

// foreach($pipeline as $pl){
//     SendEmailJob::dispatch($pl->pl_id);
// }
// })->daily();