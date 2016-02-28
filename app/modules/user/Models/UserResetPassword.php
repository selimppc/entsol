<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 10/18/15
 * Time: 12:05 PM
 */
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserResetPassword extends Model
{
    protected $table = 'user_reset_password';
    public $fillable = [
        'user_id', 'reset_password_token', 'reset_password_expire', 'reset_password_time', 'status',
    ];
    //TODO : Model Relationship
    public function relUser(){
        return $this->belongsTo('App\User', 'id', 'user_id');
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