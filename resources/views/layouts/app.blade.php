<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $pageTitle ?? $__env->yieldContent('title', config('app.name', 'Sorvarent.ma')) }}</title>
    <link rel="icon" href="{{ asset('images/iconTab.png') }}">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @if (app()->environment(['local', 'production']))
        <!-- Google Analytics -->
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZCJW7JMYTJ"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'G-ZCJW7JMYTJ');
        </script>
    @endif

</head>




<body class="font-sans antialiased">
    @if (Auth::check() && in_array(Auth::user()->role, ['admin', 'user'], true))
        <div class="admin-shell">
            @include('layouts.admin-navigation')
            <div class="admin-main">
                <header class="admin-topbar">
                    <input class="admin-search" type="search" placeholder="Rechercher un utilisateur, bien, contact…"
                        aria-label="Rechercher dans l’administration">
                    <div class="admin-topbar__right">
                        <span class="admin-live">
                            {{ Auth::user()->role === 'admin' ? 'Administration' : 'Espace agence' }}
                        </span>
                        <span class="admin-currency">Lhena · Gestion privée</span>
                    </div>
                </header>
                @isset($header)
                    <header class="bg-white shadow-sm">
                        <div class="px-7 py-5">{{ $header }}</div>
                    </header>
                @endisset
                <main class="admin-content">
                    {{ $slot }}
                </main>
            </div>
        </div>
    @else
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main>
                {{ $slot }}
            </main>
        </div>
    @endif


    <script src="https://kit.fontawesome.com/b0a71770e1.js" crossorigin="anonymous"></script>
</body>

</html>
