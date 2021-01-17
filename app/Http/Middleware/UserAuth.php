<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAuth
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
        // before add any feature inside the middleware go to kernel and add the middle ware
        // now for this before the user go inside the request url have to pass this if function which make if they went to the login page but the user still has the session they will be redirected to the homepage
        // middleware is basically the action that user take at moving from url to other it will have to pass the middleware
        if($request->path()=="login" && $request->session()->has('user'))
        {
            return redirect('/');
        }
        return $next($request);
    }
}
