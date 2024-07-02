<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\CshEmailConfig;
use App\Models\CshPipeline;
use App\Models\CshSentMail;
use App\Models\CshEmailSignature;
use App\Models\CshEmailTemplate;
use App\Mail\SendCustomMail;
use App\Models\CshUser;
use App\Models\CshEmailSubject;
use App\Models\CshMailLevel;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $pl_id;
    public function __construct($pl_id)
    {
        $this->pl_id = $pl_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $person = CshPipeline::where('pl_id', $this->pl_id)->where('pl_active', 1)->first();
        $mailLevel = CshSentMail::where('pl_id', $person->pl_id)->get()->count();
        $dateLevel = CshMailLevel::where('pl_id',$person->pl_id)->first();
        $mailLevelInc = $mailLevel + 1;
        switch($mailLevelInc){
            case 2:
                $dateNow = $dateLevel->ml_date_two;
                break;
            case 3:
                $dateNow = $dateLevel->ml_date_three;
                break;
            case 4:
                $dateNow = $dateLevel->ml_date_four;
                break;
            case 5:
                $dateNow = $dateLevel->ml_date_five;
                break;
        }
      
        if($mailLevel < 5 && $dateNow == Carbon::now()->setTimezone('Asia/Hong_Kong')->format('F j, Y')){
                EmailCred($person->user_id);
                $user = CshUser::where('user_id', $person->user_id)->first();
                $conf = CshEmailConfig::where('user_id', $person->user_id)->first();
                $sentPrevious = CshSentMail::where('pl_id', $person->pl_id)->first();
              
                $temp = CshEmailTemplate::where('emtemp_id', $sentPrevious->emtemp_id)->first();
                $subject = CshEmailSubject::where('emsub_id', $sentPrevious->emsub_id)->first();
                $sig = CshEmailSignature::where('emsig_status', 2)->where('user_id', $person->user_id)->first();
                $lead = CshPipeline::where('pl_id', $person->pl_id)->first();

                $conc_mess = $temp->emtemp_followup . "<br>" . $sig->emsig_content;
                $replacements = [
                    '{reciever name}' => explode(' ', $lead->pl_name)[0],
                    '{sender name}' => explode(' ', $user->user_name)[0],
                ];
                $message = str_replace(array_keys($replacements), array_values($replacements), $conc_mess);
        
                $sent = new CshSentMail();
                $sent->pl_id = $person->pl_id;
                $sent->user_id = $person->user_id;
                $sent->se_offer = $lead->pl_service_offer;
                $sent->se_subject = $subject->emsub_content;
                $sent->se_message = $message;
                $sent->se_date = Carbon::now()->setTimezone('Asia/Hong_Kong')->format('F j, Y');
                $sent->se_level = $mailLevelInc;
                $sent->emtemp_id = $sentPrevious->emtemp_id;
                $sent->emsub_id = $sentPrevious->emsub_id;
                $sent->se_status = '1';
                $sent->save();
        
                $dateLevel->update([
                    'ml_level'=> $mailLevelInc
                ]);
        
                Mail::to($lead->pl_email)->send(new SendCustomMail($subject->emsub_content, $message, $sent->se_id, $conf->econf_from_address, $user->user_name, $person->pl_id));
        }
    }   
}
