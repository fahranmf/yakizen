<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index()
    {
        if (session()->has('selected_table')) {
            return redirect()->route('dashboard')->with('info', 'Kamu sudah memilih meja.');
        }

        $tables = Table::orderBy('id')->get();
        return view('customer.tables.index', compact('tables'));
    }

    public function choose(Request $request)
    {
        $request->validate([
            'table_id' => 'required|exists:tables,id',
        ]);

        $table = Table::findOrFail($request->table_id);

        if (!$table->reserve()) {
            return back()->with('error', 'Maaf, meja tersebut sudah diambil. Silakan pilih meja lain.');
        }

        session(['selected_table' => $table->id]);

        return redirect()->route('dashboard')->with('success', 'Meja berhasil dipilih. Selamat memesan!');
    }
}
