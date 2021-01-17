<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Support\Facades\DB;

class API_KEYAuthenticate
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
        try {
            $api_key = $request->route()->parameters()['api_key'];
            $user = DB::table('users')
                // ->select('api_key','id')
                ->where('api_key', $api_key)
                ->first();

            if ($user->api_key <> $api_key) {
                return response()->json(['status' => 'Middleware active Fail. Token invalid']);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 'Middleware active Fail. Token invalid']);
        }
        return $next($request);
    }
}
