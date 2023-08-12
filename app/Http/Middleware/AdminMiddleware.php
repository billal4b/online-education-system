<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        if ($request->user() && $request->user()->is_admin != 1)
        {
            //return new Response(view('unauthorized')->with('role', 'ADMIN'));
            return redirect('/login')->with('error',"You don't have admin access");

        }
            return $next($request);
    }

}