<x-app-layout>
    <div class="min-h-screen flex items-center justify-center bg-[#F5F5F5] py-10">
        <div class="w-full max-w-xl bg-white shadow-md rounded-xl border border-gray-200">

            {{-- Header --}}
            <div class="px-8 pt-8 pb-4 text-center border-b border-gray-200">
                <h1 class="text-2xl font-bold text-gray-900">
                    Pesanan Diterima
                </h1>
                <p class="mt-2 text-l text-gray-600 leading-relaxed max-w-md mx-auto">
                    Pesanan Anda sedang diproses oleh tim dapur. Silakan
                    selesaikan pembayaran di kasir untuk mengkonfirmasi
                    pesanan dine-in Anda.
                </p>
            </div>

            {{-- Item List --}}
            <div class="px-8 py-4">
                @foreach($cart as $item)
                    <div class="flex justify-between py-2 text-sm border-b border-gray-100 last:border-b-0">
                        <span class="text-gray-700">
                            {{ $item['name'] }}
                            <span class="text-gray-500">(x{{ $item['qty'] }})</span>
                        </span>
                        <span class="text-gray-800">
                            Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}
                        </span>
                    </div>
                @endforeach
            </div>

            {{-- Total --}}
            <div class="px-8 py-3 bg-gray-50 border-t border-b border-gray-200 text-sm">
                <div class="flex justify-between font-semibold text-gray-900">
                    <span>Total Bayar</span>
                    <span>
                        Rp {{
                            number_format(
                                collect($cart)->sum(fn($i) => $i['price'] * $i['qty']),
                                0,
                                ',',
                                '.'
                            )
                        }}
                    </span>
                </div>
            </div>

            {{-- Button --}}
            <div class="px-8 py-6">
                <form action="{{ route('order.store') }}" method="POST">
                    @csrf
                    <button
                        class="w-full py-3 text-sm font-semibold text-white rounded
                               bg-gray-500 hover:bg-gray-600 active:bg-gray-700
                               transition-all shadow-sm">
                        Ke Kasir Bayar Tunai
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
