{{-- !herosection --}}
<section class="home-hero relative isolate overflow-hidden bg-[#111411]">
    <video class="home-hero__video absolute inset-0 z-0 h-full w-full object-cover" autoplay muted loop playsinline preload="metadata" poster="{{ asset('images/aboutus.png') }}" aria-hidden="true">
        <source src="{{ asset('videos/hero-background.mp4') }}" type="video/mp4">
    </video>
    <div class="home-hero__overlay pointer-events-none absolute inset-0 z-0"></div>
    <div class="home-hero__vignette pointer-events-none absolute inset-0 z-0"></div>
    <div class="relative z-10 mx-auto flex min-h-[100svh] w-full max-w-7xl flex-col justify-center px-5 pb-8 pt-20 sm:px-8 sm:pb-0 sm:pt-16 lg:px-10">
        <div class="mx-auto max-w-4xl text-center">

            <h1 class="mx-auto mt-6 max-w-4xl text-4xl font-semibold leading-[1.08] tracking-tight text-white drop-shadow-lg sm:text-5xl lg:text-6xl">
                L’art de vivre commence par <span class="text-[#d9c18c]">le bon endroit.</span>
            </h1>
            <p class="mx-auto mt-5 max-w-2xl text-base leading-7 text-white/90 drop-shadow sm:text-lg">
                Découvrez des maisons, duplex, studios et appartements à louer, partout au Maroc.
            </p>
            <div class="mt-7 flex flex-col justify-center gap-3 sm:flex-row">
                <a href="{{ route('proprites') }}" class="inline-flex items-center justify-center gap-3 rounded-full bg-[#073a30] px-7 py-3.5 text-sm font-semibold text-white shadow-lg shadow-[#073a30]/15 transition hover:-translate-y-0.5 hover:bg-[#0b4b3e]">
                    Découvrir les propriétés
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6" />
                    </svg>
                </a>
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center rounded-full border border-[#dce4df] bg-white px-7 py-3.5 text-sm font-semibold text-[#34443c] transition hover:border-[#0b3b31] hover:text-[#0b3b31]">
                    Parlons de votre projet
                </a>
            </div>
        </div>

            <!-- Search Form -->
            <div class="home-hero__search-wrap relative z-20 mx-auto mt-6 px-4 sm:px-6 lg:px-8">
                <form action="{{ route('properties.search') }}" method="GET" x-data="{ active: 1 }" class="home-hero__search relative space-y-3 rounded-2xl p-4 shadow-2xl sm:p-5">
                    <div class="flex justify-between items-center gap-3 text-center">
                        <span class="text-[10px] font-semibold uppercase tracking-[0.18em] text-[#d9c18c]">Recherche immobilière</span>
                        <div class="home-hero__search-tabs flex w-fit justify-center gap-1 rounded-xl p-1">
                            <button type="button" @click="active = (active === 1 ? null : 1)" :class="active === 1 ? 'is-active' : ''" class="home-hero__search-tab flex-1 rounded-lg px-4 py-2 text-xs font-semibold transition">
                                Filtres
                            </button>
                            <button type="button" @click="active = (active === 2 ? null : 2)" :class="active === 2 ? 'is-active' : ''" class="home-hero__search-tab flex-1 rounded-lg px-4 py-2 text-xs font-semibold transition">
                                Prix
                            </button>
                            <button type="button" @click="active = (active === 3 ? null : 3)" :class="active === 3 ? 'is-active' : ''" class="home-hero__search-tab flex-1 rounded-lg px-4 py-2 text-xs font-semibold transition">
                                Dates
                            </button>
                        </div>
                    </div>

                    <!-- Sections -->
                    <div>
                        <!-- Part 1: Basic Filters -->
                        <div x-show="active === 1" x-transition class="home-hero__search-controls mx-auto grid w-full max-w-5xl grid-cols-1 gap-2 sm:grid-cols-2 lg:grid-cols-4">
                            <input type="hidden" name="listing_type" value="À-louer">

                            <div x-data="{
    open: false,
    search: '',
    selected: '',
    types: [
        { value: '', label: 'Type' },
        { value: 'appartement', label: 'Appartement' },
        { value: 'maison', label: 'Maison' },
        { value: 'duplex', label: 'Duplex' },
        { value: 'studio', label: 'Studio' }
    ],
    get filtered() {
        return this.types.filter(o => o.label.toLowerCase().includes(this.search.toLowerCase()));
    }
}" class="relative">
                                <div @click="open = !open" class="home-hero__field flex cursor-pointer items-center justify-between rounded-xl px-4 py-3 text-sm">
                                    <span x-text="types.find(o => o.value === selected)?.label || 'Type'"></span>
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                </div>
                                <div x-show="open" @click.away="open = false" class="home-hero__select-menu absolute bottom-full left-0 z-30 mb-2 w-full rounded-xl border bg-white shadow-2xl">
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
                                <div @click="open = !open" class="home-hero__field flex cursor-pointer items-center justify-between rounded-xl px-4 py-3 text-sm">
                                    <span x-text="villes.find(o => o.value === selected)?.label || 'Ville'"></span>
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                </div>
                                <div x-show="open" @click.away="open = false" class="home-hero__select-menu absolute bottom-full left-0 z-30 mb-2 w-full rounded-xl border bg-white shadow-2xl">
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
                                <div @click="open = !open" class="home-hero__field flex cursor-pointer items-center justify-between rounded-xl px-4 py-3 text-sm">
                                    <span x-text="quartiers.find(o => o.value === selected)?.label || 'Quartier'"></span>
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                </div>
                                <div x-show="open" @click.away="open = false" class="home-hero__select-menu absolute bottom-full left-0 z-30 mb-2 w-full rounded-xl border bg-white shadow-2xl">
                                    <input type="text" x-model="search" placeholder="Rechercher un quartier..." class="w-full px-3 py-2 border-b border-gray-100 text-sm focus:outline-none">
                                    <ul class="max-h-48 overflow-y-auto">
                                        <template x-for="option in filtered" :key="option.value">
                                            <li @click="selected = option.value; open = false" :class="{'bg-emerald-100': selected === option.value}" class="px-3 py-2 cursor-pointer hover:bg-emerald-50 text-sm" x-text="option.label"></li>
                                        </template>
                                    </ul>
                                </div>
                                <input type="hidden" name="quartier" :value="selected">
                            </div>
                            <button type="submit" class="inline-flex min-h-12 items-center justify-center gap-2 rounded-xl bg-[#d9c18c] px-5 py-3 text-sm font-semibold text-[#17211b] shadow-lg shadow-black/20 transition duration-200 hover:bg-[#e6d2a5] active:scale-[0.98]">
                                <span>Rechercher</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                                </svg>
                            </button>
                        </div>

                        <!-- Part 2: Price Range -->
                        <div x-show="active === 2" x-transition class="home-hero__search-controls mx-auto grid w-full max-w-5xl grid-cols-1 gap-2 sm:grid-cols-2 lg:grid-cols-3">
                            <input type="number" name="min_price" placeholder="Prix minimum" class="home-hero__field rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-[#d9c18c]">
                            <input type="number" name="max_price" placeholder="Prix maximum" class="home-hero__field rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-[#d9c18c]">
                            <button type="submit" class="inline-flex min-h-12 items-center justify-center gap-2 rounded-xl bg-[#d9c18c] px-5 py-3 text-sm font-semibold text-[#17211b] shadow-lg shadow-black/20 transition duration-200 hover:bg-[#e6d2a5] active:scale-[0.98]">
                                <span>Rechercher</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                                </svg>
                            </button>
                        </div>

                        <!-- Part 3: Date Range -->
                        <div x-show="active === 3" x-transition class="home-hero__search-controls mx-auto grid w-full max-w-5xl grid-cols-1 gap-2 sm:grid-cols-2 lg:grid-cols-3">
                            <input type="date" name="from_date" class="home-hero__field rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-[#d9c18c]">
                            <input type="date" name="to_date" class="home-hero__field rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-[#d9c18c]">
                            <button type="submit" class="inline-flex min-h-12 items-center justify-center gap-2 rounded-xl bg-[#d9c18c] px-5 py-3 text-sm font-semibold text-[#17211b] shadow-lg shadow-black/20 transition duration-200 hover:bg-[#e6d2a5] active:scale-[0.98]">
                                <span>Rechercher</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
</section>

{{-- !endherosection --}}
