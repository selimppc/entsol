<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/28/16
 * Time: 10:21 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    protected $table = 'buyer';

    protected $fillable = [
        'title',
        'description',
        'country_id',
        'details'
    ];
}