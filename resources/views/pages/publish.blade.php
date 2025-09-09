@extends('layouts.index')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<section class="px-6">

    <h1 class="text-4xl font-bold pt-24">Publier une annonce</h1>

    <div class="py-8">
        <div class="container mx-auto border border-red-700 rounded-lg shadow-md">
            <div class="bg-white shadow rounded-lg p-6">
                <h1 class="text-xl font-semibold mb-2 text-gray-900">Informations personnelles</h1>
                <p class="text-gray-600 mb-3">Utilisez une adresse permanente où vous pouvez recevoir du courrier.</p>

                <form action="{{ route('proprites.store') }}" method="POST" enctype="multipart/form-data" id="propertyForm">
                    @csrf

                    <!-- Upload Progress -->
                    <div class="mb-4" id="upload-progress" style="display: none;">
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-black h-2.5 rounded-full" id="progress-bar" style="width: 0%"></div>
                        </div>
                        <p class="text-sm text-gray-600 mt-2" id="progress-text">Téléchargement: 0%</p>
                    </div>

                    <!-- Listing Type -->
                    <div class="flex flex-wrap items-center gap-4 pb-5">
                        <div class="flex flex-wrap items-center gap-4">
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="listing_type[]" value="À-vendre">
                                <span>À vendre</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="listing_type[]" value="À-louer">
                                <span>À louer</span>
                            </label>
                        </div>

                        <!-- Price Type -->
                        <div class="w-full">
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                <label class="flex items-center space-x-2">
                                    <input type="radio" name="price_type" value="" checked>
                                    <span>-- Aucun --</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="radio" name="price_type" value="nuit">
                                    <span>Par nuit</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="radio" name="price_type" value="mois">
                                    <span>Par mois</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="radio" name="price_type" value="an">
                                    <span>Par an</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Title & Property Type -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <input type="text" name="title"
                            placeholder="Titre de l'annonce (ex: Appartement 2 pièces à Casablanca)"
                            class="border p-2 rounded w-full" required>

                        <select name="property_type" class="border p-2 rounded w-full" required>
                            <option value="">Type de propriété</option>
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
                            <option value="autre">Autre</option>
                        </select>
                    </div>

                    <!-- City & Neighborhood -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <input type="text" name="city" placeholder="Ville (ex: Casablanca)" class="border p-2 rounded w-full" required>
                        <input type="text" name="neighborhood" placeholder="Quartier (ex: Maarif)" class="border p-2 rounded w-full">
                    </div>

                    <!-- Address & Surface -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <input type="text" name="address" placeholder="Adresse complète (facultatif)" class="border p-2 rounded w-full">
                        <input type="number" name="surface" placeholder="Superficie (m²)" class="border p-2 rounded w-full" required min="0">
                    </div>

                    <!-- Bedrooms & Bathrooms -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <input type="number" name="bedrooms" placeholder="Nombre de chambres" class="border p-2 rounded w-full" required min="0">
                        <input type="number" name="bathrooms" placeholder="Nombre de salles de bain" class="border p-2 rounded w-full" required min="0">
                    </div>

                    <!-- Price & Phone -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <input type="number" name="price" placeholder="Prix (MAD)" class="border p-2 rounded w-full" required min="0">
                        <input type="tel" name="contact_phone" placeholder="Numéro de téléphone" class="border p-2 rounded w-full" required>
                    </div>

                    <!-- Date Range Available -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Période de disponibilité</label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <input type="date" name="available_from" id="available_from"
                                       class="border p-2 rounded w-full bg-white"
                                       required>
                            </div>
                            <div>
                                <input type="date" name="available_until" id="available_until"
                                       class="border p-2 rounded w-full bg-white">
                            </div>
                        </div>
                        <p class="text-sm text-gray-500 mt-1">La date de fin est optionnelle pour les propriétés à vendre</p>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <textarea name="description" placeholder="Description détaillée de la propriété" class="border p-2 rounded w-full" rows="4" required></textarea>
                    </div>

                    <!-- Photos -->
                    <div class="mb-4">
                        <label class="block mb-2 font-medium text-sm">Ajouter des photos (Max: 10 photos, jusqu'à 20MB chacune)</label>
                        <input multiple type="file" name="photos[]" id="photos" accept="image/*"
                            class="border p-2 rounded w-full" onchange="handleImageUpload(this)"
                            data-max-files="10" data-max-size="20">
                        <p id="file-error" class="text-red-500 text-sm mt-1 hidden"></p>
                        <div id="image-previews" class="grid grid-cols-3 md:grid-cols-10 gap-4 mt-4"></div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end mt-6">
                        @auth
                            <button type="submit" class="inline-flex items-center justify-center bg-green-600 text-white px-6 py-2.5 text-sm font-medium rounded-lg hover:bg-green-700 transition-all duration-200">Soumettre l'annonce</button>
                        @endauth

                        @guest
                            <a href="{{ route('register') }}" class="inline-flex items-center justify-center bg-green-600 text-white px-6 py-2.5 text-sm font-medium rounded-lg hover:bg-green-700 transition-all duration-200">
                                Créez un compte pour publier
                            </a>
                        @endguest
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function handleImageUpload(input) {
            const maxFiles = parseInt(input.dataset.maxFiles);
            const maxSize = parseInt(input.dataset.maxSize) * 1024 * 1024;
            const errorText = document.getElementById('file-error');
            const previewsContainer = document.getElementById('image-previews');
            let error = '';

            previewsContainer.innerHTML = '';

            if (input.files.length > maxFiles) {
                error = `Vous pouvez télécharger jusqu'à ${maxFiles} images maximum.`;
            }

            let totalSize = 0;
            if (!error) {
                for (let i = 0; i < input.files.length; i++) {
                    const file = input.files[i];
                    totalSize += file.size;

                    if (!file.type.startsWith('image/')) {
                        error = `Le fichier "${file.name}" n'est pas une image valide.`;
                        break;
                    }

                    if (file.size > maxSize) {
                        error = `Le fichier "${file.name}" est trop volumineux. La taille maximum est de ${input.dataset.maxSize}MB.`;
                        break;
                    }

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const preview = document.createElement('div');
                        preview.className = 'relative aspect-square';
                        preview.innerHTML = `
                            <img src="${e.target.result}" class="w-full h-full object-cover rounded-lg shadow-sm" alt="Preview">
                            <span class="absolute top-2 right-2 bg-black bg-opacity-50 text-white px-2 py-1 rounded-md text-xs">
                                ${(file.size / (1024 * 1024)).toFixed(1)}MB
                            </span>
                        `;
                        previewsContainer.appendChild(preview);
                    }
                    reader.readAsDataURL(file);
                }
            }

            if (totalSize > 100 * 1024 * 1024) { // 100MB total limit
                error = `La taille totale des fichiers (${(totalSize / (1024 * 1024)).toFixed(1)}MB) dépasse la limite de 100MB.`;
            }

            if (error) {
                errorText.textContent = error;
                errorText.classList.remove('hidden');
                input.value = "";
                previewsContainer.innerHTML = '';
            } else {
                errorText.classList.add('hidden');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const availableUntilInput = document.getElementById('available_until');
            const listingTypeCheckboxes = document.querySelectorAll('input[name="listing_type[]"]');

            // Set minimum date for both inputs to today
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('available_from').min = today;
            availableUntilInput.min = today;

            // Update end date requirement based on listing type
            function updateEndDateRequirement() {
                const isRental = Array.from(listingTypeCheckboxes)
                    .some(cb => cb.checked && cb.value === 'À-louer');
                availableUntilInput.required = isRental;
            }

            // Add validation to form submission
            document.getElementById('propertyForm').addEventListener('submit', function(e) {
                const startDate = document.getElementById('available_from').value;
                const endDate = availableUntilInput.value;
                const isRental = Array.from(listingTypeCheckboxes)
                    .some(cb => cb.checked && cb.value === 'À-louer');

                if (isRental && endDate && startDate >= endDate) {
                    e.preventDefault();
                    alert('La date de fin doit être postérieure à la date de début');
                }
            });

            // Add event listeners
            listingTypeCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateEndDateRequirement);
            });

            // Initial check
            updateEndDateRequirement();
    </script>

</section>
@endsection
