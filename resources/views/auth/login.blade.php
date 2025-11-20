<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Akun - BeliDongBos</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-bg-light min-h-screen flex flex-col font-sans">

    @include('layouts.header')

    <main class="flex-grow py-16 flex justify-center items-center px-4 md:px-16">
        <div class="bg-white rounded-xl shadow-3xl w-full flex flex-row min-h-[650px] overflow-hidden">

            <!-- Left Banner -->
            <div class="hidden md:flex md:w-1/2 bg-secondary-navy text-white p-12 flex-col justify-center items-center">
                <img src="{{ asset('assets/Logo-BDB.png') }}" class="w-full max-w-xs mb-8">
                <p class="text-xl font-semibold text-center">
                    Cari dan Jual barang kampus?<br>Ya di sini dong Bos!
                </p>
            </div>

            <div class="w-full md:w-1/2 p-12 flex flex-col justify-center">
                <h2 class="text-3xl font-bold mb-10 text-text-dark text-center">Masuk Akun</h2>

                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 p-3 rounded mb-6">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="max-w-sm mx-auto w-full">
                    @csrf

                    <input type="email" name="email" placeholder="Email" required
                        class="w-full p-4 border border-input-border rounded-lg mb-5">

                    <input type="password" name="password" placeholder="Kata Sandi" required
                        class="w-full p-4 border border-input-border rounded-lg mb-5">

                    <button type="submit"
                        class="bg-primary-yellow text-text-dark font-bold py-4 w-full rounded-lg text-lg">
                        Masuk
                    </button>
                </form>

                <p class="mt-8 text-sm text-center">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-link-blue">Daftar Sekarang</a>
                </p>
            </div>
        </div>
    </main>

    @include('layouts.footer')

</body>
</html>
