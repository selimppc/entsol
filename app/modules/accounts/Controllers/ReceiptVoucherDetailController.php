<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 2/15/16
 * Time: 1:22 PM
 */

namespace App\Modules\Accounts\Controllers;

use App\Branch;
use App\ChartOfAccounts;
use App\Currency;
use App\GroupOne;
use App\Http\Controllers\Controller;
use App\Http\Requests\VoucherDetailRequest;
use App\Http\Requests\VoucherHeadRequest;
use App\VoucherDetail;
use App\VoucherHead;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class ReceiptVoucherDetailController extends Controller
{
    protected function isGetRequest()
    {
        return Input::server("REQUEST_METHOD") == "GET";
    }

    public function index($id,$voucher_number){

        $pageTitle = 'Receipt Voucher Details Information';
        $model = VoucherDetail::with('relVoucherHead','relChartOfAccounts','relCurrency')->where('voucher_head_id',$id)->where('status','!=','cancel')->orderBy('id', 'DESC')->get();

        //get vouncher data...

        $voucher_data = VoucherHead::where('id',$id)->first();

        $currency_data = [''=>'Select Currency'] + Currency::lists('title','id')->all();
        $branch_data =  [''=>'Select Branch'] + Branch::lists('title','id')->all();

        return view('accounts::receipt_voucher_detail.index',['pageTitle'=>$pageTitle,'model'=>$model,'currency_data'=>$currency_data,'branch_data'=>$branch_data,'id'=>$id,'id'=>$id,'voucher_number'=>$voucher_number,'voucher_data'=>$voucher_data]);
    }


    public function search_receipt_details($id,$voucher_number){

        $pageTitle = 'Receipt Voucher Details Information';
        $model = new VoucherDetail();
        if($this->isGetRequest()){

            $branch_id = Input::get('branch_id');
            $currency_id = Input::get('currency_id');
            $account_code = Input::get('account_code');

            $model = $model->with('relVoucherHead','relChartOfAccounts','relCurrency');
            if (isset($branch_id) && !empty($branch_id)) $model = $model ->where('ac_voucher_detail.branch_id', '=', $branch_id);
            if (isset($currency_id) && !empty($currency_id)) $model = $model->where('ac_voucher_detail.currency_id', '=', $currency_id);
            if (isset($account_code) && !empty($account_code)) $model = $model->where('ac_voucher_detail.account_code', 'LIKE', '%'.$account_code.'%');
            if (isset($id) && !empty($id)) $model = $model->where('ac_voucher_detail.voucher_head_id', '=', $id);
            if (isset($voucher_number) && !empty($voucher_number)) $model = $model->where('ac_voucher_detail.voucher_number', '=', $voucher_number);

            $model = $model->where('voucher_head_id',$id)->get();
            #print_r($model);exit;
        }else{
            $model = VoucherDetail::with('relVoucherHead','relChartOfAccounts','relCurrency')->where('voucher_head_id',$id)->where('status','!=','cancel')->orderBy('id', 'DESC')->get();
        }

        //get vouncher data...

        $voucher_data = VoucherHead::where('id',$id)->first();
        $currency_data = [''=>'Select Currency'] + Currency::lists('title','id')->all();
        $branch_data =  [''=>'Select Branch'] + Branch::lists('title','id')->all();

        return view('accounts::receipt_voucher_detail.index',['pageTitle'=>$pageTitle,'model'=>$model,'currency_data'=>$currency_data,'branch_data'=>$branch_data,'id'=>$id,'voucher_number'=>$voucher_number,'voucher_data'=>$voucher_data]);
    }

    public function store(VoucherDetailRequest $request){

        $input = $request->all();
#print_r($input);exit;
        $voucher_data = VoucherHead::where('id',$input['voucher_head_id'])->first();
        $coa_data = ChartOfAccounts::where('id',$input['coa_id'])->first();
        $currency_data = Currency::where('id',$input['currency_id'])->first();
        /* Transaction Start Here */
        DB::beginTransaction();
        try {

            $base_amount = $input['prime_amount']*$currency_data['exchange_rate'];

            $input_data = [
                'voucher_head_id'=>$input['voucher_head_id'],
                'voucher_number'=> $voucher_data['voucher_number'],
                'coa_id'=> $input['coa_id'],
                'account_code'=> $coa_data['account_code'],
                'sub_account_code'=> $input['sub_account_code'],
                'currency_id'=> $input['currency_id'],
                'exchange_rate'=> $currency_data['exchange_rate'],
                'prime_amount'=> $input['prime_amount'],
                'base_amount'=> $base_amount,
                'branch_id'=> $input['branch_id'],
                'note'=> $input['note'],
                'status'=> $input['status'],
            ];
            VoucherDetail::create($input_data);

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
        $pageTitle = 'View Receipt Voucher Details Information';
        $data = VoucherDetail::with('relVoucherHead','relChartOfAccounts','relCurrency')->where('id',$id)->first();

        return view('accounts::receipt_voucher_detail.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    public function edit($id)
    {
        $pageTitle = 'Update Receipt Voucher Details Information';

        $data = VoucherDetail::with('relChartOfAccounts')->findOrFail($id);
        $coa_data = ChartOfAccounts::lists('title','id');
        $currency_data = Currency::lists('title','id');
        $branch_data =  Branch::lists('title','id');

        return view('accounts::receipt_voucher_detail.update', ['data' => $data,'branch_data'=>$branch_data,'pageTitle'=> $pageTitle,'coa_data'=>$coa_data,'currency_data'=>$currency_data,'id'=>$id,]);
    }

    public function update(VoucherDetailRequest $request, $id)
    {
        $model = VoucherDetail::findOrFail($id);
        $input = $request->all();

        $voucher_data = VoucherHead::where('id',$input['voucher_head_id'])->first();
        $coa_data = ChartOfAccounts::where('id',$input['coa_id'])->first();
        $currency_data = Currency::where('id',$input['currency_id'])->first();
        DB::beginTransaction();
        try {
            $base_amount = $input['prime_amount']*$currency_data['exchange_rate'];

            $input_data = [
                'voucher_head_id'=>$input['voucher_head_id'],
                'voucher_number'=> $voucher_data['voucher_number'],
                'coa_id'=> $input['coa_id'],
                'account_code'=> $coa_data['account_code'],
                'sub_account_code'=> $input['sub_account_code'],
                'currency_id'=> $input['currency_id'],
                'exchange_rate'=> $currency_data['exchange_rate'],
                'prime_amount'=> $input['prime_amount'],
                'base_amount'=> $base_amount,
                'branch_id'=> $input['branch_id'],
                'note'=> $input['note'],
                'status'=> $input['status'],
            ];

            $model->update($input_data);
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

    public function delete($id){

        $model = VoucherDetail::findOrFail($id);

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
        return redirect()->back();
    }

    public function destroy($id){

        $model = VoucherDetail::findOrFail($id);

        DB::beginTransaction();
        try {
            $model->delete();
            DB::commit();
            Session::flash('message', "Successfully Deleted.");
        }
        catch (Exception $ex){
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('danger',$ex->getMessage());
        }
        return redirect()->back();
    }

    public function journal_post($voucher_number){

        if(Auth::check()){

            $user_id = Auth::user()->id;
            #print_r($user_id);exit;
            try{
                DB::statement('call sp_voucher_post(?,?)',array($voucher_number,$user_id));
                Session::flash('message', "Successfully Posted");

            }catch (\Exception $e){
                Session::flash('danger',$e->getMessage());
            }
        }else{
            Session::flash('danger','Please LogIn At First!!');
        }
        return redirect()->back();
    }

    public function get_ajax_ac(){

        $input_coa_id = Input::get('coa_id');

        try{
            $coa_data = ChartOfAccounts::where('id',$input_coa_id)->first();
            if($coa_data){
                return  Response::make($coa_data['account_code']);
            }
        }catch(\Exception $e){
            return  Response::make($e->getMessage());
        }
    }

    public function get_ajax_exchange_rate(){

        $input_curr_id = Input::get('currency_id');

        try{
            $curr_data = Currency::where('id',$input_curr_id)->first();
            if($curr_data){
                return  Response::make($curr_data['exchange_rate']);
            }
        }catch(\Exception $e){
            return  Response::make($e->getMessage());
        }
    }

    public function get_autocomplete_search_coa(){

        $coa_data = Input::get('term');

        $coa = DB::table('ac_chart_of_accounts')
            ->where('title', 'LIKE', '%' . $coa_data . '%')
            ->orWhere('account_code', 'LIKE', '%' . $coa_data . '%')
            ->select(DB::raw('CONCAT(ac_chart_of_accounts.account_code, ":", " ",ac_chart_of_accounts.title) AS title, ac_chart_of_accounts.id as coa_id'))
            ->get();

        foreach ( $coa as $query ){
            $data[] = array('value' => $query->title,
                'coa_id' => $query->coa_id);
        }
        return Response::json($data);

    }
}