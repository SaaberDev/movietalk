<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param array $roles
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        foreach($roles as $role) {
            /*dd($role);*/
            // Check if user has the role This check will depend on how your roles are set up
            if(is_null($user)){
                abort(401);
            }
            elseif($user->hasRole($role))
                return $next($request);
        }

        if ((new \Illuminate\Http\Request)->isMethod('get')) {
            abort(401);
        }
        elseif((new \Illuminate\Http\Request)->isMethod('post')) {
            return redirect('index');
        }
        return $next($request);
    }
}
