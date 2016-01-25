<?php
#namespace App\Modules\Web\Controllers;
namespace App\Modules\User\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
            'password'=>Hash::make($input['password']),
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
