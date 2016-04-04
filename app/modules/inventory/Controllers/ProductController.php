<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/28/16
 * Time: 12:15 PM
 */

namespace App\Modules\Inventory\Controllers;


use App\Business;
use App\Http\Controllers\Controller;
use App\Modules\User\Controllers\UserController;
use App\Product;
use App\ProductCategory;
use App\ProductGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){

        $pageTitle = "Product List";
        $model = Product::with('relBusiness','relProductGroup','relProductCategory')->orderBy('id', 'DESC')->paginate(30);

        $business = array('' => 'Please Select Business') + Business::lists('title', 'id')->all();
        $product_group = array('' => 'Please Select Product Group') + ProductGroup::lists('title', 'id')->all();
        $product_category = array('' => 'Please Select Product Category') + ProductCategory::lists('title', 'id')->all();

        return view('inventory::product.index', ['model' => $model, 'pageTitle'=> $pageTitle,'business'=>$business,'product_group'=>$product_group,'product_category'=>$product_category]);

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
        $image = Input::file('image');

        $prd_exists = Product::where('code','=',$input['code'])
            ->where('business_id','=',$input['business_id'])
            ->where('product_group_id','=',$input['product_group_id'])
            ->where('product_category_id','=',$input['product_category_id'])
            ->exists();

        if($prd_exists){
            Session::flash('danger',' Already Exists.');
        }else{


print_r($image);exit;
            if(count($image)>0){

                $file_type_required = 'png,jpeg,jpg';
                $destinationPath = 'uploads/product_images/';

                $uploadfolder = 'uploads/';

                if ( !file_exists($uploadfolder) ) {
                    $oldmask = umask(0);  // helpful when used in linux server
                    mkdir ($uploadfolder, 0777);
                }

                if ( !file_exists($destinationPath) ) {
                    $oldmask = umask(0);  // helpful when used in linux server
                    mkdir ($destinationPath, 0777);
                }

                $file_name = UserController::image_upload($image,$file_type_required,$destinationPath);
                #print_r($file_name);exit;
                if($file_name != '') {
//                unlink($model->image);
//                unlink($model->thumbnail);
                    $input['image'] = $file_name[0];
                }
                else{
                    Session::flash('error', 'Some thing error in image file type! Please Try again');
                    return redirect()->back();
                }
            }


            /* Transaction Start Here */
            DB::beginTransaction();
            try {
                Product::create($input);
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

        $pageTitle = 'View Product Information';
        $model = Product::findOrFail($id);

        return view('inventory::product.view', ['model' => $model, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        $pageTitle = 'Update Product Information';

        $model = Product::findOrFail($id);
        $business = array('' => 'Please Select Business') + Business::lists('title', 'id')->all();
        $product_group = array('' => 'Please Select Product Group') + ProductGroup::lists('title', 'id')->all();
        $product_category = array('' => 'Please Select Product Category') + ProductCategory::lists('title', 'id')->all();

        return view('inventory::product.update', [
            'model' => $model,
            'pageTitle'=> $pageTitle,'business'=>$business,
            'product_group'=>$product_group,
            'product_category'=>$product_category
        ]);
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
        $model = Product::findOrFail($id);

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

        $model = Product::findOrFail($id);

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