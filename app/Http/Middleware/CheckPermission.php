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
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->user() == null)
        {
            return response('Accès Reffusé', 401);
        }
        $actions = $request->route()->getAction();
        $permissions = isset($actions['permissions']) ? $actions['permissions']: null;

        if($request->user()->hasAnyPermissions($permissions) || !$permissions)
        {
            return $next($request);
        }
        return response('Accès Reffusé', 401);
    }
}
