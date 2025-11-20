<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - BeliDongBos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-bg-light min-h-screen flex flex-col font-sans">

    {{-- HEADER --}}
    @include('layouts.header')

    <main class="flex-grow py-16 flex justify-center items-start px-4 md:px-16">
        <div class="bg-white rounded-xl shadow-3xl w-full flex flex-col items-center py-10 max-w-lg">

            <h1 class="text-3xl font-bold mb-10">Daftar Akun</h1>

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded mb-6">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}"
                  class="w-full max-w-md flex flex-col gap-5">

                @csrf

                <input name="name" placeholder="Nama Lengkap" required
                       class="border border-input-border rounded-full px-5 py-3">

                <input name="email" type="email" placeholder="Email" required
                       class="border border-input-border rounded-full px-5 py-3">

                <input name="password" type="password" placeholder="Kata Sandi" required
                       class="border border-input-border rounded-full px-5 py-3">

                <input name="password_confirmation" type="password" placeholder="Konfirmasi Kata Sandi" required
                       class="border border-input-border rounded-full px-5 py-3">

                <button type="submit"
                        class="bg-primary-yellow rounded-full py-3 font-semibold text-[#333]">
                    Daftar
                </button>
            </form>

            <p class="text-sm mt-6">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-blue-500">Masuk</a>
            </p>

        </div>
    </main>

    {{-- FOOTER --}}
    @include('layouts.footer')

</body>
</html>
