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
        /*$data = DB::table('role_user')
            ->join('user', 'user.id', '=', 'role_user.user_id')
            ->join('role', 'role.id', '=', 'role_user.role_id')
            ->where('role.title', '!=', 'super-admin')
            ->select('role_user.id', 'user.username','user.email', 'role.title')
            ->paginate(30);

        $data = new Permission();

        $data = $data->select('permissions.title');

            $data = $data->leftJoin('role','role.id','=','permission_role.role_id');
            $data = $data->leftJoin('role','role.id','=','permission_role.role_id');
            $data = $data->where('user.id','=',$user_id);

            $data = $data->where('role.title', '!=', 'super-admin');

        if(isset($permission_name) && !empty($permission_name)){
            $data = $data->leftJoin('permissions','permissions.id','=','permission_role.permission_id');
            $data = $data->where('permissions.title', 'LIKE', '%'.$permission_name.'%');
        }
        $data = $data->paginate(30);*/
    }


}