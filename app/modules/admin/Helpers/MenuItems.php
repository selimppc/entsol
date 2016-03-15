<?php
namespace App\Helpers;
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/15/16
 * Time: 5:34 PM
 */

class MenuItems
{
    //$tree - menu data array
    //$parent - 0
    public static function menu_tree($tree, $parent){
        $tree2 = array();
        foreach($tree as $i => $item){
            if($item['parent_menu_id'] == $parent){
                $tree2[$item['id']] = $item;
                $tree2[$item['id']]['sub-menu'] = MenuItems::menu_tree($tree, $item['id']);
            }
        }
        return $tree2;
    }
}