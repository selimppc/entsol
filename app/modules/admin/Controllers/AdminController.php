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

    public function content_page()
    {
        return view('admin::index');
    }

    public function validation_page()
    {
        return view('admin::layouts.example_pages.validation_index');
    }


}