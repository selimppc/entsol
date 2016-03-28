<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/28/16
 * Time: 10:41 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class InvRequisitionDetail extends Model
{
    protected $table = 'inv_requisition_detail';

    protected $fillable = [
        'req_hd_id',
        'product_id',
        'unit',
        'qty'
    ];
}