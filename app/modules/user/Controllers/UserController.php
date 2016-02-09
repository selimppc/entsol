<?php
#namespace App\Modules\Web\Controllers;
namespace App\Modules\User\Controllers;

use App\Branch;
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

class UserController extends Controller
{
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
            $model = new UserResetPassword();
            $model->user_id = $user->id;
            $model->reset_password_token = str_random(30);
            $token = $model->reset_password_token;
            $model->reset_password_expire = date("Y-m-d h:i:s", (strtotime(date('Y-m-d h:i:s', time())) + (60 * 30)));
            $model->reset_password_time = date('Y-m-d h:i:s', time());
            $model->status = 2;
            if($model->save()) {
                try{
                    Mail::send('user::forgot_password.email_notification', array('link' =>$token),
                        function($message) use ($user)
                        {
                            $message->from('test@edutechsolutionsbd.com', 'User Password Set Notification');
                            //$message->from('tanintjt.1990@gmail.com', 'AFFIFACT');
                            $message->to($user->email);
                            $message->cc('devdhaka404@gmail.com', 'Tanin');
                            $message->replyTo('devdhaka405@gmail.com','forgot password Request');
                            $message->subject('Forgot Password Reset Mail');
                        });
                    Session::flash('flash_message', 'Sent email to reset password. Please check your email!');
                }catch (\Exception $e){
                    Session::flash('flash_message_error', 'Email does not Send!');
                }
            }else{
                Session::flash('flash_message_error', 'Does not Save!');
            }
        }else{
            Session::flash('flash_message_error', 'The Specified Email address Is not Listed On Your Account. Please Try Again.');
        }
        return redirect()->route('get-user-login');
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
                return view('user.forgot_password.reset_password_form',['id'=>$id]);
            }
            if($data['reset_password_expire'] < $current_time){
                Session::flash('flash_message_error', 'Time Expired.Please Try Again.');
                return redirect()->back();
            }
            if($data['status'] == 0) {
                Session::flash('flash_message_error', 'You can Not Access To This link.Please Try Again.');
                return redirect()->back();
            }
        }else{
            Session::flash('flash_message_error', 'Invalid Password Reset Link.Please Try Again.');
            return redirect()->route('get-user-login');
        }
        return redirect()->route('get-user-login');
    }

    public function getLogin()
    {
        return view('user::signin._form');
    }

    public function logout() {
        #exit('43324');
        Auth::logout();

        Session::flush(); //delete the session

        #Session::flash('message', "You are now logged out!");
        #echo '13v2';exit;
        return redirect()->route('get-user-login');
    }
    public function create_profile()
    {
        return view('user::profile.index');
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
        $username = Input::get('username');
        $email = Input::get('email');
        $data = User::orderBy('id', 'DESC')->get();
        $branch_data =  Branch::lists('title','id');

        return view('user::user.index', ['data' => $data, 'pageTitle'=> $pageTitle,'branch_data'=>$branch_data]);
    }

    public function add_user(){
       exit('223434');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_user($id)
    {
        exit('Ok');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_user($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_user(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_user($id)
    {
        //
    }
}
