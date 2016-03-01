<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 2/1/16
 * Time: 4:14 PM
 */

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Settings extends Model
{
    protected $table = 'ac_settings';

    protected $fillable = [
        'type','code','title','last_number','increment','status'
    ];


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