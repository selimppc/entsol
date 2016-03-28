<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/28/16
 * Time: 10:31 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class YarnType extends Model
{
    protected $table = 'yarn_type';

    protected $fillable = [
        'title',
        'value'
    ];
}