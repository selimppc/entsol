<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/28/16
 * Time: 10:43 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

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

}