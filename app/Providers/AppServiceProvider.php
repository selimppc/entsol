<?php

namespace App\Providers;

use App\UserImage;
use Illuminate\Support\ServiceProvider;
use App\Helpers\MenuItems;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\RoleUser;
use App\Permission;
use App\PermissionRole;
use App\User;
use App\MenuPanel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(Schema::hasTable('role_user') && Schema::hasTable('menu_panel')){
            if(!Session::has('sidebar_menu_user')) {
                // Get User ID
                $user_id = 3; //Auth::user()->id;

                //get Role(s)
                $role_list = RoleUser::where('user_id','=',$user_id)
                    ->select('role_user.role_id')
                    ->get()->toArray();


                //routes per role(s)
                $permis_route = Permission::join('permission_role', 'permission_role.permission_id', '=', 'permissions.id')
                    ->whereIn('permission_role.role_id', $role_list)
                    ->select('permissions.route_url')
                    ->get()->toArray();
                //module route
                $arr []=[
                    'route_url'=>'#'
                ];
                // Merge all routes per ROLE(S) and USER ID
                $per_routes = array_merge($permis_route,$arr);

                //Get Menu Lists by PERMISSION (ROLE+USER+Permission)
                $tree = MenuPanel::whereIn('menu_panel.route',$per_routes)->orderBy('menu_order', 'ASC')->get()->toArray();
                $parent = 0;

                $result = MenuItems::menu_tree($tree, $parent);
                #print_r($result); exit;
                // put the menu items in session
                Session::put('sidebar_menu_user', $result);

                /*user-image in session........*/
                if(!Session::has('user_image')){
                    $image_exists = UserImage::where('user_id',$user_id)->exists();
                    if($image_exists){
                        $user_image = UserImage::where('user_id',$user_id)->first()->thumbnail;
                        #print_r($user_image);exit;
                        Session::put('user_image',$user_image);
                    }
                }
            }
        }

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
