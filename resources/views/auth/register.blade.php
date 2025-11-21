@extends('layouts.main')

@section('content')
<section class="flex items-center justify-center py-20 px-6">
    <div class="bg-white shadow-3xl rounded-2xl p-10 w-full max-w-md">

        <div class="text-center mb-8">
            <img src="{{ asset('assets/BDB-maskotonly.png') }}" class="h-20 mx-auto">
            <h1 class="text-2xl font-semibold text-gray-800 mt-4">Buat Akun Baru</h1>
        </div>

        {{-- ALERT ERROR --}}
        @if ($errors->any())
            <div class="bg-red-500 text-white p-3 rounded-xl mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.process') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-gray-700 mb-1 font-medium">Nama Lengkap</label>
                <input type="text" name="name" required
                    class="w-full border border-input-border rounded-xl px-4 py-3">
            </div>

            <div>
                <label class="block text-gray-700 mb-1 font-medium">Email</label>
                <input type="email" name="email" required
                    class="w-full border border-input-border rounded-xl px-4 py-3">
            </div>

            <div>
                <label class="block text-gray-700 mb-1 font-medium">Password</label>
                <input type="password" name="password" required
                    class="w-full border border-input-border rounded-xl px-4 py-3">
            </div>

            <div>
                <label class="block text-gray-700 mb-1 font-medium">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required
                    class="w-full border border-input-border rounded-xl px-4 py-3">
            </div>

            <button type="submit"
                class="w-full bg-primary-yellow text-secondary-navy font-semibold py-3 rounded-xl hover:opacity-90 transition">
                Daftar
            </button>
        </form>

        <p class="text-center text-sm text-gray-600 mt-6">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-primary-yellow font-medium">Masuk</a>
        </p>

    </div>
</section>
@endsection
