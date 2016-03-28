<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/28/16
 * Time: 10:08 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
    protected $table = 'product_group';

    protected $fillable = [
        'product_category_id',
        'title',
        'code',
        'description',
    ];
}