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
       'ml_date1',
       'ml_date2',
       'ml_date3',
       'ml_date4',
       'ml_date5',
       'ml_level',
    ];
}
