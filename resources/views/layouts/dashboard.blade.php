<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin | BeliDongBos</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans">

<div class="flex">

    {{-- SIDEBAR ADMIN --}}
    <aside class="w-64 bg-primary-yellow min-h-screen py-6 px-4 shadow-xl flex flex-col justify-between">

        {{-- LOGO --}}
        <div class="mb-10 px-2">
            <img src="{{ asset('assets/Logo-BDB.png') }}" class="h-10 mx-auto" alt="BDB Logo">
        </div>

        {{-- MENU --}}
        <nav class="space-y-3">

            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg bg-white text-secondary-navy font-semibold shadow">
                <img src="{{ asset('assets/icons/dashboard.png') }}" class="h-5" />
                Dashboard
            </a>

            <a href="{{ route('admin.verifikasi.seller') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white hover:text-secondary-navy transition">
                <img src="{{ asset('assets/icons/check.png') }}" class="h-5" />
                Verifikasi Seller
            </a>

            <a href="#"
               class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white hover:text-secondary-navy transition">
                <img src="{{ asset('assets/icons/report.png') }}" class="h-5" />
                Laporan Admin
            </a>

        </nav>

        {{-- SETTINGS & LOGOUT --}}
        <div class="space-y-3 mt-10">

            <div class="flex items-center gap-3 px-3 py-2 rounded-lg opacity-40 cursor-not-allowed">
                <img src="{{ asset('assets/icons/user-setting.png') }}" class="h-5" />
                Pengaturan
            </div>

            <div class="flex items-center gap-3 px-3 py-2 rounded-lg opacity-40 cursor-not-allowed">
                <img src="{{ asset('assets/icons/help.png') }}" class="h-5" />
                Bantuan
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white hover:text-secondary-navy transition w-full text-left">
                    <img src="{{ asset('assets/icons/logout.png') }}" class="h-5" />
                    Keluar
                </button>
            </form>

        </div>

    </aside>

    {{-- MAIN --}}
    <div class="flex-1 flex flex-col">

        {{-- TOP NAV --}}
        <header class="bg-white shadow flex items-center justify-between px-8 py-4">
            <div class="flex items-center gap-3">
                <img src="{{ asset('assets/icons/search.png') }}" class="h-5 opacity-60" />
                <input  type="text"
                        placeholder="Cari..."
                        class="border-none outline-none focus:ring-0 bg-transparent text-sm w-64">
