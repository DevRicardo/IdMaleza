<?php

namespace App\Http\Middleware;

use App\Cultivo;
use Closure;

class CultivoMiddleware
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

        $cultivo = Cultivo::where("estado_cultivo",1)->get();
        $id = "";
        foreach($cultivo AS $valor){
            $id = $valor->id;
        }

        if(!empty($id)){
            return redirect("/errorcultivo");
        }



        return $next($request);
    }
}
