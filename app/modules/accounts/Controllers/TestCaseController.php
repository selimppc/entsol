<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/7/16
 * Time: 10:02 AM
 */

namespace App\Modules\Accounts\Controllers;


use App\Branch;
use App\Currency;
use App\Http\Controllers\Controller;
use App\VoucherHead;

class TestCaseController extends Controller
{

    public function test_case(){

        $model = new VoucherHead();
        $model = $model->with('relBranch')->where('account_type','journal-voucher')->where('status','!=','cancel')->orderBy('id', 'DESC')->paginate(30);

        /*$type = 'journal-voucher';
        $generate_number = GenerateNumber::generate_number($type);

        $generate_voucher_number = $generate_number[0];
        $settings_id = $generate_number[1];
        $number = $generate_number[2];*/

        $currency_data = [''=>'Select Currency'] + Currency::lists('title','id')->all();
        $branch_data =  [''=>'Select Branch'] + Branch::lists('title','id')->all();

        return view('accounts::voucher_head._test',['branch_data'=>$branch_data,'currency_data'=>$currency_data,'model'=>$model]);
    }
}