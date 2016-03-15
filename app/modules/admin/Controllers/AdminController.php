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

        $role_list = RoleUser::where('user_id','=',$user_id)
            ->select('role_user.role_id')
            ->get()->toArray();

       $permission_route = DB::table('permissions')
           ->join('permission_role', 'permission_role.permission_id', '=', 'permissions.id')
           ->whereIn('permission_role.role_id', $role_list)
           ->select('permissions.route_url')
           ->get();

        print_r($permission_route);exit;

        
    }


}