<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/28/16
 * Time: 4:11 PM
 */

namespace App;
use Illuminate\Database\Eloquent\Model;




class GlTransaction extends Model
{
    protected $table = 'vw_gl_trn';

    public function relBranch(){
        return $this->belongsTo('App\Branch', 'branch_id', 'id');
    }

    public function relChartOfAccounts(){
        return $this->belongsTo('App\ChartOfAccounts', 'coa_id', 'id');
    }
}