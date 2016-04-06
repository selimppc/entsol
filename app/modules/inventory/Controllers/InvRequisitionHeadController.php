<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/28/16
 * Time: 12:52 PM
 */

namespace App\Modules\Inventory\Controllers;


use App\Business;
use App\Buyer;
use App\Http\Controllers\Controller;
use App\InvRequisitionHead;
use App\InvSupplier;
use App\Product;
use App\Store;

class InvRequisitionHeadController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){

        $pageTitle = "Requisition Information";
        $model = InvRequisitionHead::orderBy('id', 'DESC')->paginate(30);

        $business = array('' => 'Please Select Business') + Business::lists('title', 'id')->all();
        $supplier = array('' => 'Please Select Supplier') + InvSupplier::lists('title', 'id')->all();
        $store = array('' => 'Please Select Store') + Store::lists('title', 'id')->all();
        $buyer = array('' => 'Please Select Buyer') + Buyer::lists('title', 'id')->all();
        $product = array('' => 'Please Select Product') + Product::lists('title', 'id')->all();

        return view('inventory::inv_requisition_head.index', [
            'model' => $model,
            'pageTitle'=> $pageTitle,
            'business'=>$business,
            'supplier'=>$supplier,
            'store'=>$store,
            'buyer'=>$buyer,
            'product'=>$product
        ]);
    }

    public function create_requisition_head(){

        $business = array('' => 'Please Select Business') + Business::lists('title', 'id')->all();
        $supplier = array('' => 'Please Select Supplier') + InvSupplier::lists('title', 'id')->all();
        $store = array('' => 'Please Select Store') + Store::lists('title', 'id')->all();
        $buyer = array('' => 'Please Select Buyer') + Buyer::lists('title', 'id')->all();
        $product = array('' => 'Please Select Product') + Product::lists('title', 'id')->all();

        return view('inventory::inv_requisition_head._form',[
            'business'=>$business,
            'supplier'=>$supplier,
            'store'=>$store,
            'buyer'=>$buyer,
            'product'=>$product
        ]);
    }
    public function search(){

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $input = $request->all();

        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            InvRequisitionHead::create($input);
            DB::commit();
            Session::flash('message', 'Successfully added!');
        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){


    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id){

        $input = $request->all();
        $model = InvRequisitionHead::findOrFail($id);

        DB::beginTransaction();
        try {
            $model->update($input);
            DB::commit();
            Session::flash('message', "Successfully Updated");
        }
        catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('danger', $e->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){


    }
}