<?php

namespace App\Http\Middleware;

use Closure;

class CheckJwt
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
        if(!$request->header('Authorization')){
            return response()->json([
                                        'code' => 403,
                                        'msg'  => 'Authorization is must!',
                                    ],403);
        }
        return $next($request);
    }
}
