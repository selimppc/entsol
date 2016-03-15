<?php

namespace App\Modules\Admin\Controllers;

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

        $user_id = Auth::user()->id;

        $role_list = RoleUser::where('user_id','=',$user_id)->first();


       $permission_route = DB::table('permissions')
           ->join('permission_role', 'permission_role.permission_id', '=', 'permissions.id')
           ->join('role', 'role.id', '=', 'permission_role.role_id')
           ->where('permission_role.role_id', '=', $role_list->role_id)
           ->select('permissions.route_url')
           ->paginate(30);

        print_r($permission_route);exit;

        
    }


}