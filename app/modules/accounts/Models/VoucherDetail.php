<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/26/16
 * Time: 5:02 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class VoucherDetail extends Model
{

    protected $table = 'ac_voucher_detail';

    protected $fillable = [
        'voucher_head_id','coa_id','sub_account_code','currency_id','exchage_rate','prime_amount','base_amount','branch','note','status'
    ];


}