<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $ordersToday = Order::with(['items.menu'])
            ->where('user_id', auth()->id())
            ->whereDate('created_at', today())
            ->latest()
            ->get();

        return view('dashboard', compact('ordersToday'));
    }
}
