<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 2/16/16
 * Time: 5:05 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserImage extends Model
{

    protected $table = 'user_image';

    protected $fillable = [
        'user_id','title','description','image','thumbnail','status'
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