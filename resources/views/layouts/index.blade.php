<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lhena - Votre plateforme immobilière de confiance</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="icon" href="{{ asset('images/lhena-logo.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/fr.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
        [x-cloak] { display: none !important; }
    </style>

</head>

<body>

    <nav
        class="bg-gray-50 backdrop-blur-sm bg-opacity-60 fixed top-0 left-0 w-full z-50 shadow-sm border-b border-red-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="/" class="flex items-center">
                        <img class="h-28 w-auto" src="{{ asset('images/lhena-logo.png') }}" alt="Logo">
                    </a>
                </div>

                <!-- Navigation principale - Desktop -->
                <div class="hidden lg:flex lg:items-center lg:space-x-8">
                    <a href="/"
                        class="relative text-gray-600 hover:text-black px-1 py-1 text-sm font-medium transition-colors duration-200
               after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-red-500
               after:transition-all after:duration-500 hover:after:w-full">
                        Accueil
                    </a>
                    <a href="{{ route('proprites') }}"
                        class="relative text-gray-600 hover:text-black px-1 py-1 text-sm font-medium transition-colors duration-200
               after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-red-500
               after:transition-all after:duration-500 hover:after:w-full">
                        Propriétés
                    </a>
                    <a href="{{ route('a-propos') }}"
                        class="relative text-gray-600 hover:text-black px-1 py-1 text-sm font-medium transition-colors duration-200
               after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-red-500
               after:transition-all after:duration-500 hover:after:w-full">
                        À propos
                    </a>
                    <a href="{{ route('contact') }}"
                        class="relative text-gray-600 hover:text-black px-1 py-1 text-sm font-medium transition-colors duration-200
               after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-red-500
               after:transition-all after:duration-500 hover:after:w-full">
                        Contact
                    </a>
                </div>


                <!-- Boutons d'action -->
                <div class="flex items-center space-x-4">
                    @auth
                        <!-- Bouton Publier -->
                        <a href="{{ route('publish') }}"
                            class="hidden lg:flex items-center space-x-2 bg-green-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-green-700 transition duration-200">
                            <span>Publier une annonce</span>
                        </a>

                        <!-- Profile Dropdown -->
                        <div class="relative" x-data="{ open: false }">
                            <!-- Profile Button -->
                            <button @click="open = !open" @click.away="open = false"
                                class="p-2 rounded-full border border-gray-300 hover:bg-black hover:border-black hover:text-white transition duration-200">
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
                                class="hidden lg:flex items-center bg-green-700 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-green-800 transition duration-200">
                                <span>Se connecter</span>
                            </a>

                            <a href="{{ route('register') }}"
                                class="flex items-center  bg-red-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-red-700 hover:text-white transition duration-300">
                                <span>S'inscrire</span>
                            </a>
                        </div>
                    @endauth

                    <!-- Menu Mobile -->
                    <button id="menu-toggle" class="lg:hidden p-2 rounded-md hover:bg-gray-100 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Menu Mobile -->
            <div id="mobile-menu" class="lg:hidden hidden pb-3">
                <div class="pt-2 pb-3 space-y-1">
                    <a href="/"
                        class="block px-3 py-2 text-base font-medium text-gray-600 hover:text-black hover:bg-gray-50 rounded-md">Accueil</a>
                    <a href="{{ route('proprites') }}"
                        class="block px-3 py-2 text-base font-medium text-gray-600 hover:text-black hover:bg-gray-50 rounded-md">Propriétés</a>
                    <a href="{{ route('a-propos') }}"
                        class="block px-3 py-2 text-base font-medium text-gray-600 hover:text-black hover:bg-gray-50 rounded-md">À
                        propos</a>
                    <a href="{{ route('contact') }}"
                        class="block px-3 py-2 text-base font-medium text-gray-600 hover:text-black hover:bg-gray-50 rounded-md">Contact</a>
                    @auth
                        <a href="{{ route('publish') }}"
                            class="block px-3 py-2 text-base font-medium text-white bg-black hover:bg-gray-800 rounded-md mt-2">Publier
                            une annonce</a>
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
    </script>


    @yield('content')


    <footer class="bg-gray-50 border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 text-center md:text-left">
                <!-- Notre Agence -->
                <div>
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">Notre Agence</h4>
                    <ul class="space-y-3 text-gray-600">
                        <li><a href="/">Accueil</a></li>
                        <li><a href="{{ route('proprites') }}">Propriétés</a></li>
                        <li><a href="{{ route('a-propos') }}">À propos</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div>
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">Services</h4>
                    <ul class="space-y-3 text-gray-600">
                        <li><a href="{{ route('proprites') }}">Acheter</a></li>
                        <li><a href="{{ route('proprites') }}">Louer</a></li>
                        <li><a href="{{ route('proprites') }}">Vendre</a></li>
                        <li><a href="{{ route('proprites') }}">Tous</a></li>
                    </ul>
                </div>

                <!-- Ressources -->
                <div>
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">Ressources</h4>
                    <ul class="space-y-3 text-gray-600">
                        <li><a href="{{ route('contact') }}">FAQ</a></li>
                        <li><a href="{{ route('contact') }}">Guide d'achat</a></li>
                        <li><a href="{{ route('contact') }}">Guide de vente</a></li>
                        <li><a href="{{ route('contact') }}">Conseils immobiliers</a></li>
                    </ul>
                </div>

                <!-- Newsletter -->
                <div>
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">Newsletter</h4>
                    <p class="text-gray-600 mb-4">Abonnez-vous pour recevoir nos dernières actualités.</p>
                    <form action="{{ route('mailing.store') }}" method="POST" class="flex flex-col sm:flex-row gap-3">
                        @csrf
                        <input type="email" name="email"
                            class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black"
                            placeholder="Votre email ici..." />
                        <button type="submit"
                            class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition">S'abonner</button>
                    </form>
                </div>
            </div>

            <!-- Bottom -->
            <div class="mt-10 pt-5 border-t border-gray-200 text-sm text-gray-500">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">

                    <div class="text-center md:text-left">
                        © {{ now()->year }} <a href="/" class="font-semibold text-gray-700">lhena</a>. Tous
                        droits réservés.
                    </div>

                    <div class="flex items-center space-x-4">
                        <img class="w-6 h-6 text-red-400" src="{{ asset('images/visa.svg') }}" alt="">
                        <img class="w-6 h-6" src="{{ asset('images/mastercard.svg') }}" alt="">
                        <img class="w-6 h-6" src="{{ asset('images/paypal.svg') }}" alt="">
                    </div>

                </div>
            </div>
        </div>
    </footer>



</body>

</html>
