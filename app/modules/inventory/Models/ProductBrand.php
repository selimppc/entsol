<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/30/16
 * Time: 2:03 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ProductBrand extends Model
{

    protected $table = 'product_brand';

    protected $fillable = [
        'title',
        'description',
        'code',
        'country_id',
    ];


    //TODO :: Model Relationship...

    public function relCountry(){
        return $this->belongsTo('App\Country', 'country_id', 'id');
    }




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