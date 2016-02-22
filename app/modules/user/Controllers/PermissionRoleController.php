<?php
#namespace App\Modules\Web\Controllers;
namespace App\Modules\User\Controllers;

use App\Permission;
use App\PermissionRole;
use App\Role;
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
use Illuminate\Support\Facades\Session;

class PermissionRoleController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "Permission Role List";
        $role_name = Input::get('role_name');
        $data = PermissionRole::where('status', '!=', 'cancel')->orderBy('id', 'DESC')->paginate(30);
        $permission_id = Permission::lists('title','id')->all();
        $role_id = [''=>'Select Role'] + Role::lists('title','id')->all();
        return view('user::permission_role.index', ['data' => $data, 'pageTitle'=> $pageTitle, 'permission_id'=>$permission_id,'role_id'=>$role_id]);
    }

    public function store(Requests\PermissionRoleRequest $request){
        $input = $request->all();
        $permission_id = $input['permission_id'];
        foreach ($permission_id as $p_id) {
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
            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('danger', $e->getMessage());
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
        }
        catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('danger', $e->getMessage());
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
            print_r($pr_ids);
            foreach ($pr_ids as $id) {
                $model = PermissionRole::findOrFail($id);
                DB::beginTransaction();
                try {
                    $model->delete();
                    DB::commit();
                    Session::flash('message', "Successfully Deleted.");

                } catch(\Exception $e) {
                    DB::rollback();
                    Session::flash('danger',$e->getMessage());
                }
            }
        }else{
            $model = PermissionRole::findOrFail($id);

            DB::beginTransaction();
            try {
                $model->delete();
                DB::commit();
                Session::flash('message', "Successfully Deleted.");

            } catch(\Exception $e) {
                DB::rollback();
                Session::flash('danger',$e->getMessage());
            }
        }
        return redirect()->route('index-permission-role');
    }
}
