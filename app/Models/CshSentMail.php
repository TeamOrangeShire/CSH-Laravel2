<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CshSentMail extends Model
{
    use HasFactory;
    protected $table = 'csh_sent_mail';
    protected $primaryKey = 'se_id';
    protected $fillable = [
       'pl_id',
       'se_message',
       'se_subject',
       'se_date ',
       'se_level',
       'se_status',
    ];
}
