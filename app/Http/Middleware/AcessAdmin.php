<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

/**
 * Class AcessAdmin
 * @package App\Http\Middleware
 */
class AcessAdmin
{
    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->hasAnyRole(['admin'])){
            return $next($request);
        }
        return redirect('home');
    }
}
