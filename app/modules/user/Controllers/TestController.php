<?php

/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/14/16
 * Time: 11:17 AM
 */
namespace App\Modules\User\Controllers;

use App\Http\Controllers\Controller;
use App\MenuPanel;

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

/*recursive menu............*/
    public function menu_tree($tree, $parent){
        $tree2 = array();
        foreach($tree as $i => $item){

            if($item['parent_menu_id'] == $parent){
                //print_r($parent);exit;
                $tree2[$item['id']] = $item;
                $tree2[$item['id']]['sub-menu'] = $this->menu_tree($tree, $item['id']);
            }
        }
        return $tree2;
    }

    public function recursive_menu()
    {

        $tree = MenuPanel::get()->toArray();
        $parent= 0;

        $result = $this->menu_tree($tree, $parent);
        print_r($result);
        exit();
    }
    /*recursive menu :end ............*/
}