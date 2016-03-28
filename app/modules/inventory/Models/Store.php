<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/28/16
 * Time: 10:17 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'store';

    protected $fillable = [
        'title',
        'code',
        'description',
        'business_id',
    ];
}