<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/28/16
 * Time: 4:10 PM
 */

namespace App\Modules\Accounts\Controllers;

use App\GlTransaction;
use App\Http\Controllers\Controller;


class GlTransactionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "Gl Transaction";
        $data = GlTransaction::orderBy('voucher_head_id', 'DESC')->paginate(50);

        return view('accounts::gl_transaction.index', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

}