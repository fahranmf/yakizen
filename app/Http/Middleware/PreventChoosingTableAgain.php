<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventChoosingTableAgain
{
    public function handle(Request $request, Closure $next)
    {
        // kalau user sudah punya meja di session:
        if (session()->has('selected_table')) {
            return redirect()
                ->route('dashboard')
                ->with('info', 'Kamu sudah memilih meja. Tidak bisa memilih lagi.');
        }

        return $next($request);
    }
}
