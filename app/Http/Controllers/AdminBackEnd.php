<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\CshAttendance;
use App\Models\CshEmailConfig;
use App\Models\CshPipeline;
use App\Models\CshSentMail;
use App\Models\CshEmailSignature;
use App\Models\CshEmailTemplate;
use App\Mail\SendCustomMail;
use App\Models\CshUser;
use App\Models\CshEmailSubject;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Hash;
use App\Models\CshMailLevel;
use Illuminate\Support\Facades\Mail;
use Cmixin\BusinessTime;

use DateTime;

class AdminBackEnd extends Controller
{
    public function ScanAttendance(Request $req){
        $user = $req->user_id;
        $check = CshAttendance::where('user_id', $user)->where('att_status', 0)->first(); 
        BusinessTime::enable(Carbon::class, [
            'monday'    => ['09:00-18:00'],
            'tuesday'   => ['09:00-18:00'],
            'wednesday' => ['09:00-18:00'],
            'thursday'  => ['09:00-18:00'],
            'friday'    => ['09:00-18:00'],
            'saturday'  => [],
            'sunday'    => [],
            'holidaysAreClosed' => true,
            'holidays'  => [
                '01-01', // New Year's Day
                '01-20', // Feast of San Sebastian (Local Holiday)
                '02-10', // Chinese New Year
                '02-25', // EDSA People Power Revolution Anniversary
                '03-28', // Maundy Thursday
                '03-29', // Good Friday
                '03-30', // Black Saturday
                '04-09', // Araw ng Kagitingan
                '05-01', // Labor Day
                '06-12', // Independence Day
                '06-18', // Bacolod City Charter Day (Local Holiday)
                '08-21', // Ninoy Aquino Day
                '08-26', // National Heroes Day
                '11-01', // All Saints' Day
                '11-02', // All Souls' Day
                '11-05', // Cinco de Noviembre (Local Holiday)
                '11-30', // Bonifacio Day
                '12-08', // Feast of the Immaculate Conception
                '12-24', // Christmas Eve
                '12-25', // Christmas Day
                '12-30', // Rizal Day
                '12-31', // New Year's Eve
                '10-18', // Start of MassKara Festival (Local Holiday)
                '10-19', // Highlight of MassKara Festival (Local Holiday)
                '10-20', // End of MassKara Festival (Local Holiday)

            ],
        ]);
        $date = Carbon::now()->setTimezone('Asia/Hong_Kong');
        if($req->code === 'OiFT2qnVVpEn0tmmrkANKHJO6cSOmvQk'){
            
            if($check){
                $status = 'StillLogged';
                $action = '';
                $data = ['',''];
            }else{
                $att = new CshAttendance();
                $att->user_id = $user;
                $att->att_workday = $date->isBusinessDay() ? ($date->isWeekend() ? 'Weekend Duty' : 'Regular Workday') : 'Holiday Duty';
                $att->att_time_in = $date->format('h:i A');
                $att->att_time_out = '';
                $att->att_date = $date->format('F j, Y');
                $att->att_total_time = '';
                $att->att_status = 0;
                $att->save();
                
                $status = 'success';
                $action = 'login';
                $data = [$date->format('h:i A'),  $date->format('F j, Y')];
            }
          
        }

        if($req->code === 'FV7urv439FTNmtBVcSiwAzR7cvberU0M'){
            if(!$check){
                $status = 'NotLogged';
                $action = '';
                $data = ['',''];
            }else{
                $time = timeDifference($check->att_time_in, $date->format('h:i A'));
                $totalTime = $time['hours']. "Hrs & " . $time['minutes'] . 'Mins';
                $check->update([
                   'att_time_out'=> $date->format('h:i A'),
                   'att_total_time'=>$totalTime,
                   'att_total_hours'=> $time['hours'],
                   'att_total_minutes'=> $time['minutes'],
                   'att_overtime'=> $time['hours'] >=9 ? ($time['hours'] == 9 ? "0 Hrs & " . $time['minutes'] . 'Mins' : $time['hours'] - 9 . "Hrs & " . $time['minutes'] . 'Mins') : 0,
                   'att_status'=>1,
                ]);

                $status = 'success';
                $action = 'logout';
                $data = ['',''];
            }
         
        }

        return response()->json(['status'=> $status, 'action'=>$action, 'data'=>$data]);

    }

