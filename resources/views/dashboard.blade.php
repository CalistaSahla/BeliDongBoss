@extends('layouts.main')

@section('content')

<div class="max-w-7xl mx-auto px-6 md:px-16 py-12">

    <h1 class="text-3xl font-semibold text-gray-800 mb-10">
        Dashboard Seller
    </h1>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

        {{-- Stok Produk --}}
        <div class="p-6 bg-white shadow-3xl rounded-2xl">
            <h2 class="text-xl font-semibold mb-4">Stok Produk</h2>
            <canvas id="stokProdukChart"></canvas>
        </div>

        {{-- Rating Produk --}}
        <div class="p-6 bg-white shadow-3xl rounded-2xl">
            <h2 class="text-xl font-semibold mb-4">Rata-Rata Rating Produk</h2>
            <canvas id="ratingProdukChart"></canvas>
        </div>

        {{-- Rating Provinsi --}}
        <div class="p-6 bg-white shadow-3xl rounded-2xl">
            <h2 class="text-xl font-semibold mb-4">Asal Provinsi Pemberi Rating</h2>
            <canvas id="ratingProvinsiChart"></canvas>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Stok Produk
    new Chart(document.getElementById('stokProdukChart'), {
        type: 'bar',
        data: {
            labels: {!! json_encode($stokProduk->keys()) !!},
            datasets: [{
                data: {!! json_encode($stokProduk->values()) !!},
                backgroundColor: '#1E3A8A'
            }]
        },
        options: { scales: { y: { beginAtZero: true } } }
    });

    // Rating Produk
    new Chart(document.getElementById('ratingProdukChart'), {
        type: 'bar',
        data: {
            labels: {!! json_encode($ratingProduk->keys()) !!},
            datasets: [{
                data: {!! json_encode($ratingProduk->values()) !!},
                backgroundColor: '#F59E0B'
            }]
        },
        options: { scales: { y: { beginAtZero: true, max: 5 } } }
    });

    // Rating Provinsi
    new Chart(document.getElementById('ratingProvinsiChart'), {
        type: 'bar',
        data: {
            labels: {!! json_encode($ratingProvinsi->keys()) !!},
            datasets: [{
                data: {!! json_encode($ratingProvinsi->values()) !!},
                backgroundColor: '#3B82F6'
            }]
        },
        options: { scales: { y: { beginAtZero: true } } }
    });
</script>

@endsection
