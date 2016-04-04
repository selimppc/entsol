<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/28/16
 * Time: 1:09 PM
 */

namespace App\Modules\Inventory\Controllers;


use App\Http\Controllers\Controller;
use App\ProductCategory;
use App\ProductGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductGroupController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){

        $pageTitle = "Product Group";
        $model = ProductGroup::with('relProductCategory')->orderBy('id', 'DESC')->paginate(30);

        $product_category = array('' => 'Please Select') + ProductCategory::lists('title', 'id')->all();

        return view('inventory::product_group.index', ['model' => $model, 'pageTitle'=> $pageTitle,'product_category'=>$product_category]);
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
        $pg_exists = ProductGroup::where('title','=',$input['title'])->where('product_category_id','=',$input['product_category_id'])->where('code','=',$input['code'])->exists();
        if($pg_exists){
            Session::flash('danger',' Already Exists.');
        }else{
            /* Transaction Start Here */
            DB::beginTransaction();
            try {
                ProductGroup::create($input);
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

        $pageTitle = 'View Product Group Information';
        $model = ProductGroup::findOrFail($id);

        return view('inventory::product_group.view', ['model' => $model, 'pageTitle'=> $pageTitle]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        $pageTitle = 'Update Product Group Information';
        $model = ProductGroup::findOrFail($id);
        $product_category = array('' => 'Please Select') + ProductCategory::lists('title', 'id')->all();

        return view('inventory::product_group.update', ['model' => $model, 'pageTitle'=> $pageTitle,'product_category'=>$product_category]);
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
        $model = ProductGroup::findOrFail($id);

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
        $model = ProductGroup::findOrFail($id);

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