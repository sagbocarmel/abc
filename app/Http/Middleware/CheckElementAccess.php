<?php

namespace App\Http\Middleware;

use Closure;

class CheckElementAccess
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
        $acces = isset($actions['acces']) ? $actions['acces']: null;
        $elementCodes = isset($actions['elts']) ? $actions['elts']: null;
        //hasElement($eta ,$element, $acces)
        if($request->user()->hasAllElementAccess($request->codeEtablissement, $elementCodes ,$acces) || !$acces)
        {
            return $next($request);
        }
        return response()->json(["message"=>"Accès Reffusé"], 401);
    }
}
