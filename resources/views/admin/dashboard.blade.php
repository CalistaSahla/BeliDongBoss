@extends('layouts.main')

@section('content')

<div class="max-w-7xl mx-auto px-6 md:px-16 py-12">

    <h1 class="text-3xl font-semibold text-gray-800 mb-10">
        Dashboard Admin
    </h1>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

        {{-- Produk Kategori --}}
        <div class="p-6 bg-white shadow-3xl rounded-2xl">
            <h2 class="text-xl font-semibold mb-4">Produk per Kategori</h2>
            <canvas id="produkKategoriChart"></canvas>
        </div>

        {{-- Produk Kondisi --}}
        <div class="p-6 bg-white shadow-3xl rounded-2xl">
            <h2 class="text-xl font-semibold mb-4">Produk per Kondisi</h2>
            <canvas id="produkKondisiChart"></canvas>
        </div>

        {{-- User Aktif --}}
        <div class="p-6 bg-white shadow-3xl rounded-2xl">
            <h2 class="text-xl font-semibold mb-4">User Aktif vs Tidak Aktif</h2>
            <canvas id="userAktifChart"></canvas>
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
    // Produk per kategori
    new Chart(document.getElementById('produkKategoriChart'), {
        type: 'pie',
        data: {
            labels: {!! json_encode($produkKategori->keys()) !!},
            datasets: [{
                data: {!! json_encode($produkKategori->values()) !!},
                backgroundColor: ['#FFD700', '#F4A460', '#87CEEB', '#90EE90', '#FA8072']
            }]
        }
    });

    // Produk per kondisi
    new Chart(document.getElementById('produkKondisiChart'), {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($produkKondisi->keys()) !!},
            datasets: [{
                data: {!! json_encode($produkKondisi->values()) !!},
                backgroundColor: ['#1E3A8A', '#F59E0B']
            }]
        }
    });

    // User aktif vs tidak aktif
    new Chart(document.getElementById('userAktifChart'), {
        type: 'bar',
        data: {
            labels: ['Aktif', 'Tidak Aktif'],
            datasets: [{
                data: [{{ $userAktif }}, {{ $userTidakAktif }}],
                backgroundColor: ['#4CAF50', '#B0BEC5']
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Rating provinsi
    new Chart(document.getElementById('ratingProvinsiChart'), {
        type: 'bar',
        data: {
            labels: {!! json_encode($ratingProvinsi->keys()) !!},
            datasets: [{
                data: {!! json_encode($ratingProvinsi->values()) !!},
                backgroundColor: '#3B82F6'
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>

@endsection
