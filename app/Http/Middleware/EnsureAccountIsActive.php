<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAccountIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
     public function handle(Request $request, Closure $next): Response
       {
           // Verifie si l'utilisateur a un compte actif
           if (auth()->check() && !auth()->user()->is_active) {
               return redirect('/')->with('error', 'Votre compte est desactive.');
           }

           // Passe la requete au prochain middleware / controller
           return $next($request);
       }
}
