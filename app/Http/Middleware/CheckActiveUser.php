<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
use Redirect;

class CheckActiveUser
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
        if (!Auth::user()->isActive())
        {
            Session::flush();
            return Redirect::back()->withErrors(trans('frontend/common.blocked_error_message'));
        }
        return $next($request);
    }
}
