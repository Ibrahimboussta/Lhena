<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bourseimmo</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="icon" href="{{ asset('images/logo.png') }}">

</head>

<body>

    <nav class="bg-white border-gray-200 py-3 px-2 sm:px-6 shadow fixed top-0 left-0 w-full z-50">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
            <!-- Logo -->
            <a href="/" class="flex items-center">
                <img class="h-12 w-auto" src="{{ asset('images/logo.png') }}" alt="Logo">
            </a>

            <!-- Section droite (boutons + menu burger) -->
            <div class="flex items-center lg:order-2 gap-4">
                <!-- Icône Profil -->
                @auth
                    @if (Auth::user()->role == 'user')
                        <a href="{{ route('dashboard') }}" class="flex items-center">
                            <svg class="h-8 w-8 text-500 border border-[#25D366] hover:text-black hover:bg-[#25D366] duration-500 rounded-full p-1"
                                viewBox="0 0 24 24" fill="black">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                <circle cx="12" cy="7" r="4" />
                            </svg>
                        </a>
                    @else
                        <a href="{{ route('users') }}" class="flex items-center">
                            <svg class="h-8 w-8 text-500 border border-[#25D366] hover:text-black hover:bg-[#25D366] duration-500 rounded-full p-1"
                                viewBox="0 0 24 24" fill="black">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                <circle cx="12" cy="7" r="4" />
                            </svg>
                        </a>
                    @endif

                @endauth

                @guest
                    <a href="{{ route('register') }}">
                        <svg class="h-8 w-8 text-500 border border-[#25D366] hover:text-black hover:bg-[#25D366] duration-500 rounded-full p-1"
                            viewBox="0 0 24 24" fill="black">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                        </svg>
                    </a>
                @endguest

                <!-- Bouton Publier -->
                @auth
                    <a href="{{ route('publish') }}"
                        class="text-black border border-[#25D366] hover:text-black hover:bg-[#25D366] duration-500 rounded-full font-medium text-sm px-4 lg:px-5 py-2 lg:py-2.5">
                        Publier une annonce
                    </a>
                @endauth

                @guest
                    <a href="{{ route('register') }}"
                        class="text-black border border-[#25D366] hover:text-black hover:bg-[#25D366] duration-500 rounded-full font-medium text-sm px-4 lg:px-5 py-2 lg:py-2.5">
                        Publier une annonce
                    </a>
                @endguest
                <!-- Bouton Menu Mobile -->
                <button id="menu-toggle"
                    class="lg:hidden p-2 text-black rounded-lg hover:text-black hover:bg-[#25D366] duration-500 focus:ring-1 focus:ring-[#25D366]">
                    <span class="sr-only">Ouvrir le menu</span>
                    <svg class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>

                </button>

            </div>

            <!-- Menu Navigation -->
            <div id="mobile-menu"
                class="hidden lg:flex flex-col lg:flex-row items-center w-full lg:w-auto mt-4 lg:mt-0">
                <ul class="flex flex-col lg:flex-row lg:space-x-8 font-medium w-full lg:w-auto">
                    <li><a href="/" class="block py-2 px-4 text-black hover:text-[#25D366]">Accueil</a></li>
                    <li><a href="{{ route('proprites') }}"
                            class="block py-2 px-4 text-black hover:text-[#25D366]">Propriétés</a></li>
                    <li><a href="{{ route('a-propos') }}" class="block py-2 px-4 text-black hover:text-[#25D366]">À
                            propos</a></li>
                    {{-- <li><a href="#" class="block py-2 px-4 text-black hover:text-[#25D366]">Blog</a></li> --}}
                    <li><a href="{{ route('contact') }}"
                            class="block py-2 px-4 text-black hover:text-[#25D366]">Contact</a></li>
                </ul>
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

    
    <footer class="w-full bg-gray-50 ">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-12">
            
            <div class="flex justify-between flex-col py-8 min-[500px]:py-14 gap-8 min-[500px]:gap-16 lg:gap-0 lg:flex-row">
                <div class="flex flex-col items-center max-lg:justify-center min-[500px]:items-start min-[500px]:flex-row gap-8 sm:gap-12 xl:gap-24">
                    <div class="block">
                        <h4 class="text-lg text-gray-900 font-medium mb-4 min-[500px]:mb-7 text-center min-[500px]:text-left">
                            Notre Agence</h4>
                        <ul class="grid gap-4 min-[500px]:gap-6 text-center min-[500px]:text-left">
                            <li><a href="/" class="text-gray-600 hover:text-gray-900">Accueil</a></li>
                            <li><a href="{{ route('proprites') }}" class="text-gray-600 hover:text-gray-900">Propriétés</a></li>
                            <li><a href="{{ route('a-propos') }}" class="text-gray-600 hover:text-gray-900">À propos</a></li>
                            <li><a href="{{ route('contact') }}" class="text-gray-600 hover:text-gray-900">Contact</a></li>
                        </ul>
                    </div>
                    <div class="block">
                        <h4 class="text-lg text-gray-900 font-medium mb-4 min-[500px]:mb-7 text-center min-[500px]:text-left">
                            Services</h4>
                        <ul class="grid gap-4 min-[500px]:gap-6 text-center min-[500px]:text-left">
                            <li><a href="{{ route('proprites') }}" class="text-gray-600 hover:text-gray-900">Acheter</a></li>
                            <li><a href="{{ route('proprites') }};" class="text-gray-600 hover:text-gray-900">Louer</a></li>
                            <li><a href="{{ route('proprites') }}" class="text-gray-600 hover:text-gray-900">Vendre</a></li>
                            <li><a href="{{ route('proprites') }}" class="text-gray-600 hover:text-gray-900">Tous </a></li>
                        </ul>
                    </div>
                    <div class="block">
                        <h4 class="text-lg text-gray-900 font-medium mb-4 min-[500px]:mb-7 text-center min-[500px]:text-left">
                            Ressources</h4>
                        <ul class="grid gap-4 min-[500px]:gap-6 text-center min-[500px]:text-left">
                            <li><a href="javascript:;" class="text-gray-600 hover:text-gray-900">FAQ</a></li>
                            <li><a href="javascript:;" class="text-gray-600 hover:text-gray-900">Guide d'achat</a></li>
                            <li><a href="javascript:;" class="text-gray-600 hover:text-gray-900">Guide de vente</a></li>
                            <li><a href="javascript:;" class="text-gray-600 hover:text-gray-900">Conseils immobiliers</a></li>
                        </ul>
                    </div>
                </div>
                <div class="block w-full max-w-lg mx-auto px-4">
                    <!-- Titre -->
                    <h3 class="font-manrope font-semibold text-2xl text-gray-900 leading-9 mb-6 text-center lg:text-left">
                        Abonnez-vous à la newsletter et lisez les nouveaux articles en premier
                    </h3>
                
                    <!-- Formulaire -->
                    <div class="flex flex-col lg:flex-row items-center lg:items-stretch gap-4 lg:bg-transparent p-4 lg:p-0 rounded-lg lg:rounded-full">
                        <!-- Champ Email -->
                        <input type="email" name="email"
                            class="py-3 px-6 bg-gray-100 lg:bg-gray-100 rounded-full text-gray-900 placeholder:text-gray-500 focus:outline-none flex-1 w-full"
                            placeholder="Votre email ici..." />
                
                        <!-- Bouton Submit -->
                        <button type="submit"
                            class="w-full lg:w-auto py-3.5 px-7 bg-[#25D366] shadow-md rounded-full text-white font-semibold hover:bg-black">
                            S'abonner
                        </button>
                    </div>
                </div>
                
                </div>
                <div class="py-4 border-t flex justify-center border-gray-200">
                    <div class="flex items-center justify-center flex-col gap-8 lg:gap-0 lg:flex-row lg:justify-between">
                        <span class="text-sm text-gray-500">©<a href="https://pagedone.io/">Bourseimmo</a>, Tous droits réservés.</span>
                    </div>
                </div>
                
            </div>
        </div>
    </footer>
    

</body>

</html>
