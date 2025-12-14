<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('menu.index')
                ->with('error', 'Keranjang kosong.');
        }

        return view('customer.checkout.index', compact('cart'));
    }

    public function store(Request $request, OrderService $orderService)
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('menu.index');
        }

        $orderService->createFromCart(
            $cart,
            auth()->id(),
            session('selected_table')
        );

        session()->forget('cart');

        return redirect()->route('dashboard')
            ->with('success', 'Pesanan berhasil dibuat. Silakan bayar di kasir.');
    }
}