    public function AttendanceLoadData(Request $req){
        $user = CshAttendance::where('user_id', $req->user_id)->get();
        return response()->json(['data'=>$user]);
    }

    public function GetAttendance(Request $req){
        $user = CshAttendance::where('user_id', $req->user_id)->orderBy('created_at', 'desc')->get();
        return response()->json(['att'=>$user]);
    }

    public function AddLead(Request $req){
       $lead = new CshPipeline;
       $lead->user_id = $req->user_id;
       $lead->pl_company_name =$req->companyName;
       $lead->pl_name = $req->name;
       $lead->pl_email = $req->email;
       $lead->pl_status = 'Lead';
       $lead->pl_active = 1;
       $lead->save();
       
       return response()->json(['status'=>'success']);
    }

    public function LoadPipeline(Request $req){
      switch($req->state){
        case "LEADS":
            $data = CshPipeline::where('user_id', $req->user_id)->where('pl_status', 'Lead')->where('pl_active', 1)->orderBy('updated_at', 'desc')->get();
            foreach($data as $d){
                $check = CshSentMail::where('user_id', $req->user_id)->where('pl_id', $d->pl_id)->get()->count();
                if($check){
                    $d->email_num = CshSentMail::where('user_id', $req->user_id)->where('pl_id', $d->pl_id)->get()->count();
                }else{
                    $d->email_num = 0;
                }
               
            }
            break;
        case "PROSPECTS":
            $data = CshPipeline::where('user_id', $req->user_id)->where('pl_status', 'Prospect')->where('pl_active', 1)->orderBy('updated_at', 'desc')->get();
            foreach($data as $d){
                $check = CshSentMail::where('user_id', $req->user_id)->where('pl_id', $d->pl_id)->get()->count();
                if($check){
                    $d->email_num = CshSentMail::where('user_id', $req->user_id)->where('pl_id', $d->pl_id)->get()->count();
                }else{
                    $d->email_num = 0;
                }
               
            }
            break;
        case "DISCUSSION":
            $data = CshPipeline::where('user_id', $req->user_id)->where('pl_status', 'Discussion')->where('pl_active', 1)->orderBy('updated_at', 'desc')->get();
            foreach($data as $d){
                $check = CshSentMail::where('user_id', $req->user_id)->where('pl_id', $d->pl_id)->get()->count();
                if($check){
                    $d->email_num = CshSentMail::where('user_id', $req->user_id)->where('pl_id', $d->pl_id)->get()->count();
                }else{
                    $d->email_num = 0;
                }
               
            }
            break;
        case "PROPOSAL":
            $data = CshPipeline::where('user_id', $req->user_id)->where('pl_status', 'Proposal')->where('pl_active', 1)->orderBy('updated_at', 'desc')->get();
            foreach($data as $d){
                $check = CshSentMail::where('user_id', $req->user_id)->where('pl_id', $d->pl_id)->get()->count();
                if($check){
                    $d->email_num = CshSentMail::where('user_id', $req->user_id)->where('pl_id', $d->pl_id)->get()->count();
                }else{
                    $d->email_num = 0;
                }
               
            }
            break;
        case "NEGOTIATION":
            $data = CshPipeline::where('user_id', $req->user_id)->where('pl_status', 'Negotiation')->where('pl_active', 1)->orderBy('updated_at', 'desc')->get();
            foreach($data as $d){
                $check = CshSentMail::where('user_id', $req->user_id)->where('pl_id', $d->pl_id)->get()->count();
                if($check){
                    $d->email_num = CshSentMail::where('user_id', $req->user_id)->where('pl_id', $d->pl_id)->get()->count();
                }else{
                    $d->email_num = 0;
                }
               
            }
            break;
        case "CONTRACT":
            $data = CshPipeline::where('user_id', $req->user_id)->where('pl_status', 'Contract')->where('pl_active', 1)->orderBy('updated_at', 'desc')->get();
            foreach($data as $d){
                $check = CshSentMail::where('user_id', $req->user_id)->where('pl_id', $d->pl_id)->get()->count();
                if($check){
                    $d->email_num = CshSentMail::where('user_id', $req->user_id)->where('pl_id', $d->pl_id)->get()->count();
                }else{
                    $d->email_num = 0;
                }
               
            }
            break;
        case "WON":
            $data = CshPipeline::where('user_id', $req->user_id)->where('pl_status', 'Won')->where('pl_active', 1)->orderBy('updated_at', 'desc')->get();
            foreach($data as $d){
                $check = CshSentMail::where('user_id', $req->user_id)->where('pl_id', $d->pl_id)->get()->count();
                if($check){
                    $d->email_num = CshSentMail::where('user_id', $req->user_id)->where('pl_id', $d->pl_id)->get()->count();
                }else{
                    $d->email_num = 0;
                }
               
            }
            break;
        case "LOST":
            $data = CshPipeline::where('user_id', $req->user_id)->where('pl_status', 'Lost')->where('pl_active', 1)->orderBy('updated_at', 'desc')->get();
            foreach($data as $d){
                $check = CshSentMail::where('user_id', $req->user_id)->where('pl_id', $d->pl_id)->get()->count();
                if($check){
                    $d->email_num = CshSentMail::where('user_id', $req->user_id)->where('pl_id', $d->pl_id)->get()->count();
                }else{
                    $d->email_num = 0;
                }
               
            }
            break;
        case "DNC":
            $data = CshPipeline::where('user_id', $req->user_id)->where('pl_status', 'DNC')->where('pl_active', 1)->orderBy('updated_at', 'desc')->get();
            foreach($data as $d){
                $check = CshSentMail::where('user_id', $req->user_id)->where('pl_id', $d->pl_id)->get()->count();
                if($check){
                    $d->email_num = CshSentMail::where('user_id', $req->user_id)->where('pl_id', $d->pl_id)->get()->count();
                }else{
                    $d->email_num = 0;
                }
               
            }
            break;
        default:
            $data = CshPipeline::where('user_id', $req->user_id)->where('pl_active', 1)->orderBy('updated_at', 'desc')->get();
            foreach($data as $d){
                $check = CshSentMail::where('user_id', $req->user_id)->where('pl_id', $d->pl_id)->get()->count();
                if($check){
                    $d->email_num = CshSentMail::where('user_id', $req->user_id)->where('pl_id', $d->pl_id)->get()->count();
                }else{
                    $d->email_num = 0;
                }
               
            }
            break;
      }

      return response()->json(['data'=>$data]);
    }

