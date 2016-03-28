<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/28/16
 * Time: 10:10 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $table = 'business';

    protected $fillable = [
        'title',
        'description',
        'address',
        'contact_person',
        'fax',
        'phone',
        'email',
    ];
}