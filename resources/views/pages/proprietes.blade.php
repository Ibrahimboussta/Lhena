@extends('layouts.index')
@section('content')
    <section>
        <div class="px-6 sm:px-16 pt-24 pb-10 flex flex-col md:flex-row gap-6">
            <!-- Contenu principal (Recherche + Cards) -->
            <div class="flex-1 order-2 md:order-none">

                <!-- Search Form -->
                <form action="{{ route('properties.search') }}" method="GET" x-data="{ active: 1 }"
                    class="bg-white/95 backdrop-blur-md p-6 rounded-2xl shadow-lg border border-gray-100 space-y-4">

                    <!-- Toggle Buttons -->
                    <div class="flex gap-3">
                        <button type="button" @click="active = (active === 1 ? null : 1)"
                            :class="active === 1 ? 'bg-green-600 text-white' : 'bg-emerald-100 text-emerald-700'"
                            class="flex-1 px-4 py-2 rounded-lg text-sm font-medium transition">
                            Filtres
                        </button>
                        <button type="button" @click="active = (active === 2 ? null : 2)"
                            :class="active === 2 ? 'bg-green-600 text-white' : 'bg-emerald-100 text-emerald-700'"
                            class="flex-1 px-4 py-2 rounded-lg text-sm font-medium transition">
                            Prix
                        </button>
                        <button type="button" @click="active = (active === 3 ? null : 3)"
                            :class="active === 3 ? 'bg-green-600 text-white' : 'bg-emerald-100 text-emerald-700'"
                            class="flex-1 px-4 py-2 rounded-lg text-sm font-medium transition">
                            Dates
                        </button>
                    </div>

                    <!-- Sections -->
                    <div class="space-y-4">
                        <!-- Part 1: Basic Filters -->
                        <div x-show="active === 1" x-transition class="grid grid-cols-1 md:grid-cols-4 gap-3">
                            <select name="listing_type"
                                class="border-gray-200 rounded-lg px-3 py-2 text-sm shadow-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                <option value="">Statut</option>
                                <option value="À-vendre">À vendre</option>
                                <option value="À-louer">À louer</option>
                            </select>

                            <select name="property_type"
                                class="border-gray-200 rounded-lg px-3 py-2 text-sm shadow-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                <option value="">Type</option>
                                <option value="appartement">Appartement</option>
                                <option value="studio">Studio</option>
                                <option value="villa">Villa</option>
                                <option value="maison">Maison</option>
                            </select>

                            <select name="ville"
                                class="border-gray-200 rounded-lg px-3 py-2 text-sm shadow-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                <option value="">Ville</option>
                                <option value="casablanca">Casablanca</option>
                                <option value="rabat">Rabat</option>
                                <option value="marrakech">Marrakech</option>
                            </select>

                            <select name="quartier"
                                class="border-gray-200 rounded-lg px-3 py-2 text-sm shadow-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                <option value="">Quartier</option>
                                <option value="centre-ville">Centre-ville</option>
                                <option value="residence">Résidentiel</option>
                                <option value="bord">Bord de mer</option>
                            </select>
                        </div>

                        <!-- Part 2: Price Range -->
                        <div x-show="active === 2" x-transition class="grid grid-cols-2 gap-3">
                            <input type="number" name="min_price" placeholder="Prix min" min="0"
                                class="border-gray-200 rounded-lg px-3 py-2 text-sm shadow-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                            <input type="number" name="max_price" placeholder="Prix max" min="0"
                                class="border-gray-200 rounded-lg px-3 py-2 text-sm shadow-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        </div>

                        <!-- Part 3: Date Range -->
                        <div x-show="active === 3" x-transition class="grid grid-cols-2 gap-3">
                            <input type="date" name="from_date"
                                class="border-gray-200 rounded-lg px-3 py-2 text-sm shadow-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                            <input type="date" name="to_date"
                                class="border-gray-200 rounded-lg px-3 py-2 text-sm shadow-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        </div>
                    </div>

                    <!-- Search Button -->
                    <div class="flex justify-end">
                        <button type="submit"
                            class="flex items-center justify-center w-11 h-11 rounded-full bg-green-600 text-white shadow-md hover:bg-emerald-600 hover:shadow-lg active:scale-95 transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                            </svg>
                        </button>
                    </div>
                </form>


                <!-- Property Cards -->
                <div class="flex justify-between pt-6 w-full">
                    @if ($properties->isEmpty())
                        <!-- Check if properties are empty -->
                        <div class="flex justify-center items-center w-full h-[20vh]">
                            <p class="text-[#1A1A1A] text-2xl">Aucune propriété trouvée</p>
                        </div>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 sm:gap-6 w-full">
                            @foreach ($properties as $property)
                                <a href="{{ route('proprites.details', $property->slug) }}" class="w-full">
                                    <div
                                        class="w-full rounded-2xl border border-[#e0dede] p-2 hover:shadow duration-400 relative">
                                        <!-- Image Section with Positioned Labels -->
                                        <div class="relative">
                                        <div class="relative overflow-hidden rounded-2xl">
                                            <div class="absolute inset-0 skeleton skeleton-animate rounded-2xl"></div>
                                            <img class="w-full h-80 object-cover rounded-2xl opacity-0 transition-[opacity,transform] duration-300 hover:scale-[1.02]"
                                                src="{{ asset('storage/' . json_decode($property->photos)[0]) }}"
                                                alt="" loading="lazy" decoding="async"
                                                onload="this.classList.remove('opacity-0'); this.previousElementSibling.classList.add('opacity-0'); this.previousElementSibling.classList.remove('skeleton-animate');">
                                        </div>

                                            <!-- Labels -->
                                            <div class="absolute top-4 left-4 flex space-x-2">
                                                @if (strpos($property->listing_type, 'À-vendre') !== false)
                                                    <span
                                                        class="text-white bg-[#25D366] rounded-lg px-3 py-1 uppercase font-medium text-xs">
                                                        À vendre
                                                    </span>
                                                @endif
                                                @if (strpos($property->listing_type, 'À-louer') !== false)
                                                    <span
                                                        class="text-white bg-[#E7C873] rounded-lg px-3 py-1 uppercase font-medium text-xs">
                                                        À louer
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Property Details -->
                                        <div class="flex justify-between items-start pt-2 px-1">
                                            <div>
                                                <p class="font-medium text-[#8b8b8b] text-[15px]">
                                                    {{ $property->property_type }}</p>
                                                <p class="font-semibold text-[#1A1A1A] text-xl">{{ $property->title }}</p>
                                                <div class="flex items-center space-x-0.5 pt-1">
                                                    <img src="{{ asset('images/local.svg') }}" alt=""
                                                        class="w-4 h-4" loading="lazy">
                                                    <p>{{ $property->address }}</p>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-xl text-[#25D366]">{{ $property->price }} DH
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Property Features -->
                                        <div class="flex items-center py-2 px-1 gap-x-4">
                                            <div class="flex items-center space-x-0.5">
                                                <img class="w-4 h-4" src="{{ asset('images/beds.svg') }}" alt="" loading="lazy">
                                                <p>{{ $property->bedrooms }}</p>
                                            </div>
                                            <div class="flex items-center space-x-0.5">
                                                <img class="w-4 h-4" src="{{ asset('images/dosh.svg') }}"
                                                    alt="" loading="lazy">
                                                <p>{{ $property->bathrooms }}</p>
                                            </div>
                                            <div class="flex items-center space-x-0.5">
                                                <img class="w-4 h-4" src="{{ asset('images/space.svg') }}"
                                                    alt="" loading="lazy">
                                                <p>{{ $property->surface }} m²</p>
                                            </div>
                                        </div>

                                        <!-- Availability Date -->
                                        @if ($property->date_available)
                                            <div class="flex items-center px-1 pb-2">
                                                <div class="flex items-center space-x-2 text-sm text-gray-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                    <span>Disponible à partir du
                                                        {{ \Carbon\Carbon::parse($property->date_available)->format('d/m/Y') }}</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Pagination -->
                <div class="flex justify-center pt-6">
                    <div class="flex space-x-2">
                        {{ $properties->links('vendor.pagination.custom') }}
                    </div>
                </div>




            </div>


        </div>
    </section>


    <script src="//unpkg.com/alpinejs" defer></script>

@endsection

