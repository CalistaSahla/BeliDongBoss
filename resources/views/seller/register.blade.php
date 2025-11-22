@extends('layouts.main')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-3xl rounded-2xl p-10 my-10">

    <h1 class="text-3xl font-bold text-center mb-10 text-secondary-navy">
        Registrasi Penjual
    </h1>

    {{-- ALERT SUCCESS --}}
    @if(session('success'))
        <div class="p-4 bg-green-500 text-white rounded-lg mb-4 text-center">
            {{ session('success') }}
        </div>
    @endif

    {{-- ALERT ERROR --}}
    @if($errors->any())
        <div class="p-4 bg-red-500 text-white rounded-lg mb-4">
            <ul class="list-disc ml-4">
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif


        <form action="{{ route('seller.register.process') }}" 
            method="POST" 
            enctype="multipart/form-data">
        @csrf

        {{-- STORE NAME --}}
        <div>
            <label class="font-semibold">Nama Toko</label>
            <input type="text" name="store_name"
                   class="w-full border border-gray-300 px-4 py-3 rounded-xl"
                   required>
        </div>

        {{-- PIC NAME --}}
        <div>
            <label class="font-semibold">Nama PIC</label>
            <input type="text" name="pic_name"
                   class="w-full border border-gray-300 px-4 py-3 rounded-xl"
                   required>
        </div>

        {{-- EMAIL --}}
        <div>
            <label class="font-semibold">Email</label>
            <input type="email" name="email"
                   class="w-full border border-gray-300 px-4 py-3 rounded-xl"
                   required>
        </div>

        {{-- PHONE --}}
        <div>
            <label class="font-semibold">No. Telepon</label>
            <input type="text" name="phone"
                   class="w-full border border-gray-300 px-4 py-3 rounded-xl"
                   required>
        </div>

        {{-- PROVINCE --}}
        <div>
            <label class="font-semibold">Provinsi</label>
            <input type="text" name="province"
                   class="w-full border border-gray-300 px-4 py-3 rounded-xl"
                   required>
        </div>

        {{-- CITY --}}
        <div>
            <label class="font-semibold">Kota</label>
            <input type="text" name="city"
                   class="w-full border border-gray-300 px-4 py-3 rounded-xl"
                   required>
        </div>

        {{-- FULL ADDRESS --}}
        <div>
            <label class="font-semibold">Alamat Lengkap</label>
            <textarea name="address" rows="3"
                      class="w-full border border-gray-300 px-4 py-3 rounded-xl"
                      required></textarea>
        </div>

        {{-- PHOTO PIC --}}
        <div>
            <label class="font-semibold">Foto PIC</label>
            <input type="file" name="pic_photo"
                   class="w-full border border-gray-300 px-4 py-3 rounded-xl"
                   required>
        </div>

        {{-- KTP FILE --}}
        <div>
            <label class="font-semibold">Foto KTP</label>
            <input type="file" name="ktp_photo"
                   class="w-full border border-gray-300 px-4 py-3 rounded-xl"
                   required>
        </div>

        {{-- SUBMIT --}}
        <button type="submit"
                class="w-full bg-primary-yellow py-3 rounded-xl font-bold text-secondary-navy text-lg hover:opacity-90">
            Daftar
        </button>

    </form>
</div>
@endsection
