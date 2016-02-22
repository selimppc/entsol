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
        $email = Route::input('email')?Route::input('email'):'';

        return [
            'email' => 'required|email|unique:user'.$email,
        ];
    }
}