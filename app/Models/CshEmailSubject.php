<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CshEmailSubject extends Model
{
    use HasFactory;
    protected $table = 'csh_email_subject';
    protected $primaryKey = 'emsub_id';
    protected $fillable = [
       'user_id',
       'emsub_content',
       'emsub_service',
       'emsub_status',
    ];
}
