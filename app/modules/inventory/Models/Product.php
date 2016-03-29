<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/28/16
 * Time: 10:12 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = [
        'business_id',
        'product_group_id',
        'product_category_id',
        'title',
        'code',
        'description',
        'cost_price',
        'image',
        'purchase_unit',
        'purchase_unit_qty',
        'stock_unit',
        'stock_unit_qty',
        'stock_type'
    ];

    //TODO :: Model Relationship...

    public function relBusiness(){
        return $this->belongsTo('App\Business', 'business_id', 'id');
    }

    public function relProductGroup(){
        return $this->belongsTo('App\ProductGroup', 'product_group_id', 'id');
    }

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