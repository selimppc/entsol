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
use App\VoucherHead;
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

       $pageTitle = 'Voucher Head';

       if($this->isPostRequest()){

           $account_type = Input::get('account_type');
           #print_r($account_type);exit;
           $branch = Input::get('branch_id');

           $term_year = Input::get('year');
           $status = Input::get('status');

           $data = VoucherHead::with('relBranch')->where('account_type',$account_type)->orWhere('year',$term_year)->orWhere('status',$status)->orderBy('id', 'DESC')->paginate(50);
       }else{
           $data = VoucherHead::with('relBranch')->orderBy('id', 'DESC')->paginate(50);
       }
       $model = new VoucherHead();
       $year = $model->getYear();
       $branch_data = Branch::lists('id','code');

       return view('accounts::voucher_head.index',['pageTitle'=>$pageTitle,'branch_data'=>$branch_data,'data'=>$data,'year'=>$year]);
   }

    public function store(VoucherHeadRequest $request){
        $input = $request->all();

        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            VoucherHead::create($input);
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
        $data = VoucherHead::with('relBranch')->where('id',$id)->first();

        return view('accounts::voucher_head.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    public function edit($id)
    {
        $pageTitle = 'Show the detail';

        $model = new VoucherHead();
        $branch_data = Branch::lists('code','id');
        $year = $model->getYear();
        $data = VoucherHead::findOrFail($id);
        return view('accounts::voucher_head.update', ['data' => $data,'branch_data'=>$branch_data,'pageTitle'=> $pageTitle,'year'=>$year]);
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
}