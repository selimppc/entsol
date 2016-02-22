<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 2/11/16
 * Time: 12:24 PM
 */

namespace App\Http\Requests;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;

class UserRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $id = Request::input('id')?Request::input('id'):'';

//print_r($id);exit;

        if($id == null)
        {

            return [
                'email'   => 'required|unique:user,email,' . $id,
                'username'   => 'required|unique:user,username,' . $id
            ];

        }else{
            return [


            ];

        }


    }
}