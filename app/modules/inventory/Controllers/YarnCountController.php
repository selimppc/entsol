<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/28/16
 * Time: 1:33 PM
 */

namespace App\Modules\Inventory\Controllers;


use App\Http\Controllers\Controller;
use App\YarnCount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class YarnCountController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){

        $pageTitle = "Yarn Count";
        $model = YarnCount::orderBy('id', 'DESC')->paginate(30);

        return view('inventory::yarn_count.index', ['model' => $model, 'pageTitle'=> $pageTitle]);

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
        $yc_exists = YarnCount::where('title','=',$input['title'])->exists();
        if($yc_exists){
            Session::flash('danger',' Already Exists.');
        }else{
            /* Transaction Start Here */
            DB::beginTransaction();
            try {
                YarnCount::create($input);
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

        $pageTitle = 'View Yarn Count Information';
        $model = YarnCount::findOrFail($id);

        return view('inventory::yarn_count.view', ['model' => $model, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        $pageTitle = 'Update Yarn Count Information';
        $model = YarnCount::findOrFail($id);
        return view('inventory::yarn_count.update', ['model' => $model, 'pageTitle'=> $pageTitle]);
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
        $model = YarnCount::findOrFail($id);

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

        $model = YarnCount::findOrFail($id);

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