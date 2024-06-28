<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CshMailLevel extends Model
{
    use HasFactory;
    protected $table = 'csh_mail_level';
    protected $primaryKey = 'ml_id';
    protected $fillable = [
       'pl_id',
       'ml_date_one',
       'ml_date_two',
       'ml_date_three',
       'ml_date_four',
       'ml_date_five',
       'ml_level',
    ];
}
