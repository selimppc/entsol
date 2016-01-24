<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/24/16
 * Time: 11:16 AM
 */

namespace App\Modules\Accounts\Controllers;

use App\GroupOne;
use App\Http\Controllers\Controller;


class GroupOneController extends Controller
{
    public function index()
    {
        $pageTitle = "Group One";
        $data = GroupOne::orderBy('id', 'DESC')->paginate(3);
        return view('accounts::group_one.index', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }
}