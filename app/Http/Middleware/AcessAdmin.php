<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AcessAdmin
{
    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next)
    {
        //Auth::user()->hasAnyRole('admin');
        if(Auth::user()->hasAnyRole(['admin'])){
            return $next($request);
        }
        return redirect('home');
    }
}
