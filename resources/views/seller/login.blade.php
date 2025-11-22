@extends('layouts.main')

@section('content')
<section class="flex items-center justify-center py-20 px-6">
    <div class="bg-white shadow-3xl rounded-2xl p-10 w-full max-w-md">

        <div class="text-center mb-8">
            <img src="{{ asset('assets/BDB-maskotonly.png') }}" class="h-20 mx-auto">
            <h1 class="text-2xl font-semibold text-gray-800 mt-4">Login Seller</h1>
        </div>

        @if(session('error'))
            <div class="p-3 bg-red-500 text-white text-center rounded-xl mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="p-3 bg-green-500 text-white rounded-xl mb-4">
                {{ session('success') }}
            </div>
        @endif


        <form action="{{ route('seller.login.process') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-gray-700 mb-1 font-medium">Email</label>
                <input type="email" name="email" required class="w-full border rounded-xl px-4 py-3">
            </div>

            <div>
                <label class="block text-gray-700 mb-1 font-medium">Password</label>
                <input type="password" name="password" required class="w-full border rounded-xl px-4 py-3">
            </div>

            <button class="w-full bg-primary-yellow text-secondary-navy font-semibold py-3 rounded-xl">
                Masuk
            </button>
        </form>

    </div>
</section>
@endsection
