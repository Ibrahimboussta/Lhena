{{-- !herosection --}}
<section>
    <div class="herosection flex items-center justify-center text-black text-center px-6 relative">

        <!-- Contenu du Hero -->
        <div class="z-10 max-w-2xl text-center mx-auto py-20 sm:pt-0">

            <h1 class=" text-blue-900 md:text-4xl pt-14 sm:pt-20  font-extrabold leading-tight drop-shadow-lg">
                <a href="/" class="flex items-center justify-center">
                    <img class="h-[20vh] w-[30%]" src="{{ asset('images/logo.png') }}" alt="Logo">
                </a>
                <span class="text-6xl">
                    السوق الرقمي والميداني للعقارات

                </span>
                <br>
                <span class="text-4xl">
                    Real Estate Market Digital & Field
                </span>
            </h1>


            <!-- Filtre centré -->

            <form action="{{ route('properties.search') }}" method="GET"
                class="hidden md:flex w-full md:w-full flex flex-col md:flex-row items-center gap-3 mt-5 bg-white px-4 py-3 rounded-lg shadow-md">

                <!-- Search Bar -->

                <!-- Property Type Selection -->
                <select name="property_type"
                    class="w-full md:w-full px-4 py-2 border text-black border-[#25D366] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#25D366] transition duration-200">
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


                <!-- City Selection -->
                <select name="ville"
                    class="w-full md:w-full px-4 py-2 border text-black border-[#25D366] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#25D366] transition duration-200">
                    <option value="">Ville</option>
                    <option value="casablanca">Casablanca</option>
                    <option value="rabat">Rabat</option>
                    <option value="marrakech">Marrakech</option>
                </select>

                <!-- Neighborhood Selection -->
                <select name="quartier"
                    class="w-full md:w-full px-4 py-2 border text-black border-[#25D366] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#25D366] transition duration-200">
                    <option value="">Quartier</option>
                    <option value="centre">Centre-ville</option>
                    <option value="residence">Résidentiel</option>
                    <option value="bord">Bord de mer</option>
                </select>

                <!-- Filter Button -->
                <button type="submit"
                    class="w-full md:w-auto px-4 py-2 bg-[#E7C873] hover:bg-[#d6b760] text-black rounded-lg transition duration-200 ease-in-out">
                    Filtrer
                </button>
            </form>

        </div>

    </div>

    <form action="{{ route('properties.search') }}" method="GET"
        class="block md:hidden z-10 w-fit flex flex-wrap md:flex-nowrap justify-center items-center gap-3 mt-5 bg-white px-6 py-3 rounded-lg shadow-md">

        <!-- Search Bar -->

        <!-- Property Type Selection -->
        <select name="property_type"
            class="flex-grow md:flex-none w-full md:w-auto px-4 py-2 border text-black border-[#25D366] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#25D366] transition duration-200">
            <option value="">Type</option>
            <option value="appartement">Appartement</option>
            <option value="maison">Maison</option>
            <option value="terrain">Terrain</option>
        </select>

        <!-- City Selection -->
        <select name="ville"
            class="flex-grow md:flex-none w-full md:w-auto px-4 py-2 border text-black border-[#25D366] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#25D366] transition duration-200">
            <option value="">Ville</option>
            <option value="casablanca">Casablanca</option>
            <option value="rabat">Rabat</option>
            <option value="marrakech">Marrakech</option>
        </select>

        <!-- Neighborhood Selection -->
        <select name="quartier"
            class="flex-grow md:flex-none w-full md:w-auto px-4 py-2 border text-black border-[#25D366] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#25D366] transition duration-200">
            <option value="">Quartier</option>
            <option value="centre">Centre-ville</option>
            <option value="residence">Résidentiel</option>
            <option value="bord">Bord de mer</option>
        </select>



        <!-- Filter Button -->
        <button type="submit"
            class="px-4 py-2 bg-[#E7C873] hover:bg-[#d6b760] text-black rounded-lg transition duration-200 ease-in-out">
            Filtrer
        </button>
    </form>


</section>
{{-- !endherosection --}}
