<?php

namespace App\Http\Middleware;

use App\Models\BUserAuth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthExtranetMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('Authorization');

        if (!$token) {
            return response()->json(['state'=>false, 'msg' => 'Unauthorized. Token missing'], 401);
        }
        $userAuth = BUserAuth::where('token', $token)->first();
        $userAuth->user; 
        if (!$userAuth) {
            return response()->json([ 'state'=>false,  'msg' => 'Unauthorized. Invalid token'], 401);
        }

        $request->merge(['user' => $userAuth]);
        return $next($request);

        
    }
}
