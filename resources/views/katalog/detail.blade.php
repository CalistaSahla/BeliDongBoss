@extends('layouts.main')

@section('content')

<section class="max-w-6xl mx-auto px-6 md:px-16 py-12">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

        {{-- FOTO PRODUK --}}
        <div>
            <img src="{{ asset('storage/' . $product->thumbnail) }}"
                 class="w-full rounded-2xl shadow-3xl mb-4 object-cover">

            @if($product->images)
                <div class="flex gap-4 mt-4 overflow-x-auto">
                    @foreach($product->images as $img)
                        <img src="{{ asset('storage/' . $img) }}"
                             class="h-24 w-24 object-cover rounded-xl shadow-md">
                    @endforeach
                </div>
            @endif
        </div>


        {{-- DETAIL --}}
        <div>

            <h1 class="text-3xl font-semibold text-gray-800">
                {{ $product->name }}
            </h1>

            <p class="text-lg text-secondary-navy font-bold mt-2">
                Rp {{ number_format($product->price, 0, ',', '.') }}
            </p>

            <p class="text-sm text-gray-500 mt-2">
                {{ $product->category }} • {{ $product->condition }}
            </p>

            <p class="text-sm text-gray-500">
                Stok: {{ $product->stock }}
            </p>

            <p class="text-gray-700 mt-6 leading-relaxed">
                {{ $product->description }}
            </p>

            <div class="mt-8 p-5 bg-white border border-gray-200 rounded-2xl shadow-sm">
                <h2 class="text-lg font-semibold text-gray-800">Informasi Seller</h2>
                <p class="text-gray-600 mt-2">
                    {{ $product->seller->storeName }}
                </p>
            </div>

            <a href="{{ route('katalog.index') }}"
               class="inline-block mt-8 px-6 py-3 bg-primary-yellow text-secondary-navy font-semibold rounded-xl hover:opacity-90 transition">
                ← Kembali ke Katalog
            </a>

        </div>

    </div>

</section>

@endsection
