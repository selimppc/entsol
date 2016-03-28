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
}