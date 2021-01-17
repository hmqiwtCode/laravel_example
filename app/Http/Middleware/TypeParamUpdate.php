<?php

namespace App\Http\Middleware;

use Closure;

class TypeParamUpdate
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
        if($request->name == '' || $request->times == ''){
            return response()->json(['status' => 'Fail', 'reason' => 'Missing Field'],500);
        }
        if(!preg_match("/^[a-zA-Z0-9 ]+$/", $request->name)){
            return response()->json(['status' => 'Fail', 'reason' => 'Name must be String']);
        }

        if(!preg_match("/^[0-9]+$/", $request->times)){
            return response()->json(['status' => 'Fail', 'reason' => 'Times must be Integer']);
        }
        
       return $next($request);
    }
}
