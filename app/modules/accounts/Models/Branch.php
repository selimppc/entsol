<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/25/16
 * Time: 1:46 PM
 */

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use Illuminate\Http\Request;

class Branch extends Model
{
    protected $table = 'cm_branch';

    protected $fillable = [
        'code','title','description','currency_id','exchange_rate','contact_person','billing_address','phone','mobile','fax','email','status'
    ];

    public function relCurrency(){
        return $this->belongsTo('App\Currency', 'currency_id', 'id');
    }
}