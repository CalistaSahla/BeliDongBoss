<header class="bg-secondary-navy text-white px-6 md:px-16 py-3 flex items-center justify-between shadow-lg">

    {{-- LEFT: LOGO --}}
    <div class="flex items-center gap-3">
        <a href="{{ route('katalog.index') }}">
            <img src="{{ asset('assets/Logo-BDB.png') }}" alt="BeliDongBos" class="h-8 w-auto">
        </a>
    </div>

    {{-- CENTER NAV --}}
    <nav class="hidden md:flex justify-center space-x-10 text-sm font-medium">
        <a href="{{ route('katalog.index') }}" class="hover:text-primary-yellow transition">Beranda</a>
    </nav>

    {{-- RIGHT BUTTONS --}}
    <div class="flex items-center space-x-4 text-sm">

        @auth
            {{-- SELLER LOGIN --}}
            @if(auth()->user()->role === 'seller')
                <a href="{{ route('seller.dashboard') }}" class="hover:text-primary-yellow transition">
                    Dashboard Seller
                </a>
            @endif

            {{-- ADMIN LOGIN --}}
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="hover:text-primary-yellow transition">
                    Dashboard Admin
                </a>
            @endif

            {{-- LOGOUT --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    class="px-4 py-2 rounded-full border border-primary-yellow text-primary-yellow hover:bg-primary-yellow hover:text-secondary-navy transition">
                    Logout
                </button>
            </form>

        @else

            {{-- TOMBOL UNTUK CALON SELLER --}}
            <a href="{{ route('seller.login') }}"
               class="px-4 py-2 rounded-full border border-primary-yellow text-primary-yellow hover:bg-primary-yellow hover:text-secondary-navy transition">
                Login Seller
            </a>

            <a href="{{ route('seller.register') }}"
               class="px-4 py-2 rounded-full bg-primary-yellow text-secondary-navy font-semibold hover:opacity-90 transition">
                Daftar Seller
            </a>

        @endauth
    </div>

</header>
