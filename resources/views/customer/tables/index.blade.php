<x-app-layout>
<div class="container mx-auto p-6 max-w-7xl">

    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-800">Pilih Meja</h1>
    </x-slot>

    @if(session('error'))
        <div class="bg-red-100 border border-red-300 text-red-800 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @foreach ($tables as $table)
            <form action="{{ route('tables.choose') }}" method="POST">
                @csrf
                <input type="hidden" name="table_id" value="{{ $table->id }}">

                @php
                    $isAvailable = $table->status === 'available';
                @endphp

                <button type="submit"
                    {{ !$isAvailable ? 'disabled' : '' }}
                    class="
                        w-full p-5 rounded-xl border shadow-sm transition
                        text-left
                        {{ $isAvailable 
                            ? 'bg-white hover:shadow-md hover:border-green-400' 
                            : 'bg-gray-200 cursor-not-allowed opacity-70 border-gray-300' 
                        }}
                    ">

                    <div class="flex items-center justify-between">

                        {{-- Info --}}
                        <div>
                            <div class="text-xl font-bold mb-1">
                                Meja {{ $table->table_number }}
                            </div>

                            <div class="text-sm text-gray-600">
                                {{ ucfirst($table->status) }}
                            </div>
                        </div>

                        {{-- Status Badge --}}
                        <div>
                            @if($isAvailable)
                                <span class="px-3 py-1 rounded-full bg-green-100 text-green-800 text-xs font-semibold shadow-sm">
                                    AVAILABLE
                                </span>
                            @else
                                <span class="px-3 py-1 rounded-full bg-red-100 text-red-800 text-xs font-semibold shadow-sm">
                                    RESERVED
                                </span>
                            @endif
                        </div>

                    </div>

                </button>
            </form>
        @endforeach
    </div>

</div>
</x-app-layout>
