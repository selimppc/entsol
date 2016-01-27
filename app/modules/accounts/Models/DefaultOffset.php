<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/25/16
 * Time: 10:52 AM
 */

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use Illuminate\Http\Request;


class DefaultOffset extends Model
{
    protected $table = 'ac_default_offset';

    protected $fillable = [
        'offset','pnl_account','year','period','status'
    ];
}