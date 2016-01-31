<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/28/16
 * Time: 5:34 PM
 */

namespace App\Modules\Accounts\Controllers;

use App\VoucherHistory;
use App\Http\Controllers\Controller;



class VoucherHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "Voucher History";
        $data = VoucherHistory::orderBy('voucher_head_id', 'DESC')->paginate(50);

        return view('accounts::voucher_history.index', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }
}