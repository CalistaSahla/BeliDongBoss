@extends('layouts.admin-layout')

@section('content')

<div class="space-y-8">

    <h1 class="text-2xl font-bold text-secondary-navy">
        Laporan Produk & Rating (Tertinggi → Terendah)
    </h1>

    <div class="bg-white rounded-xl shadow overflow-hidden">

        <table class="w-full text-sm">
            <thead class="bg-gray-100 text-secondary-navy font-semibold text-left">
                <tr>
                    <th class="px-6 py-3">Nama Produk</th>
                    <th class="px-6 py-3">Nama Toko</th>
                    <th class="px-6 py-3">Kategori</th>
                    <th class="px-6 py-3">Provinsi</th>
                    <th class="px-6 py-3">Harga</th>
                    <th class="px-6 py-3">Rating</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($products as $product)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-semibold">{{ $product->name }}</td>
                        <td class="px-6 py-4">{{ $product->seller->store_name }}</td>
                        <td class="px-6 py-4">{{ $product->category }}</td>
                        <td class="px-6 py-4">{{ $product->seller->province }}</td>
                        <td class="px-6 py-4">
                            Rp {{ number_format($product->price,0,',','.') }}
                        </td>
                        <td class="px-6 py-4 font-semibold">
                            {{ number_format($product->avg_rating ?? 0, 1) }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-6 text-gray-500 text-center">
                            Tidak ada produk.
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>
    </div>

</div>

@endsection
