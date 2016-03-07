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

class UserActivity extends Model
{

    protected $table = 'user_activity';

    protected $fillable = [
        'action_name','action_url','action_details','action_table','date','user_id'
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