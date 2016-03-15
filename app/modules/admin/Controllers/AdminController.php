<?php

namespace App\Modules\Admin\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

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
        $data = new Permission();

        $data = $data->select('permissions.title');
        $data = $data->leftJoin('permission_role','permission_role.permission_id','=','permissions.id');
        $data = $data->leftJoin('role_user','role_user.role_id','=','permission_role.role_id');
        $data = $data->leftJoin('user','user.id','=','role_user.user_id');
        $data = $data->where('user.id','=',$user_id);
        $data = $data->paginate(30);

        print_r($data);exit;
    }


}