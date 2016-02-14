<?php

namespace App\Modules\Accounts\Helpers;
use App\Settings;

/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 2/14/16
 * Time: 9:33 AM
 */
class GenerateNumber
{
    /*
     * $type :: Account Type(Like :: 'account-payable','account-receivable','account-adjustment','journal-voucher','receipt-voucher','reverse-entry')

     */
    public static function generate_number($type) {

        $settings = Settings::where('status','=','active')->where('type',$type)->first();
        if($settings){
            $number = $settings['last_number']+$settings['increment'];
            $settings_code = $settings['code'];
            $settings_id = $settings['id'];

            $generate_voucher_number = $settings_code.str_pad($number, 7, '0', STR_PAD_LEFT);

            $array = array($generate_voucher_number, $settings_id, $number );

            return  $array;
        }else{
            return  false;
        }

    }
}