@extends('layouts.main')

@section('content')

<div class="max-w-7xl mx-auto px-6 md:px-16 py-10">

    <h1 class="text-3xl font-semibold text-gray-800 mb-10">
        Dashboard Admin
    </h1>

    {{-- GRID GRAFIK --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

        {{-- Grafik Produk per Kategori --}}
        <div class="p-6 bg-white shadow-3xl rounded-2xl">
            <h2 class="text-xl font-semibold mb-4">Produk per Kategori</h2>
            <canvas id="produkKategoriChart"></canvas>
        </div>

        {{-- Grafik Kondisi Produk --}}
        <div class="p-6 bg-white shadow-3xl rounded-2xl">
            <h2 class="text-xl font-semibold mb-4">Kondisi Produk</h2>
            <canvas id="produkKondisiChart"></canvas>
        </div>

        {{-- Grafik User Aktif --}}
        <div class="p-6 bg-white shadow-3xl rounded-2xl">
            <h2 class="text-xl font-semibold mb-4">User Aktif vs Tidak Aktif</h2>
            <canvas id="userAktifChart"></canvas>
        </div>

        {{-- Grafik Rating per Provinsi --}}
        <div class="p-6 bg-white shadow-3xl rounded-2xl">
            <h2 class="text-xl font-semibold mb-4">Asal Provinsi Pemberi Rating</h2>
            <canvas id="ratingProvinsiChart"></canvas>
        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Produk Kategori
    new Chart(document.getElementById('produkKategoriChart'), {
        type: 'pie',
        data: {
            labels: {!! json_encode($produkKategori->keys()) !!},
            datasets: [{
                data: {!! json_encode($produkKategori->values()) !!},
            }]
        }
    });

    // Produk Kondisi
    new Chart(document.getElementById('produkKondisiChart'), {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($produkKondisi->keys()) !!},
            datasets: [{
                data: {!! json_encode($produkKondisi->values()) !!},
            }]
        }
    });

    // User Aktif
    new Chart(document.getElementById('userAktifChart'), {
        type: 'bar',
        data: {
            labels: ['Aktif', 'Tidak Aktif'],
            datasets: [{
                data: [{{ $userAktif }}, {{ $userTidakAktif }}],
            }]
        }
    });

    // Rating Provinsi
    new Chart(document.getElementById('ratingProvinsiChart'), {
        type: 'bar',
        data: {
            labels: {!! json_encode($ratingProvinsi->keys()) !!},
            datasets: [{
                data: {!! json_encode($ratingProvinsi->values()) !!},
            }]
        }
    });
</script>

@endsection
