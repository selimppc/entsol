<?php

namespace App\Http\Controllers\Auth;
use App\User;
use Auth;
use Illuminate\Http\Request;
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
                $attempt = Auth::attempt([
                    $field => $request->get('email'),
                    'password' => $request->get('password'),
                ]);
                $user_data_exists = User::where($field, $data['email'])->exists();

                if($user_data_exists){
                    $user_data = User::where($field, $data['email'])->first();
                    if ($attempt) {
                        Session::put('email', $user_data->email);
                        Session::flash('message', "Successfully  Logged In.");
                        return redirect()->route('dashboard');
                    }else{
                        Session::flash('danger', "Password Inorrect.Please Try Again");
                    }
                }else{
                    Session::flash('danger', "Email does not exists.Please Try Again");
                }
            }catch(Exception $e){
                Session::flash('error', $e->getMessage());
            }
            return redirect('get-user-login')->withInput();
        }
    }
}
