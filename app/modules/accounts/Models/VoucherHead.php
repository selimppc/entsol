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

    public static function getYear(){
        return $year = [
            '2010' => '2010',
            '2011' => '2011',
            '2012'=>'2012',
            '2013'=>'2013',
            '2014'=>'2014',
            '2015'=>'2015',
            '2016'=>'2016',
            '2017'=>'2017',
            '2018'=>'2018',
            '2019'=>'2019',
            '2020'=>'2000',
        ];
    }

    public function getPeriod(){
        return $year = [
            '2010' => '2010',
            '2011' => '2011',
            '2012'=>'2012',
            '2013'=>'2013',
            '2014'=>'2014',
            '2015'=>'2015',
            '2016'=>'2016',
            '2017'=>'2017',
            '2018'=>'2018',
            '2019'=>'2019',
            '2020'=>'2000',
        ];
    }
}