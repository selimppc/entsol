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
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class VoucherHeadController extends Controller
{
   public function index(){

       $pageTitle = 'Voucher Head';
       $branch_data = Branch::lists('code','id');
       $data = VoucherHead::orderBy('id', 'DESC')->get();
       return view('accounts::voucher_head.index',['pageTitle'=>$pageTitle,'branch_data'=>$branch_data,'data'=>$data]);
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
    {//print_r($id);exit;
        $pageTitle = 'Show the detail';
        $data = VoucherHead::where('id',$id)->first();

        return view('accounts::voucher_head.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    public function edit($id)
    {
        $pageTitle = 'Show the detail';
        $branch_data = Branch::lists('code','id');
        #$year = VoucherHead::getYear();
        #$print_r($year);exit;
        $data = VoucherHead::where('id',$id)->first();
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

    public function delete($id){
        try {
            $model = VoucherHead::findOrFail($id);
            if ($model->delete()) {
                Session::flash('message', " Successfully Deleted.");
                return redirect()->back();
            }
        } catch(\Exception $e) {
            Session::flash('danger',$e->getMessage() );
            return redirect()->back();
        }
    }
}