@extends('layouts.main')

@section('content')

<div class="max-w-7xl mx-auto px-6 md:px-16 py-10">

    <h1 class="text-3xl font-semibold mb-6 text-gray-800">Laporan Data User</h1>

    <a href="{{ route('laporan.user.pdf') }}"
       class="inline-block px-4 py-2 bg-primary-yellow text-secondary-navy rounded-xl font-semibold hover:opacity-90 transition">
        Download PDF
    </a>

    <div class="mt-6 bg-white rounded-2xl shadow-3xl overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 border-b">Nama</th>
                    <th class="p-3 border-b">Email</th>
                    <th class="p-3 border-b">Terakhir Login</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $u)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">{{ $u->name }}</td>
                        <td class="p-3">{{ $u->email }}</td>
                        <td class="p-3">{{ $u->last_login_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
