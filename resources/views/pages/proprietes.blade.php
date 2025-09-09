@extends('layouts.index')
@section('content')
    <section>
        <div class="px-6 sm:px-16 pt-24 pb-10 flex flex-col md:flex-row gap-6">
            <!-- Contenu principal (Recherche + Cards) -->
            <div class="flex-1 order-2 md:order-none">

                <!-- Search Form -->
                <form action="{{ route('properties.search') }}" method="GET"
                    class="w-full max-w-none grid grid-cols-1 md:grid-cols-6 gap-3 mt-5 bg-white px-4 py-4 rounded-2xl shadow-lg md:sticky md:top-[4rem] z-50">

                    <!-- Listing Type -->
                    <select name="listing_type" class="border p-2 rounded-lg w-full focus:ring-2 focus:ring-black/50">
                        <option value="">Statut</option>
                        <option value="À-vendre">À vendre</option>
                        <option value="À-louer">À louer</option>
                    </select>

                    <!-- Property Type -->
                    <select name="property_type" class="border p-2 rounded-lg w-full focus:ring-2 focus:ring-black/50">
                        <option value="">Type</option>
                        <option value="appartement">Appartement</option>
                        <option value="studio">Studio</option>
                        <option value="bureau">Bureau</option>
                        <option value="local_commercial">Local commercial</option>
                        <option value="depot_entrepot">Dépôt/Entrepôt</option>
                        <option value="villa">Villa</option>
                        <option value="maison">Maison</option>
                        <option value="immeuble">Immeuble</option>
                        <option value="terrain_urbain">Terrain urbain</option>
                        <option value="terrain_industriel">Terrain industriel/Carrière</option>
                        <option value="ferme_terrain_agricole">Ferme/Terrain agricole</option>
                        <option value="hotel_cafe_restaurant">Hôtel/Café-Restaurant</option>
                        <option value="residence_balneaire">Résidence balnéaire</option>
                        <option value="residence_etudiante">Résidence étudiante</option>
                        <option value="location_vacances">Location de vacances</option>
                    </select>

                    <!-- City -->
                    <select name="ville" class="border p-2 rounded-lg w-full focus:ring-2 focus:ring-black/50">
                        <option value="">Ville</option>
                        <option value="casablanca">Casablanca</option>
                        <option value="rabat">Rabat</option>
                        <option value="marrakech">Marrakech</option>
                    </select>

                    <!-- Neighborhood -->
                    <select name="quartier" class="border p-2 rounded-lg w-full focus:ring-2 focus:ring-black/50">
                        <option value="">Quartier</option>
                        <option value="centre-ville">Centre-ville</option>
                        <option value="residence">Résidentiel</option>
                        <option value="bord">Bord de mer</option>
                    </select>

                    <!-- Price Range -->
                    <div class="grid grid-cols-2 gap-2">
                        <input type="number" name="min_price" placeholder="Prix min" class="border p-2 rounded-lg w-full">
                        <input type="number" name="max_price" placeholder="Prix max" class="border p-2 rounded-lg w-full">
                    </div>

                    <!-- Date Range -->
                    <div class="grid grid-cols-2 gap-2">
                        <input type="date" name="from_date" class="border p-2 rounded-lg w-full">
                        <input type="date" name="to_date" class="border p-2 rounded-lg w-full">
                    </div>

                    <!-- Filter Button -->
                    <div class="md:col-span-6 flex justify-end">
                        <button type="submit"
                            class="w-full md:w-auto inline-flex items-center justify-center px-6 py-2.5 bg-black text-white text-sm font-semibold rounded-lg hover:bg-gray-800 transition-all duration-200">
                            🔍 Filtrer
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
                                <a href="{{ route('proprites.details', $property->id) }}" class="w-full">
                                    <div
                                        class="w-full rounded-2xl border border-[#e0dede] p-2 hover:shadow duration-400 relative">
                                        <!-- Image Section with Positioned Labels -->
                                        <div class="relative">
                                            <img class="w-full h-80 object-cover rounded-2xl"
                                                src="{{ asset('storage/' . json_decode($property->photos)[0]) }}"
                                                alt="">

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
                                                        class="w-4 h-4">
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
                                                <img class="w-4 h-4" src="{{ asset('images/beds.svg') }}" alt="">
                                                <p>{{ $property->bedrooms }}</p>
                                            </div>
                                            <div class="flex items-center space-x-0.5">
                                                <img class="w-4 h-4" src="{{ asset('images/dosh.svg') }}" alt="">
                                                <p>{{ $property->bathrooms }}</p>
                                            </div>
                                            <div class="flex items-center space-x-0.5">
                                                <img class="w-4 h-4" src="{{ asset('images/space.svg') }}" alt="">
                                                <p>{{ $property->surface }} m²</p>
                                            </div>
                                        </div>

                                        <!-- Availability Date -->
                                        @if ($property->date_available)
                                            <div class="flex items-center px-1 pb-2">
                                                <div class="flex items-center space-x-2 text-sm text-gray-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
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
        </div>
    </section>


@endsection
