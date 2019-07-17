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
     * used to check if user has the admin role
     *
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next)
    {
        $isAdmin = false;
        if (Auth::user()->hasAnyRole(['admin'])) {
            $isAdmin = true;
        }

        if (!$isAdmin) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->back();
            }
        }

        return $next($request);
    }
}
