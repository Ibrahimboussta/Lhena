@extends('layouts.index')
@section('content')
<section >

    <div class="px-6 sm:px-16 pt-24 flex flex-col md:flex-row gap-6">

        <!-- Sidebar (Filtres) - S'affiche en haut sur mobile -->
        <aside class="bg-white p-4 rounded-lg w-full md:w-1/4 md:h-screen md:sticky top-[100px] order-1 md:order-none">
            <div class="flex justify-between gap-2 mb-4">
                <button class="w-1/2 py-2 bg-gray-200 focus:bg-[#25D366] text-gray-800 rounded-md">À vendre</button>
                <button class="w-1/2 py-2 bg-gray-200 focus:bg-[#25D366] text-gray-800 rounded-md">À louer</button>
            </div>
            <hr class="mb-4">

            <div class="grid grid-cols-3 md:grid-cols-2 gap-2">
                <button class="w-full py-2 bg-gray-200 text-gray-800 focus:bg-[#25D366] rounded-md">Appartement</button>
                <button class="w-full py-2 bg-gray-200 text-gray-800 focus:bg-[#25D366] rounded-md">Villa</button>
                <button class="w-full py-2 bg-gray-200 text-gray-800 focus:bg-[#25D366] rounded-md">Terrain</button>
                <button class="w-full py-2 bg-gray-200 text-gray-800 focus:bg-[#25D366] rounded-md">Duplex</button>
                <button class="w-full py-2 bg-gray-200 text-gray-800 focus:bg-[#25D366] rounded-md">Riad</button>
                <button class="w-full py-2 bg-gray-200 text-gray-800 focus:bg-[#25D366] rounded-md">Studio</button>
            </div>
            <hr class="my-4">

            <div class="space-y-3">
                <select class="w-full py-2 px-3 border rounded-md">
                    <option disabled selected>Choisir une ville</option>
                    <option>Casablanca</option>
                    <option>Marrakech</option>
                </select>
                <select class="w-full py-2 px-3 border rounded-md">
                    <option disabled selected>Choisir un quartier</option>
                    <option>Maarif</option>
                    <option>Gueliz</option>
                </select>
            </div>
        </aside>

        <!-- Contenu principal (Recherche + Cards) -->
        <div class="flex-1 order-2 md:order-none">

            <!-- Barre de recherche -->
            <div class="mb-6">
                <input type="text" placeholder="Rechercher une propriété..."
                    class="w-full px-4 py-2 border-2 border-[#25D366] rounded-md shadow-sm">
            </div>

            <!-- Cartes des propriétés -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @for ($i = 0; $i < 9; $i++)
                    <a href="{{route('proprites.details')}}" class="w-full">
                        <div
                            class="w-full aspect-square rounded-2xl border border-[#e0dede] p-2 hover:shadow duration-400 relative">
                            <div class="relative">
                                <img class="w-full h-full object-cover rounded-2xl" src="{{ asset('images/casa.jpg') }}"
                                    alt="">
                                <div class="absolute top-4 left-4 flex space-x-2">
                                    <span
                                        class="text-white bg-[#25D366] rounded-2xl px-3 py-1 uppercase font-medium text-xs sm:text-sm">
                                        À vendre
                                    </span>
                                    <span
                                        class="text-white bg-[#E7C873] rounded-2xl px-3 py-1 uppercase font-medium text-xs sm:text-sm">
                                        À louer
                                    </span>
                                </div>
                            </div>

                            <!-- Détails -->
                            <div class="flex justify-between items-center pt-2 px-1">
                                <p class="font-semibold text-[#1A1A1A] text-xs sm:text-sm md:text-base flex-1 truncate">
                                    Maison familiale de luxe
                                </p>
                                <p
                                    class="font-semibold text-[#1F4B43] text-xs sm:text-sm md:text-base whitespace-nowrap">
                                    $395,000
                                </p>
                            </div>

                            <div class="flex items-center space-x-0.5 pt-1 text-[10px] sm:text-xs md:text-sm px-1">
                                <img src="{{ asset('images/local.svg') }}" alt="" class="w-3 h-3 md:w-4 md:h-4">
                                <p class="whitespace-nowrap">1800-1818 79th St</p>
                            </div>

                            <div class="flex items-center py-2 px-1 gap-x-2 text-[10px] sm:text-xs md:text-sm">
                                <div class="flex items-center space-x-0.5">
                                    <img class="w-3 h-3 md:w-4 md:h-4" src="{{ asset('images/beds.svg') }}"
                                        alt="">
                                    <p class="whitespace-nowrap">4 lits</p>
                                </div>
                                <div class="w-[1px] h-4 bg-gray-400"></div>
                                <div class="flex items-center space-x-0.5">
                                    <img class="w-3 h-3 md:w-4 md:h-4" src="{{ asset('images/dosh.svg') }}"
                                        alt="">
                                    <p class="whitespace-nowrap">1 salle de bain</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-0.5 px-1 text-[10px] sm:text-xs md:text-sm">
                                <img class="w-3 h-3 md:w-4 md:h-4" src="{{ asset('images/space.svg') }}" alt="">
                                <p class="whitespace-nowrap">400 pieds carrés</p>
                            </div>
                        </div>
                    </a>
                @endfor
            </div>

            <!-- Pagination -->
            <div class="flex justify-center pt-6">
                <div class="flex space-x-2">
                    <button class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md">1</button>
                    <button class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md">2</button>
                    <button class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md">3</button>
                    <button class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md">></button>
                </div>
            </div>

        </div>

    </div>


</section>
@endsection