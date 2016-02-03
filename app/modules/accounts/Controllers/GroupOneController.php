<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/24/16
 * Time: 11:16 AM
 */

namespace App\Modules\Accounts\Controllers;

use App\GroupOne;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Session;
use Input;

class GroupOneController extends Controller
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
        $pageTitle = "Group One Information";
        if($this->isPostRequest()){
            $code = Input::get('code');
            $title = Input::get('title');
            $data = GroupOne::where('status','!=','cancel')->where('code', 'LIKE', '%'.$code.'%')->where('title', 'LIKE', '%'.$title.'%')->orderBy('id', 'DESC')->paginate(50);
        }else{
            $data = GroupOne::where('status','!=','cancel')->orderBy('id', 'DESC')->paginate(50);
        }
        return view('accounts::group_one.index', ['data' => $data, 'pageTitle'=> $pageTitle]);
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

        $tittle = Input::get('title');
        $tittle_upper_case = strtoupper($tittle);
        $input['title'] = $tittle_upper_case;

        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            GroupOne::create($input);
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
        $pageTitle = 'View Group One Information';
        $data = GroupOne::where('id',$id)->first();

        return view('accounts::group_one.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = 'Update Group One Information';
        $data = GroupOne::where('id',$id)->first();
        return view('accounts::group_one.update', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\GroupOneRequest $request, $id)
    {
        $model = GroupOne::where('id',$id)->first();
        $input = $request->all();

        $tittle = Input::get('title');
        $tittle_upper_case = strtoupper($tittle);
        $input['title'] = $tittle_upper_case;

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
        $model = GroupOne::findOrFail($id);

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