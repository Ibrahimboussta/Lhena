<div class="step-content hidden p-6" data-step="3">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Localisation</h2>
    <div class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="city" class="block text-sm font-medium text-gray-700 mb-1">Ville *</label>
                <select id="city" name="city" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                    <option value="">Sélectionnez une ville</option>
                    <option value="casablanca">Casablanca</option>
                    <option value="rabat">Rabat</option>
                    <option value="marrakech">Marrakech</option>
                    <option value="tanger">Tanger</option>
                    <option value="fes">Fès</option>
                    <option value="agadir">Agadir</option>
                </select>
            </div>

            <div>
                <label for="neighborhood" class="block text-sm font-medium text-gray-700 mb-1">Quartier *</label>
                <input type="text" id="neighborhood" name="neighborhood" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Ex: Gauthier, Maarif, etc." required>
            </div>

            <div class="md:col-span-2">
                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Adresse complète *</label>
                <input type="text" id="address" name="address" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="N° de rue, avenue, résidence..." required>
            </div>

            <div class="md:col-span-2">
                <label for="map_location" class="block text-sm font-medium text-gray-700 mb-1">Localisation sur la carte</label>
                <div class="h-48 bg-gray-100 rounded-lg flex items-center justify-center">
                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <p class="mt-2 text-sm text-gray-500">Carte interactive (optionnel)</p>
                        <input type="hidden" id="latitude" name="latitude">
                        <input type="hidden" id="longitude" name="longitude">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8 flex justify-between">
        <button type="button" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors prev-step">
            ← Précédent
        </button>
        <button type="button" class="px-6 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors next-step">
            Suivant →
        </button>
    </div>
</div>
