<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/28/16
 * Time: 12:54 PM
 */

namespace App\Modules\Inventory\Controllers;


use App\Http\Controllers\Controller;
use App\InvSupplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class InvSupplierController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){

        $pageTitle = "Inventory Supplier Information";
        $data = InvSupplier::orderBy('id', 'DESC')->paginate(30);

        return view('inventory::inv_supplier.index', ['data' => $data, 'pageTitle'=> $pageTitle]);
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
        $pc_exists = InvSupplier::where('title','=',$input['title'])->where('code','=',$input['code'])->exists();
        if($pc_exists){
            Session::flash('danger',' Already Exists.');
        }else{
            /* Transaction Start Here */
            DB::beginTransaction();
            try {
                InvSupplier::create($input);
                DB::commit();
                Session::flash('message', 'Successfully added!');
            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('danger', $e->getMessage());
            }
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

        $pageTitle = 'View Inventory Supplier Information';
        $model = InvSupplier::findOrFail($id);

        return view('inventory::inv_supplier.view', ['model' => $model, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        $pageTitle = 'Update Inventory Supplier Information';
        $model = InvSupplier::findOrFail($id);
        return view('inventory::inv_supplier.update', ['model' => $model, 'pageTitle'=> $pageTitle]);
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
        $model = InvSupplier::findOrFail($id);

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

        $model = InvSupplier::findOrFail($id);

        DB::beginTransaction();
        try {
            $model->delete();
            DB::commit();
            Session::flash('message', "Successfully Deleted.");

        } catch(\Exception $e) {
            DB::rollback();
            Session::flash('danger',$e->getMessage());
        }
        return redirect()->back();

    }
}