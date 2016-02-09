<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 2/9/16
 * Time: 5:27 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';

    protected $fillable = [
       'title','slug','status'
    ];
}