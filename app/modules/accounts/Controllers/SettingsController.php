<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 2/1/16
 * Time: 4:29 PM
 */

namespace App\Modules\Accounts\Controllers;
use App\Settings;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Session;
use Input;


class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "Settings Information";
        $data = new Settings();
        $code = Input::get('code');
        $title = Input::get('title');
        $type = Input::get('type');
        if (isset($code) && !empty($code)) $data = $data->where('code', 'LIKE', '%'.$code.'%');
        if (isset($title) && !empty($title)) $data = $data->where('title', 'LIKE', '%'.$title.'%');
        if (isset($type) && !empty($type)) $data = $data->where('type', 'LIKE', '%'.$type.'%');
        $data = $data->get();

        return view('accounts::settings.index', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\GroupOneRequest $request)
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
            Settings::create($input);
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
    public function show($id)
    {//print_r($id);exit;
        $pageTitle = 'View Settings Information';
        $data = Settings::where('id',$id)->first();

        return view('accounts::settings.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = 'Update Settings Information';
        $data = Settings::where('id',$id)->first();
        return view('accounts::settings.update', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\SettingsRequest $request, $id)
    {
        $model = Settings::where('id',$id)->first();
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
        }
        catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('error', $e->getMessage());
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
        $model = Settings::findOrFail($id);

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