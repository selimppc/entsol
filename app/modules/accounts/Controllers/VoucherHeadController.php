<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/25/16
 * Time: 12:32 PM
 */

namespace App\Modules\Accounts\Controllers;


use App\Balance;
use App\Http\Controllers\Controller;

class VoucherHeadController extends Controller
{
   public function index(){

       $pageTitle = 'Voucher Head';
       $branch_data = Balance::lists('code','id');
       return view('accounts::voucher_head.index',['pageTitle'=>$pageTitle]);
   }
}