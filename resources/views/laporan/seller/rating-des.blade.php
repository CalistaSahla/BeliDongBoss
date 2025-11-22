@extends('layouts.seller-layout')

@section('content')

<div class="space-y-8">

    <h1 class="text-2xl font-bold text-secondary-navy">
        Laporan Rating (Urutan Rating Tertinggi → Terendah)
    </h1>

    <div class="bg-white rounded-xl shadow overflow-hidden">

        <table class="w-full text-sm">
            <thead class="bg-gray-100 text-secondary-navy font-semibold text-left">
                <tr>
                    <th class="px-6 py-3">Produk</th>
                    <th class="px-6 py-3">Kategori</th>
                    <th class="px-6 py-3">Harga</th>
                    <th class="px-6 py-3">Stok</th>
                    <th class="px-6 py-3">Rating</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($products as $product)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-semibold">{{ $product->name }}</td>
                        <td class="px-6 py-4">{{ $product->category }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($product->price,0,',','.') }}</td>
                        <td class="px-6 py-4">{{ $product->stock }}</td>
                        <td class="px-6 py-4">{{ number_format($product->avg_rating ?? 0, 1) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-6 text-gray-500 text-center">
                            Tidak ada data.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>

    </div>

</div>

@endsection
