<?php
#namespace App\Modules\Web\Controllers;
namespace App\Modules\User\Controllers;

use App\Permission;
use App\User;
use App\UserResetPassword;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Helpers\LogFileHelper;

class PermissionController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "Permission List";
        $title = Input::get('title');

        /*$routeCollection = Route::getRoutes();

        foreach ($routeCollection as $value) {
            $routes_list[] = Str::lower($value->getPath());
        }*/

        $data = Permission::where('title', 'LIKE', '%'.$title.'%')->orderBy('id', 'DESC')->paginate(30);
        return view('user::permission.index', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    public function store(Requests\PermissionRequest $request){
        $input = $request->all();

        $title = Input::get('title');
        $title_upper_case = ucwords($title);
        $input['title'] = $title_upper_case;
        $input['route_url'] = str_slug(strtolower($input['title']));
        $permission_exists = Permission::where('route_url',$input['route_url'])->exists();

        if($permission_exists){
            Session::flash('danger',' Already Exists.');
        }else{
            /* Transaction Start Here */
            DB::beginTransaction();
            try {
                Permission::create($input);
                DB::commit();
                Session::flash('message', 'Successfully added!');
                LogFileHelper::log_info('permission', $message = 'Successfully added!', $input);
            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('danger', $e->getMessage());
                LogFileHelper::log_info('permission', $message = 'Failed!', $e->getMessage());
            }
        }

        return redirect()->route('index-permission');
    }
    /**
     * Display the specified resource.
     *
     * @param  string  $route_url
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = 'View Permission';
        $data = Permission::where('id',$id)->first();

        return view('user::permission.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $route_url
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = 'Update Permission Informations';
        $data = Permission::where('id',$id)->first();
        return view('user::permission.update', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $route_url
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PermissionRequest $request, $id)
    {
        $model = Permission::where('route_url',$id)->first();
        $input = $request->all();

        $title = Input::get('title');
        $title_upper_case = ucwords($title);
        $input['title'] = $title_upper_case;
        $input['route_url'] = str_slug(strtolower($input['title']));

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
        return redirect()->route('index-permission');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $route_url
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Permission::where('route_url',$id)->first();

        DB::beginTransaction();
        try {
            $model->delete();
            DB::commit();
            Session::flash('message', "Successfully Deleted.");

        } catch(\Exception $e) {
            DB::rollback();
            Session::flash('danger',$e->getMessage());
        }
        return redirect()->route('index-permission');
    }
    /**
     * Store the specified resource .
     *
     * @return \Illuminate\Http\Response
     */
    public function route_in_permission(){
        $routeCollection = Route::getRoutes();

        foreach ($routeCollection as $value) {
            $routes_list[] = Str::lower($value->getPath());
        }
        foreach ($routes_list as $route) {
            $permission_exists = Permission::where('route_url','=',$route)->exists();
            if(!$permission_exists){
                $model = new Permission();
                $model->title = $route;
                $model->route_url = $route;
                DB::beginTransaction();
                try {
                    $model->save();
                    DB::commit();
                    Session::flash('message', "Successfully Add all route_url in permission table.");

                } catch(\Exception $e) {
                    DB::rollback();
                    Session::flash('danger',$e->getMessage());
                }
            }
            else{
                Session::flash('message', "All route already exists. No new route found");
            }
        }
        return redirect()->route('index-permission');
    }
}
