<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/28/16
 * Time: 10:08 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ProductGroup extends Model
{
    protected $table = 'product_group';

    protected $fillable = [
        'product_category_id',
        'title',
        'code',
        'description',
    ];



    //TODO :: Model Relationship...

    public function relProductCategory(){
        return $this->belongsTo('App\ProductCategory', 'product_category_id', 'id');
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