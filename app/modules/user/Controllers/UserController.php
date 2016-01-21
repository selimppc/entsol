<?php
#namespace App\Modules\Web\Controllers;
namespace App\Modules\User\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
       return view('user::user.index');
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
            'password'=>$input['password'],
//            'auth_key'=>'',
            'access_token'=>str_random(30),
            'csrf_token'=> str_random(30),
            'ip_address'=> getHostByName(getHostName()),
//            'last_visit'=> date('Y-m-d h:i:s', time()),
//            'role_id'=> '',
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

    public function create_sign_in()
    {
        return view('user::signin._form');
    }

    public function login()
    {
//        Session::flush(); //delete the session

//        //get admin email_address
//        $admin_email = DB::table('user')->where('type','=','admin')->get(array('user.email'));

        $data = Input::all();
//        print_r( $data);exit('2222');
        if(Auth::check()){
            // echo 'check';exit;
            Session::put('email', isset(Auth::user()->get()->id));

            Session::flash('flash_message', "You Have Already Logged In.");

            return redirect()->route('dashboard');
        }else{
        #print_r( $data);exit('2222');
            $user_data_exists = User::where('email', $data['email'])->exists();

            if($user_data_exists){

                $user_data = User::where('email', $data['email'])->first();

                if($user_data->status == 'inactive'){

                    Session::flash('flash_message_error', "You are not permitted for login.Your account is in-active.");
                }else{
                    try{
                        #print_r( $data);exit('2222');
                        if (Auth::attempt(['email' => $data['email'],'password' =>$data['password']]))
                        {
                            print_r( $data);exit('2220');
                            print_r( $data['password']);exit('2222');

                            Session::put('email', $user_data->email);
                            Session::put('password', $user_data->password);
                            Session::flash('flash_message', "Successfully  Logged In.");

                            return redirect()->route('user.dashboard');
                        }else{
                            Session::flash('flash_message_error', "Email Address / Password InCorrect.Please Try Again");
                            return redirect()->back();
                        }
                    }catch(\Exception $e){
                        Session::flash('flash_message_error', $e->getMessage());
                        return redirect()->back();
                    }
                }
            }else{
                echo 'nothing';
            }

        }return redirect()->back();
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
