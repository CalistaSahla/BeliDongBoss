<header class="bg-secondary-navy text-white px-6 md:px-16 py-3 flex items-center justify-between shadow-lg">
    {{-- LEFT: LOGO --}}
    <div class="flex items-center gap-3">
        <a href="{{ route('katalog.index') }}">
            <img src="{{ asset('assets/Logo-BDB.png') }}" alt="BeliDongBos" class="h-8 w-auto">
        </a>
    </div>

    {{-- CENTER: NAV (HANYA YANG ADA DI SRS) --}}
    <nav class="hidden md:flex justify-center space-x-10 text-sm font-medium">
        {{-- Beranda = Katalog Produk (SRS-MartPlace-04) --}}
        <a href="{{ route('katalog.index') }}" class="hover:text-primary-yellow transition">
            Beranda
        </a>
        {{-- Pencarian tidak aku jadikan menu terpisah.
             Fitur cari akan kita taruh di halaman katalog /search,
             jadi tidak nambah page baru. --}}
    </nav>

    {{-- RIGHT: AUTH BUTTONS --}}
    <div class="flex items-center space-x-4 text-sm">
        @auth
            {{-- Kalau user sudah login, tampilkan role-aware link yang memang ADA di SRS --}}
            @if(auth()->user()->role === 'seller')
                <a href="{{ route('seller.dashboard') }}" class="hover:text-primary-yellow transition">
                    Dashboard Seller
                </a>
            @elseif(auth()->user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="hover:text-primary-yellow transition">
                    Dashboard Admin
                </a>
            @endif

            {{-- Dropdown kecil untuk profil & logout --}}
            <div class="relative group">
                <button class="flex items-center gap-2 hover:text-primary-yellow transition">
                    <i class="fas fa-user-circle text-lg"></i>
                    <span class="hidden md:inline-block">
                        {{ Str::limit(auth()->user()->name, 12) }}
                    </span>
                </button>

                <div class="absolute right-0 mt-2 w-40 bg-white text-black rounded-lg shadow-3xl py-2 text-sm hidden group-hover:block z-50">
                    <a href="{{ route('profile.edit') ?? '#' }}" class="block px-4 py-2 hover:bg-gray-100">
                        Profil
                    </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        @else
            {{-- Belum login: Masuk & Daftar --}}
            <a href="{{ route('login') }}"
               class="px-4 py-2 rounded-full border border-primary-yellow text-primary-yellow hover:bg-primary-yellow hover:text-secondary-navy transition">
                Masuk
            </a>
            <a href="{{ route('register') }}"
               class="px-4 py-2 rounded-full bg-primary-yellow text-secondary-navy font-semibold hover:opacity-90 transition">
                Daftar
            </a>
        @endauth
    </div>
</header>
