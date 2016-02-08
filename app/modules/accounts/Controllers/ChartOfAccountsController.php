<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/27/16
 * Time: 10:28 AM
 */

namespace App\Modules\Accounts\Controllers;
use App\Branch;
use App\ChartOfAccounts;
use App\GroupOne;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Session;
use Input;


class ChartOfAccountsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "Chart Of Accounts Information";

        $data = new ChartOfAccounts();

        $account_code = Input::get('account_code');
        $title = Input::get('title');
        $account_type = Input::get('account_type');
        $account_usage = Input::get('account_usage');
        $group_one_id = Input::get('group_one_id');

        $data = $data->with('relGroupOne');

        if (isset($account_code) && !empty($account_code)) $data = $data ->where('ac_chart_of_accounts.account_code', 'LIKE', '%'.$account_code.'%');
        if (isset($title) && !empty($title)) $data = $data->where('ac_chart_of_accounts.title', 'LIKE', '%'.$title.'%');
        if (isset($account_type) && !empty($account_type)) $data = $data->where('ac_chart_of_accounts.account_type', '=', $account_type);
        if (isset($account_usage) && !empty($account_usage)) $data = $data->where('ac_chart_of_accounts.account_usage', '=', $account_usage);
        if (isset($group_one_id) && !empty($group_one_id)) $data = $data->where('ac_chart_of_accounts.group_one_id', '=', $group_one_id);

        $data = $data->get();

        $group_one_id = [''=>'Select Group One'] + GroupOne::lists('title','id')->all();
        $branch_id = [''=>'Select Branch'] + Branch::lists('title','id')->all();

        return view('accounts::chart_of_accounts.index', ['data' => $data, 'pageTitle'=> $pageTitle, 'group_one_id'=> $group_one_id, 'branch_id'=> $branch_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ChartOfAccountsRequest $request)
    {
        $input = $request->all();

        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            ChartOfAccounts::create($input);
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
        $pageTitle = 'View Chart Of Accounts Information';
        $data = ChartOfAccounts::where('id',$id)->first();

        return view('accounts::chart_of_accounts.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = 'Update Chart Of Accounts Information';
        $data = ChartOfAccounts::where('id',$id)->first();
        $group_one_id = GroupOne::lists('title','id');
        $branch_id = Branch::lists('title','id');
        return view('accounts::chart_of_accounts.update', ['data' => $data, 'pageTitle'=> $pageTitle, 'group_one_id'=> $group_one_id, 'branch_id'=> $branch_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\ChartOfAccountsRequest $request, $id)
    {
        $model = ChartOfAccounts::where('id',$id)->first();
        $input = $request->all();

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
    public function delete($id)
    {
        $model = ChartOfAccounts::findOrFail($id);

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