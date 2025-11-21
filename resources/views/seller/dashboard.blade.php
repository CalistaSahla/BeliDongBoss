@extends('layouts.main')

@section('content')
<section class="py-10">
    <h1 class="text-2xl font-semibold mb-6">Dashboard Penjual</h1>

    <div class="bg-white p-6 rounded-xl shadow">
        <p class="text-gray-700">
            Selamat datang, {{ Auth::user()->name }}!  
            Ini adalah dashboard khusus penjual.
        </p>
    </div>
</section>
@endsection
