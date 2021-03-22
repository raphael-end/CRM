<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->get('usuario') == NULL) {
            return redirect('/login');
        }


        $roles = $roles = array_slice(func_get_args(), 2);
        if(!in_array(session()->get('usuario')['tipo'], $roles)) {
            return redirect()->back();
        }
            
        return $next($request);
    }
}