    public function GetLeadDetails(Request $req){
        $pl = CshPipeline::where('pl_id', $req->pl_id)->first();
        $email = CshSentMail::where('pl_id', $req->pl_id)->get();
      
        return response()->json(['pipeline'=>$pl, 'email'=>$email]);
    }

    public function UpdateLead(Request $req){
        $lead = CshPipeline::where('pl_id', $req->pl_id)->first();
        $lead->update([
           'pl_company_name'=>$req->companyName,
           'pl_name'=>$req->name,
           'pl_email'=>$req->email,
           'pl_service_offer'=>$req->serviceOffer,
           'pl_position'=>$req->position,
           'pl_employee'=>$req->employees,
           'pl_status'=>$req->status,
           'pl_email_verification'=>$req->emailStatus,
        ]);

        return response()->json(['status'=>'success']);
    }

    public function DisableLead(Request $req){
        $lead = CshPipeline::where('pl_id', $req->pl_id)->first();

        $lead->update([
            'pl_active'=>0
        ]);

        return response()->json(['status'=>'success']);
    }

    public function ReadCSV(Request $req){
    // Set default values if parameters are empty
    $companyName = !empty($req->companyName) ? $req->companyName : 'COMPANY';
    $name = !empty($req->name) ? $req->name : 'NAME';
    $email = !empty($req->email) ? $req->email : 'EMAIL';

    // Load the uploaded file
    $file = $req->file('leadFile'); 
    $spreadsheet = IOFactory::load($file);
    $worksheet = $spreadsheet->getActiveSheet();

    // Initialize variables for column headers
    $headerColumnCompany = null;
    $headerColumnName = null;
    $headerColumnEmail = null;

    // Function to find column header
    function findHeaderColumn($worksheet, $headerName) {
        foreach ($worksheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);
            foreach ($cellIterator as $cell) {
                if ($cell->getValue() == $headerName) {
                    return $cell->getColumn();
                }
            }
        }
        return null;
    }

