<?php
#namespace App\Modules\Web\Controllers;
namespace App\Modules\User\Controllers;

use App\Helpers\LogFileHelper;
use App\Permission;
use App\PermissionRole;
use App\Role;
use App\User;
use App\UserResetPassword;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PermissionRoleController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param
     * @return \Illuminate\Http\Response
     */

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }
    public function index()
    {
        $pageTitle = "Permission Role List";

        $data = DB::table('permission_role')
            ->join('permissions', 'permissions.id', '=', 'permission_role.permission_id')
            ->join('role', 'role.id', '=', 'permission_role.role_id')
            ->where('role.title', '!=', 'super-admin')
            ->select('permission_role.id', 'permissions.title as p_title', 'role.title as r_title')
            ->paginate(100);

        $role_id =  [''=>'Select Role'] +  Role::where('role.title', '!=', 'super-admin')->lists('title','id')->all();

        if($this->isPostRequest()){

            $role_value = Input::get('role_id');

            # print_r($role_value);exit;

           /* $exists_permission = PermissionRole::whereExists(function ($query) use ($role_value){
                      $query->from('role')->where('permission_role.role_id', '=', $role_value);
                })->join('permissions', 'permissions.id', '=', 'permission_role.permission_id')
                ->lists('permissions.title', 'permissions.id');*/

            $exists_permission = DB::table('permission_role')

                ->whereExists(function ($query)use($role_value) {
                    $query->select(DB::raw(1))
                        ->from('permissions')
                        ->whereRaw('permission_role.permission_id = permissions.id')
                        ->where('permission_role.role_id', '=', $role_value);
                })->get();

           print_r($exists_permission);
echo "-----------------------------------------";
echo "-----------------------------------------";
echo "-----------------------------------------";

            $not_exists_permission = DB::table('permission_role')
                ->whereNotExists(function ($query) use($role_value){
                    $query->select(DB::raw(1))
                        ->from('permissions')
                        ->where('permission_role.permission_id','=','permissions.id')
                    ->where('permission_role.role_id', '=', $role_value);
                })
                ->get();

            print_r($not_exists_permission);exit;

        }else{
            $not_exists_permission = array();
            $exists_permission = array();
        }

        return view('user::permission_role.index', ['data' => $data, 'pageTitle'=> $pageTitle, 'role_id'=>$role_id,'exists_permission' => $exists_permission]);
    }


    public function get_role(){

        if($this->isPostRequest()){
            $role_value = Input::get('role_id');
            $permission = DB::table('permission_role')
                ->join('permissions', 'permissions.id', '=', 'permission_role.permission_id')
                ->join('role', function ($join) use ($role_value) {
                    $join->on('role.id', '=', 'permission_role.role_id')
                        ->where('permission_role.role_id', '=', $role_value);
                })->lists('permissions.title', 'permissions.id');
        }else{
            $permission = '';
        }
        $data = DB::table('permission_role')
            ->join('permissions', 'permissions.id', '=', 'permission_role.permission_id')
            ->join('role', 'role.id', '=', 'permission_role.role_id')
            ->where('role.title', '!=', 'super-admin')
            ->select('permission_role.id', 'permissions.title as p_title', 'role.title as r_title')
            ->paginate(100);

        $role_id =  [''=>'Select Role'] +  Role::where('role.title', '!=', 'super-admin')->lists('title','id')->all();

        return view('user::permission_role.index', ['permission' => $permission,'data' => $data,'role_id'=>$role_id])->render();
    }

    public function get_permission($role_id){

        #$role_value = Input::get('role_id');
        #print_r($role_id);exit;

        $permission = DB::table('permission_role')
            ->join('permissions', 'permissions.id', '=', 'permission_role.permission_id')
            ->join('role', function ($join) use ($role_id) {
                $join->on('role.id', '=', 'permission_role.role_id')
                    ->where('permission_role.role_id', '=', $role_id);
            })->lists('permissions.title', 'permissions.id');

        #$role_id =  [''=>'Select Role'] +  Role::where('role.title', '!=', 'super-admin')->lists('title','id')->all();

        return view('user::permission_role.index',['permission'=>$permission])->render();

    }

    public function post_permission(){

        $role_id = Input::get('role_id');
       # print_r($role_id);exit;
exit('1234');

    }
    public function ajax_permission_role()
    {

        $role_data = Input::get('role_id');

        $exists_permission_id = DB::table('permission_role')
            ->join('permissions', 'permissions.id', '=', 'permission_role.permission_id')
            ->join('role', function ($join) use ($role_data) {
                $join->on('role.id', '=', 'permission_role.role_id')
                ->where('permission_role.role_id', '=', $role_data);
            })
            ->lists('permissions.title', 'permissions.id');

        #return Response::make($permission_id);
       # print_r($permission_id);exit;


    }

    public function search_permission_role(){

        $pageTitle = "Permission Role List";

        $role_id = Input::get('role_id');
        $permission_name = Input::get('permission_name');
        $data = new PermissionRole();

        $data = $data->select('permission_role.*');
        if(isset($role_id) && !empty($role_id)){
            $data = $data->leftJoin('role','role.id','=','permission_role.role_id');
            $data = $data->where('permission_role.role_id','=',$role_id);
            $data = $data->where('role.title', '!=', 'super-admin');
        }
        if(isset($permission_name) && !empty($permission_name)){
            $data = $data->leftJoin('permissions','permissions.id','=','permission_role.permission_id');
            $data = $data->where('permissions.title', 'LIKE', '%'.$permission_name.'%');
        }
        $data = $data->paginate(30);

        $permission_id = Permission::lists('title','id')->all();
        $role_id =  [''=>'Select Role'] +  Role::where('role.title', '!=', 'super-admin')->lists('title','id')->all();

        return view('user::permission_role.index', ['data' => $data, 'pageTitle'=> $pageTitle, 'permission_id'=>$permission_id,'role_id'=>$role_id]);
    }

    public function store(Requests\PermissionRoleRequest $request){
        $input = $request->all();
        $permission_id = $input['permission_id'];
        foreach ($permission_id as $p_id) {
            $permission_exists = PermissionRole::where('permission_id','=',$p_id)->where('role_id','=',$input['role_id'])->exists();
            if(!$permission_exists){
                $model = new PermissionRole;
                $model->role_id = $input['role_id'];
                $model->permission_id = $p_id;
                $model->status = $input['status'];
                /* Transaction Start Here */
                DB::beginTransaction();
                try {
                    $model->save();
                    DB::commit();
                    Session::flash('message', 'Successfully added!');
                    LogFileHelper::log_info('store-permission-role', 'successfully added',  ['Permission role role_id'.$input['role_id']]);
                } catch (\Exception $e) {
                    //If there are any exceptions, rollback the transaction`
                    DB::rollback();
                    Session::flash('danger', $e->getMessage());
                    LogFileHelper::log_error('store-permission-role', $e->getMessage(),  ['Permission role role_id'.$input['role_id']]);
                }
            }else{
                Session::flash('message','Some of the permission role already exists');
            }
        }
        return redirect()->route('index-permission-role');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = 'View Permission Role';
        $data = PermissionRole::where('id',$id)->first();

        return view('user::permission_role.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = 'Update Permission Informations';
        $data = PermissionRole::where('id',$id)->first();
        $permission_id = Permission::lists('title','id');
        $role_id = [''=>'Select Role'] + Role::lists('title','id')->all();
        return view('user::permission_role.update', ['data' => $data, 'pageTitle'=> $pageTitle, 'permission_id' => $permission_id, 'role_id'=>$role_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PermissionRoleRequest $request, $id)
    {
        $model = PermissionRole::where('id',$id)->first();
        $input = $request->all();

        DB::beginTransaction();
        try {
            $model->update($input);
            DB::commit();
            Session::flash('message', "Successfully Updated");
            LogFileHelper::log_info('update-permission-role', 'Successfully updated ',  ['Permission role role_id'.$id]);
        }
        catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('danger', $e->getMessage());
            LogFileHelper::log_error('update-permission-role', $e->getMessage(),  ['Permission role role_id'.$id]);
        }
        return redirect()->route('index-permission-role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($pr_ids = Input::get('pr_ids')){
            foreach ($pr_ids as $id) {
                $model = PermissionRole::findOrFail($id);
                DB::beginTransaction();
                try {
                    $model->delete();
                    DB::commit();
                    Session::flash('message', "Successfully Deleted.");
                    LogFileHelper::log_info('delete-permission-role', 'Successfully delete',  ['Permission role role_id'.$id]);

                } catch(\Exception $e) {
                    DB::rollback();
                    Session::flash('danger',$e->getMessage());
                    LogFileHelper::log_error('delete-permission-role', 'Successfully delete.',  ['Permission role role_id'.$id]);
                }
            }
        }else{
            $model = PermissionRole::findOrFail($id);

            DB::beginTransaction();
            try {
                $model->delete();
                DB::commit();
                Session::flash('message', "Successfully Deleted.");
                LogFileHelper::log_info('delete-permission-role', 'Successfully delete ',  ['Permission role role_id'.$id]);
            } catch(\Exception $e) {
                DB::rollback();
                Session::flash('danger',$e->getMessage());
                LogFileHelper::log_error('delete-permission-role', 'Successfully delete ',  ['Permission role role_id'.$id]);
            }
        }
        return redirect()->route('index-permission-role');
    }
}
