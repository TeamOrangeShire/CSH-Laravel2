<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CshEmailSignature extends Model
{
    use HasFactory;
    protected $table = 'csh_email_signature';
    protected $primaryKey = 'emsig_id';
    protected $fillable = [
       'user_id',
       'emsig_name',
       'emsig_content',
       'emsig_status',
    ];
}
