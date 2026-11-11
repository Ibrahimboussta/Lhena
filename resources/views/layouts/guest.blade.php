<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->isLocale('ar') ? 'rtl' : 'ltr' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', 'Sorvarent')</title>
        <link rel="icon" href="{{ asset('images/iconTab.png') }}">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700|ibm-plex-sans-arabic:400,500,600,700&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>[x-cloak] { display: none !important; }</style>
    </head>
    <body class="font-sans antialiased">
        <div class="fixed end-5 top-4 z-50 text-[#173d35]">
            @include('components.language-switcher')
        </div>
        @if (request()->routeIs('login', 'password.request', 'register'))
            <div class="flex min-h-screen flex-col bg-[#f5f4f1] text-[#282b28]">
                <main class="flex flex-1 items-center justify-center px-4 py-8 sm:px-6 sm:py-10">
                    <div class="w-full overflow-hidden rounded-[1.25rem] border border-[#e1dfdb] bg-white shadow-[0_20px_45px_rgba(39,44,39,0.12)] {{ request()->routeIs('login', 'register') ? 'grid max-w-5xl md:min-h-[35rem] md:grid-cols-[44%_56%]' : 'max-w-2xl' }}">
                        @if (request()->routeIs('login', 'register'))
                            <section class="relative flex min-h-[15rem] flex-col justify-between overflow-hidden bg-cover bg-center px-6 py-6 text-white sm:px-8 md:min-h-0"
                                style="background-image: linear-gradient(180deg, rgba(13, 22, 18, .38), rgba(13, 18, 15, .55) 54%, rgba(12, 12, 10, .82)), url('{{ asset('images/appart2.jpg') }}');">
                            <div class="relative z-10">
                                <span class="inline-flex items-center gap-1.5 rounded-full border border-white/15 bg-[#17282c]/80 px-3 py-1 text-[10px] tracking-wide text-white/90">
                                    <span class="h-1 w-1 rounded-full bg-[#d9bd57]"></span>
                                    Hospitalité &amp; Confort
                                </span>
                            </div>
                            <div class="relative z-10 mx-auto my-5 max-w-xs text-center md:my-auto">
                                <span class="mx-auto flex h-[4.5rem] w-[4.5rem] items-center justify-center rounded-2xl bg-white text-[#32281d] shadow-xl">
                                    <svg aria-hidden="true" class="h-10 w-10" viewBox="0 0 48 48" fill="none" stroke="currentColor">
                                        <path d="m8 22 16-13 16 13v16H8V22Z" stroke-width="2.4" stroke-linejoin="round" />
                                        <path d="M15 29h18M15 34h18M35 10l5-4m-3 0h4v4" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                                        <circle cx="24" cy="21" r="2" fill="currentColor" stroke="none" />
                                    </svg>
                                </span>
                                <span class="-mt-2 inline-flex rounded-b-md bg-[#a16e37] px-2 py-1 text-[8px] font-semibold tracking-wide text-white">LHENA</span>
                                <h2 class="mt-4 font-serif text-3xl font-semibold text-white">
                                    {{ request()->routeIs('register') ? __('ui.join_site_title') : __('ui.welcome') }}
                                </h2>
                                <p class="mt-1.5 text-xs leading-5 text-white/85">
                                    {{ request()->routeIs('register') ? __('ui.join_site') : __('ui.login_intro') }}
                                </p>
                            </div>
                            <div class="relative z-10 flex items-center justify-between border-t border-white/20 pt-3 text-[9px] text-white/85">
                                <span class="flex items-center gap-1.5">
                                    <svg aria-hidden="true" class="h-3 w-3 text-[#eac844]" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 2 4 5v6c0 5.2 3.4 9.4 8 11 4.6-1.6 8-5.8 8-11V5l-8-3Zm0 4.2 4.5 1.7v3.1c0 3.5-1.8 6.4-4.5 7.8-2.7-1.4-4.5-4.3-4.5-7.8V7.9L12 6.2Zm-.8 3v5.5h1.6V9.2h-1.6Z" />
                                    </svg>
                                    {{ __('ui.secure_space') }}
                                </span>
                                <span class="font-semibold uppercase tracking-[0.12em] text-[#eac844]">Morocco luxury</span>
                            </div>
                            </section>
                        @endif

                        <section class="flex items-center px-6 py-7 sm:px-8 md:px-9 md:py-9 {{ request()->routeIs('password.request') ? 'min-h-[24rem] justify-center' : '' }}">
                            <div class="w-full">
                                {{ $slot }}
                            </div>
                        </section>
                    </div>
                </main>

                <footer class="mx-auto flex w-full max-w-7xl flex-col gap-2 px-5 pb-4 text-[10px] text-[#8b8984] sm:flex-row sm:items-center sm:justify-between sm:px-8 sm:pb-5">
                    <p class="text-sm">© {{ now()->year }} <span class="font-medium text-[#4c4d49] text-sm">Lhena Inc.</span> {{ __('ui.all_rights_reserved') }}</p>
                    <nav aria-label="{{ __('ui.legal_information') }}" class="flex flex-wrap items-center gap-x-3 gap-y-1">
                        <a href="{{ route('legal.cgu') }}" class="transition hover:text-[#123d33]">{{ __('ui.terms') }}</a>
                        <span aria-hidden="true">•</span>
                        <a href="{{ route('legal.privacy') }}" class="transition hover:text-[#123d33]">{{ __('ui.privacy') }}</a>
                    </nav>
                </footer>
            </div>
        @else
            <div class="flex min-h-screen items-center justify-center bg-gray-100 px-4 dark:bg-gray-900">
                <div class="flex w-full max-w-4xl flex-col overflow-hidden rounded-2xl bg-white shadow-xl dark:bg-gray-800 md:flex-row">
                    <div class="hidden items-center justify-center bg-cover bg-center p-8 md:flex md:w-1/2"
                        style="background-image: url('{{ asset('images/Mr-bck.jpg') }}');">
                        <div class="rounded-lg p-6 text-center">
                            <img class="mx-auto h-60 w-auto pt-8" src="{{ asset('images/newlogo.png') }}" alt="Lhena Logo">
                            <h2 class="mt-2 text-4xl font-bold text-black">Bienvenue</h2>
                            <p class="mt-1 text-2xl text-gray-400">Connectez-vous pour accéder à votre compte</p>
                        </div>
                    </div>
                    <div class="w-full p-6 md:w-1/2">
                        <div class="mx-auto w-full sm:max-w-md">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </body>
</html>
