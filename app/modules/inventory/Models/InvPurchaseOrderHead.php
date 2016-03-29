<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/28/16
 * Time: 10:43 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class InvPurchaseOrderHead extends Model
{
    protected $table = 'inv_purchase_order_head';

    protected $fillable = [
        'business_id',
        'buyer_id',
        'req_hd_id',
        'buyer_order_no',
        'buyer_order_qty',
        'po_no',
        'pay_terms',
        'delivery_date',
        'tax',
        'tax_amount',
        'discount_rate',
        'discount_amount',
        'amount',
        'status',
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