    // Find header columns
    $headerColumnCompany = findHeaderColumn($worksheet, $companyName);
    $headerColumnName = findHeaderColumn($worksheet, $name);
    $headerColumnEmail = findHeaderColumn($worksheet, $email);

    // Check if any header was not found
    if ($headerColumnCompany === null) {
        return response()->json(['status' => 'fail', 'message' => "Header '$companyName' not found"]);
    }
    if ($headerColumnName === null) {
        return response()->json(['status' => 'fail', 'message' => "Header '$name' not found"]);
    }
    if ($headerColumnEmail === null) {
        return response()->json(['status' => 'fail', 'message' => "Header '$email' not found"]);
    }

    // Initialize arrays to store column data
    $columnCompany = [];
    $columnName = [];
    $columnEmail = [];

    // Function to extract column data
    function extractColumnData($worksheet, $headerColumn) {
        $columnData = [];
        $column = $worksheet->getColumnIterator($headerColumn)->current();
        if ($column) {
            $cellIterator = $column->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);
            foreach ($cellIterator as $cell) {
                // Skip the header row
                if ($cell->getRow() === 1) {
                    continue;
                }
                // Get cell value and add to columnData
                $cellValue = $cell->getValue();
                $columnData[] = $cellValue;
            }
        }
        return $columnData;
    }

    // Extract data from each column
    $columnCompany = extractColumnData($worksheet, $headerColumnCompany);
    $columnName = extractColumnData($worksheet, $headerColumnName);
    $columnEmail = extractColumnData($worksheet, $headerColumnEmail);

    // Return JSON response with the extracted data
    return response()->json(['status'=>'success','company' => $columnCompany, 'name' => $columnName, 'email' => $columnEmail]);
    }

    public function UpdateSMTPConfig(Request $req){
        $config = CshEmailConfig::where('user_id', $req->user_id)->first();
        $config->update([
          'econf_username'=>$req->mailAddress,
          'econf_password'=>$req->mailPassword,
          'econf_host'=>$req->smtpHost,
          'econf_port'=>$req->smtpPort,
          'econf_encryption'=>$req->smtpEncrypt,
          'econf_from_address'=>$req->fromAddress,
        ]);

        return response()->json(['status'=>'success']);
    }

    public function SaveEmailTemp(Request $req){
        if($req->type === 'signature'){
           $data = new CshEmailSignature();
           $data->user_id = $req->user_id;
           $data->emsig_name = $req->name;
           $data->emsig_content = $req->content;
           $data->emsig_status = CshEmailSignature::where('emsig_status', 2)->first() ? 1 : 2;
           $data->save();
        }else{
            $data = new CshEmailTemplate();
            $data->user_id = $req->user_id;
            $data->emtemp_name = $req->name;
            $data->emtemp_content = $req->content;
            $data->emtemp_followup = $req->followup;
            $data->emtemp_status = 1;
            $data->save();
        }

        return response()->json(['status'=>'success']);
    }

    public function LoadTempSig(Request $req){
        if($req->type === 'signature'){
          return response()->json(['data'=>CshEmailSignature::where('user_id', $req->user_id)->where('emsig_status','!=', 0)->get()]);
        }else{
            return response()->json(['data'=>CshEmailTemplate::where('user_id', $req->user_id)->where('emtemp_status', 1)->get()]);
        }
    }

    public function GetTempSig(Request $req){
        if($req->type === 'signature'){
            return response()->json(['data'=>CshEmailSignature::where('emsig_id', $req->sigTemp)->first()]);
        }else{
            return response()->json(['data'=>CshEmailTemplate::where('emtemp_id', $req->sigTemp)->first()]);
        }
    }

    public function UpdateEmailTempSig(Request $req){
        $replacements = [
            '<pre><code>' => '',
            '</pre></code>' => '',
        ];
        $content = str_replace(array_keys($replacements), array_values($replacements), $req->content);
        $followup = str_replace(array_keys($replacements), array_values($replacements), $req->followup);
        if($req->type === 'signature'){
            $data = CshEmailSignature::where('emsig_id', $req->sigTempId)->first();
            $data->update([
              'emsig_name'=>$req->name,
              'emsig_content'=>$content,
            ]);
        }else{
            $data = CshEmailTemplate::where('emtemp_id', $req->sigTempId)->first();
            $data->update([
              'emtemp_name'=>$req->name,
              'emtemp_content'=>$content,
              'emtemp_followup'=>$followup
            ]);
        }

        return response()->json(['status'=>'success']);
    }

    public function DisableEmTempSig(Request $req){
        if($req->type === 'signature'){
          CshEmailSignature::where('emsig_id', $req->id)->first()->update(['emsig_status'=>0]);
        }else{
            CshEmailTemplate::where('emtemp_id', $req->id)->first()->update(['emtemp_status'=>0]);
        }

        return response()->json(['status'=>'success']);
    }

    public function SendCustomMail(Request $req){
         EmailCred($req->user_id);
         $sent = new CshSentMail();
         $sent->pl_id = explode('-', $req->recipient)[1];
         $sent->se_subject = $req->subject;
         $sent->se_message = $req->message;
         $sent->se_date = Carbon::now()->setTimezone('Asia/Hong_Kong')->format('F j, Y');
         $sent->se_level = '1';
         $sent->se_status = '1';
         $sent->save();
         $user = CshUser::where('user_id', $req->user_id)->first();
         $conf = CshEmailConfig::where('user_id', $req->user_id)->first();
         $message =  str_replace('{{name}}', explode(' ', $user->user_name)[0], $req->message);
         Mail::to(explode('-', $req->recipient)[0])->send(new SendCustomMail($req->subject, $message, $sent->se_id, $conf->econf_from_address, $user->user_name, explode('-', $req->recipient)[1]));

         return response()->json(['status'=>'success']);
    }

    public function SwitchToActiveSig(Request $req){
      CshEmailSignature::where('emsig_status', 2)->where('user_id', $req->user_id)->first()->update(['emsig_status'=>1]);
      CshEmailSignature::where('emsig_id', $req->id)->where('user_id', $req->user_id)->first()->update(['emsig_status'=>2]);

      return response()->json(['status'=>'success']);
    }

    public function LoadActiveSignature(Request $req){
        $data = CshEmailSignature::where('emsig_status', 2)->where('user_id', $req->user_id)->first();

        return response()->json(['status'=>'success', 'data'=>$data]);
    }

    public function EmailTracking($id){
        $email = CshSentMail::where('se_id', $id)->first();
        if ($email) {
          $email->update(['se_status'=>2]);
        }

        // Return a 1x1 pixel image
        $img = imagecreate(1, 1);
        header('Content-Type: image/png');
        imagepng($img);
        imagedestroy($img);
        exit;
    }

    public function MassEmailLeads(Request $req){
        $data = $req->filter === 'all' ?
         CshPipeline::where('user_id', $req->user_id)->where('pl_status', 'Lead')->where('pl_email_verification', 'Verify')->get() : CshPipeline::where('user_id', $req->user_id)->where('pl_status', 'Lead')->where('pl_email_verification', 'Verify')->where('pl_service_offer', $req->filter)->get();
       
        return response()->json(['data'=>$data]);
    }

    public function CheckMassMailValidity(Request $req){
        $pl = CshPipeline::where('pl_id', $req->pl_id)->where('pl_service_offer', $req->offer)->first();
        return response()->json(['status'=> $pl ? 'success' : 'failed']);
    }

    public function SentProgressMassMail(Request $req){
        EmailCred($req->user_id);

    try {
        $user = CshUser::where('user_id', $req->user_id)->first();
        $conf = CshEmailConfig::where('user_id', $req->user_id)->first();
        $temp = CshEmailTemplate::where('emtemp_id', $req->template_id)->first();
        $sig = CshEmailSignature::where('emsig_status', 2)->where('user_id', $req->user_id)->first();
        $subject = CshEmailSubject::where('emsub_id', $req->subject_id)->first();
        $lead = CshPipeline::where('pl_id', $req->pl_id)->first();
        $lead->update([
            'pl_status' => 'Prospect',
        ]);
        $conc_mess = $temp->emtemp_content . "<br>" . $sig->emsig_content;
        $replacements = [
            '{reciever name}' => explode(' ', $lead->pl_name)[0],
            '{sender name}' => explode(' ', $user->user_name)[0],
        ];
        $message = str_replace(array_keys($replacements), array_values($replacements), $conc_mess);

        $sent = new CshSentMail();
        $sent->pl_id = $req->pl_id;
        $sent->user_id = $req->user_id;
        $sent->se_offer = $lead->pl_service_offer;
        $sent->se_subject = $subject->emsub_content;
        $sent->se_message = $message;
        $sent->se_date = Carbon::now()->setTimezone('Asia/Hong_Kong')->format('F j, Y');
        $sent->se_level = '1';
        $sent->emtemp_id = $req->template_id;
        $sent->emsub_id = $req->subject_id;
        $sent->se_status = '1';
        $sent->save();

        $level = new CshMailLevel();
        $level->pl_id = $req->pl_id;
        $level->ml_date_one =  Carbon::now()->setTimezone('Asia/Hong_Kong')->format('F j, Y');
        $level->ml_date_two =  Carbon::now()->setTimezone('Asia/Hong_Kong')->addDays(3)->format('F j, Y');
        $level->ml_date_three =  Carbon::now()->setTimezone('Asia/Hong_Kong')->addDays(6)->format('F j, Y');
        $level->ml_date_four =  Carbon::now()->setTimezone('Asia/Hong_Kong')->addDays(9)->format('F j, Y');
        $level->ml_date_five =  Carbon::now()->setTimezone('Asia/Hong_Kong')->addDays(12)->format('F j, Y');
        $level->ml_level = '1';
        $level->save();

        Mail::to($lead->pl_email)->send(new SendCustomMail($subject->emsub_content, $message, $sent->se_id, $conf->econf_from_address, $user->user_name, $req->pl_id));

        return response()->json(['status' => 'success']);
    } catch (\Exception $e) {

        if (isset($sent) && $sent->exists) {
            $sent->delete();
        }
        if (isset($level) && $level->exists) {
            $level->delete();
        }
        return response()->json(['status' => 'fail']);
    }
    }

    public function AddEmailSubject(Request $req){
       $subject = new CshEmailSubject();
       $subject->user_id = $req->user_id;
       $subject->emsub_content = $req->subjectContent;
       $subject->emsub_service = $req->affiliatedService;
       $subject->emsub_status = 1;
       $subject->save();

       return response()->json(['status'=>'success']);
    }

    public function LoadEmailSubject(Request $req){
        return response()->json([
            'data'=> $req->filter === 'all' ? CshEmailSubject::where('user_id', $req->user_id)->where('emsub_status', 1)->get() : CshEmailSubject::where('user_id', $req->user_id)->where('emsub_status', 1)->where('emsub_service', $req->filter)->get(),
            'status'=>$req->filter === 'all' ? 'all' : 'not'
        ]);
    }

    public function UpdateEmailSubject(Request $req){
      CshEmailSubject::where('emsub_id', $req->emsub_id)->first()->update([
         'emsub_content'=>$req->subjectContent,
         'emsub_service'=>$req->affiliatedService,
      ]);

      return response()->json(['status'=>'success']);
    }

    public function DisableEmailSubject(Request $req){
        CshEmailSubject::where('emsub_id', $req->emsub_id)->first()->update([
            'emsub_status'=>0,
         ]);
   
         return response()->json(['status'=>'success']);
    }

    public function GetTempView(Request $req){
        $temp = CshEmailTemplate::where('emtemp_id', $req->temp_id)->first();
        $sub = CshEmailSubject::where('emsub_id', $req->sub_id)->first();
        $sig = CshEmailSignature::where('user_id', $req->user_id)->where('emsig_status', 2)->first();

        $template = $temp->emtemp_content  . $sig->emsig_content;

        return response()->json(['template'=>$template, 'sub'=> $sub->emsub_content]);
    }

    public function AttMonLoad(Request $req){
        $employee = CshUser::where('user_status', 1)
        ->where('user_type', 'Employee')
        ->get();
        $month = $req->month;
        $year = $req->year;
    foreach ($employee as $emp) {
        $attend = CshAttendance::where('user_id', $emp->user_id)->get();
        $totalHours = 0;
        $totalMinutes = 0;

        foreach ($attend as $att) {

            $date = DateTime::createFromFormat('d/m/Y', $att->att_date);
            if ($date && $date->format('m') == $month && $date->format('Y') == $year) {
                $totalHours += $att->att_total_hours;
                $totalMinutes += $att->att_total_minutes;
            }
        }

        $additionalHours = intdiv($totalMinutes, 60);
        $remainingMinutes = $totalMinutes % 60;
        $fractionalHours = $remainingMinutes / 60;

        $totalTime = $totalHours + $additionalHours + $fractionalHours;
        $monthName = DateTime::createFromFormat('!m', $month)->format('F');
        $emp->totalHours = $totalTime;
        $emp->month = $monthName;
        
    }

     return response()->json(['data'=>$employee]);
    }

    public function UpUserDetails(Request $req){
        CshUser::where('user_id', $req->user_id)->first()
        ->update([
            'user_name'=>$req->fullname,
            'user_username'=> $req->username,
            'user_emp_id'=> $req->employeeId,
            'user_position'=>$req->position,
        ]);

        return response()->json(['status'=>'success']);
    }

    public function ChangePassword(Request $req){
        $user = CshUser::where('user_id', $req->user_id)->first();

        if(Hash::check($req->currentPass, $user->user_password)){
            $user->update(['user_password'=> Hash::make($req->newPass)]);
            return response()->json(['status'=>'success']);
        }else{
            return response()->json(['status'=>'failed']);
        }
    }

    public function ChangeProfilePic(Request $req){
        $user = CshUser::where('user_id', $req->user_id)->first();

        $pic = $req->file('profile');

        if(!in_array($pic->getClientOriginalExtension(), ['jpg', 'jpeg', 'png'])){
            return response()->json(['status'=>'invalid type']);
        }

        if($pic->getSize() > 10485760){
            return response()->json(['status'=>'too big']);
        }
        $filename ='User'. $user->user_id . ".".$pic->getClientOriginalExtension();
        $pic->move(public_path('assets/user'),  $filename);
        $user->update([
            'user_pic'=>$filename,
        ]);

        return response()->json(['status'=>'success']);
    }

    public function UserLogout(Request $req){

        return response()->json(['status'=> 'success'])->cookie(cookie()->forget('admin_id'));
    }

    public function LoadSentEmail(Request $req){
       $mail = $req->filter === 'all' ? CshSentMail::where('user_id', $req->user_id)->get() : CshSentMail::where('user_id', $req->user_id)->where('se_offer', $req->filter)->get();
       
       foreach($mail as $m){
         $lead = CshPipeline::where('pl_id', $m->pl_id)->first();
         $m->company = $lead->pl_company_name;
         $m->name = $lead->pl_name;
         $m->email = $lead->pl_email;
       }

       return response()->json(['data'=>$mail]);
    }

    public function LoadUserGraphs(Request $req){

        $user = CshUser::where('user_id', $req->user_id)->first();
        $user->lead =  CshPipeline::where('user_id', $req->user_id)->where('pl_status', 'Lead')->get()->count();
        $user->prospect =  CshPipeline::where('user_id', $req->user_id)->where('pl_status', 'Prospect')->get()->count();
        $user->discussion =  CshPipeline::where('user_id', $req->user_id)->where('pl_status', 'Discussion')->get()->count();
        $user->proposal =  CshPipeline::where('user_id', $req->user_id)->where('pl_status', 'Proposal')->get()->count();
        $user->negotiation =  CshPipeline::where('user_id', $req->user_id)->where('pl_status', 'Negotiation')->get()->count();
        $user->contract =  CshPipeline::where('user_id', $req->user_id)->where('pl_status', 'Contract')->get()->count();
        $user->won =  CshPipeline::where('user_id', $req->user_id)->where('pl_status', 'Won')->get()->count();
        $user->lost =  CshPipeline::where('user_id', $req->user_id)->where('pl_status', 'Lost')->get()->count();
        $user->dnc =  CshPipeline::where('user_id', $req->user_id)->where('pl_status', 'DNC')->get()->count();

        return response()->json(['users'=>$user]);
    }

    public function LoadMailLevel(Request $req){
        $schedule = CshMailLevel::where('pl_id', $req->pl_id)->first();
        $schedule->status1 = CshSentMail::where('pl_id', $req->pl_id)->where('se_date', $schedule->ml_date_one)->where('se_level', 1)->first() ?
        'Sent' : 'Not Yet';
        $schedule->status2 = CshSentMail::where('pl_id', $req->pl_id)->where('se_date', $schedule->ml_date_two)->where('se_level', 2)->first() ?
        'Sent' : 'Not Yet';
        $schedule->status3 = CshSentMail::where('pl_id', $req->pl_id)->where('se_date', $schedule->ml_date_three)->where('se_level', 3)->first() ?
        'Sent' : 'Not Yet';
        $schedule->status4 = CshSentMail::where('pl_id', $req->pl_id)->where('se_date', $schedule->ml_date_four)->where('se_level', 4)->first() ?
        'Sent' : 'Not Yet';
        $schedule->status5 = CshSentMail::where('pl_id', $req->pl_id)->where('se_date', $schedule->ml_date_five)->where('se_level', 5)->first() ?
        'Sent' : 'Not Yet';

        $schedule->view1 = CshSentMail::where('pl_id', $req->pl_id)->where('se_date', $schedule->ml_date_one)->where('se_level', 1)->where('se_status',2)->first() ?
        'Seen' : 'Not Yet';
        $schedule->view2 = CshSentMail::where('pl_id', $req->pl_id)->where('se_date', $schedule->ml_date_two)->where('se_level', 2)->where('se_status',2)->first() ?
        'Seen' : 'Not Yet';
        $schedule->view3 = CshSentMail::where('pl_id', $req->pl_id)->where('se_date', $schedule->ml_date_three)->where('se_level', 3)->where('se_status',2)->first() ?
        'Seen' : 'Not Yet';
        $schedule->view4 = CshSentMail::where('pl_id', $req->pl_id)->where('se_date', $schedule->ml_date_four)->where('se_level', 4)->where('se_status',2)->first() ?
        "Seen" : 'Not Yet';
        $schedule->view5 = CshSentMail::where('pl_id', $req->pl_id)->where('se_date', $schedule->ml_date_five)->where('se_level', 5)->where('se_status',2)->first() ?
        'Seen' : 'Not Yet';


        return response()->json(['schedule'=>$schedule]);
    }
    

    public function LoadMessage(Request $req){
        $mess = CshSentMail::where('se_id', $req->message)->first();
        $pipe = CshPipeline::where('pl_id', $mess->pl_id)->first();
        $mess->company = $pipe->pl_company_name;
        $mess->name = $pipe->pl_name;
        $mess->email = $pipe->pl_email;
        return response()->json(['data'=>$mess]);
    }

    public function LoadMasterList(){
        $lead = CshPipeline::where('pl_active', 1)->get();
        foreach($lead as $l){
            $user = CshUser::where('user_id', $l->user_id)->first();
            $l->user = $user->user_name;
        }
        return response()->json(['data'=>$lead]);
    }

    public function Unsub(Request $req){
        CshPipeline::where('pl_id', $req->lead_id)->first()->update([
          'pl_status'=> 'DNC'
        ]);

        return response()->json(['status'=> 'success']);
    }

    public function ApprovedOvertime(Request $req){
        $ot = CshAttendance::where('att_id', $req->att_id)->first();
        
        $value = $ot->att_overtime_status === 1 ? 0 : 1;
        $return = $ot->att_overtime_status === 1 ? 'cancel' : 'approve';
        $ot->update([
            'att_overtime_status'=> $value,
        ]);

        return response()->json(['status'=> 'success', 'data'=>$return]);
    }
}
