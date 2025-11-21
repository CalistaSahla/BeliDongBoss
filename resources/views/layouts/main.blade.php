<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'BeliDongBos' }}</title>

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    />

    {{-- Icon (opsional, kalau mau pakai <i class="fas ..."> seperti di file temenmu) --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-yellow': '#FAD400',
                        'secondary-navy': '#002436',
                        'bg-light': '#F5F7F8',
                        'footer-text': '#A0A0A0',
                        'input-border': '#CCCCCC',
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                    boxShadow: {
                        '3xl': '0 10px 30px rgba(0, 0, 0, 0.15)',
                    },
                },
            },
        };
    </script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-bg-light min-h-screen flex flex-col">

    @include('layouts.header')

    <main class="flex-1">
        @yield('content')
    </main>

    @include('layouts.footer')

</body>
@if(session('success'))
<div class="p-4 bg-green-500 text-white text-center">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="p-4 bg-red-500 text-white text-center">
    {{ session('error') }}
</div>
@endif

</html>
