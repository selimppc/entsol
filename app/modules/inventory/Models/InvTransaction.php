<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/28/16
 * Time: 10:46 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class InvTransaction extends Model
{
    protected $table = 'inv_transaction';

    protected $fillable = [
        'business_id',
        'buyer_id',
        'grn_hd_id',
        'product_id',
        'store_id',
        'supplier_id',
        'currency_id',
        'transaction_type',
        'trn_no',
        'batch_number',
        'date',
        'expiry_date',
        'unit',
        'qty',
        'rate',
        'sign',
        'note',
        'voucher_no',
        'wo_pi_no',
        'status',
        'buyer_order_id',
        'ILE',
    ];
}