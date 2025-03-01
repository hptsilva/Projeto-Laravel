<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        session_set_cookie_params(1200);
        session_start();
        if(isset($_SESSION['nome']) && $_SESSION['nome'] != ''){
            return $next($request);
        }else{
            return redirect()->route('useraccount.signin');
        }
    }
}
