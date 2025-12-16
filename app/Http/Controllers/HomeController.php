<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kritik;

class HomeController extends Controller
{
    public function index()
    {
        return view('customer.home');
    }

    public function storeKritik(Request $request)
    {
        $request->validate([
            'pesan' => 'required|max:200',
        ]);

        Kritik::create([
            'user_id' => auth()->id(),
            'pesan' => $request->pesan,
        ]);

        return redirect()->back()->with('success_kritik', 'Terima kasih atas kritik & sarannya 🙏');
    }
}
