<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 2/9/16
 * Time: 5:47 PM
 */

namespace App\Http\Requests;


class RoleRequest extends Request
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
            'title'   => 'required|unique:role,title,',
            'slug' => 'unique:role',
        ];
    }
}