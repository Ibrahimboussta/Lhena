{{-- !herosection --}}
<section>
    <div class="herosection flex items-center justify-center text-black text-center px-6 relative">

        <!-- Contenu du Hero -->
        <div class="z-10 max-w-2xl text-center mx-auto py-20 sm:pt-0">
            <h1 class="text-3xl md:text-6xl pt-20  font-bold leading-tight drop-shadow-lg">
                Votre Propriété, Notre Priorité.
            </h1>
            <h3 class="mt-4 text-md md:text-xl font-light drop-shadow-md">
                Confiez-nous votre bien, nous en prendrons soin comme si c'était le nôtre.
            </h3>

            <!-- Filtre centré -->
            <form action="{{ route('properties.search') }}" method="GET"
            class="z-10 w-fit flex flex-wrap md:flex-nowrap justify-center items-center gap-3 mt-5 bg-white px-4 py-3 rounded-lg shadow-md">
            
            <!-- Search Bar -->
            <input type="text" name="query" placeholder="Rechercher un bien..."
                class="flex-grow md:flex-none w-full md:w-auto px-4 py-2 border text-black border-[#25D366] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#25D366] transition duration-200" />
        
            <!-- Property Type Selection -->
            <select name="property_type" class="flex-grow md:flex-none w-full md:w-auto px-4 py-2 border text-black border-[#25D366] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#25D366] transition duration-200">
                <option value="">Type</option>
                <option value="appartement">Appartement</option>
                <option value="maison">Maison</option>
                <option value="terrain">Terrain</option>
            </select>
        
            <!-- Neighborhood Selection -->
            <select name="quartier" class="flex-grow md:flex-none w-full md:w-auto px-4 py-2 border text-black border-[#25D366] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#25D366] transition duration-200">
                <option value="">Quartier</option>
                <option value="centre">Centre-ville</option>
                <option value="residence">Résidentiel</option>
                <option value="bord">Bord de mer</option>
            </select>
        
            <!-- City Selection -->
            <select name="ville" class="flex-grow md:flex-none w-full md:w-auto px-4 py-2 border text-black border-[#25D366] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#25D366] transition duration-200">
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
        

        </div>

    </div>

</section>
{{-- !endherosection --}}
