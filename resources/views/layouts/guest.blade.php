<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <title>lhena</title>
        <link rel="icon" href="{{ asset('images/lhena-logo.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900 px-4">
    <div class="flex flex-col md:flex-row bg-white dark:bg-gray-800 shadow-xl rounded-2xl overflow-hidden max-w-4xl  w-full">
        
        <!-- Left Side (Image / Logo + Moroccan Background) -->
        <div class="hidden md:flex md:w-1/2 items-center justify-center p-8 bg-cover bg-center" 
             style="background-image: url('{{ asset('images/Mr-bck.jpg') }}');">
            <div class=" bg-opacity-50 p-6 rounded-lg text-center">
                <img class="h-60 pt-8 w-auto mx-auto" src="{{ asset('images/lhena-logo.png') }}" alt="Lhena Logo">
                <h2 class="mt-2 text-4xl font-bold text-black">Bienvenue</h2>
                <p class="mt-1 text-gray-400 text-2xl">Connectez-vous pour accéder à votre compte</p>
            </div>
        </div>

        <!-- Right Side (Form) -->
        <div class="w-full md:w-1/2 p-6">
            <div class="w-full sm:max-w-md mx-auto">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>

    </body>
</html>
