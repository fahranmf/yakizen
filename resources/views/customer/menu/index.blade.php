<x-app-layout>

    {{-- HEADER --}}
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Daftar Menu</h1>
    </x-slot>

    {{-- CONTENT --}}
    <div class="container mx-auto p-7 pt-0 max-w-7xl">
                {{-- SUCCESS ALERT --}}
        @if(session('success'))
            <div class="p-3 bg-emerald-100 text-emerald-700 border border-emerald-200 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif


        {{-- Loop Kategori --}}
        @foreach ($categories as $category)

            {{-- Nama Kategori --}}
            <h2 class="text-xl font-semibold mb-3 mt-7">
                {{ $category->name }}
            </h2>

            {{-- Grid Menu --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

                @foreach ($category->menus as $menu)

                    <div class="bg-white shadow rounded-lg overflow-hidden">

                        {{-- Gambar Menu --}}
                        @if ($menu->image)
                            <img
                                src="{{ asset('storage/' . $menu->image) }}"
                                class="w-full h-40 object-cover"
                                alt="{{ $menu->name }}"
                            >
                        @else
                            <div class="w-full h-40 bg-gray-200"></div>
                        @endif

                        {{-- Isi Card --}}
                        <div class="p-4">

                            <h3 class="font-bold text-lg">
                                {{ $menu->name }}
                            </h3>

                            <p class="text-gray-600 text-sm mb-2">
                                {{ $menu->description }}
                            </p>

                            <p class="font-semibold mb-4">
                                Rp {{ number_format($menu->price, 0, ',', '.') }}
                            </p>

                            {{-- Form Tambah ke Keranjang --}}
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="menu_id" value="{{ $menu->id }}">

                                <button
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded w-full"
                                >
                                    Tambah ke Keranjang
                                </button>
                            </form>

                        </div>
                    </div>

                @endforeach

            </div>

        @endforeach

    </div>

</x-app-layout>
