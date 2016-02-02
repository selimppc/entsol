<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 2/1/16
 * Time: 4:23 PM
 */

namespace App\Http\Requests;
use App\Http\Requests\Request;


class SettingsRequest extends Request
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
            'title' => 'required|max:64',
            'type' => 'required',
            'last_number' => 'required',
            'increment' => 'required'
        ];
    }
}