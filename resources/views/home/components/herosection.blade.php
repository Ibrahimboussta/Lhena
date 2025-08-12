{{-- !herosection --}}
<section class="bg-white">
    <div class="min-h-screen flex items-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <!-- Main Hero Content -->
            <div class="flex flex-col md:flex-row items-center justify-between gap-8 md:gap-12 pt-20 md:pt-0">
                <!-- Right Side - Text -->
                <div class="w-full md:w-1/2">
                    <div class="flex flex-col gap-4 md:gap-6">
                        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 !leading-tight">
                            Simplifiez votre recherche immobilière au Maroc avec notre plateforme fiable.
                        </h1>
                        <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 mt-2 md:mt-4">
                            <a href="{{ route('proprites') }}"
                                class="inline-flex items-center justify-center bg-black text-white px-6 py-2.5 text-sm font-medium rounded-lg hover:bg-gray-800 transition-all duration-200">
                                Explorez nos offres
                            </a>
                            <a href="{{ route('contact') }}"
                                class="inline-flex items-center justify-center bg-white text-black px-6 py-2.5 text-sm font-medium border border-gray-200 rounded-lg hover:bg-gray-50 transition-all duration-200">
                                Contactez-nous
                            </a>
                        </div>

                    </div>
                </div>

                <!-- Left Side - Image -->
                <div class="w-full md:w-1/2 flex justify-center px-4 sm:px-6 md:px-0 hidden lg:bg-white sm:bg-gray-200 md:flex">
                    <img class="w-full max-w-2xl rounded-2xl shadow-sm" src="{{ asset('images/hero.jpg') }}" alt="Hero Image">
                </div>
            </div>


            <!-- Search Form -->
            <div class="mt-8 md:mt-12">
                <form action="{{ route('properties.search') }}" method="GET"
                    class="hidden md:flex flex-col md:flex-row items-center gap-4 bg-gray-50 p-6 rounded-2xl shadow-md">

                    <!-- Property Type Selection -->
                    <select name="property_type"
                        class="w-full md:w-1/3 px-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-black/5 focus:border-gray-300 transition-all duration-200">
                        <option value="">Type de bien</option>
                        <option value="appartement">Appartement</option>
                        <option value="studio">Studio</option>
                        <option value="bureau">Bureau</option>
                        <option value="villa">Villa</option>
                        <option value="maison">Maison</option>
                        <option value="terrain">Terrain</option>
                    </select>

                    <!-- City Selection -->
                    <select name="ville"
                        class="w-full md:w-1/3 px-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-black/5 focus:border-gray-300 transition-all duration-200">
                        <option value="">Ville</option>
                        <option value="casablanca">Casablanca</option>
                        <option value="rabat">Rabat</option>
                        <option value="marrakech">Marrakech</option>
                    </select>

                    <!-- Neighborhood Selection -->
                    <select name="quartier"
                        class="w-full md:w-1/3 px-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-black/5 focus:border-gray-300 transition-all duration-200">
                        <option value="">Quartier</option>
                        <option value="centre">Centre-ville</option>
                        <option value="residence">Résidentiel</option>
                        <option value="bord">Bord de mer</option>
                    </select>

                    <!-- Filter Button -->
                    <button type="submit"
                        class="w-full md:w-auto px-6 py-2.5 bg-black text-white text-sm font-medium rounded-lg hover:bg-gray-800 transition-all duration-200">
                        Rechercher
                    </button>
                </form>

                <!-- Mobile Form -->
                <form action="{{ route('properties.search') }}" method="GET"
                    class="md:hidden flex flex-col gap-4 bg-gray-50 px-5 py-6 rounded-2xl shadow-md mt-6">

                    <!-- Property Type Selection -->
                    <select name="property_type"
                        class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-black/5 focus:border-gray-300 transition-all duration-200">
                        <option value="">Type de bien</option>
                        <option value="appartement">Appartement</option>
                        <option value="maison">Maison</option>
                        <option value="terrain">Terrain</option>
                    </select>

                    <!-- City Selection -->
                    <select name="ville"
                        class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-black/5 focus:border-gray-300 transition-all duration-200">
                        <option value="">Ville</option>
                        <option value="casablanca">Casablanca</option>
                        <option value="rabat">Rabat</option>
                        <option value="marrakech">Marrakech</option>
                    </select>

                    <!-- Neighborhood Selection -->
                    <select name="quartier"
                        class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-black/5 focus:border-gray-300 transition-all duration-200">
                        <option value="">Quartier</option>
                        <option value="centre">Centre-ville</option>
                        <option value="residence">Résidentiel</option>
                        <option value="bord">Bord de mer</option>
                    </select>

                    <!-- Filter Button -->
                    <button type="submit"
                        class="w-full px-6 py-2.5 bg-black text-white text-sm font-medium rounded-lg hover:bg-gray-800 transition-all duration-200">
                        Rechercher
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
</div>
</div>
</div>
</section>


</section>
{{-- !endherosection --}}
