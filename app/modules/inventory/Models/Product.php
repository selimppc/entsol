<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/28/16
 * Time: 10:12 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

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
}