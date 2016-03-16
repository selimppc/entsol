<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/16/16
 * Time: 10:30 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class UserLoginHistory extends Model
{

    protected $table = 'user_login_history';

    protected $fillable = [
        'user_id','login_time','logout_time','ip_address','date'
    ];

    public function relUser(){
        return $this->belongsTo('App\User', 'user_id', 'id');
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