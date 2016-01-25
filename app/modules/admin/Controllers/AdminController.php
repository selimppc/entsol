<?php

namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function dashboard()
    {

        return view('admin::layouts.dashboard');
    }

    public function index()
    {
        return view('admin::index');
    }


}