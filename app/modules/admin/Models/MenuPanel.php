<?php

/**
 * Created by PhpStorm.
 * User: sr
 * Date: 3/6/16
 * Time: 4:19 PM
 */
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MenuPanel extends Model
{
    protected $table = 'menu_panel';

    protected $fillable = [
        'menu_id',
        'menu_type',
        'menu_name',
        'route',
        'parent_menu_id',
        'status'
    ];


}