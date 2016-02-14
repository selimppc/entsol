<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 2/14/16
 * Time: 5:31 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{

    protected $table = 'user_profile';

    protected $fillable = [
        'user_id','first_name','middle_name','last_name','date_of_birth','gender','city','state','country_id','zip_code'
    ];

    public function relUser(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}