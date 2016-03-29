<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/28/16
 * Time: 10:39 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class InvRequisitionHead extends Model
{
    protected $table = 'inv_requisition_head';

    protected $fillable = [
        'business_id',
        'supplier_id',
        'store_id',
        'buyer_id',
        'req_no',
        'buyer_order_no',
        'buyer_order_qty',
        'requisition_type',
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