<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    // Untuk CheckRole agar bisa diakses sesuai role yang diinginkan
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if(auth()->check() && auth()->user()->role !== $role) {
            abort(403, "Kamu tidak memeiliki akses ke halaman ini.");
        }
        return $next($request);
    }
}
