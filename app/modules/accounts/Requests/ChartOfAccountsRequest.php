<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/27/16
 * Time: 12:05 PM
 */

namespace App\Http\Requests;
use App\Http\Requests\Request;


class ChartOfAccountsRequest extends Request
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
            'account_code' => 'required|max:45',
            'title' => 'required|max:45',
            'account_type' => 'required',
            'account_usage' => 'required',
            'analytical_code' => 'required',
            'group_one_id' => 'required|max:10',
            'branch_id' => 'required|max:10'
        ];
    }
}