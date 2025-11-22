@extends('layouts.main')

@section('title', $product->name)

@section('content')

<div class="max-w-7xl mx-auto px-6 py-10">

    {{-- BACK BUTTON --}}
    <a href="{{ route('katalog.index') }}" class="text-sm text-gray-600 hover:text-[#061A33] flex items-center gap-2 mb-6">
        <i class="fas fa-chevron-left text-xs"></i> Kembali ke Katalog
    </a>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

        {{-- LEFT: IMAGE --}}
        <div class="bg-white rounded-2xl shadow p-4 flex items-center justify-center">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}"
                     class="w-full max-h-[500px] object-cover rounded-xl">
            @else
                <img src="{{ asset('assets/no-image.png') }}" class="w-full max-h-[500px] object-contain opacity-60">
            @endif
        </div>

        {{-- RIGHT: DETAILS --}}
        <div>
            <h1 class="text-3xl font-bold text-[#061A33] mb-3">
                {{ $product->name }}
            </h1>

            <div class="flex items-center gap-3 mb-4">
                <span class="text-[#FFD600] text-xl font-bold">⭐ {{ number_format($avgRating, 1) }}</span>
                <span class="text-sm text-gray-500">({{ $reviews->count() }} ulasan)</span>
            </div>

            <p class="text-2xl font-bold text-[#FFD600] mb-6">
                Rp {{ number_format($product->price, 0, ',', '.') }}
            </p>

            <p class="text-sm text-gray-600 mb-6">
                Stok tersedia: <span class="font-semibold">{{ $product->stock }}</span>
            </p>

            <h3 class="text-lg font-bold text-[#061A33] mb-2">Deskripsi Produk</h3>
            <p class="text-sm text-gray-700 leading-relaxed mb-10">
                {{ $product->description }}
            </p>
        </div>
    </div>


    {{-- REVIEW SECTION --}}
    <div class="mt-16">

        <h2 class="text-xl font-bold text-[#061A33] mb-6">Ulasan Pembeli</h2>

        {{-- REVIEW LIST --}}
        @if($reviews->count())
            <div class="space-y-5 mb-10">
                @foreach($reviews as $review)
                    <div class="bg-white rounded-xl shadow p-5">
                        <div class="flex justify-between items-center mb-2">
                            <p class="font-semibold text-[#061A33]">{{ $review->name }}</p>
                            <span class="text-[#FFD600] font-bold text-sm">⭐ {{ $review->rating }}</span>
                        </div>
                        <p class="text-gray-600 text-sm">{{ $review->comment }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-sm text-gray-500 mb-10">Belum ada ulasan.</p>
        @endif


        {{-- FORM REVIEW (sesuai SRS: bebas tanpa login) --}}
        <div class="bg-white rounded-2xl shadow p-6">
            <h3 class="text-lg font-bold text-[#061A33] mb-4">Kirim Ulasan</h3>

            <form method="POST" action="{{ route('produk.review.store', $product->id) }}" class="space-y-4">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <input type="text" name="name" required placeholder="Nama"
                           class="border rounded-lg px-4 py-2 text-sm">
                    <input type="email" name="email" required placeholder="Email"
                           class="border rounded-lg px-4 py-2 text-sm">
                    <input type="text" name="phone" required placeholder="Nomor HP"
                           class="border rounded-lg px-4 py-2 text-sm">
                </div>

                <div>
                    <select name="rating" required
                            class="border rounded-lg px-4 py-2 text-sm w-full">
                        <option value="">Pilih Rating</option>
                        <option value="5">⭐ 5 - Sangat Puas</option>
                        <option value="4">⭐ 4 - Puas</option>
                        <option value="3">⭐ 3 - Cukup</option>
                        <option value="2">⭐ 2 - Kurang</option>
                        <option value="1">⭐ 1 - Buruk</option>
                    </select>
                </div>

                <textarea name="comment" rows="4" placeholder="Tulis ulasan..."
                          class="border rounded-lg px-4 py-3 text-sm w-full"></textarea>

                <button
                    class="px-6 py-3 bg-[#FFD600] text-[#061A33] font-bold rounded-full hover:opacity-90 transition">
                    Kirim Ulasan
                </button>
            </form>
        </div>

    </div>

</div>

@endsection
