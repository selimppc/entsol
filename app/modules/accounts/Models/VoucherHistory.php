<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/28/16
 * Time: 5:35 PM
 */

namespace App;
use Illuminate\Database\Eloquent\Model;


class VoucherHistory extends Model
{
    protected $table = 'vw_voucher';

    public function relCurrency(){
        return $this->belongsTo('App\Currency', 'currency_id', 'id');
    }

    public function relChartOfAccounts(){
        return $this->belongsTo('App\ChartOfAccounts', 'coa_id', 'id');
    }
}