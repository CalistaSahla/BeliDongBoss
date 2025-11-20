<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Registrasi Penjual</h2>
    </x-slot>

    @if (session('success'))
    <div class="bg-green-200 text-green-800 p-3 rounded mb-4 w-full max-w-2xl text-center font-semibold">
        {{ session('success') }}
    </div>
    @endif
 
    <div class="p-6">
        @if (session('success'))
            <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('seller.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label>Nama Toko</label>
                <input type="text" name="store_name" class="border w-full">
            </div>

            <div>
                <label>Nama PIC</label>
                <input type="text" name="pic_name" class="border w-full">
            </div>

            <div>
                <label>Foto PIC</label>
                <input type="file" name="pic_photo" class="border w-full">
            </div>

            <div>
                <label>Foto KTP</label>
                <input type="file" name="pic_ktp" class="border w-full">
            </div>

            <button class="px-4 py-2 bg-blue-600 text-white">Daftar</button>
        </form>
    </div>
</x-app-layout>
