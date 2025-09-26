@extends('layouts.index')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<section class="px-6">
    <h1 class="text-4xl font-bold pt-24">Publier une annonce</h1>

    <div class="py-8">
        <div class="container mx-auto border border-red-700 rounded-lg shadow-md">
            <div class="bg-white shadow rounded-lg p-6">

                <!-- Header -->
                <h2 class="text-xl font-semibold mb-2 text-gray-900">Informations personnelles</h2>
                <p class="text-gray-600 mb-4">Utilisez une adresse permanente où vous pouvez recevoir du courrier.</p>

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

                <form action="{{ route('proprites.store') }}"
                      method="POST"
                      enctype="multipart/form-data"
                      id="propertyForm">
                    @csrf



                    <!-- Listing Type + Price Type -->
                    <div class="flex flex-wrap items-center gap-4 pb-5">
                        <div class="flex items-center gap-4">
                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="listing_type[]" value="À-vendre">
                                <span>À vendre</span>
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="listing_type[]" value="À-louer">
                                <span>À louer</span>
                            </label>
                        </div>

                        <div class="w-full grid grid-cols-2 md:grid-cols-4 gap-4">
                            @foreach (['' => '-- Aucun --', 'nuit' => 'Par nuit', 'mois' => 'Par mois', 'an' => 'Par an'] as $val => $label)
                                <label class="flex items-center gap-2">
                                    <input type="radio" name="price_type" value="{{ $val }}" {{ $val === '' ? 'checked' : '' }}>
                                    <span>{{ $label }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Title + Type -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Titre *</label>
                            <input type="text" id="title" name="title"
                                   class="border p-2 rounded w-full disabled:opacity-50 disabled:cursor-not-allowed"
                                   placeholder="Appartement 2 pièces à Casablanca" :disabled="loading" required>
                        </div>
                        <div>
                            <label for="property_type" class="block text-sm font-medium text-gray-700 mb-1">Type *</label>
                            <select id="property_type" name="property_type"
                                    class="border p-2 rounded w-full disabled:opacity-50 disabled:cursor-not-allowed"
                                    :disabled="loading" required>
                                <option value="">Sélectionnez</option>
                                <option value="appartement">Appartement</option>
                                <option value="studio">Studio</option>
                                <option value="villa">Villa</option>
                                <option value="maison">Maison</option>
                                <option value="immeuble">Immeuble</option>
                                <option value="bureau">Bureau</option>
                                <option value="local_commercial">Local commercial</option>
                                <option value="terrain_urbain">Terrain urbain</option>
                                <option value="terrain_industriel">Terrain industriel</option>
                                <option value="ferme_terrain_agricole">Ferme/Terrain agricole</option>
                                <option value="hotel_cafe_restaurant">Hôtel/Café-Restaurant</option>
                                <option value="residence_balneaire">Résidence balnéaire</option>
                                <option value="residence_etudiante">Résidence étudiante</option>
                                <option value="location_vacances">Location vacances</option>
                                <option value="autre">Autre</option>
                            </select>
                        </div>
                    </div>

                    <!-- City + Neighborhood -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Ville *</label>
                            <input type="text" name="city" placeholder="Casablanca" class="border p-2 rounded w-full" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Quartier</label>
                            <input type="text" name="neighborhood" placeholder="Maarif" class="border p-2 rounded w-full">
                        </div>
                    </div>

                    <!-- Address + Surface -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Adresse</label>
                            <input type="text" name="address" placeholder="Adresse complète" class="border p-2 rounded w-full">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Superficie (m²) *</label>
                            <input type="number" name="surface" class="border p-2 rounded w-full" min="0" required>
                        </div>
                    </div>

                    <!-- Bedrooms + Bathrooms -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Chambres *</label>
                            <input type="number" name="bedrooms" class="border p-2 rounded w-full" min="0" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Salles de bain *</label>
                            <input type="number" name="bathrooms" class="border p-2 rounded w-full" min="0" required>
                        </div>
                    </div>

                    <!-- Price + Phone -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Prix (MAD) *</label>
                            <input type="number" name="price" class="border p-2 rounded w-full" min="0" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Téléphone *</label>
                            <input type="tel" name="contact_phone" class="border p-2 rounded w-full" required>
                        </div>
                    </div>

                    <!-- Dates -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Disponibilité</label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <input type="date" name="available_from" id="available_from" class="border p-2 rounded w-full" required>
                            <input type="date" name="available_until" id="available_until" class="border p-2 rounded w-full">
                        </div>
                        <p class="text-sm text-gray-500 mt-1">La date de fin est optionnelle pour les biens à vendre.</p>
                    </div>

                    <!-- Amenities -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-3">Équipements et Services</h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <!-- Basique -->
                            <div class="space-y-3">
                                <h4 class="font-medium text-gray-700">Basique</h4>
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="amenities[]" value="wifi" class="rounded">
                                    <span>WiFi</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="amenities[]" value="parking" class="rounded">
                                    <span>Parking</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="amenities[]" value="elevator" class="rounded">
                                    <span>Ascenseur</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="amenities[]" value="security" class="rounded">
                                    <span>Sécurité 24/7</span>
                                </label>
                            </div>
                            <!-- Confort -->
                            <div class="space-y-3">
                                <h4 class="font-medium text-gray-700">Confort</h4>
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="amenities[]" value="ac" class="rounded">
                                    <span>Climatisation</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="amenities[]" value="heating" class="rounded">
                                    <span>Chauffage</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="amenities[]" value="furnished" class="rounded">
                                    <span>Meublé</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="amenities[]" value="equipped_kitchen" class="rounded">
                                    <span>Cuisine équipée</span>
                                </label>
                            </div>
                            <!-- Extérieur -->
                            <div class="space-y-3">
                                <h4 class="font-medium text-gray-700">Extérieur</h4>
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="amenities[]" value="balcony" class="rounded">
                                    <span>Balcon</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="amenities[]" value="terrace" class="rounded">
                                    <span>Terrasse</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="amenities[]" value="garden" class="rounded">
                                    <span>Jardin</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="amenities[]" value="pool" class="rounded">
                                    <span>Piscine</span>
                                </label>
                            </div>
                            <!-- Additionnels -->
                            <div class="space-y-3">
                                <h4 class="font-medium text-gray-700">Additionnels</h4>
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="amenities[]" value="gym" class="rounded">
                                    <span>Salle de sport</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="amenities[]" value="concierge" class="rounded">
                                    <span>Concierge</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="amenities[]" value="storage" class="rounded">
                                    <span>Cave/Storage</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="amenities[]" value="panoramic_view" class="rounded">
                                    <span>Vue panoramique</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Description -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description *</label>
                        <textarea name="description" class="border p-2 rounded w-full" rows="4" required></textarea>
                    </div>

                    <!-- Photos -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">Photos (max 10, 20MB chacune)</label>
                        <input type="file" name="photos[]" id="photos" multiple accept="image/*" class="border p-2 rounded w-full">
                        <p id="file-error" class="text-red-500 text-sm mt-1 hidden"></p>
                        <div id="image-previews" class="grid grid-cols-3 md:grid-cols-10 gap-4 mt-4"></div>
                    </div>

                    <!-- VIP -->
                    <div class="mb-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold">Pack VIP (Optionnel)</h3>
                            <button type="button"
                                    onclick="document.getElementById('vip-packages').classList.toggle('hidden')"
                                    class="flex items-center gap-2 text-green-600 hover:text-green-700">
                                <span>Voir les packs VIP</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        <div id="vip-packages" class="hidden">
                            <div class="flex flex-col md:flex-row gap-6 w-full">
                            <!-- 3 Months Pack -->
                            <div class="flex-1">
                                <input type="radio" name="vip_package" value="3_months" id="pack-3-months" class="hidden peer">
                                <label for="pack-3-months" class="flex flex-col justify-between h-full bg-white border border-gray-200 rounded-2xl p-6 shadow-md hover:shadow-2xl transition-all cursor-pointer peer-checked:border-green-500 peer-checked:ring-4 peer-checked:ring-green-200">
                                    <div>
                                        <h4 class="text-xl font-semibold mb-2">Pack 3 Mois</h4>
                                        <div class="text-3xl font-bold text-green-600 mb-2">299 DH</div>
                                        <div class="text-gray-600 mb-4 text-sm">Idéal pour tester la visibilité VIP sur une courte période. Inclut badge VIP, annonce en tête de liste, et plus de visibilité.</div>
                                        <ul class="space-y-2 text-gray-600">
                                            <li>Annonce en tête de liste</li>
                                            <li>Badge VIP</li>
                                            <li>Plus de visibilité</li>
                                        </ul>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <span class="inline-block px-4 py-2 rounded-full bg-green-100 text-green-700 font-medium peer-checked:bg-green-600 peer-checked:text-white transition-colors">Sélectionner</span>
                                    </div>
                                </label>
                            </div>
                            <!-- 6 Months Pack -->
                            <div class="flex-1 relative">
                                <div class="absolute -top-3 left-1/2 transform -translate-x-1/2 bg-green-600 text-white px-4 py-1 rounded-full text-sm shadow-lg z-10">Populaire</div>
                                <input type="radio" name="vip_package" value="6_months" id="pack-6-months" class="hidden peer">
                                <label for="pack-6-months" class="flex flex-col justify-between h-full bg-gradient-to-br from-green-50 to-white border border-green-300 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all cursor-pointer peer-checked:border-green-500 peer-checked:ring-4 peer-checked:ring-green-400">
                                    <div>
                                        <h4 class="text-xl font-semibold mb-2">Pack 6 Mois</h4>
                                        <div class="text-3xl font-bold text-green-600 mb-2">499 DH</div>
                                        <div class="text-gray-600 mb-4 text-sm">Le choix populaire pour une visibilité prolongée. Inclut tous les avantages du pack 3 mois, statistiques de vues et support prioritaire.</div>
                                        <ul class="space-y-2 text-gray-600">
                                            <li>Tous les avantages du pack 3 mois</li>
                                            <li>Statistiques de vues</li>
                                            <li>Support prioritaire</li>
                                        </ul>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <span class="inline-block px-4 py-2 rounded-full bg-green-100 text-green-700 font-medium peer-checked:bg-green-600 peer-checked:text-white transition-colors">Sélectionner</span>
                                    </div>
                                </label>
                            </div>
                            <!-- 1 Year Pack -->
                            <div class="flex-1">
                                <input type="radio" name="vip_package" value="1_year" id="pack-1-year" class="hidden peer">
                                <label for="pack-1-year" class="flex flex-col justify-between h-full bg-white border border-gray-200 rounded-2xl p-6 shadow-md hover:shadow-2xl transition-all cursor-pointer peer-checked:border-green-500 peer-checked:ring-4 peer-checked:ring-green-200">
                                    <div>
                                        <h4 class="text-xl font-semibold mb-2">Pack 1 An</h4>
                                        <div class="text-3xl font-bold text-green-600 mb-2">899 DH</div>
                                        <div class="text-gray-600 mb-4 text-sm">Pour une présence maximale toute l'année. Inclut tous les avantages du pack 6 mois, promotion sur réseaux sociaux et assistance personnalisée.</div>
                                        <ul class="space-y-2 text-gray-600">
                                            <li>Tous les avantages du pack 6 mois</li>
                                            <li>Promotion sur réseaux sociaux</li>
                                            <li>Assistance personnalisée</li>
                                        </ul>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <span class="inline-block px-4 py-2 rounded-full bg-green-100 text-green-700 font-medium peer-checked:bg-green-600 peer-checked:text-white transition-colors">Sélectionner</span>
                                    </div>
                                </label>
                            </div>
                            </div>
                        </div>
                </div>                    <!-- Submit -->
                    <div class="flex justify-end mt-6">
                        <button type="submit"
                                class="bg-green-600 text-white px-6 py-2.5 rounded-lg hover:bg-green-700 flex items-center gap-2"
                                onclick="this.classList.add('submitting')"
                                id="submitBtn">
                            <span class="inline-block">Soumettre l'annonce</span>
                            <svg class="w-5 h-5 hidden animate-spin submitLoader" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                            </svg>
                        </button>
                    </div>

                    <style>
                        button.submitting .submitLoader {
                            display: inline-block;
                        }
                    </style>
                </form>

            </div>
        </div>
    </div>
</section>
@endsection
