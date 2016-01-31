<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/25/16
 * Time: 2:48 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class VoucherHead extends Model
{

    protected $table = 'ac_voucher_head';

    protected $fillable = [
        'account_type','voucher_number','date','reference','year','period','branch_id','note','status'
    ];



    public function relBranch(){
        return $this->belongsTo('App\Branch', 'branch_id', 'id');
    }

    /*public static function getYear(){
        return $year = [
            '2016'=>'2016',
            '2017'=>'2017',
            '2018'=>'2018',
            '2019'=>'2019',
            '2020'=>'2020',
            '2021'=>'2021',
            '2022'=>'2022',
            '2023'=>'2023',
            '2024'=>'2024',
            '2025'=>'2025',
            '2026'=>'2026',
        ];
    }*/

}