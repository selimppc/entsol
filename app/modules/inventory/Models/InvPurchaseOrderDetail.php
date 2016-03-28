<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/28/16
 * Time: 10:44 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class InvPurchaseOrderDetail extends Model
{
    protected $table = 'inv_purchase_order_detail';

    protected $fillable = [
        'po_hd_id',
        'product_id',
        'yarn_count_id',
        'yarn_type_id',
        'yarn_composition_id',
        'yarn_color_id',
        'qty',
        'grn_qty',
        'tax_rate',
        'tax_amount',
        'unit',
        'unit_qty',
        'purchase_rate',
        'amount',
    ];
}