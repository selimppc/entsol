<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/25/16
 * Time: 12:32 PM
 */

namespace App\Modules\Accounts\Controllers;

use App\Branch;
use App\Http\Controllers\Controller;
use App\Http\Requests\VoucherHeadRequest;
use App\Settings;
use App\VoucherHead;
use App\VoucherDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class VoucherHeadController extends Controller
{

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

   public function index(){

       $pageTitle = 'Journal Voucher Informations';
       $model = new VoucherHead();
       $settings = Settings::where('status','=','active')->where('type','=','journal-voucher')->first();

       $number = $settings['last_number']+$settings['increment'];
       $generate_voucher_number = $settings['code'].str_pad($number, 7, '0', STR_PAD_LEFT);
       $settings_id = $settings['id'];

       if($this->isPostRequest()){

           $account_type = Input::get('account_type');
           $branch = Input::get('branch_id');
           $voucher_number = Input::get('voucher_number');
           $term_year = Input::get('year');

           $model = $model->with('relBranch');
           if (isset($account_type) && !empty($account_type)) $model ->where('ac_voucher_head.account_type', '=', $account_type);
           if (isset($branch) && !empty($branch)) $model->where('ac_voucher_head.branch_id', '=', $branch);
           if (isset($term_year) && !empty($term_year)) $model->where('ac_voucher_head.year', '=', $term_year);
           if (isset($voucher_number) && !empty($voucher_number)) $model->where('ac_voucher_head.voucher_number', '=', $voucher_number);

           $model = $model->leftJoin('cm_branch as branch', function($query)  use($branch){
               $query->on('branch.id', '=', 'ac_voucher_head.branch_id');
               $query->where('branch.id',  '=', $branch);
           });
           $model = $model->paginate(50);
       }else{
           $model = VoucherHead::with('relBranch')->where('status','!=','cancel')->orderBy('id', 'DESC')->paginate(50);
       }

       //$year = VoucherHead::getYear();
       $branch_data =  [''=>'Select Branch'] + Branch::lists('title','id')->all();


       return view('accounts::voucher_head.index',['pageTitle'=>$pageTitle,'branch_data'=>$branch_data,'model'=>$model,'generate_voucher_number'=>$generate_voucher_number,'number'=>$number,'settings_id'=>$settings_id]);
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
        $pageTitle = 'View Journal Voucher Informations';
        $data = VoucherHead::with('relBranch')->where('id',$id)->first();
        $voucher_details_data = VoucherDetail::with('relVoucherHead','relChartOfAccounts','relCurrency')->where('voucher_head_id',$id)->where('status','!=','cancel')->orderBy('id', 'DESC')->get();

        return view('accounts::voucher_head.view', ['data' => $data,'voucher_details_data' => $voucher_details_data, 'pageTitle'=> $pageTitle]);
    }

    public function edit($id)
    {
        $pageTitle = 'Update Journal Voucher Informations';
        $branch_data = Branch::lists('title','id');

        /*$model = new VoucherHead();
        $year = $model->getYear();*/

        $data = VoucherHead::findOrFail($id);
        return view('accounts::voucher_head.update', ['data' => $data,'branch_data'=>$branch_data,'pageTitle'=> $pageTitle]);
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
        return redirect()->route('voucher-head');
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
}