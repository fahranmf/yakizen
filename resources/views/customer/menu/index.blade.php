<x-app-layout>

    {{-- HEADER --}}
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Daftar Menu</h1>
    </x-slot>

    {{-- CONTENT --}}
    <div class="container mx-auto Pesanan Saya p-7 min-w-full pt-0">

        {{-- ALERT --}}
        @if (session('success'))
            <div class="mt-4 rounded-lg border border-emerald-200 bg-emerald-100 p-3 text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-3">

            {{-- ================= MENU ================= --}}
            <div
                x-data="{ activeCategory: 'all' }"
                class="lg:col-span-2 rounded-2xl bg-white px-6 pb-10"
            >

                {{-- CATEGORY FILTER --}}
                <div class="mb-10 mt-6 flex flex-wrap gap-3">
                    <button
                        @click="activeCategory = 'all'"
                        :class="activeCategory === 'all'
                            ? 'bg-orange-500 text-white'
                            : 'bg-slate-100 text-slate-700'"
                        class="rounded-full px-5 py-2 font-semibold transition"
                    >
                        Semua
                    </button>

                    @foreach ($categories as $category)
                        <button
                            @click="activeCategory = '{{ $category->id }}'"
                            :class="activeCategory === '{{ $category->id }}'
                                ? 'bg-orange-500 text-white'
                                : 'bg-slate-100 text-slate-700'"
                            class="rounded-full px-5 py-2 font-semibold transition"
                        >
                            {{ $category->name }}
                        </button>
                    @endforeach
                </div>

                {{-- CATEGORY LOOP --}}
                @foreach ($categories as $category)
                    <template
                        x-if="activeCategory === 'all' || activeCategory == '{{ $category->id }}'"
                    >
                        <div>

                            {{-- CATEGORY TITLE --}}
                            <h2 class="mb-6 mt-10 text-2xl font-extrabold
                                bg-gradient-to-r from-gray-900 to-gray-600
                                bg-clip-text text-transparent">
                                {{ $category->name }}
                            </h2>

                            {{-- MENU GRID --}}
                            <div class="grid grid-cols-1 gap-7 sm:grid-cols-2 md:grid-cols-3">

                                @foreach ($category->menus as $menu)
                                    <div
                                        class="overflow-hidden rounded-2xl border
                                        bg-white shadow-md transition-all duration-300
                                        hover:-translate-y-1 hover:border-orange-500 hover:shadow-xl"
                                    >

                                        {{-- IMAGE --}}
                                        @if ($menu->image)
                                            <div class="h-44 w-full overflow-hidden">
                                                <img
                                                    src="{{ asset('storage/' . $menu->image) }}"
                                                    alt="{{ $menu->name }}"
                                                    class="h-full w-full object-cover transition duration-500 hover:scale-105"
                                                >
                                            </div>
                                        @endif

                                        {{-- INFO --}}
                                        <div class="p-5">
                                            <h3 class="mb-1 text-lg font-semibold">
                                                {{ $menu->name }}
                                            </h3>

                                            <p class="mb-3 line-clamp-2 text-sm text-gray-500">
                                                {{ $menu->description }}
                                            </p>

                                            <p class="mb-5 text-lg font-extrabold text-gray-800">
                                                Rp {{ number_format($menu->price, 0, ',', '.') }}
                                            </p>

                                            {{-- ADD TO CART --}}
                                            <button
                                                @click.prevent="
                                                    window.dispatchEvent(
                                                        new CustomEvent('add-to-cart', {
                                                            detail: {{ $menu->id }}
                                                        })
                                                    )
                                                "
                                                class="w-full rounded-xl bg-gradient-to-br
                                                from-green-600 to-emerald-700 py-3
                                                font-semibold text-white shadow-md
                                                transition hover:shadow-xl"
                                            >
                                                + Tambah ke Keranjang
                                            </button>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </template>
                @endforeach
            </div>

            {{-- ================= CART ================= --}}
            <div
                x-data="cartHandler({{ json_encode(session('cart', [])) }})"
                class="sticky top-5 h-fit rounded-3xl bg-white p-10
                shadow-[0_20px_40px_rgba(0,0,0,0.1)]"
            >

                {{-- CART HEADER --}}
                <div class="mb-6 text-center">
                    <h2 class="mb-2 text-2xl font-extrabold">Keranjang Pesanan</h2>
                    <p
                        class="text-sm text-gray-500"
                        x-text="Object.keys(cart).length + ' item • Rp ' + format(total)"
                    ></p>
                </div>

                {{-- CART ITEMS --}}
                <div class="mb-6 max-h-[400px] overflow-y-auto">

                    <template x-if="Object.keys(cart).length === 0">
                        <p class="py-6 text-center text-gray-400">
                            Keranjang masih kosong
                        </p>
                    </template>

                    <template x-for="item in Object.values(cart)" :key="item.id">
                        <div class="flex gap-4 border-b border-slate-100 py-5">

                            <div class="flex-1">
                                <div
                                    class="mb-1 text-[18px] font-semibold"
                                    x-text="item.name"
                                ></div>
                                <div class="text-sm text-gray-500">
                                    Rp <span x-text="format(item.price)"></span>
                                </div>
                            </div>

                            {{-- QTY --}}
                            <div
                                class="flex items-center gap-3 rounded-full
                                bg-slate-50 px-4 py-2"
                            >
                                <button
                                    @click="updateQty(item.id, -1)"
                                    class="flex h-8 w-8 items-center
                                    justify-center rounded-full
                                    border-2 border-slate-200 hover:border-orange-400"
                                >-</button>

                                <span
                                    class="min-w-6 text-center font-semibold"
                                    x-text="item.qty"
                                ></span>

                                <button
                                    @click="updateQty(item.id, 1)"
                                    class="flex h-8 w-8 items-center
                                    justify-center rounded-full
                                    border-2 border-slate-200 hover:border-orange-400"
                                >+</button>
                            </div>
                        </div>
                    </template>
                </div>

                {{-- TOTAL --}}
                <div class="border-t-2 border-slate-200 pt-5">
                    <div
                        class="mt-3 flex justify-between
                        text-[20px] font-extrabold text-orange-500"
                    >
                        <span>Total</span>
                        <span>Rp <span x-text="format(total)"></span></span>
                    </div>

                    <a
                        href="{{ route('cart.index') }}"
                        class="mt-5 block w-full rounded-xl
                        bg-gradient-to-br from-green-600 to-emerald-700
                        py-4 text-center font-bold text-white
                        shadow-[0_8px_24px_rgba(5,150,105,0.3)]
                        transition hover:-translate-y-1
                        hover:shadow-[0_12px_32px_rgba(5,150,105,0.4)]"
                    >
                        Checkout
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

{{-- ================= CART SCRIPT ================= --}}
<script>
    function cartHandler(initialCart) {
        return {
            cart: initialCart,
            total: Object.values(initialCart).reduce(
                (t, i) => t + i.price * i.qty, 0
            ),

            init() {
                window.addEventListener('add-to-cart', e => {
                    this.addToCart(e.detail)
                })
            },

            format(n) {
                return new Intl.NumberFormat('id-ID').format(n)
            },

            addToCart(id) {
                this.request("{{ route('cart.add') }}", { menu_id: id })
            },

            updateQty(id, change) {
                this.request("{{ route('cart.update') }}", { menu_id: id, change })
            },

            request(url, payload) {
                fetch(url, {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(payload)
                })
                .then(res => res.json())
                .then(data => {
                    this.cart = data.cart
                    this.total = data.total
                })
            }
        }
    }
</script>
