<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 2/14/16
 * Time: 5:31 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserProfile extends Model
{

    protected $table = 'user_profile';

    protected $fillable = [
        'user_id','first_name','middle_name','last_name','date_of_birth','gender','city','state','country_id','zip_code'
    ];

    public function relUser(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function relCountry(){
        return $this->belongsTo('App\Country', 'country_id', 'id');
    }

    // TODO :: boot
    // boot() function used to insert logged user_id at 'created_by' & 'updated_by'

    public static function boot(){
        parent::boot();
        static::creating(function($query){
            if(Auth::check()){
                $query->created_by = Auth::user()->id;
            }
        });
        static::updating(function($query){
            if(Auth::check()){
                $query->updated_by = Auth::user()->id;
            }
        });
    }
}