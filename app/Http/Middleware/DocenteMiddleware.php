<?php

namespace App\Http\Middleware;

use Closure;

class DocenteMiddleware
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

        // if(! auth()->check())
        //     return redirect('login'); //si no esta logeado lo redirijo a login 

        if(auth()->user()->role !=2) //si no es admin lo redirigir a home
            return redirect('/');        
        return $next($request);
    }
}
