<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 2/15/16
 * Time: 10:17 AM
 */

namespace App\Modules\Accounts\Controllers;

use App\Branch;
use App\Http\Controllers\Controller;
use App\Http\Requests\VoucherHeadRequest;
use App\Settings;
use App\VoucherHead;
use App\VoucherDetail;
use App\Modules\Accounts\Helpers\GenerateNumber;
use App\VoucherHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;


class PaymentVoucherHeadController extends Controller
{
    protected function isGetRequest()
    {
        return Input::server("REQUEST_METHOD") == "GET";
    }

    public function index(){

        $pageTitle = 'Payment Voucher Informations';
        $model = new VoucherHead();
        $model = $model->with('relBranch')->where('account_type','payment-voucher')->where('status','!=','cancel')->orderBy('id', 'DESC')->get();

        $type = 'payment-voucher';
        $generate_number = GenerateNumber::generate_number($type);

        $generate_voucher_number = $generate_number[0];
        $settings_id = $generate_number[1];
        $number = $generate_number[2];

        $branch_data =  [''=>'Select Branch'] + Branch::lists('title','id')->all();
        return view('accounts::payment_voucher.index',['pageTitle'=>$pageTitle,'branch_data'=>$branch_data,'model'=>$model,'generate_voucher_number'=>$generate_voucher_number,'number'=>$number,'settings_id'=>$settings_id]);
    }

    public function search_payment_voucher(){

        $pageTitle = 'Payment Voucher Informations';
        $model = new VoucherHead();

        if($this->isGetRequest()){

            $type = 'payment-voucher';
            $generate_number = GenerateNumber::generate_number($type);

            $generate_voucher_number = $generate_number[0];
            $settings_id = $generate_number[1];
            $number = $generate_number[2];

            $branch_id = Input::get('branch_id');
            $voucher_number = Input::get('voucher_number');
            $year = Input::get('year');
            $period = Input::get('period');
            $date = Input::get('date');
            $status = Input::get('status');

            $model = $model->with('relBranch');
            if (isset($branch_id) && !empty($branch_id)) $model->where('ac_voucher_head.branch_id', '=', $branch_id);
            if (isset($year) && !empty($year)) $model->where('ac_voucher_head.year', '=', $year);
            if (isset($period) && !empty($period)) $model->where('ac_voucher_head.period', '=', $period);
            if (isset($voucher_number) && !empty($voucher_number)) $model->where('ac_voucher_head.voucher_number', 'LIKE', '%'.$voucher_number.'%');
            if (isset($date) && !empty($date)) $model->where('ac_voucher_head.date', '=', $date);
            if (isset($status) && !empty($status)) $model->where('ac_voucher_head.status', '=', $status);
            $model = $model->where('account_type','payment-voucher')->get();
        }else{
            $model = $model->with('relBranch')->where('status','!=','cancel')->orderBy('id', 'DESC')->get();
        }

        $branch_data =  [''=>'Select Branch'] + Branch::lists('title','id')->all();
        return view('accounts::payment_voucher.index',['pageTitle'=>$pageTitle,'branch_data'=>$branch_data,'model'=>$model,'generate_voucher_number'=>$generate_voucher_number,'number'=>$number,'settings_id'=>$settings_id]);
    }

    public function store(VoucherHeadRequest $request){
        $input = $request->all();

        #print_r($input);exit;
        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            VoucherHead::create($input);
            Settings::where('id', $input['settings_id'])->update(array('last_number' => $input['number']));

            DB::commit();
            Session::flash('message', 'Successfully added!');
        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());
        }
        return redirect()->back();
    }

    public function show($id)
    {
        $pageTitle = 'Payment Voucher Informations';
        $data = VoucherHead::with('relBranch')->where('id',$id)->first();
        $voucher_details_data = VoucherDetail::with('relVoucherHead','relChartOfAccounts','relCurrency')->where('voucher_head_id',$id)->where('status','!=','cancel')->orderBy('id', 'DESC')->get();

        return view('accounts::payment_voucher.view', ['data' => $data,'voucher_details_data' => $voucher_details_data, 'pageTitle'=> $pageTitle]);
    }

    public function edit($id)
    {
        $pageTitle = 'Update Payment Voucher Informations';
        $branch_data = Branch::lists('title','id');

        /*$model = new VoucherHead();
        $year = $model->getYear();*/

        $data = VoucherHead::findOrFail($id);
        return view('accounts::payment_voucher.update', ['data' => $data,'branch_data'=>$branch_data,'pageTitle'=> $pageTitle]);
    }

    public function update(VoucherHeadRequest $request, $id)
    {
        $model = VoucherHead::findOrFail($id);
        $input = $request->all();

        DB::beginTransaction();
        try {
            $model->update($input);
            DB::commit();
            Session::flash('message', "Successfully Updated");
        }
        catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('error', $e->getMessage());
        }
        return redirect()->back();
    }
    public function change_status($id)
    {
        $model = VoucherHead::findOrFail($id);

        DB::beginTransaction();
        try {
            if($model->status =='active'){
                $model->status = 'inactive';
            }else{
                $model->status = 'active';
            }
            $model->save();
            DB::commit();
            Session::flash('message', "Successfully Changed Status.");
        }
        catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('error', $e->getMessage());
        }
        return redirect()->route('payment-voucher');
    }

    public function delete($id){

        $model = VoucherHead::findOrFail($id);
        $voucher_details_data = VoucherDetail::where('voucher_head_id',$id)->first();

        if($voucher_details_data == "")
        {
            DB::beginTransaction();
            try {
                $model->status = 'cancel';
                $model->save();
                DB::commit();
                Session::flash('message', "Successfully Deleted.");
            }
            catch (Exception $ex){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger',$ex->getMessage());
            }
        }else{
            Session::flash('message', "Voucher Details Data Found ! You Can Not Delete This Voucher Number");
        }
        return redirect()->back();
    }

    public function payment_voucher_history($id)
    {
        $pageTitle = "Payment Voucher History";
        $data = VoucherHistory::where('voucher_head_id',$id)->orderBy('voucher_head_id', 'DESC')->get();

        return view('accounts::payment_voucher.payment_voucher_history', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }
}