<x-app-layout>
    <div class="max-w-4xl mx-auto pt-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-gray-900">Modifier la propriété</h2>
                    <a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </a>
                </div>

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('properties.update', $property->hashed_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Title -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Titre</label>
                            <input type="text" name="title" value="{{ old('title', $property->title) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- Property Type -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Type de propriété</label>
                            <select name="property_type" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option value="">Sélectionnez</option>
                                <option value="appartement" {{ old('property_type', $property->property_type) == 'appartement' ? 'selected' : '' }}>Appartement</option>
                                <option value="studio" {{ old('property_type', $property->property_type) == 'studio' ? 'selected' : '' }}>Studio</option>
                                <option value="villa" {{ old('property_type', $property->property_type) == 'villa' ? 'selected' : '' }}>Villa</option>
                                <option value="maison" {{ old('property_type', $property->property_type) == 'maison' ? 'selected' : '' }}>Maison</option>
                                <option value="immeuble" {{ old('property_type', $property->property_type) == 'immeuble' ? 'selected' : '' }}>Immeuble</option>
                                <option value="bureau" {{ old('property_type', $property->property_type) == 'bureau' ? 'selected' : '' }}>Bureau</option>
                                <option value="local_commercial" {{ old('property_type', $property->property_type) == 'local_commercial' ? 'selected' : '' }}>Local commercial</option>
                                <option value="terrain_urbain" {{ old('property_type', $property->property_type) == 'terrain_urbain' ? 'selected' : '' }}>Terrain urbain</option>
                                <option value="terrain_industriel" {{ old('property_type', $property->property_type) == 'terrain_industriel' ? 'selected' : '' }}>Terrain industriel</option>
                                <option value="ferme_terrain_agricole" {{ old('property_type', $property->property_type) == 'ferme_terrain_agricole' ? 'selected' : '' }}>Ferme/Terrain agricole</option>
                                <option value="hotel_cafe_restaurant" {{ old('property_type', $property->property_type) == 'hotel_cafe_restaurant' ? 'selected' : '' }}>Hôtel/Café-Restaurant</option>
                                <option value="residence_balneaire" {{ old('property_type', $property->property_type) == 'residence_balneaire' ? 'selected' : '' }}>Résidence balnéaire</option>
                                <option value="residence_etudiante" {{ old('property_type', $property->property_type) == 'residence_etudiante' ? 'selected' : '' }}>Résidence étudiante</option>
                                <option value="location_vacances" {{ old('property_type', $property->property_type) == 'location_vacances' ? 'selected' : '' }}>Location vacances</option>
                                <option value="autre" {{ old('property_type', $property->property_type) == 'autre' ? 'selected' : '' }}>Autre</option>
                            </select>
                        </div>

                        <!-- City -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Ville</label>
                            <input type="text" name="city" value="{{ old('city', $property->city) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- Neighborhood -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Quartier</label>
                            <input type="text" name="neighborhood" value="{{ old('neighborhood', $property->neighborhood) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- Address -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Adresse</label>
                            <input type="text" name="address" value="{{ old('address', $property->address) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- Surface -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Surface (m²)</label>
                            <input type="number" name="surface" value="{{ old('surface', $property->surface) }}" step="0.01" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- Bedrooms -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Chambres</label>
                            <input type="number" name="bedrooms" value="{{ old('bedrooms', $property->bedrooms) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- Bathrooms -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Salles de bain</label>
                            <input type="number" name="bathrooms" value="{{ old('bathrooms', $property->bathrooms) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- Price -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Prix</label>
                            <input type="number" name="price" value="{{ old('price', $property->price) }}" step="0.01" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- Price Type -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Type de prix</label>
                            <select name="price_type" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="" {{ old('price_type', $property->price_type) == '' ? 'selected' : '' }}>Sélectionner</option>
                                <option value="nuit" {{ old('price_type', $property->price_type) == 'nuit' ? 'selected' : '' }}>Par nuit</option>
                                <option value="mois" {{ old('price_type', $property->price_type) == 'mois' ? 'selected' : '' }}>Par mois</option>
                                <option value="an" {{ old('price_type', $property->price_type) == 'an' ? 'selected' : '' }}>Par an</option>
                            </select>
                        </div>

                        <!-- Contact Phone -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Téléphone de contact</label>
                            <input type="text" name="contact_phone" value="{{ old('contact_phone', $property->contact_phone) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- Available From -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Disponible à partir de</label>
                            <input type="date" name="available_from" value="{{ old('available_from', $property->available_from ? (\Carbon\Carbon::parse($property->available_from)->format('Y-m-d')) : '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- Available Until -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Disponible jusqu'à</label>
                            <input type="date" name="available_until" value="{{ old('available_until', $property->available_until ? (\Carbon\Carbon::parse($property->available_until)->format('Y-m-d')) : '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Listing Type -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Type d'annonce</label>
                            <div class="flex space-x-4">
                                @php $listingTypes = old('listing_type', explode(',', $property->listing_type)); @endphp
                                <label class="flex items-center">
                                    <input type="checkbox" name="listing_type[]" value="À-vendre" {{ in_array('À-vendre', $listingTypes) ? 'checked' : '' }}>
                                    <span>À vendre</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="listing_type[]" value="À-louer" {{ in_array('À-louer', $listingTypes) ? 'checked' : '' }}>
                                    <span>À louer</span>
                                </label>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                            <textarea name="description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $property->description) }}</textarea>
                        </div>

                        <!-- Photos -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Photos (optionnel - remplacera les photos existantes)</label>
                            <input type="file" name="photos[]" multiple accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @if($property->photos)
                                <p class="text-sm text-gray-600 mt-1">Photos actuelles: {{ count(json_decode($property->photos)) }} fichier(s)</p>
                            @endif
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3 mt-6">
                        <a href="{{ route('dashboard') }}" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500">
                            Annuler
                        </a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Mettre à jour
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
