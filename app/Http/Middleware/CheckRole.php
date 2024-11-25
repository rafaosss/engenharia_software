<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        if (Auth::user()->role->nome != $role) {
            return redirect('/')->with('error', 'Você não tem acesso a esta área.');
        }

        return $next($request);
    }
}
