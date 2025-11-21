@extends('layouts.main')

@section('content')

<div class="max-w-7xl mx-auto px-6 md:px-16 py-10">

    <h1 class="text-3xl font-semibold mb-6 text-gray-800">Laporan Data Produk</h1>

    <a href="{{ route('laporan.produk.pdf') }}"
       class="inline-block px-4 py-2 bg-primary-yellow text-secondary-navy rounded-xl font-semibold hover:opacity-90 transition">
        Download PDF
    </a>

    <div class="mt-6 bg-white rounded-2xl shadow-3xl overflow-x-auto">
        <table class="w-full text-left border-collapse min-w-[900px]">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 border-b">Nama Produk</th>
                    <th class="p-3 border-b">Kategori</th>
                    <th class="p-3 border-b">Kondisi</th>
                    <th class="p-3 border-b">Harga</th>
                    <th class="p-3 border-b">Stok</th>
                    <th class="p-3 border-b">Nama Toko</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $p)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">{{ $p->name }}</td>
                        <td class="p-3">{{ $p->category }}</td>
                        <td class="p-3">{{ $p->condition }}</td>
                        <td class="p-3">Rp {{ number_format($p->price, 0, ',', '.') }}</td>
                        <td class="p-3">{{ $p->stock }}</td>
                        <td class="p-3">{{ $p->seller->storeName ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
