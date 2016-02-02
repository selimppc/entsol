<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 2/1/16
 * Time: 4:14 PM
 */

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use Illuminate\Http\Request;


class Settings extends Model
{
    protected $table = 'ac_settings';

    protected $fillable = [
        'type','code','title','last_number','increment','status'
    ];
}