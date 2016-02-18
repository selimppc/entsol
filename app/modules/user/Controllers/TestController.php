<?php

/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/14/16
 * Time: 11:17 AM
 */
namespace App\Modules\User\Controllers;

use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function date_test()
    {
        /*date_default_timezone_set("Asia/Dacca");*/
        $i=30;
        $add_days = +$i.' days';
        $days= date('Y/m/d H:i:s', strtotime($add_days, strtotime(date('Y/m/d H:i:s'))));
        print_r($days);exit;
    }
}