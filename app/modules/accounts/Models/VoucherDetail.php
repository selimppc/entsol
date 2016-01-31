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
        'voucher_head_id','voucher_number','coa_id','account_code','sub_account_code','currency_id','exchange_rate','prime_amount','base_amount','branch_id','note','status'
    ];

    public function relVoucherHead(){
        return $this->belongsTo('App\VoucherHead', 'voucher_head_id', 'id');
    }
    public function relChartOfAccounts(){
        return $this->belongsTo('App\ChartOfAccounts', 'coa_id', 'id');
    }
    public function relCurrency(){
        return $this->belongsTo('App\Currency', 'currency_id', 'id');
    }
    public function relBranch(){
        return $this->belongsTo('App\Branch', 'branch_id', 'id');
    }

}