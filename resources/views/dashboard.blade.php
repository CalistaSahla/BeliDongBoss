@extends('layouts.main')

@section('content')
<section class="py-20 text-center">
    <h1 class="text-3xl font-semibold text-gray-800">
        Selamat datang, {{ Auth::user()->name }}! 👋
    </h1>

    <p class="text-gray-600 mt-4">
        Anda berhasil login ke BeliDongBos.
    </p>

    <a href="{{ route('katalog.index') }}"
       class="mt-6 inline-block bg-primary-yellow text-secondary-navy px-6 py-3 rounded-xl hover:opacity-90">
        Mulai Belanja
    </a>
</section>
@endsection
