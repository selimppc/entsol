<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/28/16
 * Time: 10:45 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class InvGrnDetail extends Model
{
    protected $table = 'inv_grn_detail';

    protected $fillable = [
        'grn_hd_id',
        'product_id',
        'yarn_count_id',
        'yarn_type_id',
        'yarn_composition_id',
        'yarn_color_id',
        'yarn_lot_id',
        'batch_number',
        'expiry_date',
        'receive_qty',
        'cost_price',
        'unit_qty',
        'tax_rate',
        'tax_amount',
        'discount_rate',
        'discount_amount',
        'ILE',
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