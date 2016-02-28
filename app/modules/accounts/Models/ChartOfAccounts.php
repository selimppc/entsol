<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/27/16
 * Time: 10:33 AM
 */

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ChartOfAccounts extends Model
{
    protected $table = 'ac_chart_of_accounts';

    protected $fillable = [
        'account_code','title','description','account_type','account_usage','group_one_id','analytical_code','branch_id','status','business_id'
    ];

    public function relGroupOne(){
        return $this->belongsTo('App\GroupOne', 'group_one_id', 'id');
    }

    public function relBranch(){
        return $this->belongsTo('App\Branch', 'branch_id', 'id');
    }

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