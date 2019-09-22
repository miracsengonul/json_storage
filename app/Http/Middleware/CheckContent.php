<?php

namespace App\Http\Middleware;

use Closure;

class CheckContent
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
        if(is_array(json_decode($request->getContent(), true)) && (json_last_error() == JSON_ERROR_NONE))
        {
            return $next($request);
        }
            return response()->json('Lütfen JSON isteğinde bulununun.',404, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
    }
}
