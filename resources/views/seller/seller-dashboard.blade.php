<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard Seller')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite('resources/css/app.css')
</head>

<body class="bg-[#F5F7FB] text-gray-900">

<div class="flex">

    {{-- SIDEBAR KUNING --}}
    <aside class="w-64 min-h-screen bg-[#FFD600] p-6 flex flex-col gap-6 sticky top-0">

        {{-- LOGO --}}
        <div class="mb-4">
            <img src="{{ asset('assets/BDB-textonly.png') }}" class="h-10" alt="BDB">
        </div>

        {{-- NAVIGATION --}}
        <nav class="flex flex-col gap-2 text-sm font-semibold">

            <a href="{{ route('seller.dashboard') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/30 {{ request()->routeIs('seller.dashboard') ? 'bg-white/40' : '' }}">
                📊 Dashboard
            </a>

            <a href="{{ route('seller.product.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/30 {{ request()->routeIs('seller.product.index') ? 'bg-white/40' : '' }}">
                📦 Produk Saya
            </a>

            <a href="{{ route('seller.product.create') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/30 {{ request()->routeIs('seller.product.create') ? 'bg-white/40' : '' }}">
                ➕ Tambah Produk
            </a>

            <a href="{{ route('seller.laporan.stokdesc') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/30">
                📉 Laporan Stok Menurun
            </a>

            <a href="{{ route('seller.laporan.stokhabis') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/30">
                ❌ Stok Habis
            </a>

            <a href="{{ route('seller.laporan.ratingdesc') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/30">
                ⭐ Rating Menurun
            </a>

            {{-- LOGOUT --}}
            <form method="POST" action="{{ route('logout') }}" class="mt-6">
                @csrf
                <button class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/30 w-full text-left">
                    🚪 Logout
                </button>
            </form>
        </nav>

    </aside>

    {{-- CONTENT --}}
    <main class="flex-1 p-10">
        @yield('content')
    </main>

</div>

</body>
</html>
