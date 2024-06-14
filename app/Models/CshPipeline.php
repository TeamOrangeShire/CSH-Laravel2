<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CshPipeline extends Model
{
    use HasFactory;
    protected $table = 'csh_pipeline';
    protected $primaryKey = 'pl_id';
    protected $fillable = [
       'user_id',
       'pl_company_name',
       'pl_name',
       'pl_email',
       'pl_email_verification',
       'pl_service_offer',
       'pl_employee',
       'pl_position',
       'pl_status',
       'pl_active',
    ];
}
