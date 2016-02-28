<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 2/15/16
 * Time: 11:41 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;


class Country extends Model
{

    protected $table = 'country';

    protected $hidden = ['code', 'title'];

}