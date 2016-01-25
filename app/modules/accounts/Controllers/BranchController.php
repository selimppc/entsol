<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/25/16
 * Time: 1:45 PM
 */

namespace App\Modules\Accounts\Controllers;
use App\Branch;
use App\Currency;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Session;
use Input;


class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "Branch";
        $currency_id = Currency::lists('title','id');
        $data = Branch::orderBy('id', 'DESC')->get();
        return view('accounts::branch.index', ['data' => $data, 'pageTitle'=> $pageTitle, 'currency_id'=> $currency_id]);
    }
}