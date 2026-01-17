<x-guest-layout>
    <!-- Header -->
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold">Yakizen</h1>
        <p class="mt-2 text-lg font-semibold">Buat Akun Baru</p>
        <p class="mt-1 text-sm text-gray-600">
            Daftar untuk memesan<br>
            Japanese comfort food favoritmu
        </p>
    </div>

    <!-- Form Register -->
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mb-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full"
                            type="text" name="name"
                            :value="old('name')" required autofocus
                            autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- No Telepon -->
        <div class="mb-4">
            <x-input-label for="no_telp" :value="__('No Telepon')" />
            <x-text-input id="no_telp" class="block mt-1 w-full"
                            type="text" name="no_telp" required />
            <x-input-error :messages="$errors->get('no_telp')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="block mt-1 w-full"
                            type="email" name="email"
                            :value="old('email')" required
                            autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password" name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-6">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password" name="password_confirmation"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Tombol Buat Akun Sekarang -->
        <div>
            <button type="submit"
                    class="w-full py-2 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded">
                Buat Akun Sekarang
            </button>
        </div>
    </form>

    <!-- Footer kecil -->
    <div class="mt-6 text-center text-xs text-gray-500">
        © 2025 Yakizen User Panel
    </div>

    <!-- Link ke Login -->
    <div class="mt-4 text-center text-sm">
        <span>Sudah punya akun?</span>
        <a href="{{ route('login') }}"
            class="text-indigo-600 hover:underline font-medium">
            Masuk sekarang
        </a>
    </div>

</x-guest-layout>
