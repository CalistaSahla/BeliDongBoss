@extends('layouts.main')

@section('content')

<section class="max-w-4xl mx-auto px-6 md:px-16 py-10">

    <h1 class="text-3xl font-semibold text-gray-800 mb-8">Tambah Produk Baru</h1>

    <form action="{{ route('seller.product.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label class="block font-medium">Nama Produk</label>
            <input type="text" name="name" required
                   class="w-full border border-gray-300 rounded-xl px-4 py-3">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block font-medium">Kategori</label>
                <input type="text" name="category" required class="w-full border border-gray-300 rounded-xl px-4 py-3">
            </div>

            <div>
                <label class="block font-medium">Kondisi</label>
                <select name="condition" required class="w-full border border-gray-300 rounded-xl px-4 py-3">
                    <option value="Baru">Baru</option>
                    <option value="Preloved">Preloved</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block font-medium">Harga</label>
                <input type="number" name="price" required class="w-full border border-gray-300 rounded-xl px-4 py-3">
            </div>

            <div>
                <label class="block font-medium">Stok</label>
                <input type="number" name="stock" required class="w-full border border-gray-300 rounded-xl px-4 py-3">
            </div>
        </div>

        <div>
            <label class="block font-medium">Deskripsi Produk</label>
            <textarea name="description" rows="4" required class="w-full border border-gray-300 rounded-xl px-4 py-3"></textarea>
        </div>

        <div>
            <label class="block font-medium">Foto Utama (Thumbnail)</label>
            <input type="file" name="thumbnail" required class="w-full border border-gray-300 rounded-xl px-4 py-3">
        </div>

        <div>
            <label class="block font-medium">Foto Tambahan (Opsional, bisa banyak)</label>
            <input type="file" name="images[]" multiple class="w-full border border-gray-300 rounded-xl px-4 py-3">
        </div>

        <button type="submit"
            class="w-full bg-primary-yellow text-secondary-navy font-semibold py-3 rounded-xl hover:opacity-90 transition">
            Simpan Produk
        </button>

    </form>

</section>

@endsection
