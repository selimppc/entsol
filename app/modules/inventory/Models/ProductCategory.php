<?php

/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/28/16
 * Time: 10:04 AM
 */
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;

class ProductCategory extends Model
{
    protected $table = 'product_category';

    protected $fillable = [
        'title',
        'code',
        'description',
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