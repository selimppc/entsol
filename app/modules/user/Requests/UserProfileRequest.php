<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 2/16/16
 * Time: 11:01 AM
 */

namespace App\Http\Requests;


class UserProfileRequest extends Request
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
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'country_id' => 'required',
            'gender' => 'required',
        ];
    }
}