<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/25/16
 * Time: 11:54 AM
 */

namespace App\Modules\Accounts\Controllers;
use App\Currency;
use App\Helpers\LogFileHelperAcc;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Session;
use Input;


class CurrencyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "Currency Informations";
        $code = Input::get('code');
        $title = Input::get('title');
        $data = Currency::where('status','!=','cancel')->where('code', 'LIKE', '%'.$code.'%')->where('title', 'LIKE', '%'.$title.'%')->orderBy('id', 'DESC')->get();
        return view('accounts::currency.index', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CurrencyRequest $request)
    {
        $input = $request->all();

        $code = Input::get('code');
        $code_upper_case = strtoupper($code);
        $input['code'] = $code_upper_case;

        $title = Input::get('title');
        $title_upper_case = ucwords($title);
        $input['title'] = $title_upper_case;

        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            Currency::create($input);
            DB::commit();
            Session::flash('message', 'Successfully added!');
            LogFileHelperAcc::log_info('add-currency', 'Successfully added', ['Currency title : '.$input['title']]);
        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());
            LogFileHelperAcc::log_error('add-currency', $e->getMessage(), ['Currency title : '.$input['title']]);
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
        $pageTitle = 'View Currency Informations';
        $data = Currency::where('id',$id)->first();

        return view('accounts::currency.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = 'Update Currency Informations';
        $data = Currency::where('id',$id)->first();
        return view('accounts::currency.update', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CurrencyRequest $request, $id)
    {
        $model = Currency::where('id',$id)->first();
        $input = $request->all();

        $code = Input::get('code');
        $code_upper_case = strtoupper($code);
        $input['code'] = $code_upper_case;

        $title = Input::get('title');
        $title_upper_case = ucwords($title);
        $input['title'] = $title_upper_case;

        DB::beginTransaction();
        try {
            $model->update($input);
            DB::commit();
            Session::flash('message', "Successfully Updated");
            LogFileHelperAcc::log_info('update-currency', 'Successfully updated', ['Currency title : '.$input['title']]);
        }
        catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('danger', $e->getMessage());
            LogFileHelperAcc::log_error('update-currency', $e->getMessage(), ['Currency title : '.$input['title']]);
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
        $model = Currency::findOrFail($id);

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
            LogFileHelperAcc::log_info('delete-currency', 'Successfully update status to cancel', ['Currency title : '.$model->title]);

        } catch(\Exception $e) {
            DB::rollback();
            Session::flash('danger',$e->getMessage());
            LogFileHelperAcc::log_error('delete-currency', $e->getMessage(), ['Currency title : '.$model->title]);
        }
        return redirect()->back();
    }
}