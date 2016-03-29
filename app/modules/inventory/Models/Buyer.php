<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/28/16
 * Time: 10:21 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Buyer extends Model
{
    protected $table = 'buyer';

    protected $fillable = [
        'title',
        'description',
        'country_id',
        'details'
    ];

    //TODO :: Model Relationship...

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