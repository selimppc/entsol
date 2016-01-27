<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/27/16
 * Time: 10:28 AM
 */

namespace App\Modules\Accounts\Controllers;
use App\Branch;
use App\ChartOfAccounts;
use App\GroupOne;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Session;
use Input;


class ChartOfAccountsController extends Controller
{
    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "Chart Of Accounts";
        if($this->isPostRequest()){
            $account_code = Input::get('account_code');
            $data = ChartOfAccounts::where('status','active')->where('account_code','LIKE','%'.$account_code.'%')->orderBy('id', 'DESC')->get();
        }else{
            $data = ChartOfAccounts::where('status','active')->orderBy('id', 'DESC')->paginate(50);
        }
        $group_one_id = GroupOne::lists('title','id');
        $branch_id = Branch::lists('title','id');

        return view('accounts::chart_of_accounts.index', ['data' => $data, 'pageTitle'=> $pageTitle, 'group_one_id'=> $group_one_id, 'branch_id'=> $branch_id]);
    }
}