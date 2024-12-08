<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna login dan memiliki peran admin
        if (Auth::check() && Auth::user()->is_admin == 1) {
            return $next($request); // Lanjutkan ke controller/rute berikutnya
        }

        // Jika bukan admin, redirect ke halaman beranda atau error
        return redirect('/')->with('error', 'You do not have access to this page.');
    }
}
