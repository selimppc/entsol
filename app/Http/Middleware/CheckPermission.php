<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  \Optional  $permission
     * @return mixed
     */
    public function handle($request, Closure $next, $permission = null)
    {
        If(!App('Illuminate\Contracts\Auth\Guard')->guest()){

            If($request->user()->can_access($permission)){
                return $next($request);
            }else{
                #return response('Unauthorized.', 401);
                #return $next($permission, 401);

                /*return response([
                    'error' => [
                        'code' => 'INSUFFICIENT_ROLE',
                        'description' => 'You are not authorized to access this resource.'
                    ]
                ], 401);*/
                return response(view('user::layouts.user_access')->render());
            }
        }
        //return redirect()->route('dashboard');
        //return $request->ajax ? response('Unauthorized.', 401) : redirect('dashboard');
    }
}
