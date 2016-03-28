<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/28/16
 * Time: 10:26 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class YarnCount extends Model
{
    protected $table = 'yarn_count';

    protected $fillable = [
        'title',
        'value'
    ];
}