<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/28/16
 * Time: 10:27 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class YarnComposition extends Model
{
    protected $table = 'yarn_composition';

    protected $fillable = [
        'title',
        'value'
    ];
}