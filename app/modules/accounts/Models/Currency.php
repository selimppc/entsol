<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/25/16
 * Time: 11:54 AM
 */

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use Illuminate\Http\Request;


class Currency extends Model
{
    protected $table = 'cm_currency';

    protected $fillable = [
        'code','title','description','exchange_rate','status'
    ];
}