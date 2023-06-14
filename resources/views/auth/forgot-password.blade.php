<title>Butuh Surat</title>
<link rel="icon" href="{{ asset('favicon.ico') }}">
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="{{ url('/') }}">
                <img src="{{asset('img/logo.svg')}}" alt="Logo Butuh Surat" class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Lupa Password? Tidak Perlu Khawatir. Masukkan email Anda dibawah dan kami akan mengirimkan password reset link ke email Anda untuk mengganti password baru Anda.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button style="background-color: #1976d2;">
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
