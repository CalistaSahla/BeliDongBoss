<header class="bg-secondary-navy text-white px-16 py-3 flex items-center justify-between shadow-lg font-sans">

    {{-- Logo --}}
    <div class="w-1/4 flex items-center">
        <img src="{{ asset('assets/Logo-BDB.png') }}" class="h-6 w-auto">
    </div>

    {{-- Navigation --}}
    <nav class="w-2/4 flex justify-center space-x-10 text-base font-medium">
        <a href="/" class="hover:text-primary-yellow transition">Beranda</a>
        <a href="#" class="hover:text-primary-yellow transition">Toko</a>
        <a href="#" class="hover:text-primary-yellow transition">Pusat Bantuan</a>
    </nav>

    {{-- Icons --}}
    <div class="w-1/4 flex justify-end items-center text-xl space-x-5">
        <a href="#" class="hover:text-primary-yellow transition"><i class="fas fa-user"></i></a>
        <a href="#" class="hover:text-primary-yellow transition"><i class="fas fa-cog"></i></a>
    </div>

</header>
