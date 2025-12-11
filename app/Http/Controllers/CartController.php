<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        return view('customer.cart.index', compact('cart'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
        ]);

        $menu = Menu::find($request->menu_id);

        $cart = session()->get('cart', []);

        // Kalau produk sudah ada → qty++
        if (isset($cart[$menu->id])) {
            $cart[$menu->id]['qty'] += 1;
        } else {
            // Add baru
            $cart[$menu->id] = [
                'id' => $menu->id,
                'name' => $menu->name,
                'price' => $menu->price,
                'qty' => 1,
                'image' => $menu->image,
            ];
        }

        session(['cart' => $cart]);

        return back()->with('success', "{$menu->name} ditambahkan ke keranjang!");
    }

    public function update(Request $request)
    {
        $request->validate([
            'menu_id' => 'required',
            'qty' => 'required|integer|min:1',
        ]);

        $cart = session('cart', []);

        if (isset($cart[$request->menu_id])) {
            $cart[$request->menu_id]['qty'] = $request->qty;
            session(['cart' => $cart]);
        }

        return back()->with('success', 'Keranjang diperbarui.');
    }

    public function remove(Request $request)
    {
        $cart = session('cart', []);

        if (isset($cart[$request->menu_id])) {
            unset($cart[$request->menu_id]);
            session(['cart' => $cart]);
        }

        return back()->with('success', 'Item dihapus dari keranjang.');
    }
}
