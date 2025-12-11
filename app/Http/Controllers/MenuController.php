<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        // pastikan user sudah pilih meja (harusnya sudah dilindungi middleware)
        if (! session()->has('selected_table')) {
            return redirect()->route('tables.index')
                ->with('error', 'Silakan pilih meja terlebih dahulu.');
        }

        // Ambil semua kategori
        $categories = Category::with('menus')->get();

        // Ambil semua menu (opsional kalau mau search/filter)
        $menus = Menu::with('category')->orderBy('category_id')->get();

        return view('customer.menu.index', compact('categories', 'menus'));
    }
}
