<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CekRole
{
    /**
     * Handle an incoming request.
     * $role adalah parameter dinamis yang akan kita kirim dari Route
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        if (!in_array(Auth::user()->role, $roles)) {
            abort(403, 'Akses Ditolak! Anda tidak memiliki izin untuk membuka halaman ini.');
        }

        return $next($request);
    }
}
