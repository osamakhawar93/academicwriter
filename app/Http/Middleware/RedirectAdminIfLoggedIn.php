<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class RedirectAdminIfLoggedIn
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
        if(Session::has('admin')){
            return redirect('admin/dashboard');
        }
        
        return $next($request);
    }
}
