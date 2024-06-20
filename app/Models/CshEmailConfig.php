<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CshEmailConfig extends Model
{
    use HasFactory;
    protected $table = 'csh_email_config';
    protected $primaryKey = 'econf_id';
    protected $fillable = [
       'user_id',
       'econf_host',
       'econf_port',
       'econf_username',
       'econf_password',
       'econf_encryption',
       'econf_from_address'
    ];
}
