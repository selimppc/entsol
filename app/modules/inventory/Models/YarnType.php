<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/28/16
 * Time: 10:31 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class YarnType extends Model
{
    protected $table = 'yarn_type';

    protected $fillable = [
        'title',
        'value'
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