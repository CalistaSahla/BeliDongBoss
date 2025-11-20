@extends('layouts.main')

@section('content')

<section class="max-w-7xl mx-auto px-6 md:px-16 py-10">

    <h1 class="text-3xl font-semibold text-gray-800 mb-8">
        Katalog Produk
    </h1>

    {{-- GRID PRODUK --}}
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

        @forelse($products as $product)
            <div class="bg-white shadow-3xl rounded-2xl overflow-hidden hover:shadow-xl transition">
                
                {{-- Thumbnail --}}
                <img src="{{ asset('storage/' . $product->thumbnail) }}"
                     class="h-40 w-full object-cover">

                {{-- Detail --}}
                <div class="p-4">
                    <h2 class="text-lg font-semibold text-gray-800 mb-1">
                        {{ $product->name }}
                    </h2>

                    <p class="text-sm text-gray-500 mb-2">
                        {{ $product->category }} • {{ $product->condition }}
                    </p>

                    <p class="text-xl font-bold text-secondary-navy mb-4">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>

                    <a href="{{ route('produk.detail', $product->id) }}"
                        class="block text-center bg-primary-yellow text-secondary-navy py-2 rounded-xl font-semibold hover:opacity-90 transition">
                        Lihat Detail
                    </a>
                </div>

            </div>
        @empty

            <p class="text-gray-600 text-lg">
                Belum ada produk tersedia.
            </p>

        @endforelse

    </div>

</section>

@endsection
