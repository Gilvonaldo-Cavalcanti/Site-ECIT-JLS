<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerificarAuth
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
        session_start();
     
        if(!isset($_SESSION['user_logged_in'])){
            return redirect()->route('login');    // Redireciona pra página de login se não autenticado.
        }

        return $next($request);
    }
}
