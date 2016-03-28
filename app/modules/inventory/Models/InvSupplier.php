<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/28/16
 * Time: 10:38 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class InvSupplier extends Model
{
    protected $table = 'inv_supplier';

    protected $fillable = [
        'title',
        'code',
        'description',
    ];
}