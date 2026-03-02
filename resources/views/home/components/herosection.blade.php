{{-- !herosection --}}
{{ __('messages.welcome') }}

<section class="bg-white">
    <div class="min-h-screen flex items-center">
        <div class="max-w-7xl mx-auto  w-full">


            <div class="hero-section flex flex-col items-center justify-center text-center px-4 sm:px-6 md:px-0">
                <h1 class="text-2xl sm:text-3xl md:text-5xl font-bold text-white text-center leading-snug max-w-[90%] sm:max-w-[80%] md:max-w-[55%] backdrop-blur-sm bg-gray/50 p-4 sm:p-6 rounded-lg mx-auto">
                    Simplifiez votre recherche immobilière au Maroc avec notre plateforme fiable.
                </h1>


                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 mt-2 md:mt-4">
                    <a href="{{ route('proprites') }}" class="inline-flex items-center justify-center bg-green-600 text-white px-6 py-2.5 text-sm font-medium rounded-lg hover:bg-green-700 transition-all duration-200">
                        Explorez nos offres
                    </a>
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center bg-white text-black px-6 py-2.5 text-sm font-medium border border-gray-200 rounded-lg hover:bg-gray-50 transition-all duration-200">
                        Contactez-nous
                    </a>
                </div>
            </div>


            <!-- Search Form -->
            <div class="mt-8 md:mt-12">
                <form action="{{ route('properties.search') }}" method="GET" x-data="{ active: 1 }" class="relative z-30 bg-white/95 backdrop-blur-md p-6 rounded-2xl shadow-lg border border-gray-100 space-y-4">

                    <!-- Toggle Buttons -->
                    <div class="flex gap-3">
                        <button type="button" @click="active = (active === 1 ? null : 1)" :class="active === 1 ? 'bg-emerald-600 text-white' : 'bg-emerald-100 text-emerald-700'" class="flex-1 px-4 py-2 rounded-lg text-sm font-medium transition">
                            Filtres
                        </button>
                        <button type="button" @click="active = (active === 2 ? null : 2)" :class="active === 2 ? 'bg-emerald-600 text-white' : 'bg-emerald-100 text-emerald-700'" class="flex-1 px-4 py-2 rounded-lg text-sm font-medium transition">
                            Prix
                        </button>
                        <button type="button" @click="active = (active === 3 ? null : 3)" :class="active === 3 ? 'bg-emerald-600 text-white' : 'bg-emerald-100 text-emerald-700'" class="flex-1 px-4 py-2 rounded-lg text-sm font-medium transition">
                            Dates
                        </button>
                    </div>

                    <!-- Sections -->
                    <div class="space-y-4">
                        <!-- Part 1: Basic Filters -->
                        <div x-show="active === 1" x-transition class="grid grid-cols-1 md:grid-cols-4 gap-3">
                            <select name="listing_type" class="border-gray-200 rounded-lg px-3 py-2 text-sm shadow-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                <option value="">Statut</option>
                                <option value="À-vendre">À vendre</option>
                                <option value="À-louer">À louer</option>
                            </select>

                            <div x-data="{
    open: false,
    search: '',
    selected: '',
    types: [
        { value: '', label: 'Type' },
        { value: 'appartement', label: 'Appartement' },
        { value: 'villa', label: 'Villa' },
        { value: 'maison', label: 'Maison' },
        { value: 'studio', label: 'Studio' },
        { value: 'duplex', label: 'Duplex' },
        { value: 'triplex', label: 'Triplex' },
        { value: 'penthouse', label: 'Penthouse' },
        { value: 'loft', label: 'Loft' },
        { value: 'bureau', label: 'Bureau' },
        { value: 'commerce', label: 'Commerce' },
        { value: 'terrain', label: 'Terrain' },
        { value: 'garage', label: 'Garage/Parking' },
        { value: 'entrepot', label: 'Entrepôt' },
        { value: 'riad', label: 'Riad' },
        { value: 'chambre', label: 'Chambre' },
        { value: 'colocation', label: 'Colocation' }
    ],
    get filtered() {
        return this.types.filter(o => o.label.toLowerCase().includes(this.search.toLowerCase()));
    }
}" class="relative">
                                <div @click="open = !open" class="border border-gray-200 rounded-lg px-3 py-2 text-sm shadow-sm bg-white cursor-pointer flex items-center justify-between">
                                    <span x-text="types.find(o => o.value === selected)?.label || 'Type'"></span>
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                </div>
                                <div x-show="open" @click.away="open = false" class="absolute z-10 w-full bg-white border border-gray-200 rounded-lg mt-1 shadow-lg">
                                    <input type="text" x-model="search" placeholder="Rechercher un type..." class="w-full px-3 py-2 border-b border-gray-100 text-sm focus:outline-none">
                                    <ul class="max-h-48 overflow-y-auto">
                                        <template x-for="option in filtered" :key="option.value">
                                            <li @click="selected = option.value; open = false" :class="{'bg-emerald-100': selected === option.value}" class="px-3 py-2 cursor-pointer hover:bg-emerald-50 text-sm" x-text="option.label"></li>
                                        </template>
                                    </ul>
                                </div>
                                <input type="hidden" name="property_type" :value="selected">
                            </div>

                            <div x-data="{
    open: false,
    search: '',
    selected: '',
    villes: [
        { value: '', label: 'Ville' },
        { value: 'agadir', label: 'Agadir' },
        { value: 'ait melloul', label: 'Ait Melloul' },
        { value: 'asfi', label: 'Asfi' },
        { value: 'azemmour', label: 'Azemmour' },
        { value: 'ben guerir', label: 'Ben Guerir' },
        { value: 'beni mellal', label: 'Beni Mellal' },
        { value: 'berkane', label: 'Berkane' },
        { value: 'berrechid', label: 'Berrechid' },
        { value: 'boujdour', label: 'Boujdour' },
        { value: 'bouznika', label: 'Bouznika' },
        { value: 'casablanca', label: 'Casablanca' },
        { value: 'chefchaouen', label: 'Chefchaouen' },
        { value: 'dakhla', label: 'Dakhla' },
        { value: 'el jadida', label: 'El Jadida' },
        { value: 'el kelaa des sraghna', label: 'El Kelaa des Sraghna' },
        { value: 'errachidia', label: 'Errachidia' },
        { value: 'essaouira', label: 'Essaouira' },
        { value: 'fes', label: 'Fès' },
        { value: 'fnideq', label: 'Fnideq' },
        { value: 'guelmim', label: 'Guelmim' },
        { value: 'guercif', label: 'Guercif' },
        { value: 'ifrane', label: 'Ifrane' },
        { value: 'kenitra', label: 'Kénitra' },
        { value: 'khemisset', label: 'Khemisset' },
        { value: 'khenifra', label: 'Khenifra' },
        { value: 'khouribga', label: 'Khouribga' },
        { value: 'laayoune', label: 'Laâyoune' },
        { value: 'larache', label: 'Larache' },
        { value: 'marrakech', label: 'Marrakech' },
        { value: 'martil', label: 'Martil' },
        { value: 'mechra bel ksiri', label: 'Mechra Bel Ksiri' },
        { value: 'meknes', label: 'Meknès' },
        { value: 'midelt', label: 'Midelt' },
        { value: 'mohammedia', label: 'Mohammedia' },
        { value: 'nador', label: 'Nador' },
        { value: 'ouarzazate', label: 'Ouarzazate' },
        { value: 'ouazzane', label: 'Ouazzane' },
        { value: 'oued zem', label: 'Oued Zem' },
        { value: 'oujda', label: 'Oujda' },
        { value: 'rabat', label: 'Rabat' },
        { value: 'safi', label: 'Safi' },
        { value: 'sale', label: 'Salé' },
        { value: 'sefrou', label: 'Sefrou' },
        { value: 'settat', label: 'Settat' },
        { value: 'sidi bennour', label: 'Sidi Bennour' },
        { value: 'sidi kacem', label: 'Sidi Kacem' },
        { value: 'sidi slimane', label: 'Sidi Slimane' },
        { value: 'skhirat', label: 'Skhirat' },
        { value: 'tanger', label: 'Tanger' },
        { value: 'taourirt', label: 'Taourirt' },
        { value: 'tarfaya', label: 'Tarfaya' },
        { value: 'taroudant', label: 'Taroudant' },
        { value: 'taza', label: 'Taza' },
        { value: 'temara', label: 'Témara' },
        { value: 'tetouan', label: 'Tétouan' },
        { value: 'tinghir', label: 'Tinghir' },
        { value: 'tiznit', label: 'Tiznit' },
        { value: 'zagora', label: 'Zagora' }
    ],
    get filtered() {
        return this.villes.filter(o => o.label.toLowerCase().includes(this.search.toLowerCase()));
    }
}" class="relative">
                                <div @click="open = !open" class="border border-gray-200 rounded-lg px-3 py-2 text-sm shadow-sm bg-white cursor-pointer flex items-center justify-between">
                                    <span x-text="villes.find(o => o.value === selected)?.label || 'Ville'"></span>
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                </div>
                                <div x-show="open" @click.away="open = false" class="absolute z-10 w-full bg-white border border-gray-200 rounded-lg mt-1 shadow-lg">
                                    <input type="text" x-model="search" placeholder="Rechercher une ville..." class="w-full px-3 py-2 border-b border-gray-100 text-sm focus:outline-none">
                                    <ul class="max-h-48 overflow-y-auto">
                                        <template x-for="option in filtered" :key="option.value">
                                            <li @click="selected = option.value; open = false" :class="{'bg-emerald-100': selected === option.value}" class="px-3 py-2 cursor-pointer hover:bg-emerald-50 text-sm" x-text="option.label"></li>
                                        </template>
                                    </ul>
                                </div>
                                <input type="hidden" name="ville" :value="selected">
                            </div>

                            <div x-data="{
    open: false,
    search: '',
    selected: '',
    quartiers: [
        { value: '', label: 'Quartier' },
        { value: 'centre-ville', label: 'Centre-ville' },
        { value: 'residence', label: 'Résidentiel' },
        { value: 'bord', label: 'Bord de mer' },
        { value: 'maarif', label: 'Maârif' },
        { value: 'gueliz', label: 'Guéliz' },
        { value: 'agdal', label: 'Agdal' },
        { value: 'hay hassani', label: 'Hay Hassani' },
        { value: 'ain sebaa', label: 'Aïn Sebaâ' },
        { value: 'sidi maarouf', label: 'Sidi Maârouf' },
        { value: 'ain diab', label: 'Aïn Diab' },
        { value: 'sidi moumen', label: 'Sidi Moumen' },
        { value: 'hay el fath', label: 'Hay El Fath' },
        { value: 'hay riad', label: 'Hay Riad' },
        { value: 'bouskoura', label: 'Bouskoura' },
        { value: 'oulfa', label: 'Oulfa' },
        { value: 'el jadida', label: 'El Jadida' },
        { value: 'sidi bouzid', label: 'Sidi Bouzid' },
        { value: 'medina', label: 'Médina' },
        { value: 'sidi bernoussi', label: 'Sidi Bernoussi' },
        { value: 'anfa', label: 'Anfa' },
        { value: 'californie', label: 'Californie' },
        { value: 'ain chok', label: 'Aïn Chock' },
        { value: 'sidi othmane', label: 'Sidi Othmane' },
        { value: 'el manar', label: 'El Manar' },
        { value: 'el houda', label: 'El Houda' },
        { value: 'souk el had', label: 'Souk El Had' },
        { value: 'sidi abbad', label: 'Sidi Abbad' },
        { value: 'targa', label: 'Targa' },
        { value: 'mhamid', label: 'Mhamid' },
        { value: 'massira', label: 'Massira' },
        { value: 'sidi youssef ben ali', label: 'Sidi Youssef Ben Ali' },
        { value: 'ain mezouar', label: 'Aïn Mezouar' },
        { value: 'autres', label: 'Autres...' }
    ],
    get filtered() {
        return this.quartiers.filter(o => o.label.toLowerCase().includes(this.search.toLowerCase()));
    }
}" class="relative">
                                <div @click="open = !open" class="border border-gray-200 rounded-lg px-3 py-2 text-sm shadow-sm bg-white cursor-pointer flex items-center justify-between">
                                    <span x-text="quartiers.find(o => o.value === selected)?.label || 'Quartier'"></span>
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                </div>
                                <div x-show="open" @click.away="open = false" class="absolute z-10 w-full bg-white border border-gray-200 rounded-lg mt-1 shadow-lg">
                                    <input type="text" x-model="search" placeholder="Rechercher un quartier..." class="w-full px-3 py-2 border-b border-gray-100 text-sm focus:outline-none">
                                    <ul class="max-h-48 overflow-y-auto">
                                        <template x-for="option in filtered" :key="option.value">
                                            <li @click="selected = option.value; open = false" :class="{'bg-emerald-100': selected === option.value}" class="px-3 py-2 cursor-pointer hover:bg-emerald-50 text-sm" x-text="option.label"></li>
                                        </template>
                                    </ul>
                                </div>
                                <input type="hidden" name="quartier" :value="selected">
                            </div>
                        </div>

                        <!-- Part 2: Price Range -->
                        <div x-show="active === 2" x-transition class="grid grid-cols-2 gap-3">
                            <input type="number" name="min_price" placeholder="Prix min" class="border-gray-200 rounded-lg px-3 py-2 text-sm shadow-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                            <input type="number" name="max_price" placeholder="Prix max" class="border-gray-200 rounded-lg px-3 py-2 text-sm shadow-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        </div>

                        <!-- Part 3: Date Range -->
                        <div x-show="active === 3" x-transition class="grid grid-cols-2 gap-3">
                            <input type="date" name="from_date" class="border-gray-200 rounded-lg px-3 py-2 text-sm shadow-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                            <input type="date" name="to_date" class="border-gray-200 rounded-lg px-3 py-2 text-sm shadow-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        </div>
                    </div>

                    <!-- Search Button -->
                    <div class="flex justify-end">
                        <button type="submit" class="flex items-center justify-center w-11 h-11 rounded-full bg-emerald-500 text-white shadow-md hover:bg-emerald-600 hover:shadow-lg active:scale-95 transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>

            <!-- ✅ Add Alpine.js -->


        </div>
    </div>
</section>
</div>
</div>
</div>
</section>


</section>

<script src="//unpkg.com/alpinejs" defer></script>

{{-- !endherosection --}}
