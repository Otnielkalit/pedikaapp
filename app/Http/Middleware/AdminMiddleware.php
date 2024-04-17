<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use \Firebase\JWT\JWT;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */


    public function handle(Request $request, Closure $next): Response
    {
        // if ($request->session()->has('user_token')) {
        //     $token = $request->session()->get('user_token');
        //     $tokenPayload = explode('.', $token)[1];
        //     $tokenPayloadDecoded = base64_decode($tokenPayload);
        //     $userData = json_decode($tokenPayloadDecoded, true);
        //     if (isset($userData['role']) && $userData['role'] === 'admin') {
        //         return $next($request);
        //     }
        // }
        // return redirect()->route('user.login');
        return $next($request);
    }
}
