<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel Admin')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Alpine.js --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Evita parpadeo del modal --}}
    <style>
        [x-cloak] { display: none !important; }
    </style>

    {{-- Tema oscuro --}}
    <script>
        document.documentElement.classList.toggle(
            'dark',
            localStorage.theme === 'dark' ||
            (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)
        );
    </script>
</head>

<body class="min-h-screen bg-slate-50 text-slate-800 antialiased transition-colors duration-300 dark:bg-[rgba(230,147,189,0.8)] dark:text-pink-100">

<div class="min-h-screen lg:grid lg:grid-cols-[280px_1fr]">

    {{-- Sidebar --}}
    @include('admin.layouts.sidebar')

    {{-- Main --}}
    <div class="relative flex min-h-screen flex-col">

        {{-- Header --}}
        @include('admin.layouts.header')

        {{-- Content --}}
        <main class="relative z-10 flex-1 p-6 lg:p-8">
            <div class="rounded-3xl border border-slate-200 bg-white/70 p-6 shadow-sm backdrop-blur-xl
                        dark:border-pink-700/40 dark:bg-[rgba(255,255,255,0.3)]">

                @yield('content')

            </div>
        </main>
    </div>
</div>

{{-- Scripts --}}
@include('admin.layouts.scripts')

{{-- 
    ✅ MODALES — fuera de todo div con z-index, backdrop-blur o overflow
    Todas las vistas que necesiten un modal deben usar @section('modals')
--}}
@yield('modals')

</body>
</html>