<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','email','password','auth_key','access_token','csrf_token','ip_address','branch_id','last_visit','role_id','expire_date','status'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    //check permission
    public function can_access($permission = null){

        return !is_null($permission)  && $this->checkPermission($permission);
    }

    //check if the permission matches with any permission user has
    protected function checkPermission($perm){
        $permissions = $this->getAllPermissionFromAllRoles();
        $permissionArray = is_array($perm) ? $perm : [$perm];

        return array_intersect($permissions, $permissionArray);
    }


//Get All permission slugs from all permission of all roles

    protected function getAllPermissionFromAllRoles(){
        $permissionsArray = [];
        $permissions = $this->relRole->load('permissions')->fetch('permissions')->toArray();

        return array_map('strtolower', array_unique(array_flatten(array_map(function($permission){
            return array_pluck($permission, 'route');

        }, $permissions))));
    }

    public function relBranch(){
        return $this->belongsTo('App\Branch', 'branch_id', 'id');
    }
/*This function only used for getting role information*/
    public function relRoleInfo(){
        return $this->belongsTo('App\Role', 'role_id', 'id');
    }

    public function relRole(){
        return $this->belongsToMany('App\Role');
    }
}
