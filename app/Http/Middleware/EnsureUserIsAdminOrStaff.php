<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAdminOrStaff
{
    public function handle(Request $request, Closure $next)
    {
        // kalau belum login, biarkan guard default handle (Filament redirect ke login)
        if (!Auth::check()) {
            return $next($request);
        }

        $user = Auth::user();

        // kalau sudah login tapi bukan admin/staff → redirect ke home
        if (!in_array($user->role, ['admin', 'staff'])) {
            return redirect('/login'); // atau bisa ke login lagi
        }

        return $next($request);
    }
}
