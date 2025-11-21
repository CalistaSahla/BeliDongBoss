@extends('layouts.main')

@section('content')

<section class="max-w-7xl mx-auto px-6 md:px-16 py-10">

    <h1 class="text-3xl font-semibold text-gray-800 mb-6">
        Katalog Produk
    </h1>

    {{-- FILTER & SEARCH --}}
    <form method="GET" action="{{ route('katalog.index') }}" class="mb-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

            <input type="text" name="product_name"
                   value="{{ $filters['product_name'] ?? '' }}"
                   placeholder="Cari nama produk"
                   class="border border-gray-300 rounded-xl px-4 py-3 w-full">

            <input type="text" name="store_name"
                   value="{{ $filters['store_name'] ?? '' }}"
                   placeholder="Cari nama toko"
                   class="border border-gray-300 rounded-xl px-4 py-3 w-full">

            <input type="text" name="category"
                   value="{{ $filters['category'] ?? '' }}"
                   placeholder="Kategori"
                   class="border border-gray-300 rounded-xl px-4 py-3 w-full">

            <div class="flex gap-2">
                <input type="text" name="city"
                       value="{{ $filters['city'] ?? '' }}"
                       placeholder="Kota"
                       class="border border-gray-300 rounded-xl px-4 py-3 w-full">

                <input type="text" name="province"
                       value="{{ $filters['province'] ?? '' }}"
                       placeholder="Provinsi"
                       class="border border-gray-300 rounded-xl px-4 py-3 w-full">
            </div>
        </div>

        <div class="flex gap-3 mt-4">
            <button type="submit"
                    class="px-6 py-2 bg-primary-yellow text-secondary-navy font-semibold rounded-xl hover:opacity-90 transition">
                Terapkan Filter
            </button>

            <a href="{{ route('katalog.index') }}"
               class="px-4 py-2 border border-gray-300 rounded-xl text-gray-700 hover:bg-gray-100 transition">
                Reset
            </a>
        </div>
    </form>

    {{-- GRID PRODUK --}}
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @forelse($products as $product)
            <div class="bg-white shadow-3xl rounded-2xl overflow-hidden hover:shadow-xl transition">
                <img src="{{ asset('storage/' . $product->thumbnail) }}"
                     class="h-40 w-full object-cover">

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
                Produk tidak ditemukan dengan filter tersebut.
            </p>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $products->withQueryString()->links() }}
    </div>

</section>

@endsection
