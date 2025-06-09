<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NaoEstaLogado
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(!session('usuario.nome')) {
            return redirect(route('admin-login'))->with('loginError', 'Você deve estar autenticado.');
        }

        return $next($request);
    }
}
