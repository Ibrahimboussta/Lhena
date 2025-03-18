@extends('layouts.index')
@section('content')
    <section>
        <div class="px-6 sm:px-16 pt-24 pb-10 flex flex-col md:flex-row gap-6">
            <!-- Contenu principal (Recherche + Cards) -->
            <div class="flex-1 order-2 md:order-none">

                <!-- Search Form -->
                <form action="{{ route('properties.search') }}" method="GET"
                    class="w-full z-50  max-w-none flex flex-wrap md:flex-nowrap items-center gap-3 mt-5 bg-white px-4 py-3 rounded-lg shadow-md md:sticky md:top-[4rem]">
                    <!-- Search Bar -->
                    <input type="text" name="query" placeholder="Rechercher un bien..."
                        class="flex-grow md:flex-none w-[50vw] px-4 py-2 border text-black border-[#25D366] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#25D366] transition duration-200" />

                    <!-- Property Type Selection -->
                    <select name="property_type" class="border p-2 rounded w-full" required>
                        <option value="" disabled selected>Type</option>
                        <option value="appartement">Appartement</option>
                        <option value="maison">Maison</option>
                        <option value="terrain">Terrain</option>
                        <option value="villa">Villa</option>
                    </select>

                    <!-- Neighborhood Selection -->
                    <select name="quartier" class="border p-2 rounded w-full">
                        <option value="">Quartier</option>
                        <option value="centre-ville">Centre-ville</option>
                        <option value="residence">Résidentiel</option>
                        <option value="bord">Bord de mer</option>
                    </select>

                    <!-- City Selection -->
                    <select name="ville" class="border p-2 rounded w-full">
                        <option value="">Ville</option>
                        <option value="casablanca">Casablanca</option>
                        <option value="rabat">Rabat</option>
                        <option value="marrakech">Marrakech</option>
                    </select>

                    <!-- Filter Button -->
                    <button type="submit"
                        class="px-4 py-2 bg-[#E7C873] hover:bg-[#d6b760] text-black rounded-lg transition duration-200 ease-in-out">
                        Filtrer
                    </button>
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
                                                        class="text-white bg-[#25D366] rounded-2xl px-3 py-1 uppercase font-medium text-xs sm:text-sm">
                                                        À vendre
                                                    </span>
                                                @endif
                                                @if (strpos($property->listing_type, 'À-louer') !== false)
                                                    <span
                                                        class="text-white bg-[#E7C873] rounded-2xl px-3 py-1 uppercase font-medium text-xs sm:text-sm">
                                                        À louer
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Property Details -->
                                        <div class="flex justify-between items-start pt-2 px-1">
                                            <div>
                                                <p class="font-semibold text-[#1A1A1A] text-xl">{{ $property->title }}</p>
                                                <div class="flex items-center space-x-0.5 pt-1">
                                                    <img src="{{ asset('images/local.svg') }}" alt=""
                                                        class="w-4 h-4">
                                                    <p>{{ $property->address }}</p>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-[#1F4B43]">{{ $property->price }} DH</p>
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
