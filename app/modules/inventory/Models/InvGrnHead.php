<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/28/16
 * Time: 10:45 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class InvGrnHead extends Model
{
    protected $table = 'inv_grn_head';

    protected $fillable = [
        'business_id',
        'po_hd_id',
        'req_hd_id',
        'supplier_id',
        'currency_id',
        'buyer_id',
        'buyer_order_id',
        'store_id',
        'grn_no',
        'voucher_no',
        'date',
        'pay_terms',
        'tax_rate',
        'tax_amount',
        'discount_rate',
        'discount_amount',
        'amount',
        'net_amount',
        'status',
        'opening_stock',
        'receive_item',
        'receive_basis',
        'challan_no',
        'note',
    ];


























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