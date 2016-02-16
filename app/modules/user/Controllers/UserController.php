<?php
#namespace App\Modules\Web\Controllers;
namespace App\Modules\User\Controllers;

use App\Branch;
use App\Country;
use App\Role;
use App\User;
use App\UserMeta;
use App\UserProfile;
use App\UserResetPassword;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    protected function isGetRequest()
    {
        return Input::server("REQUEST_METHOD") == "GET";
    }
    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }
    public function create_sign_up()
    {
        return view('user::signup._form');
    }
    public function store_signup_info(Request $request)
    {
        $input = $request->all();

        $input_data = [
            'username'=>$input['username'],
            'email'=>$input['email'],
            'password'=>Hash::make($input['password']),
            #'auth_key'=>'',
            #'access_token'=>str_random(30),
            'csrf_token'=> str_random(30),
            'ip_address'=> getHostByName(getHostName()),
            #'last_visit'=> date('Y-m-d h:i:s', time()),
            #'role_id'=> '',
        ];
        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            User::create($input_data);
            DB::commit();
            Session::flash('message', 'Successfully Completed Signup Process!You may login now ');
        }catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('error', $e->getMessage());
        }
        return redirect()->back();
    }
    public function forget_password_view()
    {
        return view('user::forget_password._form');
    }
    public function forget_password()
    {
        $email = Input::get('email');

        $user_exists = DB::table('user')->where('email', '=', $email)->exists();
        if($user_exists){

            $user = DB::table('user')->where('email', '=', $email)->first();
            #print_r($user);exit;
            $model = new UserResetPassword();
            $model->user_id = $user->id;
            $model->reset_password_token = str_random(30);
            $token = $model->reset_password_token;
            $model->reset_password_expire = date("Y-m-d h:i:s", (strtotime(date('Y-m-d h:i:s', time())) + (60 * 30)));
            $model->reset_password_time = date('Y-m-d h:i:s', time());
            $model->status = 2;
            if($model->save()) {

                try{
                    Mail::send('user::forget_password.email_notification', array('link'=>$token,'user'=>$user),
                        function($message) use ($user)
                        {
                            $message->from('tanin09008@gmail.com', 'User Password Set Notification');
                            //$message->from('tanintjt.1990@gmail.com', 'AFFIFACT');
                            $message->to($user->email);
                            $message->replyTo('tanin09008@gmail.com','forgot password Request');
                            $message->subject('Forgot Password Reset Mail');
                        });

                    #print_r($user);exit;
                    Session::flash('message', 'Successfully sent email to reset password. Please check your email!');
                }catch (\Exception $e){

                    Session::flash('error', $e->getMessage());
                }
            }else{
                Session::flash('error', 'Does not Save!');
            }
        }else{
            Session::flash('error', 'The Specified Email address Is not Listed On Your Account. Please Try Again.');
        }
        return redirect()->back();
    }
    public function password_reset_confirm($reset_password_token){

        $user = UserResetPassword::where('reset_password_token','=',$reset_password_token)->first();
        $current_time = date('Y-m-d h:i:s', time());
        if(isset($user)) {
            $data = [
                isset($user->id) ? 'user_id': '' => isset($user->id) ? $user->id : '',
                'reset_password_expire' => isset($user) ? $user->reset_password_expire : '',
                'reset_password_time'=> isset($user) ? $user->reset_password_time : '',
                'status'=> isset($user) ? $user->status : '',
            ];
            if ($data['reset_password_expire'] > $current_time && $data['status'] == 2) {
                $id =  isset($user->id) ?$data['user_id']:'';
                return view('user::forget_password.reset_password_form',['id'=>$id]);
            }
            if($data['reset_password_expire'] < $current_time){
                Session::flash('error', 'Time Expired.Please Try Again.');
                return redirect()->back();
            }
            if($data['status'] == 0) {
                Session::flash('error', 'You can Not Access To This link.Please Try Again.');
                return redirect()->back();
            }
        }else{
            Session::flash('error', 'Invalid Password Reset Link.Please Try Again.');
            return redirect()->route('get-user-login');
        }
        return redirect()->route('get-user-login');
    }

    public function save_new_password(Request $request)
    {

        $data = $request->all();
        $user_id = DB::table('user_reset_password')->where('id', '=', $data['id'])->first();

        $model = User::findOrFail($user_id->user_id);

        DB::beginTransaction();
        try {
            //update status and password
            date_default_timezone_set("Asia/Dacca");
            $user_update_data =[
                'password'=>Hash::make($data['password']),
                'last_visit'=>date('Y-m-d h:i:s', time()),
            ];
            if($model->update($user_update_data)){
                DB::table('user_reset_password')->where('user_id', '=', $user_id->user_id)->update(array('status' => 0));
            }
            DB::commit();
            Session::flash('message','You have reset your password successfully. You may signin now.');
            return redirect()->route('get-user-login');
        }
        catch ( \Exception $e ){
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('error', "Invalid Request! Please Try Again.");
        }
//            return redirect()->back();
    }

    public function getLogin()
    {
       if(Session::has('email')) {
           return view('admin::layouts.dashboard');
        }
        else{
            return view('user::signin._form');
      }
    }

    public function logout() {
        #exit('43324');
        Auth::logout();

        Session::flush(); //delete the session

        #Session::flash('message', "You are now logged out!");
        #echo '13v2';exit;
        return redirect()->route('get-user-login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "User List";
        $model = User::with('relBranch','relRole')->where('status','!=','cancel')->orderBy('id', 'DESC')->paginate(30);
        $branch_data =  [''=>'Select Branch'] + Branch::lists('title','id')->all();
        $role =  [''=>'Select Role'] +  Role::lists('title','id')->all();

        return view('user::user.index', ['model' => $model, 'pageTitle'=> $pageTitle,'branch_data'=>$branch_data,'role'=>$role]);
    }
    /*public function getRoutes(){
        \Artisan::call('route:list');
        return \Artisan::output();
    }*/


    public function search_user(){

        $pageTitle = 'User Informations';
        $model = new User();

        if($this->isGetRequest()){
            $branch_id = Input::get('branch_id');
            $role_id = Input::get('role_id');
            $username = Input::get('username');
            $status = Input::get('status');

            $model = $model->with('relBranch','relRole');
            if (isset($branch_id) && !empty($branch_id)) $model->where('user.branch_id', '=', $branch_id);
            if (isset($role_id) && !empty($role_id)) $model->where('user.role_id', '=', $role_id);
            if (isset($username) && !empty($username)) $model->where('user.username', '=', $username);
            if (isset($status) && !empty($status)) $model->where('user.status', '=', $status);

            $model = $model->where('status','!=','cancel')->paginate(30);
        }else{
            $model = $model->with('relBranch','relRole')->where('status','!=','cancel')->orderBy('id', 'DESC')->paginate(30);
        }

        $branch_data =  [''=>'Select Branch'] + Branch::lists('title','id')->all();
        $role =  [''=>'Select Role'] +  Role::lists('title','id')->all();

        return view('user::user.index',['pageTitle'=>$pageTitle,'branch_data'=>$branch_data,'model'=>$model,'branch_data'=>$branch_data,'role'=>$role]);
    }

    public function add_user(Requests\UserRequest $request){

        $input = $request->all();
        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            $input_data = [
                'username'=>$input['username'],
                'email'=>$input['email'],
                'password'=>Hash::make($input['password']),
                'csrf_token'=> str_random(30),
                'ip_address'=> getHostByName(getHostName()),
                'branch_id'=> $input['branch_id'],
                'role_id'=> $input['role_id'],
                'expire_date'=> $input['expire_date'],
                'status'=> $input['status'],
            ];

            User::create($input_data);

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
    public function show_user($id)
    {
        $pageTitle = 'User Informations';
        $data = User::with('relBranch','relRole')->where('id',$id)->first();
#print_r($data);exit;
        return view('user::user.view', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_user($id)
    {
        $pageTitle = 'Edit User Information';

        $data = User::findOrFail($id);

        $branch_data =  Branch::lists('title','id');
        $role =  Role::lists('title','id');

        return view('user::user.update', ['pageTitle'=>$pageTitle,'data' => $data,'branch_data'=>$branch_data,'role'=>$role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_user(Requests\UserRequest $request, $id)
    {
        $input = $request->all();
        $model = User::findOrFail($id);

        DB::beginTransaction();
        try {

            $input_data = [
                'username'=>$input['username'],
                'email'=>$input['email'],
                'password'=>Hash::make($input['password']),
                'csrf_token'=> str_random(30),
                'ip_address'=> getHostByName(getHostName()),
                'branch_id'=> $input['branch_id'],
                'role_id'=> $input['role_id'],
                'expire_date'=> $input['expire_date'],
                'status'=> $input['status'],
            ];
            $model->update($input_data);
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
    public function destroy_user($id)
    {
        $model = User::where('id',$id)->first();
        DB::beginTransaction();
        try {
            if($model->status =='active'){
                $model->status = 'cancel';
            }
            $model->save();
            DB::commit();
            Session::flash('message', "Successfully Deleted.");

        } catch(\Exception $e) {
            DB::rollback();
            Session::flash('danger',$e->getMessage());
        }
        return redirect()->route('user-list');
    }

    public function create_user_info()
    {
        if(Auth::check())
        {
            $user_id = Auth::user()->id;
            $countryList = array('' => 'Please Select') + Country::lists('title', 'id')->all();
            return view('user::user_info.index',['user_id'=>$user_id,'countryList'=>$countryList]);
        }
    }
    public function user_info($value){

        $user_id = Auth::user()->id;

        /*if($this->isPostRequest()){*/
        try{
            if($value == 'profile'){
                $data = UserProfile::with('relUser','relCountry')->where('user_id',$user_id)->first();
                return Response::json(view('user::user_info.profile.ajax_profile_data', ['data' => $data])->render());
            }
            if($value == 'meta'){
                $data = UserMeta::with('relUser')->where('user_id',$user_id)->first();
                return Response::json(view('user::user_info.meta_data.ajax_meta_data', ['data' => $data])->render());
            }


        }catch(\Exception $e){
            return Response::json($e);
        }

      /*}else{
            return Response::json('only for ajax request!');
        }*/

    }

    public function inactive_user_dashboard(){
        return view('user::user_info.inactive_user_dashboard');
    }


    public function store_user_profile(Requests\UserProfileRequest $request){

        $input = $request->all();

            /* Transaction Start Here */
            DB::beginTransaction();
            try {
                UserProfile::create($input);
                DB::commit();
                Session::flash('message', 'Successfully added!');
            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('danger', $e->getMessage());
            }
        return redirect()->route('create-user-info');
    }

    public function edit_user_profile($id){

        $pageTitle = 'Edit User Profile Information';

        $data = UserProfile::findOrFail($id);
        $user_id = Auth::user()->id;
        $countryList = array('' => 'Please Select') + Country::lists('title', 'id')->all();

        return view('user::user_info.profile.update', ['pageTitle'=>$pageTitle,'data' => $data,'user_id'=>$user_id,'countryList'=>$countryList]);
    }

    public function update_user_profile(Requests\UserProfileRequest $request,$id){

        $input = $request->all();

        $model= UserProfile::findOrFail($id);
        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            $model->update($input);
            DB::commit();
            Session::flash('message', 'Successfully Updated!');
        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());
        }
        return redirect()->route('create-user-info');
    }

    public function store_meta_data(Request $request){

        $input = $request->all();

        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            UserMeta::create($input);
            DB::commit();
            Session::flash('message', 'Successfully added!');
        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());
        }
        return redirect()->route('create-user-info');
    }

    public function edit_meta_data($id){

        $pageTitle = 'Edit Biographical Information';

        $data = UserMeta::findOrFail($id);
        $user_id = Auth::user()->id;

        return view('user::user_info.meta_data.update', ['pageTitle'=>$pageTitle,'data' => $data,'user_id'=>$user_id]);
    }

    public function update_meta_data(Request $request,$id){

        $input = $request->all();

        $model= UserMeta::findOrFail($id);
        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            $model->update($input);
            DB::commit();
            Session::flash('message', 'Successfully Updated!');
        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());
        }
        return redirect()->back();
    }

}
