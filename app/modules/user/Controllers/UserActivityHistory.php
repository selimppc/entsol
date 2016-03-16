<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/16/16
 * Time: 12:29 PM
 */

namespace App\Modules\User\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\UserLoginHistory;
use Input;
class UserActivityHistory extends Controller
{

    protected function isGetRequest()
    {
        return Input::server("REQUEST_METHOD") == "GET";
    }
    /*user login history............*/
    public function login_history()
    {
        $pageTitle = 'User Login History';
        $model = UserLoginHistory::with('relUser')->orderBy('id', 'DESC')->paginate(30);
        //$user_list = [''=>'Select UserName'] + User::where('user.username', '!=', 'super-admin')->lists('username', 'id')->all();
        $user_list =  [''=>'Select User'] +User::lists('username', 'id')->all();

        return view('user::user_login_history.index', ['model' => $model,'pageTitle'=>$pageTitle,'user_list' => $user_list]);
    }

    public function search_user_history()
    {
        $pageTitle = 'User Login History';
        $model = new UserLoginHistory();

        if ($this->isGetRequest()) {

            $in_date = Input::get('date');
            $user_id = Input::get('user_id');

            $model = $model->with('relUser');
            if (isset($in_date) && !empty($in_date)) $model->whereDate('user_login_history.date', '=', date("Y-m-d", strtotime($in_date)));
            if (isset($user_id) && !empty($user_id)) $model->where('user_login_history.user_id', '=',$user_id);

            $model = $model->orderBy('id', 'DESC')->paginate(30);
            /*$data = $data->orderBy('user_activity.id', 'DESC')->toSql();
            dd($data); exit;*/
        } else {
            $model = UserLoginHistory::with('relUser')->orderBy('id', 'DESC')->paginate(30);
        }
        $user_list =  [''=>'Select User'] +User::lists('username', 'id')->all();

        return view('user::user_login_history.index', [
            'model' => $model,
            'pageTitle' => $pageTitle,
            'user_list' => $user_list,

        ]);

    }
}