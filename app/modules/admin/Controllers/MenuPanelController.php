<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/6/16
 * Time: 6:05 PM
 */

namespace App\Modules\Admin\Controllers;
use App\MenuPanel;
use App\Helpers\LogFileHelperAcc;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Session;
use Input;
use Illuminate\Support\Facades\Response;



class MenuPanelController extends Controller
{

    protected function isGetRequest()
    {
        return Input::server("REQUEST_METHOD") == "GET";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "Menu Panel Informations";
        $model = MenuPanel::orderBy('id', 'DESC')->where('status','!=','cancel')->paginate(30);

        return view('admin::menu_panel.index', ['model' => $model, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\MenuPanelRequest $request)
    {
        $input = $request->all();

        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            MenuPanel::create($input);
            DB::commit();
            Session::flash('message', 'Successfully added!');
            //LogFileHelperAcc::log_info('store-branch', 'Successfully added', ['Branch title : '.$input['title']]);
        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());
            //LogFileHelperAcc::log_error('store-branch', $e->getMessage(), ['Branch title : '.$input['title']]);
        }

        return redirect()->back();
    }

    public function search_menu_panel(){
        $pageTitle = 'Menu Panel Informations';
        $model = new MenuPanel();

        if($this->isGetRequest()){
            $menu_type = Input::get('menu_type');
            $menu_name = Input::get('menu_name');
            $route=Input::get('route');

            $model = $model->select('menu_panel.*');

            if (isset($menu_type) && !empty($menu_type)) $model = $model ->where('menu_panel.menu_type', 'LIKE', '%'.$menu_type.'%');
            if (isset($menu_name) && !empty($menu_name)) $model = $model->where('menu_panel.menu_name', 'LIKE', '%'.$menu_name.'%');
            if (isset($route) && !empty($route)) $model = $model->where('menu_panel.route', 'LIKE','%'. $route.'%');

            $model = $model->paginate(30);

        }else{
            $model = MenuPanel::orderBy('id', 'DESC')->where('status','!=','cancel')->paginate(30);
        }

        return view('admin::menu_panel.index',['pageTitle'=>$pageTitle,'model'=>$model]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {//print_r($id);exit;
        $pageTitle = 'View Menu Panel Informations';
        $data = MenuPanel::where('id',$id)->first();

        return view('admin::menu_panel.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = 'Update Menu Panel Informations';
        $data = MenuPanel::where('id',$id)->first();
        $menu_data = MenuPanel::where('id',$id)->lists('menu_name', 'id');

        return view('admin::menu_panel.update', ['data' => $data, 'menu_data'=> $menu_data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\MenuPanelRequest $request, $id)
    {
        $model = MenuPanel::where('id',$id)->first();
        $input = $request->all();

        DB::beginTransaction();
        try {
            $model->update($input);
            DB::commit();
            Session::flash('message', "Successfully Updated");
            //LogFileHelperAcc::log_info('update-branch', 'Successfully updated', ['Branch title : '.$input['title']]);
        }
        catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('danger', $e->getMessage());
            //LogFileHelperAcc::log_error('update-branch', $e->getMessage(), ['Branch title : '.$input['title']]);
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
        $model = MenuPanel::findOrFail($id);

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
            //LogFileHelperAcc::log_info('delete-branch', 'Successfully update status to cancel', ['Branch title : '.$model->title]);

        } catch(\Exception $e) {
            DB::rollback();
            Session::flash('danger',$e->getMessage());
            //LogFileHelperAcc::log_error('delete-branch', $e->getMessage(), ['Branch title : '.$model->title]);
        }
        return redirect()->back();
    }

    public function get_ajax_menu_list(){

        $menu_type = Input::get('menu_type');

        $menu_data = DB::table('menu_panel');

        if($menu_type=='MODU'){
            $menu_data = $menu_data->where('menu_type', '=', "ROOT");
        }

        if($menu_type=='MENU'){
            $menu_data = $menu_data->where('menu_type', '=', "MODU");
        }

        if($menu_type=='SUBM'){
            $menu_data = $menu_data->where('menu_type', '=', "MENU");
        }

        $menu_data =  [''=>'please select one'] +  $menu_data->lists('menu_name', 'id');

        if($menu_data){
            return Response::make($menu_data);

        }else{
            return Response::make(['no data found']);
        }
    }
}