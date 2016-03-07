<?php

/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/6/16
 * Time: 6:07 PM
 */
namespace App\Http\Requests;
use App\Http\Requests\Request;


class MenuPanelRequest extends Request
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
            'menu_id' => 'required',
            'menu_type' => 'required',
            'menu_name' => 'required',
            'route' => 'required',
            'parent_menu_id' => 'required'
        ];
    }
}