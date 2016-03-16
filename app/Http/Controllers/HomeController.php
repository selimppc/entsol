<?php

namespace App\Http\Controllers;

use App\UserImage;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $pageTitle = 'ENTSOL - Dashboard';
        $user_image = UserImage::where('user_id',Auth::user()->id)->first();

        return view('admin::layouts.dashboard',['pageTitle'=>$pageTitle,'user_image'=>$user_image]);
    }

    public function all_routes_uri(){

        $routeCollection = Route::getRoutes();

        foreach ($routeCollection as $value) {
            $routes_list[] = Str::lower($value->getPath());
        }
        print_r($routes_list);exit;
    }
}
