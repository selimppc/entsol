<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/28/16
 * Time: 5:35 PM
 */

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class VoucherHistory extends Model
{
    protected $table = 'vw_voucher';

    public function relCurrency(){
        return $this->belongsTo('App\Currency', 'currency_id', 'id');
    }

    public function relChartOfAccounts(){
        return $this->belongsTo('App\ChartOfAccounts', 'coa_id', 'id');
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