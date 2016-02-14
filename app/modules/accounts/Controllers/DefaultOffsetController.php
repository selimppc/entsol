<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/25/16
 * Time: 10:31 AM
 */

namespace App\Modules\Accounts\Controllers;
use App\DefaultOffset;
use App\VoucherHead;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Session;
use Input;


class DefaultOffsetController extends Controller
{

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "Default Offset Informations";

        $data = DefaultOffset::where('status','!=','cancel')->orderBy('id', 'DESC')->paginate(50);
        /*$year = VoucherHead::getYear();*/
        return view('accounts::default_offset.index', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\DefaultOffsetRequest $request)
    {
        $input = $request->all();

        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            DefaultOffset::create($input);
            DB::commit();
            Session::flash('flash_message', 'Successfully added!');
        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('flash_message_error', $e->getMessage());
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {//print_r($id);exit;
        $pageTitle = 'View Default Offset Informations';
        $data = DefaultOffset::where('id',$id)->first();

        return view('accounts::default_offset.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = 'Update Default Offset Informations';
        $data = DefaultOffset::where('id',$id)->first();
        return view('accounts::default_offset.update', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\DefaultOffsetRequest $request, $id)
    {
        $model = DefaultOffset::where('id',$id)->first();
        $input = $request->all();

        DB::beginTransaction();
        try {
            $model->update($input);
            DB::commit();
            Session::flash('flash_message', "Successfully Updated");
        }
        catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('flash_message_error', $e->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $model = DefaultOffset::findOrFail($id);

        DB::beginTransaction();
        try {
            if($model->status =='active'){
                $model->status = 'cancel';
            }else{
                $model->status = 'active';
            }
            $model->save();
            DB::commit();
            Session::flash('message', "Successfully Deleted.");

        } catch(\Exception $e) {
            DB::rollback();
            Session::flash('danger',$e->getMessage());
        }
        return redirect()->back();
    }


}