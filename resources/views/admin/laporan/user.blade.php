@extends('layouts.main')

@section('content')

<div class="max-w-7xl mx-auto px-6 md:px-16 py-10">

    <h1 class="text-3xl font-semibold mb-6">Laporan Data User</h1>

    <a href="{{ route('laporan.user.pdf') }}"
       class="px-4 py-2 bg-primary-yellow text-secondary-navy rounded-xl font-semibold">
        Download PDF
    </a>

    <table class="w-full mt-6 border border-gray-300">
        <tr class="bg-gray-100 font-semibold">
            <td class="p-3">Nama</td>
            <td class="p-3">Email</td>
            <td class="p-3">Terakhir Login</td>
        </tr>

        @foreach($users as $u)
        <tr class="border-t">
            <td class="p-3">{{ $u->name }}</td>
            <td class="p-3">{{ $u->email }}</td>
            <td class="p-3">{{ $u->last_login_at }}</td>
        </tr>
        @endforeach
    </table>

</div>

@endsection
