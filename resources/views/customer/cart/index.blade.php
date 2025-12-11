<x-app-layout>
    <div class="max-w-7xl mx-auto px-7 mt-6 pb-7">

        {{-- HEADER --}}
        <x-slot name="header">
            <h1 class="text-2xl font-bold tracking-tight text-gray-800">
                Keranjang Pesanan
            </h1>
        </x-slot>

        {{-- SUCCESS ALERT --}}
        @if(session('success'))
            <div class="p-3 bg-emerald-100 text-emerald-700 border border-emerald-200 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- EMPTY STATE --}}
        @if(empty($cart))
            <div class="text-gray-500 text-center py-10">
                Keranjang masih kosong 
            </div>
        @else

            {{-- LIST ITEM --}}
            <div class="space-y-4">
                @foreach($cart as $item)
                    <div class="flex items-center justify-between bg-white rounded-2xl shadow-sm border border-gray-100 p-4">

                        {{-- IMAGE + NAME --}}
                        <div class="flex items-center gap-4">

                            {{-- IMAGE --}}
                            @if($item['image'])
                                <img src="{{ asset('storage/' . $item['image']) }}"
                                    class="w-20 h-20 rounded-xl object-cover shadow-sm">
                            @else
                                <div class="w-20 h-20 bg-gray-200 rounded-xl"></div>
                            @endif

                            {{-- TEXT --}}
                            <div>
                                <h2 class="font-semibold text-gray-800 text-lg">
                                    {{ $item['name'] }}
                                </h2>

                                <p class="text-gray-500 text-sm mt-1">
                                    Rp {{ number_format($item['price'], 0, ',', '.') }}
                                </p>
                            </div>
                        </div>

                        {{-- ACTIONS --}}
                        <div class="flex items-center gap-3">

                            {{-- UPDATE QTY --}}
                            <form action="{{ route('cart.update') }}" method="POST" class="flex items-center gap-2">
                                @csrf
                                <input type="hidden" name="menu_id" value="{{ $item['id'] }}">

                                <input type="number" name="qty" min="1" value="{{ $item['qty'] }}"
                                    class="w-16 border border-gray-300 rounded-lg p-1 text-center focus:ring-0 focus:border-gray-400">

                                <button class="px-3 py-1.5 rounded-lg bg-gray-800 text-white text-sm hover:bg-black transition">
                                    Update
                                </button>
                            </form>

                            {{-- REMOVE --}}
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" name="menu_id" value="{{ $item['id'] }}">

                                <button
                                    class="px-3 py-1.5 rounded-lg bg-rose-500 text-white text-sm hover:bg-rose-600 transition">
                                    Hapus
                                </button>
                            </form>
                        </div>

                    </div>
                @endforeach
            </div>

            {{-- CHECKOUT BUTTON --}}
            <div class="mt-8">
                <a href="{{ route('order.checkout') }}"
                    class="bg-gray-900 hover:bg-black text-white text-center block px-4 py-3 rounded-xl shadow-sm transition font-medium">
                    Lanjut Checkout →
                </a>
            </div>

        @endif

    </div>
</x-app-layout>