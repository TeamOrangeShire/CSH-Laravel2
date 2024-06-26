<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CshUser extends Model
{
    use HasFactory;
    protected $table = 'csh_user';
    protected $primaryKey = 'user_id';
    protected $fillable = [
       'user_emp_id',
       'user_name',
       'user_username',
       'user_password',
       'user_position',
       'user_pic',
       'user_remember',
       'user_type',
       'user_status'
    ];
}
