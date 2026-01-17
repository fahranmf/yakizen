<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

     <!-- Header -->

<div class="text-center mb-8">
                <h1 class="text-3xl font-bold">Yakizen</h1>
                <p class="mt-2 text-lg font-semibold">Selamat Datang</p>
                <p class="mt-1 text-sm text-gray-600">
                    Masuk untuk memesan<br>
                    Japanese comfort food favoritmu
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <!-- Form Login -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email Address')" />
                    <x-text-input id="email" class="block mt-1 w-full"
                                  type="email" name="email"
                                  :value="old('email')" required autofocus
                                  autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full"
                                  type="password" name="password"
                                  required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center mb-6">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                               class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                               name="remember">
                        <span class="ms-2 text-sm text-gray-600">
                            {{ __('Remember me') }}
                        </span>
                    </label>
                </div>

                <!-- Tombol Sign In -->
                <div>
                    <button type="submit"
                            class="w-full py-2 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded">
                        Sign In
                    </button>
                </div>
            </form>

            <!-- Footer kecil di bawah form -->
            <div class="mt-6 text-center text-xs text-gray-500">
                © 2025 Yakizen User Panel
            </div>

            <!-- Link Daftar Sekarang -->
            <div class="mt-4 text-center text-sm">
                <span>Belum punya akun?</span>
                <a href="{{ route('register') }}"
                   class="text-indigo-600 hover:underline font-medium">
                    Daftar sekarang
                </a>
            </div>
</x-guest-layout>
