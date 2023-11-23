<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use App\Models\Administrador;
use App\Models\Rol;


class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Session::has('user_id')) {
            $user = User::find(Session::get('user_id'));
            if ($user && $user->rol->nombre === 'administrador') {
                return $next($request);
            }
        }

        return redirect()->route('login');
    }
}
