<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/28/16
 * Time: 10:28 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class YarnLot extends Model
{
    protected $table = 'yarn_lot';

    protected $fillable = [
        'title',
        'value'
    ];
}