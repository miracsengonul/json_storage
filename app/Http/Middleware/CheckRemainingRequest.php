<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class CheckRemainingRequest
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
        $user = User::where('api_key',$request->header('X-API-KEY'))->first();
        if($user->remaining_request > 0)
        {
            $user->remaining_request = $user->remaining_request - 1;
            $user->update();
            return $next($request);
        }else{
            return response()->json('Aylık istek limitiniz dolmuştur !', 500, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
        }
    }
}
