<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/25/16
 * Time: 10:59 AM
 */

namespace App\Http\Requests;
use App\Http\Requests\Request;


class DefaultOffsetRequest extends Request
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
            'offset' => 'required|max:45',
            'pnl_account' => 'required|max:45'
        ];
    }
}