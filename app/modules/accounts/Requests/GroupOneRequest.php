<?php

/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/24/16
 * Time: 1:11 PM
 */

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GroupOneRequest extends Request
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
            'code' => 'required|max:64',
            'title' => 'required|max:64'
        ];
    }
}