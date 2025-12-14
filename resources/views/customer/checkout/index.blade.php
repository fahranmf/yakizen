<x-app-layout>
    <div class="max-w-7xl px-7 mx-auto mt-10">

        <div class="mb-6">
            {{-- HEADER --}}
            <x-slot name="header">
                <h1 class="text-2xl font-bold tracking-tight text-gray-800">
                    Checkout
                </h1>
            </x-slot>

            <p class="mt-2 text-gray-600 bg-yellow-50 border-l-4 border-yellow-400 p-3 rounded">
                Pembayaran dilakukan <strong class="font-semibold">CASH di kasir</strong>.
            </p>
        </div>

        <div class="bg-white shadow-lg rounded-xl p-6 border border-gray-100">

            {{-- Item List --}}
            @foreach($cart as $item)
                <div class="flex justify-between py-3 border-b border-gray-200">
                    <span class="font-medium text-gray-700">
                        {{ $item['name'] }}
                        <span class="text-gray-500">× {{ $item['qty'] }}</span>
                    </span>

                    <span class="font-semibold text-gray-800">
                        Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}
                    </span>
                </div>
            @endforeach

            {{-- Total --}}
            <div class="flex justify-between font-bold text-xl mt-6 text-gray-900">
                <span>Total</span>
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

            {{-- Button --}}
            <form action="{{ route('order.store') }}" method="POST" class="mt-8">
                @csrf

                <button class="w-full py-4 text-lg font-semibold text-white rounded-lg
           bg-gray-800 hover:bg-gray-700 active:bg-gray-800 
           transition-all shadow-md hover:shadow-lg">
                    Konfirmasi Pesanan
                </button>

            </form>

        </div>

    </div>
</x-app-layout>