<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 2/9/16
 * Time: 5:27 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Role extends Model
{
    protected $table = 'role';

    protected $fillable = [
       'title','slug','status'
    ];
    public function users(){
        return $this->belongsToMany('App\User');
    }
    public function permissions(){
        return $this->belongsToMany('App\Permission');
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