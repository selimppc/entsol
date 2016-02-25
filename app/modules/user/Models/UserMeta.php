<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 2/16/16
 * Time: 11:46 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserMeta extends Model
{

    protected $table = 'user_meta';

    protected $fillable = [
        'user_id','fathers_name','mothers_name','fathers_occupation','fathers_phone','freedom_fighter','mothers_occupation','mothers_phone','national_id','driving_licence','passport','place_of_birth','marital_status','nationality','religion','signature','present_address','permanent_address'
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