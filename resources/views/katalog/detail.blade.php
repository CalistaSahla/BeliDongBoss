@extends('layouts.main')

@section('content')

<section class="max-w-6xl mx-auto px-6 md:px-16 py-12">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
        {{-- ... BAGIAN FOTO & DETAIL PRODUK YANG SUDAH ADA ... --}}
    </div>

    {{-- RATING & ULASAN --}}
    <div class="mt-12 bg-white rounded-2xl shadow-3xl p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">
            Rating & Ulasan
        </h2>

        {{-- Rata-rata rating sederhana --}}
        @php
            $avgRating = $product->reviews->avg('rating');
        @endphp

        @if($product->reviews->count())
            <div class="mb-4">
                <span class="text-xl font-semibold text-secondary-navy">
                    {{ number_format($avgRating, 1) }} / 5
                </span>
                <span class="text-sm text-gray-500">
                    ({{ $product->reviews->count() }} ulasan)
                </span>
            </div>
        @else
            <p class="text-gray-500 mb-4">Belum ada ulasan untuk produk ini.</p>
        @endif

        {{-- Form tambah ulasan (hanya jika login sebagai user) --}}
        @auth
            @if(auth()->user()->role === 'user')
                <form action="{{ route('produk.review.store', $product->id) }}" method="POST" class="mb-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                        <div>
                            <label class="block text-sm font-medium mb-1">Rating</label>
                            <select name="rating" class="border border-gray-300 rounded-xl px-3 py-2 w-full">
                                <option value="5">5 - Sangat Puas</option>
                                <option value="4">4 - Puas</option>
                                <option value="3">3 - Cukup</option>
                                <option value="2">2 - Kurang</option>
                                <option value="1">1 - Buruk</option>
                            </select>
                        </div>
                        <div class="md:col-span-3">
                            <label class="block text-sm font-medium mb-1">Komentar</label>
                            <textarea name="comment" rows="2"
                                      class="w-full border border-gray-300 rounded-xl px-3 py-2"></textarea>
                        </div>
                    </div>
                    <button type="submit"
                            class="mt-3 px-6 py-2 bg-primary-yellow text-secondary-navy font-semibold rounded-xl hover:opacity-90 transition">
                        Kirim Ulasan
                    </button>
                </form>
            @endif
        @endauth

        {{-- Daftar ulasan --}}
        <div class="space-y-4">
            @foreach($product->reviews as $review)
                <div class="border border-gray-200 rounded-xl p-4">
                    <div class="flex items-center justify-between mb-1">
                        <p class="font-semibold text-gray-800">
                            {{ $review->user->name ?? 'User' }}
                        </p>
                        <p class="text-sm text-gray-500">
                            {{ $review->created_at->format('d M Y') }}
                        </p>
                    </div>
                    <p class="text-sm text-yellow-500 mb-1">
                        Rating: {{ $review->rating }} / 5
                    </p>
                    <p class="text-gray-700">
                        {{ $review->comment }}
                    </p>
                </div>
            @endforeach
        </div>

    </div>

</section>

@endsection
