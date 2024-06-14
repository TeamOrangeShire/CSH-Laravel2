<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\CshAttendance;
use App\Models\CshPipeline;
use App\Models\CshSentEmail;
use PhpOffice\PhpSpreadsheet\IOFactory;

class AdminBackEnd extends Controller
{
    public function ScanAttendance(Request $req){
        $user = $req->user_id;
        $check = CshAttendance::where('user_id', $user)->where('att_status', 0)->first();
        if($req->code === 'OiFT2qnVVpEn0tmmrkANKHJO6cSOmvQk'){
            
            if($check){
                $status = 'StillLogged';
                $action = '';
                $data = ['',''];
            }else{
                $att = new CshAttendance();
                $att->user_id = $user;
                $att->att_time_in = Carbon::now()->setTimezone('Asia/Hong_Kong')->format('h:i A');
                $att->att_time_out = '';
                $att->att_date = Carbon::now()->setTimezone('Asia/Hong_Kong')->format('d/m/Y');
                $att->att_total_time = '';
                $att->att_status = 0;
                $att->save();
                
                $status = 'success';
                $action = 'login';
                $data = [Carbon::now()->setTimezone('Asia/Hong_Kong')->format('h:i A'), Carbon::now()->setTimezone('Asia/Hong_Kong')->format('d/m/Y')];
            }
          
        }

        if($req->code === 'FV7urv439FTNmtBVcSiwAzR7cvberU0M'){
            if(!$check){
                $status = 'NotLogged';
                $action = '';
                $data = ['',''];
            }else{
                $time = timeDifference($check->att_time_in, Carbon::now()->setTimezone('Asia/Hong_Kong')->format('h:i A'));
                $totalTime = $time['hours']. "Hrs & " . $time['minutes'] . 'Mins';
                $check->update([
                   'att_time_out'=> Carbon::now()->setTimezone('Asia/Hong_Kong')->format('h:i A'),
                   'att_total_time'=>$totalTime,
                   'att_status'=>1,
                ]);

                $status = 'success';
                $action = 'logout';
                $data = ['',''];
            }
         
        }

        return response()->json(['status'=> $status, 'action'=>$action, 'data'=>$data]);

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
            $data = CshPipeline::where('user_id', $req->user_id)->where('pl_status', 'Lead')->where('pl_active', 1)->get();
            break;
        case "PROSPECTS":
            $data = CshPipeline::where('user_id', $req->user_id)->where('pl_status', 'Prospect')->where('pl_active', 1)->get();
            break;
        case "DISCUSSION":
            $data = CshPipeline::where('user_id', $req->user_id)->where('pl_status', 'Discussion')->where('pl_active', 1)->get();
            break;
        case "PROPOSAL":
            $data = CshPipeline::where('user_id', $req->user_id)->where('pl_status', 'Proposal')->where('pl_active', 1)->get();
            break;
        case "NEGOTIATION":
            $data = CshPipeline::where('user_id', $req->user_id)->where('pl_status', 'Negotiation')->where('pl_active', 1)->get();
            break;
        case "CONTRACT":
            $data = CshPipeline::where('user_id', $req->user_id)->where('pl_status', 'Contract')->where('pl_active', 1)->get();
            break;
        case "WON":
            $data = CshPipeline::where('user_id', $req->user_id)->where('pl_status', 'Won')->where('pl_active', 1)->get();
            break;
        case "LOST":
            $data = CshPipeline::where('user_id', $req->user_id)->where('pl_status', 'Lost')->where('pl_active', 1)->get();
            break;
        case "DNC":
            $data = CshPipeline::where('user_id', $req->user_id)->where('pl_status', 'DNC')->where('pl_active', 1)->get();
            break;
        default:
            $data = CshPipeline::where('user_id', $req->user_id)->where('pl_active', 1)->get();
            break;
      }

      return response()->json(['data'=>$data]);
    }

    public function GetLeadDetails(Request $req){
        $pl = CshPipeline::where('pl_id', $req->pl_id)->first();
        $email = CshSentEmail::where('pl_id', $req->pl_id)->get();
      
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

        $companyName = $req->companyName;
        $name = $req->name;
        $email = $req->email;

        $file = $req->file('leadFile'); 

        $spreadsheet = IOFactory::load($file);

        $worksheet = $spreadsheet->getActiveSheet();

        $columnCompany = [];
        $headerColumnCompany= null;

        $columnName = [];
        $headerColumnName= null;

        $columnEmail = [];
        $headerColumnEmail= null;
   
       foreach ($worksheet->getRowIterator() as $row) {
         $cellIterator = $row->getCellIterator();
         $cellIterator->setIterateOnlyExistingCells(false); 
         foreach ($cellIterator as $cell) {
             if ($cell->getValue() == $companyName) {
                 $headerColumnCompany = $cell->getColumn();
                 break 2; 
             }
         }
     }
     foreach ($worksheet->getRowIterator() as $row) {
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false); 
        foreach ($cellIterator as $cell) {
            if ($cell->getValue() == $name) {
                $headerColumnName = $cell->getColumn();
                break 2; 
            }
        }
    }
    foreach ($worksheet->getRowIterator() as $row) {
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false); 
        foreach ($cellIterator as $cell) {
            if ($cell->getValue() == $email) {
                $headerColumnEmail = $cell->getColumn();
                break 2; 
            }
        }
    }
    
    
    if ($headerColumnName !== null) {
        $column = $worksheet->getColumnIterator($headerColumnName)->current();
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
                $columnName[] = $cellValue;

             
            }
        }
    }
    if ($headerColumnEmail !== null) {
        $column = $worksheet->getColumnIterator($headerColumnEmail)->current();
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
                $columnEmail[] = $cellValue;

            }
        }
    }
     
    
    if ($headerColumnCompany !== null) {
        $column = $worksheet->getColumnIterator($headerColumnCompany)->current();
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
                $columnCompany[] = $cellValue;

            }
        }
    }

 
     return response()->json(['company' => $columnCompany, 'name'=>$columnName, 'email'=>$columnEmail]);
    }
}
