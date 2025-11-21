@extends('layouts.main')

@section('content')

<div class="max-w-7xl mx-auto px-6 md:px-16 py-10">

    <h1 class="text-3xl font-semibold mb-6 text-gray-800">Laporan Data Seller</h1>

    <a href="{{ route('laporan.seller.pdf') }}"
       class="inline-block px-4 py-2 bg-primary-yellow text-secondary-navy rounded-xl font-semibold hover:opacity-90 transition">
        Download PDF
    </a>

    <div class="mt-6 bg-white rounded-2xl shadow-3xl overflow-x-auto">
        <table class="w-full text-left border-collapse min-w-[800px]">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 border-b">Nama Toko</th>
                    <th class="p-3 border-b">PIC</th>
                    <th class="p-3 border-b">Kontak</th>
                    <th class="p-3 border-b">Email</th>
                    <th class="p-3 border-b">Kota</th>
                    <th class="p-3 border-b">Provinsi</th>
                    <th class="p-3 border-b">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sellers as $s)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">{{ $s->storeName }}</td>
                        <td class="p-3">{{ $s->picName }}</td>
                        <td class="p-3">{{ $s->picPhone }}</td>
                        <td class="p-3">{{ $s->picEmail }}</td>
                        <td class="p-3">{{ $s->picCity }}</td>
                        <td class="p-3">{{ $s->picProvince }}</td>
                        <td class="p-3 capitalize">{{ $s->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
