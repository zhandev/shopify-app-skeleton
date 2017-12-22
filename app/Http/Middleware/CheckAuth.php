<?php

namespace App\Http\Middleware;

use Closure;

class CheckAuth
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
        $isShopAuth = empty($request->session()->get('shop_auth'));
        $isTokenAuth = empty($request->session()->get('token_auth'));

        if($isShopAuth && $isTokenAuth) {

            return redirect('/')->with('status', 'Please log in!');

        }
        return $next($request);
    }
}
