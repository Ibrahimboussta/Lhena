<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>

    <nav class="bg-white border-gray-200 py-3 px-2 sm:px-6 shadow fixed top-0 left-0 w-full z-50">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
            <!-- Logo -->
            <a href="#" class="flex items-center">
                <img class="h-12 w-auto" src="{{ asset('images/logo.png') }}" alt="Logo">
            </a>

            <!-- Section droite (boutons + menu burger) -->
            <div class="flex items-center lg:order-2 gap-4">
                <!-- Icône Profil -->
                <svg class="h-8 w-8 text-500 border border-[#25D366] hover:text-black hover:bg-[#25D366] duration-500 rounded-full p-1"
                    viewBox="0 0 24 24" fill="black">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                    <circle cx="12" cy="7" r="4" />
                </svg>

                <!-- Bouton Publier -->
                <a href="#"
                    class="text-black border border-[#25D366] hover:text-black hover:bg-[#25D366] duration-500 rounded-full font-medium text-sm px-4 lg:px-5 py-2 lg:py-2.5">
                    Publier une annonce
                </a>

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
                    <li><a href="#" class="block py-2 px-4 text-black hover:text-[#25D366]">Accueil</a></li>
                    <li><a href="#" class="block py-2 px-4 text-black hover:text-[#25D366]">Propriétés</a></li>
                    <li><a href="#" class="block py-2 px-4 text-black hover:text-[#25D366]">À propos</a></li>
                    <li><a href="#" class="block py-2 px-4 text-black hover:text-[#25D366]">Blog</a></li>
                    <li><a href="#" class="block py-2 px-4 text-black hover:text-[#25D366]">Contact</a></li>
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

    <h1>footer</h1>

</body>
</html>
