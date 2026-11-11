<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Sorvarent - Votre plateforme immobilière de confiance')</title>
    @yield('meta')
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="icon" href="{{ asset('images/iconTab.png') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/fr.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
        [x-cloak] { display: none !important; }
    </style>

</head>

<body class="font-sans text-[#29332d] antialiased">

    <nav
        class="fixed left-0 top-0 z-50 w-full border-b border-[#e7ece8] bg-white/90 shadow-sm backdrop-blur-xl {{ request()->is('/') ? 'home-nav' : '' }}">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="/" class="home-nav__brand flex items-center">
                        <img class="home-nav__logo h-12 w-auto sm:h-14" src="{{ asset('images/newlogo.png') }}" alt="Lhena">
                    </a>
                </div>

                <!-- Navigation principale - Desktop -->
                <div class="hidden lg:flex lg:items-center lg:space-x-8">
                    <a href="/"
                        class="home-nav__link relative text-gray-600 hover:text-black px-1 py-1 text-sm font-medium transition-colors duration-200
               after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-[#0b3b31]
               after:transition-all after:duration-500 hover:after:w-full">
                        Accueil
                    </a>
                    <a href="{{ route('proprites') }}"
                        class="home-nav__link relative text-gray-600 hover:text-black px-1 py-1 text-sm font-medium transition-colors duration-200
               after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-[#0b3b31]
               after:transition-all after:duration-500 hover:after:w-full">
                        Propriétés
                    </a>
                    <a href="{{ route('a-propos') }}"
                        class="home-nav__link relative text-gray-600 hover:text-black px-1 py-1 text-sm font-medium transition-colors duration-200
               after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-[#0b3b31]
               after:transition-all after:duration-500 hover:after:w-full">
                        À propos
                    </a>
                    <a href="{{ route('contact') }}"
                        class="home-nav__link relative text-gray-600 hover:text-black px-1 py-1 text-sm font-medium transition-colors duration-200
               after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-[#0b3b31]
               after:transition-all after:duration-500 hover:after:w-full">
                        Contact
                    </a>
                </div>


                <!-- Boutons d'action -->
                <div class="flex items-center space-x-4">
                    @auth
                        <a href="{{ route('publish') }}"
                            class="home-nav__action hidden lg:flex items-center space-x-2 rounded-full bg-[#0b3b31] px-5 py-2.5 text-sm font-semibold text-white transition duration-200 hover:bg-[#0b4b3e]">
                            <span>Publier une annonce</span>
                        </a>

                        <!-- Profile Dropdown -->
                        <div class="relative" x-data="{ open: false }">
                            <!-- Profile Button -->
                            <button @click="open = !open" @click.away="open = false"
                                class="home-nav__profile p-2 rounded-full border border-gray-300 hover:bg-black hover:border-black hover:text-white transition duration-200">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2M12 7a4 4 0 1 1 8 0 4 4 0 0 1-8 0z" />
                                </svg>
                            </button>

                            <!-- Dropdown Menu -->
                            <div x-show="open"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 py-1">

                                <!-- Dashboard -->
                                <a href="{{ Auth::user()->role == 'user' ? route('dashboard') : route('users') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    {{ Auth::user()->role == 'user' ? 'Dashboard' : 'Admin Panel' }}
                                </a>

                                <!-- Profile -->
                                <a href="{{ route('profile.edit') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Profile
                                </a>

                                <!-- Logout -->
                                <form method="POST" action="{{ route('logout') }}" class="block">
                                    @csrf
                                    <button type="submit"
                                        class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Se déconnecter
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('login') }}"
                                class="home-nav__action hidden lg:flex items-center rounded-full bg-[#0b3b31] px-5 py-2.5 text-sm font-semibold text-white transition duration-200 hover:bg-[#0b4b3e]">
                                <span>Se connecter</span>
                            </a>
                            <a href="{{ route('register') }}"
                                class="home-nav__register flex items-center rounded-full bg-[#e8d2a7] px-4 py-2.5 text-sm font-semibold text-[#2e392f] transition duration-300 hover:bg-[#f0dfc0]">
                                <span>S'inscrire</span>
                            </a>
                        </div>
                    @endauth

                    <!-- Menu Mobile -->
                    <button id="menu-toggle" class="home-nav__toggle lg:hidden p-2 rounded-md hover:bg-gray-100 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Menu Mobile -->
            <div id="mobile-menu" class="home-nav__mobile-menu lg:hidden hidden pb-3">
                <div class="pt-2 pb-3 space-y-1">
                    <a href="/"
                        class="home-nav__mobile-link block px-3 py-2 text-base font-medium text-gray-600 hover:text-black hover:bg-gray-50 rounded-md">Accueil</a>
                    <a href="{{ route('proprites') }}"
                        class="home-nav__mobile-link block px-3 py-2 text-base font-medium text-gray-600 hover:text-black hover:bg-gray-50 rounded-md">Propriétés</a>
                    <a href="{{ route('a-propos') }}"
                        class="home-nav__mobile-link block px-3 py-2 text-base font-medium text-gray-600 hover:text-black hover:bg-gray-50 rounded-md">À
                        propos</a>
                    <a href="{{ route('contact') }}"
                        class="home-nav__mobile-link block px-3 py-2 text-base font-medium text-gray-600 hover:text-black hover:bg-gray-50 rounded-md">Contact</a>
                    @auth
                        <a href="{{ route('publish') }}"
                            class="home-nav__mobile-host block px-3 py-2 text-base font-semibold rounded-md mt-2">Publier une annonce</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="home-nav__mobile-link block px-3 py-2 text-base font-medium text-gray-600 hover:text-black hover:bg-gray-50 rounded-md">Se connecter</a>
                        <a href="{{ route('register') }}"
                            class="home-nav__mobile-host block px-3 py-2 text-base font-semibold rounded-md mt-2">S'inscrire</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Script pour gérer le menu mobile -->
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        const homeNav = document.querySelector('.home-nav');

        if (homeNav) {
            const updateHomeNav = () => {
                homeNav.classList.toggle('home-nav--scrolled', window.scrollY > 16);
            };

            window.addEventListener('scroll', updateHomeNav, { passive: true });
            updateHomeNav();
        }
    </script>


    @yield('content')


    <footer class="border-t border-[#e7ece8] bg-white">
        <div class="mx-auto max-w-7xl px-5 py-12 sm:px-8 lg:px-10 lg:py-16">
            <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-[1.4fr_0.8fr_0.8fr_1.2fr]">
                <div>
                    <a href="/" class="inline-flex items-center gap-3">
                        <img class="h-12 w-auto" src="{{ asset('images/lhena-logo.png') }}" alt="Lhena">
                        <span>
                            <span class="block text-lg font-semibold tracking-tight text-[#0b3b31]">Lhena</span>
                            <span class="block text-[9px] font-semibold uppercase tracking-[0.12em] text-[#90764b]">Immobilier au Maroc</span>
                        </span>
                    </a>
                    <p class="mt-4 max-w-sm text-sm leading-6 text-[#68736d]">
                        Retrouvez des annonces immobilières au Maroc et avancez dans votre projet avec un accompagnement attentif.
                    </p>
                </div>

                <div>
                    <h4 class="text-xs font-semibold uppercase tracking-[0.14em] text-[#34443c]">Découvrir</h4>
                    <ul class="mt-4 space-y-3 text-sm text-[#68736d]">
                        <li><a class="transition hover:text-[#0b3b31]" href="/">Accueil</a></li>
                        <li><a class="transition hover:text-[#0b3b31]" href="{{ route('proprites') }}">Toutes les propriétés</a></li>
                        <li><a class="transition hover:text-[#0b3b31]" href="{{ route('a-propos') }}">À propos</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-xs font-semibold uppercase tracking-[0.14em] text-[#34443c]">Besoin d’aide ?</h4>
                    <ul class="mt-4 space-y-3 text-sm text-[#68736d]">
                        <li><a class="transition hover:text-[#0b3b31]" href="{{ route('contact') }}">Nous contacter</a></li>
                        <li><a class="transition hover:text-[#0b3b31]" href="{{ route('publish') }}">Publier une annonce</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-xs font-semibold uppercase tracking-[0.14em] text-[#34443c]">La lettre Lhena</h4>
                    <p class="mt-4 text-sm leading-6 text-[#68736d]">Recevez nos actualités immobilières et nos nouveautés.</p>
                    <form action="{{ route('mailing.store') }}" method="POST" class="mt-4 flex flex-col gap-2 sm:flex-row">
                        @csrf
                        <input type="email" name="email" required autocomplete="email" class="min-w-0 flex-1 rounded-full border border-[#dce4df] bg-[#f7f9f7] px-4 py-2.5 text-sm focus:border-[#0b3b31] focus:ring-[#0b3b31]" placeholder="Votre adresse e-mail">
                        <button type="submit" class="rounded-full bg-[#0b3b31] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#0b4b3e]">S’abonner</button>
                    </form>
                </div>
            </div>

            <div class="mt-10 flex flex-col gap-3 border-t border-[#e7ece8] pt-5 text-xs text-[#7b857f] sm:flex-row sm:items-center sm:justify-between">
                © {{ now()->year }} Lhena. Tous droits réservés.
                <nav aria-label="Informations légales" class="flex flex-wrap gap-x-5 gap-y-2">
                    <a class="transition hover:text-[#0b3b31]" href="{{ route('legal.cgu') }}">Conditions générales d’utilisation</a>
                    <a class="transition hover:text-[#0b3b31]" href="{{ route('legal.privacy') }}">Politique de confidentialité</a>
                </nav>
            </div>
        </div>
    </footer>



</body>

</html>
