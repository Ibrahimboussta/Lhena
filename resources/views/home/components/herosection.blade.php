{{-- !herosection --}}
{{ __('messages.welcome') }}

<section class="bg-white">
    <div class="min-h-screen flex items-center">
        <div class="max-w-7xl mx-auto  w-full">


            <div class="hero-section flex flex-col items-center justify-center text-center px-4 sm:px-6 md:px-0">
                <h1
                    class="text-2xl sm:text-3xl md:text-5xl font-bold text-white text-center leading-snug max-w-[90%] sm:max-w-[80%] md:max-w-[55%] backdrop-blur-sm bg-gray/50 p-4 sm:p-6 rounded-lg mx-auto">
                    Simplifiez votre recherche immobilière au Maroc avec notre plateforme fiable.
                </h1>


                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 mt-2 md:mt-4">
                    <a href="{{ route('proprites') }}"
                        class="inline-flex items-center justify-center bg-green-600 text-white px-6 py-2.5 text-sm font-medium rounded-lg hover:bg-green-700 transition-all duration-200">
                        Explorez nos offres
                    </a>
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center justify-center bg-white text-black px-6 py-2.5 text-sm font-medium border border-gray-200 rounded-lg hover:bg-gray-50 transition-all duration-200">
                        Contactez-nous
                    </a>
                </div>
            </div>


            <!-- Search Form -->
            <div class="mt-8 md:mt-12">
                <form action="{{ route('properties.search') }}" method="GET"
                    class="hidden md:flex flex-col md:flex-row items-center gap-4 bg-gray-50 p-6 rounded-2xl shadow-md">




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
                    <button type="submit"
                        class="w-full md:w-auto px-6 py-2.5 bg-green-600 text-white text-sm font-medium rounded-lg hover:bg-green-700 transition-all duration-200">
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
