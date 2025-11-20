@extends('layouts.main')

@section('content')

<section class="max-w-6xl mx-auto px-6 md:px-16 py-10">

    <h1 class="text-3xl font-semibold text-gray-800 mb-8">
        Verifikasi Seller
    </h1>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-800 border border-green-300 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    @if($pendingSellers->isEmpty())
        <p class="text-gray-600 text-lg">Tidak ada seller yang menunggu verifikasi.</p>
    @else

    <div class="grid grid-cols-1 gap-6">

        @foreach($pendingSellers as $seller)
            <div class="bg-white shadow-3xl rounded-xl p-6 border border-gray-200">

                <h2 class="text-xl font-semibold text-secondary-navy mb-4">
                    {{ $seller->storeName }}
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <p><span class="font-semibold text-gray-700">PIC:</span> {{ $seller->picName }}</p>
                        <p><span class="font-semibold text-gray-700">HP:</span> {{ $seller->picPhone }}</p>
                        <p><span class="font-semibold text-gray-700">Email:</span> {{ $seller->picEmail }}</p>
                    </div>

                    <div>
                        <p><span class="font-semibold text-gray-700">Alamat:</span> 
                            {{ $seller->picStreet }},
                            RT {{ $seller->picRT }}/RW {{ $seller->picRW }},
                            {{ $seller->picVillage }},
                            {{ $seller->picCity }},
                            {{ $seller->picProvince }}
                        </p>
                        <p class="mt-2"><span class="font-semibold text-gray-700">No. KTP:</span> {{ $seller->picKtpNumber }}</p>
                    </div>

                </div>

                <div class="flex items-center gap-4 mt-6">

                    <form action="{{ route('admin.verifikasi.seller.approve', $seller->id) }}" method="POST">
                        @csrf
                        <button class="px-5 py-2 bg-green-500 text-white rounded-xl hover:bg-green-600 transition">
                            Setujui
                        </button>
                    </form>

                    <form action="{{ route('admin.verifikasi.seller.reject', $seller->id) }}" method="POST">
                        @csrf
                        <button class="px-5 py-2 bg-red-500 text-white rounded-xl hover:bg-red-600 transition">
                            Tolak
                        </button>
                    </form>

                </div>
            </div>
        @endforeach

    </div>

    @endif

</section>

@endsection
