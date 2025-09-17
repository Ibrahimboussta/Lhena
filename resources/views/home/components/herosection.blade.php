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
                <form action="{{ route('properties.search') }}" method="GET" x-data="{ active: 1 }"
                    class="bg-white/95 backdrop-blur-md p-6 rounded-2xl shadow-lg border border-gray-100 space-y-4">

                    <!-- Toggle Buttons -->
                    <div class="flex gap-3">
                        <button type="button" @click="active = (active === 1 ? null : 1)"
                            :class="active === 1 ? 'bg-emerald-600 text-white' : 'bg-emerald-100 text-emerald-700'"
                            class="flex-1 px-4 py-2 rounded-lg text-sm font-medium transition">
                            Filtres
                        </button>
                        <button type="button" @click="active = (active === 2 ? null : 2)"
                            :class="active === 2 ? 'bg-emerald-600 text-white' : 'bg-emerald-100 text-emerald-700'"
                            class="flex-1 px-4 py-2 rounded-lg text-sm font-medium transition">
                            Prix
                        </button>
                        <button type="button" @click="active = (active === 3 ? null : 3)"
                            :class="active === 3 ? 'bg-emerald-600 text-white' : 'bg-emerald-100 text-emerald-700'"
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
                            <input type="number" name="min_price" placeholder="Prix min"
                                class="border-gray-200 rounded-lg px-3 py-2 text-sm shadow-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                            <input type="number" name="max_price" placeholder="Prix max"
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
                            class="flex items-center justify-center w-11 h-11 rounded-full bg-emerald-500 text-white shadow-md hover:bg-emerald-600 hover:shadow-lg active:scale-95 transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
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
