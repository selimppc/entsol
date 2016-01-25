<?php

namespace App\Http\Controllers\Auth;
use App\User;
use Auth;
use Illuminate\Http\Request;
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
                $attempt = Auth::attempt([
                    'email' => $request->get('email'),
                    'password' => $request->get('password'),
                ]);
                $user_data_exists = User::where('email', $data['email'])->exists();

                if($user_data_exists){
                    $user_data = User::where('email', $data['email'])->first();
                }
                
                if ($attempt) {
                    Session::put('email', $user_data->email);
                    #Session::put('password', $user_data->password);
                    Session::flash('flash_message', "Successfully  Logged In.");
                    return redirect()->intended('dashboard');
                }else{
                    Session::flash('error', "Email Address / Password InCorrect.Please Try Again");
                    return redirect()->route('get-user-login');
                }
            }catch(Exception $e){
                Session::flash('error', $e->getMessage());
                return redirect()->route('get-user-login');
            }
        }
    }
}
