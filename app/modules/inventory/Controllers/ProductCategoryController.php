<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/28/16
 * Time: 12:56 PM
 */

namespace App\Modules\Inventory\Controllers;

use App\Http\Controllers\Controller;
use App\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Session;
use Input;

class ProductCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        $pageTitle = "Product Catagory Information";
        $code = Input::get('code');
        $title = Input::get('title');
        $data = ProductCategory::where('status','!=','cancel')->where('code', 'LIKE', '%'.$code.'%')->where('title', 'LIKE', '%'.$title.'%')->orderBy('id', 'DESC')->get();
        return view('inventory::product_catagory.index', ['data' => $data, 'pageTitle'=> $pageTitle]);
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
            ProductCategory::create($input);
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
        $model = ProductCategory::findOrFail($id);

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