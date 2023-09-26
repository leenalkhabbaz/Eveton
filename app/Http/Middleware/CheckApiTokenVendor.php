<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckApiTokenVendor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(!empty(trim($request->header('Authorization'))))
        {
          $is_exists = $vendor= auth()->guard('vendor-api')->user();
              if($is_exists){
                       return $next($request);
                            }
        }
          return response()->json('Invalid Token', 401);

    }
}
