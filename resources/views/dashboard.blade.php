<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pesanan Saya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                {{-- Info Meja --}}
                <p class="px-6 py-3 text-gray-900">
                    No. Meja kamu :
                    <span class="font-semibold">{{ session('selected_table') }}</span>
                </p>

                {{-- Daftar Order Hari Ini --}}
                @if($ordersToday->isEmpty())
                    <p class="px-6 py-4 text-gray-500">Belum ada order hari ini.</p>
                @else
                    <div class="px-6 py-4 overflow-x-auto">
                        <table class="min-w-full border border-gray-200 text-sm">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 border">Order ID</th>
                                    <th class="px-4 py-2 border">Pesanan</th>
                                    <th class="px-4 py-2 border">Total</th>
                                    <th class="px-4 py-2 border">Status</th>
                                    <th class="px-4 py-2 border">Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ordersToday as $order)
                                    <tr>
                                        <td class="px-4 py-2 border font-semibold text-center align-middle">
                                            #{{ $order->id }}
                                        </td>

                                        {{-- MENU + QTY --}}
                                        <td class="px-4 py-2 border text-center align-middle">
                                            <ul class="list-disc ml-4">
                                                @foreach($order->items as $item)
                                                    <li>
                                                        {{ $item->menu->name }} ({{ $item->quantity }})
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>

                                        <td class="px-4 py-2 border font-semibold text-center align-middle">
                                            Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                        </td>

                                        {{-- STATUS --}}
                                        <td class="px-4 py-2 border text-center align-middle">
                                            <span class="px-3 py-1 rounded text-white text-xs
                                                                {{ $order->status === 'pending' ? 'bg-yellow-500' : '' }}
                                                                {{ $order->status === 'diproses' ? 'bg-blue-500' : '' }}
                                                                {{ $order->status === 'selesai' ? 'bg-green-600' : '' }}">
                                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-2 border text-gray-500 text-center align-middle">
                                            {{ $order->created_at->format('H:i') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                @endif



            </div>
        </div>
    </div>
</x-app-layout>
