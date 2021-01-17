<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Token;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Illuminate\Session\TokenMismatchException;

class JWTAuthenticate
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
            $rawToken = $_COOKIE['token'];
            $token = new Token($rawToken);
            $payload = JWTAuth::decode($token);
            $request->uID = $payload['sub'];
        } catch (\Exception $e) {
            if ($e instanceof TokenExpiredException) {}
            return redirect('/');
        }
        return $next($request);
    }
}
