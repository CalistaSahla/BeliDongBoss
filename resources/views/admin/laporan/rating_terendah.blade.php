@extends('layouts.main')

@section('content')

<div class="max-w-7xl mx-auto px-6 md:px-16 py-10">

    <h1 class="text-3xl font-semibold mb-6 text-gray-800">Laporan Rating Terendah</h1>

    <a href="{{ route('laporan.rating.terendah.pdf') }}"
       class="inline-block px-4 py-2 bg-primary-yellow text-secondary-navy rounded-xl font-semibold hover:opacity-90 transition">
        Download PDF
    </a>

    <div class="mt-6 bg-white rounded-2xl shadow-3xl overflow-x-auto">
        <table class="w-full text-left border-collapse min-w-[900px]">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 border-b">Produk</th>
                    <th class="p-3 border-b">Rating</th>
                    <th class="p-3 border-b">Komentar</th>
                    <th class="p-3 border-b">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ratings as $r)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">{{ $r->product->name ?? '-' }}</td>
                        <td class="p-3">{{ $r->rating }}</td>
                        <td class="p-3">{{ $r->comment }}</td>
                        <td class="p-3">{{ $r->created_at->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
