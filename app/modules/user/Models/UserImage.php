<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 2/16/16
 * Time: 5:05 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class UserImage extends Model
{

    protected $table = 'user_image';

    protected $fillable = [
        'user_id','title','description','image','thumbnail','status'
    ];

    public function relUser(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}