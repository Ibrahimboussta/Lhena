<div class="step-content hidden p-6" data-step="2">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Détails du bien</h2>
    <div class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Titre de l'annonce *</label>
                <input type="text" id="title" name="title" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Ex: Bel appartement 2 pièces à Casablanca" required>
            </div>

            <div>
                <label for="property_type" class="block text-sm font-medium text-gray-700 mb-1">Type de bien *</label>
                <select id="property_type" name="property_type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                    <option value="">Sélectionnez un type</option>
                    <option value="appartement">Appartement</option>
                    <option value="studio">Studio</option>
                    <option value="villa">Villa</option>
                    <option value="maison">Maison</option>
                    <option value="immeuble">Immeuble</option>
                </select>
            </div>

            <div>
                <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Prix (MAD) *</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-gray-500">MAD</span>
                    </div>
                    <input type="number" id="price" name="price" class="w-full pl-16 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="0" min="0" required>
                </div>
            </div>

            <div>
                <label for="surface" class="block text-sm font-medium text-gray-700 mb-1">Surface (m²) *</label>
                <input type="number" id="surface" name="surface" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Ex: 85" min="0" required>
            </div>

            <div>
                <label for="bedrooms" class="block text-sm font-medium text-gray-700 mb-1">Chambres *</label>
                <select id="bedrooms" name="bedrooms" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                    <option value="">Sélectionnez</option>
                    <option value="1">1 chambre</option>
                    <option value="2">2 chambres</option>
                    <option value="3">3 chambres</option>
                    <option value="4">4 chambres</option>
                    <option value="5">5 chambres ou plus</option>
                    <option value="0">Studio</option>
                </select>
            </div>

            <div>
                <label for="bathrooms" class="block text-sm font-medium text-gray-700 mb-1">Salles de bain *</label>
                <select id="bathrooms" name="bathrooms" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                    <option value="">Sélectionnez</option>
                    <option value="1">1 salle de bain</option>
                    <option value="2">2 salles de bain</option>
                    <option value="3">3 salles de bain</option>
                    <option value="4">4 salles de bain ou plus</option>
                </select>
            </div>
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description *</label>
            <textarea id="description" name="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Décrivez votre bien en détail..." required></textarea>
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
