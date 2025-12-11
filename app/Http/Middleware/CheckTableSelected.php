<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckTableSelected
{
    public function handle(Request $request, Closure $next)
    {
        if (! $request->session()->has('selected_table')) {
            return redirect()->route('tables.index')->with('error', 'Pilih meja terlebih dahulu.');
        }

        return $next($request);
    }
}
