<x-app-layout>

    {{-- HEADER --}}
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Daftar Menu</h1>
    </x-slot>

    {{-- CONTENT --}}
    <div class="container mx-auto p-7 pt-0 max-w-7xl">
        {{-- SUCCESS ALERT --}}
        @if(session('success'))
            <div class="p-3 bg-emerald-100 text-emerald-700 border border-emerald-200 rounded-lg mt-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">

            {{-- ===== MENU (KIRI) ===== --}}
            <div class="lg:col-span-2 bg-white px-6 rounded-2xl">
                @foreach ($categories as $category)
                    {{-- Category Title --}}
                    <h2 class="text-2xl font-extrabold mb-6 mt-10 
                               bg-gradient-to-r from-gray-900 to-gray-600 bg-clip-text text-transparent">
                        {{ $category->name }}
                    </h2>

                    {{-- Menu Grid --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-7 ">
                        @foreach ($category->menus as $menu)

                                    <div class="bg-white shadow-md rounded-2xl overflow-hidden 
                            border border-transparent
                            hover:border-orange-500 hover:shadow-xl hover:-translate-y-1
                            transition-all duration-300">



                                        {{-- Image --}}
                                        @if ($menu->image)
                                            <div class="h-44 w-full overflow-hidden">
                                                <img src="{{ asset('storage/' . $menu->image) }}"
                                                    class="w-full h-full object-cover hover:scale-105 transition duration-500">
                                            </div>
                                        @endif

                                        {{-- Info --}}
                                        <div class="p-5">

                                            <h3 class="font-semibold text-lg mb-1">{{ $menu->name }}</h3>

                                            <p class="text-gray-500 text-sm mb-3 line-clamp-2">
                                                {{ $menu->description }}
                                            </p>

                                            <p class="font-extrabold text-lg mb-5 text-gray-800">
                                                Rp {{ number_format($menu->price, 0, ',', '.') }}
                                            </p>

                                            {{-- Button --}}
                                            <form action="{{ route('cart.add') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="menu_id" value="{{ $menu->id }}">

                                                <button class="w-full py-3 rounded-xl text-white font-semibold tracking-wide 
                                                                               bg-gradient-to-br from-green-600 to-emerald-700
                                                                               shadow-md hover:shadow-xl
                                                                               hover:-translate-y-1 active:translate-y-0
                                                                               transition-all duration-200">
                                                    + Tambah ke Keranjang
                                                </button>
                                            </form>

                                        </div>
                                    </div>

                        @endforeach
                    </div>

                @endforeach

            </div>


            {{-- ===== KERANJANG (KANAN) ===== --}}
            <div x-data="cartHandler({{ json_encode(session('cart', [])) }})"
                class="cart bg-white rounded-3xl p-10 shadow-[0_20px_40px_rgba(0,0,0,0.1)] sticky top-[100px] h-fit ">

                {{-- HEADER --}}
                <div class="cart-header text-center mb-6">
                    <h2 class="text-2xl font-extrabold mb-2">Keranjang Pesanan</h2>

                    <p class="text-gray-500 text-sm mt-1"
                        x-text="Object.keys(cart).length + ' item • Rp ' + format(total)">
                    </p>
                </div>

                {{-- ITEM LIST --}}
                <div class="cart-items max-h-[400px] overflow-y-auto mb-6">

                    <template x-if="Object.keys(cart).length === 0">
                        <p class="text-gray-400 text-center py-6">Keranjang masih kosong</p>
                    </template>

                    <template x-for="item in Object.values(cart)" :key="item.id">
                        <div class="cart-item flex gap-4 py-5 border-b border-slate-100">

                            <div class="item-info flex-1">
                                <div class="item-name font-semibold text-[18px] mb-1" x-text="item.name"></div>

                                <div class="item-price text-gray-500 text-sm">
                                    Rp <span x-text="format(item.price)"></span>
                                </div>
                            </div>

                            {{-- QTY --}}
                            <div class="quantity-controls flex items-center gap-3 bg-slate-50 px-4 py-2 rounded-full">
                                <button @click="updateQty(item.id, -1)" class="qty-btn w-8 h-8 border-2 border-slate-200 rounded-full 
                               flex items-center justify-center hover:border-[var(--yakizen-yellow)]">
                                    −
                                </button>

                                <span class="qty font-semibold min-w-6 text-center" x-text="item.qty"></span>

                                <button @click="updateQty(item.id, 1)" class="qty-btn w-8 h-8 border-2 border-slate-200 rounded-full 
                               flex items-center justify-center hover:border-[var(--yakizen-yellow)]">
                                    +
                                </button>
                            </div>
                        </div>
                    </template>
                </div>

                {{-- TOTAL --}}
                <div class="cart-total border-t-2 border-slate-200 pt-5">

                    <div
                        class="total-row total flex justify-between text-[20px] font-extrabold text-[var(--yakizen-orange)] mt-3">
                        <span>Total</span>
                        <span>Rp <span x-text="format(total)"></span></span>
                    </div>
                    <a href="{{ route('cart.index') }}" class="w-full block mt-5 py-4 rounded-xl text-white font-bold
          text-center
          bg-gradient-to-br from-green-600 to-emerald-700
          shadow-[0_8px_24px_rgba(5,150,105,0.3)]
          hover:-translate-y-1 hover:shadow-[0_12px_32px_rgba(5,150,105,0.4)]
          transition">
                        Checkout
                    </a>


                </div>
            </div>



        </div>
    </div>


</x-app-layout>

<script>
    function cartHandler(initialCart) {
        return {
            cart: initialCart,
            total: Object.values(initialCart)
                .reduce((t, i) => t + i.price * i.qty, 0),

            format(n) {
                return new Intl.NumberFormat('id-ID').format(n)
            },

            updateQty(id, change) {
                fetch("{{ route('cart.update') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({ menu_id: id, change })
                })
                    .then(res => res.json())
                    .then(data => {
                        this.cart = data.cart
                        this.total = data.total
                    })
            },

            removeItem(id) {
                fetch("{{ route('cart.remove') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({ menu_id: id })
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