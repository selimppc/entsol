<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/28/16
 * Time: 10:33 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class YarnColor extends Model
{
    protected $table = 'yarn_color';

    protected $fillable = [
        'title',
        'value'
    ];
}