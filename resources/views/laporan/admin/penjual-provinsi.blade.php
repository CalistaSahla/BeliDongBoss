@extends('layouts.admin-layout')

@section('content')

<div class="space-y-8">

    <h1 class="text-2xl font-bold text-secondary-navy">
        Laporan Penjual Berdasarkan Provinsi
    </h1>

    <div class="bg-white rounded-xl shadow overflow-hidden">

        <table class="w-full text-sm">
            <thead class="bg-gray-100 text-secondary-navy font-semibold text-left">
                <tr>
                    <th class="px-6 py-3">Provinsi</th>
                    <th class="px-6 py-3">Nama Toko</th>
                    <th class="px-6 py-3">PIC</th>
                    <th class="px-6 py-3">Email</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($sellers as $seller)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-semibold">{{ $seller->province }}</td>
                        <td class="px-6 py-4">{{ $seller->store_name }}</td>
                        <td class="px-6 py-4">{{ $seller->pic_name }}</td>
                        <td class="px-6 py-4">{{ $seller->email }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-6 text-gray-500 text-center">
                            Tidak ada data seller.
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>
    </div>

</div>

@endsection
