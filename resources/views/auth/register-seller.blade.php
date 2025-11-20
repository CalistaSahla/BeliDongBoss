@extends('layouts.main')

@section('content')
<section class="max-w-4xl mx-auto bg-white shadow-3xl rounded-2xl my-16 p-10">
    
    <h1 class="text-3xl font-semibold text-gray-800 text-center mb-10">
        Daftar Sebagai Penjual
    </h1>

    <form action="{{ route('seller.register.process') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        {{-- NAMA TOKO --}}
        <div>
            <label class="block mb-1 font-medium text-gray-700">Nama Toko</label>
            <input type="text" name="storeName" required class="w-full border border-input-border rounded-xl px-4 py-3">
        </div>

        {{-- DESKRIPSI TOKO --}}
        <div>
            <label class="block mb-1 font-medium text-gray-700">Deskripsi Toko</label>
            <textarea name="storeDescription" rows="3" required
                class="w-full border border-input-border rounded-xl px-4 py-3"></textarea>
        </div>

        <h2 class="text-xl font-semibold mt-8 text-gray-700">Informasi PIC</h2>

        {{-- NAMA PIC --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block mb-1 font-medium text-gray-700">Nama PIC</label>
                <input type="text" name="picName" required class="w-full border border-input-border rounded-xl px-4 py-3">
            </div>

            {{-- No HP --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700">Nomor HP PIC</label>
                <input type="text" name="picPhone" required class="w-full border border-input-border rounded-xl px-4 py-3">
            </div>
        </div>

        {{-- EMAIL PIC --}}
        <div>
            <label class="block mb-1 font-medium text-gray-700">Email PIC</label>
            <input type="email" name="picEmail" required class="w-full border border-input-border rounded-xl px-4 py-3">
        </div>

        <h2 class="text-xl font-semibold mt-8 text-gray-700">Alamat Lengkap</h2>

        {{-- ALAMAT --}}
        <div>
            <label class="block mb-1 font-medium text-gray-700">Jalan</label>
            <input type="text" name="picStreet" required class="w-full border border-input-border rounded-xl px-4 py-3">
        </div>

        {{-- RT RW --}}
        <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
            <div>
                <label class="block mb-1 font-medium text-gray-700">RT</label>
                <input type="text" name="picRT" required class="w-full border border-input-border rounded-xl px-4 py-3">
            </div>

            <div>
                <label class="block mb-1 font-medium text-gray-700">RW</label>
                <input type="text" name="picRW" required class="w-full border border-input-border rounded-xl px-4 py-3">
            </div>

            <div>
                <label class="block mb-1 font-medium text-gray-700">Kelurahan</label>
                <input type="text" name="picVillage" required class="w-full border border-input-border rounded-xl px-4 py-3">
            </div>
        </div>

        {{-- KOTA PROVINSI --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block mb-1 font-medium text-gray-700">Kota / Kabupaten</label>
                <input type="text" name="picCity" required class="w-full border border-input-border rounded-xl px-4 py-3">
            </div>

            <div>
                <label class="block mb-1 font-medium text-gray-700">Provinsi</label>
                <input type="text" name="picProvince" required class="w-full border border-input-border rounded-xl px-4 py-3">
            </div>
        </div>

        {{-- Nomor KTP --}}
        <div>
            <label class="block mb-1 font-medium text-gray-700">Nomor KTP PIC</label>
            <input type="text" name="picKtpNumber" required class="w-full border border-input-border rounded-xl px-4 py-3">
        </div>

        {{-- Foto PIC --}}
        <div>
            <label class="block mb-1 font-medium text-gray-700">Foto PIC</label>
            <input type="file" name="picPhoto" accept="image/*" required
                class="w-full border border-input-border rounded-xl px-4 py-3">
        </div>

        {{-- Foto KTP --}}
        <div>
            <label class="block mb-1 font-medium text-gray-700">Foto KTP</label>
            <input type="file" name="picKtpFile" accept="image/*,application/pdf" required
                class="w-full border border-input-border rounded-xl px-4 py-3">
        </div>

        {{-- SUBMIT --}}
        <button type="submit"
            class="w-full bg-primary-yellow text-secondary-navy font-semibold py-3 rounded-xl hover:opacity-90 transition">
            Daftar Sebagai Penjual
        </button>

    </form>
</section>
@endsection
