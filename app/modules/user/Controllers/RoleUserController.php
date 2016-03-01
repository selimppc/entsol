<?php
#namespace App\Modules\Web\Controllers;
namespace App\Modules\User\Controllers;

use App\Helpers\LogFileHelper;
use App\Permission;
use App\PermissionRole;
use App\Role;
use App\RoleUser;
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

class RoleUserController extends Controller
{

    protected function isGetRequest()
    {
        return Input::server("REQUEST_METHOD") == "GET";
    }
    /**
     * Display the specified resource.
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "Role User Informations";

        $data = DB::table('role_user')
            ->join('user', 'user.id', '=', 'role_user.user_id')
            ->join('role', 'role.id', '=', 'role_user.role_id')
            ->where('role.title', '!=', 'super-admin')
            ->select('role_user.id', 'user.username','user.email', 'role.title')
            ->paginate(30);
        /*$data = new RoleUser();
        $data = $data->join('role','role.id','=','role_id');
        $data = $data->join('user','user.id','=','user_id');
        if(isset($role_name) && !empty($role_name)){
            $data = $data->where('role.title', 'LIKE', '%'.$role_name.'%');
        }
        if(isset($username) && !empty($username)){
            $data = $data->where('user.username', 'LIKE', '%'.$username.'%');
        }
        $data = $data->paginate(30);*/
        $user_id = [''=>'Select User'] + User::lists('username','id')->all();

        $role_id =  [''=>'Select Role'] +  Role::where('role.title', '!=', 'super-admin')->lists('title','id')->all();

        return view('user::role_user.index', ['data' => $data, 'pageTitle'=> $pageTitle, 'user_id'=>$user_id,'role_id'=>$role_id]);
    }

    public function search_role_user(){

        $pageTitle = "Role User Informations";

        if($this->isGetRequest()){
        $role_id = Input::get('role_id');
        $username = Input::get('username');
        $data = new RoleUser();

        $data = $data->select('role_user.*');
        if(isset($role_id) && !empty($role_id)){
            $data = $data->leftJoin('role','role.id','=','role_user.role_id');
            $data = $data->where('role_user.role_id','=',$role_id);
            $data = $data->where('role.title', '!=', 'super-admin');
        }
        if(isset($username) && !empty($username)){
            $data = $data->leftJoin('user','user.id','=','role_user.user_id');
            $data = $data->where('user.username', 'LIKE', '%'.$username.'%');
        }
        $data = $data->paginate(30);
        }else{
            $data = DB::table('role_user')
                ->join('user', 'user.id', '=', 'role_user.user_id')
                ->join('role', 'role.id', '=', 'role_user.role_id')
                ->where('role.title', '!=', 'super-admin')
                ->select('role_user.id', 'user.username','user.email', 'role.title')
                ->paginate(30);
        }
        $user_id = [''=>'Select User'] + User::lists('username','id')->all();

        $role_id = [''=>'Select Role'] +  Role::where('role.title', '!=', 'super-admin')->lists('title','id')->all();
        return view('user::role_user.index', ['data' => $data, 'pageTitle'=> $pageTitle, 'user_id'=>$user_id,'role_id'=>$role_id]);
    }

    public function store(Requests\RoleUserRequest $request){
        $input = $request->all();
        $role_user_exists = RoleUser::where('user_id',$input['user_id'])->where('role_id',$input['role_id'])->exists();
        if(!$role_user_exists){
            /* Transaction Start Here */
            DB::beginTransaction();
            try {
                RoleUser::create($input);
                DB::commit();
                Session::flash('message', 'Successfully added!');
                LogFileHelper::log_info('store-role-user', 'Successfully added', ['Role user (user_id): '.$input['user_id']]);
            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('danger', $e->getMessage());
                LogFileHelper::log_error('store-role-user', $e->getMessage(), ['Role user (user_id): '.$input['user_id']]);
            }

        }else{
            Session::flash('danger','User role already exists.');
        }
        return redirect()->route('index-role-user');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = 'View Role User Informations';
        $data = RoleUser::where('id',$id)->first();

        return view('user::role_user.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = 'Update Role User Informations';
        $data = RoleUser::where('id',$id)->first();
        $user_id = User::lists('username','id');
        $role_id = Role::lists('title','id');
        return view('user::role_user.update', ['data' => $data, 'pageTitle'=> $pageTitle, 'user_id' => $user_id, 'role_id'=>$role_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\RoleUserRequest $request, $id)
    {
        $model = RoleUser::where('id',$id)->first();
        $input = $request->all();
        $role_user_exists = RoleUser::where('user_id',$input['user_id'])->where('role_id',$input['role_id'])->exists();
        if(!$role_user_exists){
            DB::beginTransaction();
            try {
                $model->update($input);
                DB::commit();
                Session::flash('message', "Successfully Updated");
                LogFileHelper::log_info('update-role-user', 'Successfully Updated', ['Role-user id: '.$model->id]);
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', $e->getMessage());
                LogFileHelper::log_error('update-role-user', $e->getMessage(), ['Role-user id: '.$model->id]);
            }
        }else{
            Session::flash('danger','User role already exists.');
        }
        return redirect()->route('index-role-user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = RoleUser::findOrFail($id);

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
            LogFileHelper::log_info('delete-role-user', 'Successfully update status cancel', ['Role-user id: '.$model->id]);

        } catch(\Exception $e) {
            DB::rollback();
            Session::flash('danger',$e->getMessage());
            LogFileHelper::log_error('delete-role-user', $e->getMessage(), ['Role-user id: '.$model->id]);
        }
        return redirect()->route('index-role-user');
    }
}