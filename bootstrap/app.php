<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Console\Scheduling\Schedule;
use App\Models\CshPipeline;
use App\Jobs\SendEmailJob;
use App\Models\CshUser;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->withSchedule(function (Schedule $schedule) {
        $schedule->call(function () {
            $pipeline = CshPipeline::where('pl_active', 1)->where('pl_status', 'Prospect')->where('pl_status', '!=', 'DNC')->get();

            foreach($pipeline as $pl){
                SendEmailJob::dispatch($pl->pl_id);
            }
        })->timezone('Asia/Hong_Kong')->daily()->at('21:00')->emailOutputTo('rheyan@coresupporthub.com');
    })->create();

