<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/26/16
 * Time: 5:02 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

    // TODO :: boot
    // boot() function used to insert logged user_id at 'created_by' & 'updated_by'

    public static function boot(){
        parent::boot();
        static::creating(function($query){
            if(Auth::check()){
                $query->created_by = Auth::user()->id;
            }
        });
        static::updating(function($query){
            if(Auth::check()){
                $query->updated_by = Auth::user()->id;
            }
        });
    }

}