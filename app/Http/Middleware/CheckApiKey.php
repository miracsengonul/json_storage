<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class CheckApiKey
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
        if($request->header('X-API-KEY'))
        {
            $getUserName = $request->route('username');
            $checkUser = User::where('username',$getUserName)->first();
            $user_api_key = $checkUser->api_key ?? null;
            if($request->header('X-API-KEY') == $user_api_key)
            {
                return $next($request);
            }
        }
          return response()->json('Not a valid API request.',404);
    }
}
