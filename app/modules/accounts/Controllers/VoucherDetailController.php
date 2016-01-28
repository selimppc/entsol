<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/25/16
 * Time: 12:32 PM
 */

namespace App\Modules\Accounts\Controllers;

use App\Branch;
use App\ChartOfAccounts;
use App\Currency;
use App\Http\Controllers\Controller;
use App\Http\Requests\VoucherDetailRequest;
use App\Http\Requests\VoucherHeadRequest;
use App\VoucherDetail;
use App\VoucherHead;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class VoucherDetailController extends Controller
{

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

   public function index($id){

       $pageTitle = 'Voucher Head Detail';

       $data = VoucherDetail::with('relVoucherHead','relChartOfAccounts','relCurrency')->where('status','!=','cancel')->orderBy('id', 'DESC')->paginate(50);
       //get vouncher-number data...
       $voucher_number = VoucherDetail::where('voucher_head_id',$id)->first();

       $coa_data = ChartOfAccounts::lists('account_code','id');
       $currency_data = Currency::lists('code','id');
       $branch_data =  Branch::lists('code','id');

       return view('accounts::voucher_detail.index',['pageTitle'=>$pageTitle,'data'=>$data,'coa_data'=>$coa_data,'currency_data'=>$currency_data,'branch_data'=>$branch_data,'id'=>$id,'voucher_number'=>$voucher_number]);
   }

    public function store(VoucherDetailRequest $request){

        $input = $request->all();

        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            VoucherDetail::create($input);

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
        $pageTitle = 'Show the detail';
        $data = VoucherDetail::with('relVoucherHead','relChartOfAccounts','relCurrency')->where('id',$id)->first();

        return view('accounts::voucher_detail.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    public function edit($id)
    {
        $pageTitle = 'Show the detail';

        $data = VoucherDetail::findOrFail($id);

        $coa_data = ChartOfAccounts::lists('account_code','id');
        $currency_data = Currency::lists('code','id');
        $branch_data =  Branch::lists('code','id');

        return view('accounts::voucher_detail.update', ['data' => $data,'branch_data'=>$branch_data,'pageTitle'=> $pageTitle,'coa_data'=>$coa_data,'currency_data'=>$currency_data,'id'=>$id]);
    }

    public function update(VoucherDetailRequest $request, $id)
    {
        $model = VoucherDetail::findOrFail($id);
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
        $model = VoucherDetail::findOrFail($id);

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
}