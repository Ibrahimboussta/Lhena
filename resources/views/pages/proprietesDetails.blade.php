@extends('layouts.index')
@section('content')
    <section class="px-6 sm:px-16 py-20">
        <div class="flex flex-col items-center min-h-screen px-4 space-y-8">

            <!-- Premier Bloc : Carrousel + Sidebar -->
            <div class="flex flex-col md:flex-row w-full max-w-screen-xl bg-white rounded-lg ">

                <!-- Section gauche : Carrousel -->
                <div class="w-full md:w-2/3 p-4">

                    <!-- Titre de l'annonce -->
                    <h1 class="text-2xl font-semibold text-gray-800 mb-2 text-center md:text-left">Maison familiale de luxe
                    </h1>

                    <!-- Carrousel -->
                    <div x-data="{
                        currentSlide: 0,
                        slides: [
                            '/images/appart1.jpg',
                            '/images/appart2.jpg',
                            '/images/appart3.jpg',
                            '/images/appart4.jpg'
                        ]
                    }" class="relative w-full bg-white rounded-lg shadow-lg overflow-hidden">

                        <div class="relative w-full h-80">
                            <template x-for="(slide, index) in slides" :key="index">
                                <img :src="slide" x-show="currentSlide === index"
                                    class="absolute w-full h-full object-cover transition-opacity duration-600 rounded-lg"
                                    x-transition:enter="opacity-0 scale-90" x-transition:enter-start="opacity-0 scale-90"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:leave="opacity-100 scale-100"
                                    x-transition:leave-start="opacity-100 scale-100"
                                    x-transition:leave-end="opacity-0 scale-90">
                            </template>
                        </div>

                        <!-- Boutons de navigation -->
                        <button @click="currentSlide = (currentSlide - 1 + slides.length) % slides.length"
                            class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white px-2 rounded-full hover:bg-opacity-70">
                            &#10094;
                        </button>

                        <button @click="currentSlide = (currentSlide + 1) % slides.length"
                            class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white px-2 rounded-full hover:bg-opacity-70">
                            &#10095;
                        </button>

                        <!-- Indicateurs -->
                        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                            <template x-for="(slide, index) in slides" :key="index">
                                <button @click="currentSlide = index"
                                    :class="currentSlide === index ? 'bg-white' : 'bg-gray-400'"
                                    class="w-3 h-3 rounded-full transition-colors duration-300"></button>
                            </template>
                        </div>
                    </div>


                    <!-- Adresse sous le carrousel -->
                    <p class="text-sm text-gray-600 text-center md:text-left mt-2 flex items-center gap-1">
                        <img src="{{ asset('images/local.svg') }}" class="w-4 h-4" alt="Location">
                        Quartier guelize, Marrakech
                    </p>
                </div>

                <!-- Sidebar (droite) -->
                <div class="w-full md:w-1/3 flex flex-col items-center justify-center p-6 border-l border-gray-200">
                    <div class="flex flex-col gap-4 w-full max-w-xs text-center">
                        <button
                            class="bg-[#E7C873] text-black py-2 rounded-md hover:bg-amber-400 transition-colors duration-300">
                            A vendre
                        </button>
                        <button
                            class="bg-blue-700 text-white py-2 rounded-md hover:bg-blue-950 transition-colors duration-300">
                            Appeler l'agent
                        </button>
                        <button
                            class="bg-green-500 text-white py-2 rounded-md hover:bg-green-600 transition-colors duration-300">
                            Discuter sur WhatsApp
                        </button>
                    </div>
                </div>
            </div>

            <!-- Deuxième Bloc : Description + Google Maps -->
            <div class="flex flex-col md:flex-row w-full max-w-screen-xl bg-white rounded-lg ">

                <!-- Section gauche : Description -->
                <div class="w-full md:w-2/3 flex flex-col justify-between p-6 border-r border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-800">Description du bien</h2>
                    <p class="text-gray-600 text-sm ">
                        Magnifique maison située dans un quartier résidentiel calme. Avec ses 4 chambres spacieuses, son
                        grand
                        salon lumineux et une cuisine moderne, cette maison offre tout le confort dont vous avez besoin.
                    </p>
                    <ul class="mt-4 space-y-2 text-gray-700 text-sm">
                        <li class="flex items-center gap-2">
                            <img src="{{ asset('images/beds.svg') }}" class="w-4 h-4" alt="Chambres"> 4 chambres
                        </li>
                        <li class="flex items-center gap-2">
                            <img src="{{ asset('images/dosh.svg') }}" class="w-4 h-4" alt="Salle de bain"> 1 salle de
                            bain
                        </li>
                        <li class="flex  items-center gap-2">
                            <img src="{{ asset('images/space.svg') }}" class="w-4 h-4" alt="Superficie"> 400 m² de
                            surface
                        </li>
                        <li class="flex items-center gap-2">
                            <img src="{{ asset('images/beds.svg') }}" class="w-4 h-4" alt="Jardin"> Jardin spacieux
                        </li>
                    </ul>
                </div>

                <!-- Section droite : Google Maps -->
                <div class="w-full md:w-1/3 p-6">
                    <h2 class="text-xl font-semibold text-gray-800 text-center">Localisation</h2>
                    <div class="w-full h-64 mt-4 rounded-lg overflow-hidden shadow-lg">
                        <iframe class="w-full h-full"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509469!2d144.95592831566408!3d-37.81720974201426!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d5df0df5a9f%3A0x5045675218ce7e33!2sMelbourne%2C%20Australie!5e0!3m2!1sfr!2s!4v1640207712345!5m2!1sfr!2s"
                            allowfullscreen="" loading="lazy">
                        </iframe>
                    </div>
                </div>

            </div>

            <section id="testimonials" aria-label="What our customers are saying" class="">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <ul role="list"
                        class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-6 sm:gap-8 lg:mt-20 lg:max-w-none lg:grid-cols-3">
                        <li>
                            <ul role="list" class="flex flex-col gap-y-6 sm:gap-y-8">
                                <li>
                                    <figure class="relative rounded-2xl bg-white p-6 shadow shadow-slate-900/10"><svg
                                            aria-hidden="true" width="105" height="78"
                                            class="absolute left-6 top-6 fill-slate-100">
                                            <path
                                                d="M25.086 77.292c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622C1.054 58.534 0 53.411 0 47.686c0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C28.325 3.917 33.599 1.507 39.324 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Zm54.24 0c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622-2.11-4.52-3.164-9.643-3.164-15.368 0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C82.565 3.917 87.839 1.507 93.564 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Z">
                                            </path>
                                        </svg>
                                        <blockquote class="relative">
                                            <p class="text-lg tracking-tight text-slate-900">I love the fitness apparel and
                                                gear I purchased from
                                                this site. The quality is exceptional and the prices are unbeatable.</p>
                                        </blockquote>
                                        <figcaption
                                            class="relative mt-6 flex items-center justify-between border-t border-slate-100 pt-6">
                                            <div>
                                                <div class="font-display text-base text-slate-900">Sheryl Berge</div>
                                            </div>
                                            <div class="overflow-hidden rounded-full bg-slate-50">
                                                <img alt="" class="h-14 w-14 object-cover" style="color:transparent"
                                                    src="https://randomuser.me/api/portraits/men/15.jpg">
                                            </div>
                                        </figcaption>
                                    </figure>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <ul role="list" class="flex flex-col gap-y-6 sm:gap-y-8">
                                <li>
                                    <figure class="relative rounded-2xl bg-white p-6 shadow shadow-slate-900/10"><svg
                                            aria-hidden="true" width="105" height="78"
                                            class="absolute left-6 top-6 fill-slate-100">
                                            <path
                                                d="M25.086 77.292c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622C1.054 58.534 0 53.411 0 47.686c0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C28.325 3.917 33.599 1.507 39.324 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Zm54.24 0c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622-2.11-4.52-3.164-9.643-3.164-15.368 0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C82.565 3.917 87.839 1.507 93.564 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Z">
                                            </path>
                                        </svg>
                                        <blockquote class="relative">
                                            <p class="text-lg tracking-tight text-slate-900">As a professional athlete, I
                                                rely on high-performance
                                                gear for my training. This site offers a great selection of top-notch
                                                products.</p>
                                        </blockquote>
                                        <figcaption
                                            class="relative mt-6 flex items-center justify-between border-t border-slate-100 pt-6">
                                            <div>
                                                <div class="font-display text-base text-slate-900">Leland Kiehn</div>
                                            </div>
                                            <div class="overflow-hidden rounded-full bg-slate-50">
                                                <img alt="" class="h-14 w-14 object-cover" style="color:transparent"
                                                    src="https://randomuser.me/api/portraits/women/15.jpg">
                                            </div>
                                        </figcaption>
                                    </figure>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <ul role="list" class="flex flex-col gap-y-6 sm:gap-y-8">
                                <li>
                                    <figure class="relative rounded-2xl bg-white p-6 shadow shadow-slate-900/10"><svg
                                            aria-hidden="true" width="105" height="78"
                                            class="absolute left-6 top-6 fill-slate-100">
                                            <path
                                                d="M25.086 77.292c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622C1.054 58.534 0 53.411 0 47.686c0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C28.325 3.917 33.599 1.507 39.324 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Zm54.24 0c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622-2.11-4.52-3.164-9.643-3.164-15.368 0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C82.565 3.917 87.839 1.507 93.564 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Z">
                                            </path>
                                        </svg>
                                        <blockquote class="relative">
                                            <p class="text-lg tracking-tight text-slate-900">The fitness apparel I bought
                                                here fits perfectly and
                                                feels amazing. I highly recommend this store to anyone looking for quality
                                                gear.</p>
                                        </blockquote>
                                        <figcaption
                                            class="relative mt-6 flex items-center justify-between border-t border-slate-100 pt-6">
                                            <div>
                                                <div class="font-display text-base text-slate-900">Peter Renolds</div>
                                            </div>
                                            <div class="overflow-hidden rounded-full bg-slate-50">
                                                <img alt="" class="h-14 w-14 object-cover"
                                                    style="color:transparent"
                                                    src="https://randomuser.me/api/portraits/men/10.jpg">
                                            </div>
                                        </figcaption>
                                    </figure>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </section>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    </section>
@endsection
