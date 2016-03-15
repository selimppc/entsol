<?php

namespace App\Modules\Admin\Controllers;

use App\MenuPanel;
use App\Permission;
use App\RoleUser;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function dashboard()
    {

        return view('admin::layouts.dashboard');
    }

    public function content_page()
    {
        return view('admin::index');
    }

    public function validation_page()
    {
        return view('admin::layouts.example_pages.validation_index');
    }


    public function sidebar_menu(){

        // Get User ID
        $user_id = Auth::user()->id;

        //get Role(s)
        $role_list = RoleUser::where('user_id','=',$user_id)
            ->select('role_user.role_id')
            ->get()->toArray();


        //routes per role(s)
       $permis_route = Permission::join('permission_role', 'permission_role.permission_id', '=', 'permissions.id')
           ->whereIn('permission_role.role_id', $role_list)
           ->select('permissions.route_url')
           ->get()->toArray();
        //module route
        $arr []=[
            'route_url'=>'#'
        ];
        // Merge all routes per ROLE(S) and USER ID
        $per_routes = array_merge($permis_route,$arr);

        //Get Menu Lists by PERMISSION (ROLE+USER+Permission)
        $tree = MenuPanel::whereIn('menu_panel.route',$per_routes)->get()->toArray();
        $parent = 1;

        $result = $this->menu_tree($tree, $parent);
        print_r($result);exit;
        
    }


    //$tree - menu data array
    //$parent - 0
    private function menu_tree($tree, $parent){
        $tree2 = array();
        foreach($tree as $i => $item){
            if($item['parent_menu_id'] == $parent){
                $tree2[$item['id']] = $item;
                $tree2[$item['id']]['sub-menu'] = $this->menu_tree($tree, $item['id']);
            }
        }
        return $tree2;
    }



}