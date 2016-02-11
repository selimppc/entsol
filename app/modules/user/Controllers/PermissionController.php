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
            $routes_list[] = $value->getPath();
        }*/

        $data = Permission::where('title', 'LIKE', '%'.$title.'%')->orderBy('id', 'DESC')->get();
        return view('user::permission.index', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    public function store(Requests\PermissionRequest $request){
        $input = $request->all();

        $title = Input::get('title');
        $title_upper_case = ucwords($title);
        $input['title'] = $title_upper_case;
        $input['slug'] = str_slug(strtolower($input['title']));
        $permission_exists = Permission::where('slug',$input['slug'])->exists();

        if($permission_exists){
            Session::flash('danger',' Already Exists.');
        }else{
            /* Transaction Start Here */
            DB::beginTransaction();
            try {
                Permission::create($input);
                DB::commit();
                Session::flash('message', 'Successfully added!');
            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('danger', $e->getMessage());
            }
        }

        return redirect()->route('index-permission');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $pageTitle = 'View Permission';
        $data = Permission::where('slug',$slug)->first();

        return view('user::permission.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $pageTitle = 'Update Permission Informations';
        $data = Permission::where('slug',$slug)->first();
        return view('user::permission.update', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PermissionRequest $request, $slug)
    {
        $model = Permission::where('slug',$slug)->first();
        $input = $request->all();

        $title = Input::get('title');
        $title_upper_case = ucwords($title);
        $input['title'] = $title_upper_case;
        $input['slug'] = str_slug(strtolower($input['title']));

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = Permission::where('slug',$slug)->first();

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
}
