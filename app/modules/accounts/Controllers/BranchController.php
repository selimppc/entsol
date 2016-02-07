<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/25/16
 * Time: 1:45 PM
 */

namespace App\Modules\Accounts\Controllers;
use App\Branch;
use App\Currency;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Session;
use Input;


class BranchController extends Controller
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
        $pageTitle = "Branch Informations";
        $data = new Branch();

        if($this->isPostRequest()){

            $title = Input::get('title');
            $code = Input::get('code');
            $currency=Input::get('currency_id');

            $data = $data->with('relCurrency');

            if (isset($title) && !empty($title)) $data ->where('cm_branch.title', 'LIKE', '%'.$title.'%');
            if (isset($code) && !empty($code)) $data->where('cm_branch.code', 'LIKE', '%'.$code.'%');
            if (isset($currency) && !empty($currency)) $data->where('cm_branch.currency_id', '=', $currency);

            /*$data = $data->leftJoin('cm_currency as currency', function($query)  use($currency){
                $query->on('currency.id', '=', 'cm_branch.currency_id');
                $query->where('currency.id',  '=', $currency);
            });*/

            $data = $data->get();
            //print_r($data['currency_id']);exit;
        }else{
            $data = Branch::where('status','!=','cancel')->orderBy('id', 'DESC')->paginate(50);
        }
        $currency_id =  [''=>'Currency'] + Currency::lists('title','id')->all();
        return view('accounts::branch.index', ['data' => $data, 'pageTitle'=> $pageTitle, 'currency_id'=> $currency_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\BranchRequest $request)
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
            Branch::create($input);
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
        $pageTitle = 'View Branch Informations';
        $data = Branch::where('id',$id)->first();

        return view('accounts::branch.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = 'Update Branch Informations';
        $data = Branch::where('id',$id)->first();
        $currency_id = Currency::lists('title','id');
        return view('accounts::branch.update', ['data' => $data, 'pageTitle'=> $pageTitle, 'currency_id'=> $currency_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\BranchRequest $request, $id)
    {
        $model = Branch::where('id',$id)->first();
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
        $model = Branch::findOrFail($id);

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