<?php

namespace App\Http\Controllers\Auth;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use URL;
use HTML;
use Mockery\CountValidator\Exception;
use Validator;
use Input;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);

    }*/

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            #'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
           # 'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /*password reset before login by inactive user*/
    public function reset_password($user_id){

        return view('user::reset_password._form',['user_id'=>$user_id]);
    }

    public function update_new_password(Request $request){

        $input = $request->all();
        date_default_timezone_set("Asia/Dacca");

            if($input['confirm_password']==$input['password']) {

                    $model = User::findOrNew($input['user_id']);
                    $model->password = Hash::make($input['password']);
                    $model->last_visit = date('Y-m-d h:i:s', time());
                    /* Transaction Start Here */
                    DB::beginTransaction();
                    try {
                        $model->save();

                        DB::commit();

                        /*Session::flash('message', "Successfully Reset Your Password. You May Signin Now. <a href='get-user-login'>signin from here</a>");*/
                        Session::flash('message','Successfully Reset Your Password. Now You Can Login Here.');
                        return redirect()->route('get-user-login');

                    } catch (Exception $e) {
                        //If there are any exceptions, rollback the transaction
                        DB::rollback();
                        Session::flash('error',$e->getMessage());
                    }
            }
            else{
                Session::flash('error', "Password and Confirm Password Does not match !");
            }
        return redirect()->back();
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

    public function postLogin(Request $request)
    {
        $data = Input::all();

        if(Auth::check()){

            Session::put('email', isset(Auth::user()->get()->id));
            Session::flash('flash_message', "You Have Already Logged In.");

            return redirect()->route('dashboard');
        }else{
            try{
                $field = filter_var($data['email'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

                $user_data_exists = User::where($field, $data['email'])->exists();

                if($user_data_exists){
                    $user_data = User::where($field, $data['email'])->first();

                    if($user_data->last_visit==Null){

                       #return redirect()->route('inactive-user-dashboard');
                        Session::flash('info', "Your account is inactive.To activate your account you should reset your password.");

                        return redirect()->route('reset-password',['user_id'=>$user_data->id]);

                    }else{
                        date_default_timezone_set("Asia/Dacca");
                        DB::table('user')->where('id', '=', $user_data->id)->update(array('last_visit' =>date('Y-m-d h:i:s', time())));
                        $attempt = Auth::attempt([
                            $field => $request->get('email'),
                            'password' => $request->get('password'),
                        ]);
                        if ($attempt) {
                            Session::put('email', $user_data->email);
                            Session::flash('message', "Successfully  Logged In.");
                            #return redirect()->route('dashboard');
                            return redirect()->intended('dashboard');
                        }else{
                            Session::flash('danger', "Password Incorrect.Please Try Again");
                        }
                    }
                }else{
                    Session::flash('danger', "UserName/Email does not exists.Please Try Again");
                }
            }catch(Exception $e){
                Session::flash('error', $e->getMessage());
            }
            return redirect('get-user-login')->withInput();
        }
    }
}
