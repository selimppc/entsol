<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;

/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/21/16
 * Time: 11:35 AM
 */
class User extends Model
{
    protected $table = 'user';

    protected $fillable = [
        'username','email','password','auth_key','access_token','csrf_token','ip_address','last_visit','role_id'
    ];
}