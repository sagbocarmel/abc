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
    public function handle($request, Closure $next){
        if($request->user() == null)
        {
            return response('Accès Reffusé', 401);
        }
        $actions = $request->route()->getAction();
        $roles = isset($actions['roles']) ? $actions['roles']: null;

        if($request->user()->hasAnyPermissions($roles, $request->codeEtablissement) || !$roles)
        {
            return $next($request);
        }
        return response()->json(["message"=>"Accès Reffusé"], 401);
    }
}
