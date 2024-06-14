<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CshSentEmail extends Model
{
    use HasFactory;
    protected $table = 'csh_sent_email';
    protected $primaryKey = 'se_id';
    protected $fillable = [
       'pl_id',
       'se_level',
       'se_date',
       'se_status',
    ];
}
