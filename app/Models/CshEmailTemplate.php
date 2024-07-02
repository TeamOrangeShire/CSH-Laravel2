<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CshEmailTemplate extends Model
{
    use HasFactory;
    protected $table = 'csh_email_template';
    protected $primaryKey = 'emtemp_id';
    protected $fillable = [
       'user_id',
       'emtemp_name',
       'emtemp_content',
       'emtemp_followup',
       'emtemp_status',
    ];
}
