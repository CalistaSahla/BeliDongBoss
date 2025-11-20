<footer class="bg-secondary-navy text-white pt-10 pb-5 px-6 md:px-16 text-sm mt-10">
    <div class="flex flex-wrap justify-between border-b border-gray-700 pb-8 mb-4">
        {{-- LOGO + DESKRIPSI --}}
        <div class="w-full md:w-1/4 mb-6 md:mb-0">
            <img src="{{ asset('assets/BDB-textonly.png') }}" class="h-16 mb-3" alt="BeliDongBos">
            <p class="text-footer-text text-xs leading-relaxed">
                Cari dan Jual barang kampus?<br/>
                Ya di sini dong Bos!
            </p>
        </div>

        {{-- PRODUK (Hanya label teks, bukan fitur tambahan) --}}
        <div class="w-1/2 md:w-1/5 mb-6">
            <h4 class="font-semibold text-primary-yellow uppercase mb-4 text-xs">Produk</h4>
            <ul class="space-y-2 text-footer-text text-xs">
                <li>Buku & Referensi</li>
                <li>Tools Praktikum</li>
                <li>Gadget & Teknologi</li>
                <li>ATK & Perlengkapan</li>
                <li>Outfit Kampus</li>
                <li>Kantin</li>
            </ul>
        </div>

        {{-- JASA (Juga hanya teks informatif) --}}
        <div class="w-1/2 md:w-1/5 mb-6">
            <h4 class="font-semibold text-primary-yellow uppercase mb-4 text-xs">Jasa</h4>
            <ul class="space-y-2 text-footer-text text-xs">
                <li>Bimbingan & Tutor</li>
                <li>Desain & Digital</li>
                <li>Ketik & Olah Data</li>
                <li>Jastip & Angkut</li>
            </ul>
        </div>

        {{-- KONTAK --}}
        <div class="w-full md:w-1/4">
            <h4 class="font-semibold text-primary-yellow uppercase mb-4 text-xs">Kontak</h4>
            <p class="text-footer-text text-xs">+62 3xx xxx xxxx</p>
            <p class="text-footer-text text-xs">admin@belidongbos.id</p>
        </div>
    </div>

    <div class="flex flex-col md:flex-row justify-between text-xs text-gray-400 gap-2">
        <p>© BeliDongBos. All rights reserved</p>
        <p>Syarat & Ketentuan</p>
    </div>
</footer>
