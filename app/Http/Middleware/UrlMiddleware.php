<?php

namespace App\Http\Middleware;

use Closure;

class UrlMiddleware
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
        if ($request->user() && $request->user()->status != 'active')
        {
            //return new Response(view('unauthorized')->with('role', 'ADMIN'));
            return redirect('/login')->with('error',"You don't have admin access");

        }
        return $next($request);
    }
}
