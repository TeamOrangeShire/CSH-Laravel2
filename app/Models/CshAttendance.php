<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CshAttendance extends Model
{
    use HasFactory;
    protected $table = 'csh_attendance';
    protected $primaryKey = 'att_id';
    protected $fillable = [
       'user_id',
       'att_time_in',
       'att_time_out',
       'att_date',
       'att_total_time',
       'att_total_hours',
       'att_total_minutes',
       'att_status'
    ];
}
