@extends('layouts.main')

@section('content')
<section class="flex items-center justify-center py-20 px-6">
    <div class="bg-white shadow-3xl rounded-2xl p-10 w-full max-w-md">

        <div class="text-center mb-8">
            <img src="{{ asset('assets/Logo-BDB.png') }}" class="h-16 mx-auto mb-3">
            <h1 class="text-2xl font-semibold text-gray-800">Masuk ke Akun Anda</h1>
        </div>

        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-gray-700 mb-1 font-medium">Email</label>
                <input type="email" name="email" required
                    class="w-full border border-input-border rounded-xl px-4 py-3 focus:ring-primary-yellow focus:border-primary-yellow">
            </div>

            <div>
                <label class="block text-gray-700 mb-1 font-medium">Password</label>
                <input type="password" name="password" required
                    class="w-full border border-input-border rounded-xl px-4 py-3 focus:ring-primary-yellow focus:border-primary-yellow">
            </div>

            <button type="submit"
                class="w-full bg-primary-yellow text-secondary-navy font-semibold py-3 rounded-xl hover:opacity-90 transition">
                Masuk
            </button>
        </form>

        <p class="text-center text-sm text-gray-600 mt-6">
            Belum punya akun? 
            <a href="{{ route('register') }}" class="text-primary-yellow font-medium">Daftar sekarang</a>
        </p>

    </div>
</section>
@endsection
