<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/28/16
 * Time: 10:17 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Store extends Model
{
    protected $table = 'store';

    protected $fillable = [
        'title',
        'code',
        'description',
        'business_id',
        'fax',
        'phone',
        'email',
        'web',
        'contact_person',
        'contact_name',
    ];


    //TODO :: Model Relationship...

    public function relBusiness(){
        return $this->belongsTo('App\Business', 'business_id', 'id');
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