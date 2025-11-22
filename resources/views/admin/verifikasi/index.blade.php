@extends('layouts.admin-layout')

@section('content')

<div class="space-y-8">

    {{-- TITLE --}}
    <h1 class="text-2xl font-bold text-secondary-navy">
        Verifikasi Seller
    </h1>

    {{-- TABLE --}}
    <div class="bg-white rounded-xl shadow overflow-hidden">

        <table class="w-full text-sm">
            <thead class="bg-gray-100 text-secondary-navy font-semibold text-left">
                <tr>
                    <th class="px-6 py-3">Nama Toko</th>
                    <th class="px-6 py-3">PIC</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Lokasi</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($pendingSellers as $seller)
                    <tr class="border-b hover:bg-gray-50 transition">

                        {{-- Nama toko --}}
                        <td class="px-6 py-4 font-semibold text-secondary-navy">
                            {{ $seller->store_name }}
                        </td>

                        {{-- PIC --}}
                        <td class="px-6 py-4">
                            {{ $seller->pic_name }}
                        </td>

                        {{-- Email --}}
                        <td class="px-6 py-4">
                            {{ $seller->email }}
                        </td>

                        {{-- Lokasi --}}
                        <td class="px-6 py-4">
                            {{ $seller->city }}, {{ $seller->province }}
                        </td>

                        {{-- ACTION BUTTONS --}}
                        <td class="px-6 py-4 text-center flex justify-center gap-3">

                            {{-- APPROVE --}}
                            <form method="POST" action="{{ route('admin.verifikasi.seller.approve', $seller->id) }}">
                                @csrf
                                <button
                                    onclick="return confirm('Setujui seller ini?')"
                                    class="px-4 py-1 bg-green-500 text-white text-xs rounded-lg hover:bg-green-600 transition">
                                    Approve
                                </button>
                            </form>

                            {{-- REJECT --}}
                            <form method="POST" action="{{ route('admin.verifikasi.seller.reject', $seller->id) }}">
                                @csrf
                                <button
                                    onclick="return confirm('Tolak seller ini?')"
                                    class="px-4 py-1 bg-red-500 text-white text-xs rounded-lg hover:bg-red-600 transition">
                                    Reject
                                </button>
                            </form>

                        </td>

                    </tr>

                @empty
                    <tr>
                        <td colspan="5" class="text-center py-6 text-gray-500 text-sm">
                            Tidak ada seller yang menunggu verifikasi.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

</div>

@endsection
