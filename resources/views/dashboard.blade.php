<x-app-layout>
    <div class="max-w-7xl mx-auto pt-10 sm:px-6 lg:px-8 dark:bg-gray-800">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800">
            <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800">
                <div class="flex justify-between items-center ">
                    <h2 class="text-2xl font-semibold mb-4 dark:text-white">Propriétés</h2>
                    <a href="{{ route('publish') }}"
                        class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-lg hover:bg-green-700 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 dark:bg-white dark:text-black dark:hover:bg-gray-300">
                        Ajouter une propriété
                    </a>
                </div>
                <div class="overflow-x-auto pt-2">
                    <table
                        class="w-full border-collapse border border-gray-200 shadow-md rounded-lg dark:border-gray-700 dark:text-white">
                        <thead class="bg-gray-100 dark:bg-gray-800">
                            <tr>
                                <th class="p-3 text-left border">Image</th>
                                <th class="p-3 text-left border">Nom</th>
                                <th class="p-3 text-left border">Adresse</th>
                                <th class="p-3 text-left border">Métrage</th>
                                <th class="p-3 text-left border">Prix</th>
                                <th class="p-3 text-left border">Statut</th>
                                <th class="p-3 text-center border">Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($properties as $property)
                                @if (Auth::user()->id == $property->user_id)
                                    <tr class="border-t">
                                        <td class="p-3 border">
                                            @if ($property->photos)
                                                @php $photos = json_decode($property->photos); @endphp
                                                <div class="relative group">
                                                    <button onclick="openGalleryModal({{ $property->id }}, '{{ $property->photos }}'); event.stopPropagation();">
                                                        <img src="{{ asset('storage/' . $photos[0]) }}"
                                                            alt="Property image"
                                                            class="w-16 h-16 object-cover rounded cursor-pointer">
                                                    </button>
                                                    @if (count($photos) > 1)
                                                        <span class="absolute -top-1 -right-1 bg-black/70 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">
                                                            {{ count($photos) }}
                                                        </span>
                                                    @endif
                                                </div>
                                            @else
                                                No Image
                                            @endif
                                        </td>

                                        <td class="p-3 border text-sm">{{ $property->title }}</td>
                                        <td class="p-3 border text-sm">{{ $property->address }}</td>
                                        <td class="p-3 border text-sm">{{ $property->surface }} m²</td>
                                        <td class="p-3 border text-sm text-[#25D366]">{{ number_format($property->price, 2) }}
                                            DH</td>


                                        <td class="p-3 border">
                                            @if ($property->published)
                                                <span
                                                    class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">
                                                    ● Publié
                                                </span>
                                            @else
                                                <span
                                                    class="px-3 py-1 bg-red-100 text-red-600 text-xs font-semibold rounded-full">
                                                    ● Non Publié
                                                </span>
                                            @endif
                                        </td>



                                        <td class="p-3 text-center border">
                                            <div class="flex justify-center space-x-2">
                                                <form action="{{ route('properties.edit', $property->hashed_id) }}" method="PUT" class="inline">
                                                    <button
                                                        class="inline-flex items-center px-3 py-1.5 bg-blue-50 text-blue-700 text-sm font-medium rounded-md hover:bg-blue-100 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                                        type="submit"
                                                        title="Modifier">
                                                        <span class="sr-only">Modifier</span>
                                                        ✏️
                                                    </button>
                                                </form>

                                                <form action="{{ route('properties.destroy', $property->hashed_id) }}"
                                                    method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="inline-flex items-center px-3 py-1.5 bg-red-50 text-red-700 text-sm font-medium rounded-md hover:bg-red-100 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                                        type="submit">
                                                        <span class="sr-only">Supprimer</span>
                                                        🗑
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div id="galleryModal" class="fixed inset-0 bg-black/80 hidden items-center justify-center z-50 p-4">
        <div class="relative w-full max-w-6xl max-h-[90vh] bg-black rounded-lg overflow-hidden">
            <!-- Close Button -->
            <button onclick="closeGalleryModal()"
                    class="absolute top-4 right-4 text-white hover:text-gray-300 z-10 bg-black/50 rounded-full p-2"
                    aria-label="Close gallery">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Main Image View -->
            <div id="mainImageView" class="items-center justify-center h-full p-4 hidden">
                <img id="mainImage" class="max-h-[85vh] max-w-full object-contain" src="" alt="Property image">
            </div>

            <!-- Thumbnails Grid -->
            <div id="thumbnailsGrid" class="p-4">
                <h3 class="text-white text-lg font-semibold mb-4">Gallery</h3>
                <div id="galleryContent" class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 overflow-y-auto max-h-[70vh] custom-scrollbar"></div>
            </div>

            <!-- Navigation Buttons -->
            <button id="prevBtn" class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/50 text-white p-3 rounded-full hover:bg-black/70 transition-colors hidden" aria-label="Previous image">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <button id="nextBtn" class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/50 text-white p-3 rounded-full hover:bg-black/70 transition-colors hidden" aria-label="Next image">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <!-- Image Counter -->
            <div id="imageCounter" class="absolute bottom-4 left-1/2 -translate-x-1/2 bg-black/50 text-white px-3 py-1 rounded-full text-sm hidden">
                <span id="currentImage">1</span> / <span id="totalImages">0</span>
            </div>
        </div>
    </div>

    <!-- Edit Property Modal -->
    <div id="editModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 p-4">
        <div class="bg-white rounded-lg shadow-xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-semibold text-gray-900">Modifier la propriété</h3>
                    <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <form id="editForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="editPropertyHash" name="property_hash" value="">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Title -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Titre</label>
                            <input type="text" name="title" id="editTitle" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- Property Type -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Type de propriété</label>
                            <select name="property_type" id="editPropertyType" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
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

                        <!-- City -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Ville</label>
                            <input type="text" name="city" id="editCity" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- Neighborhood -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Quartier</label>
                            <input type="text" name="neighborhood" id="editNeighborhood" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- Address -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Adresse</label>
                            <input type="text" name="address" id="editAddress" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- Surface -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Surface (m²)</label>
                            <input type="number" name="surface" id="editSurface" step="0.01" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- Bedrooms -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Chambres</label>
                            <input type="number" name="bedrooms" id="editBedrooms" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- Bathrooms -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Salles de bain</label>
                            <input type="number" name="bathrooms" id="editBathrooms" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- Price -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Prix</label>
                            <input type="number" name="price" id="editPrice" step="0.01" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- Price Type -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Type de prix</label>
                            <select name="price_type" id="editPriceType" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Sélectionner</option>
                                <option value="nuit">Par nuit</option>
                                <option value="mois">Par mois</option>
                                <option value="an">Par an</option>
                            </select>
                        </div>

                        <!-- Contact Phone -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Téléphone de contact</label>
                            <input type="text" name="contact_phone" id="editContactPhone" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- Available From -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Disponible à partir de</label>
                            <input type="date" name="available_from" id="editAvailableFrom" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- Available Until -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Disponible jusqu'à</label>
                            <input type="date" name="available_until" id="editAvailableUntil" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Listing Type -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Type d'annonce</label>
                            <div class="flex space-x-4">
                                <label class="flex items-center">
                                    <input type="checkbox" name="listing_type[]" value="À-vendre" id="editListingVendre" class="mr-2">
                                    À vendre
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="listing_type[]" value="À-louer" id="editListingLouer" class="mr-2">
                                    À louer
                                </label>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                            <textarea name="description" id="editDescription" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>

                        <!-- Photos -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Photos (optionnel - remplacera les photos existantes)</label>
                            <input type="file" name="photos[]" id="editPhotos" multiple accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <p class="text-sm text-gray-500 mt-1">Maximum 10 images, 20MB chacune</p>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3 mt-6">
                        <button type="button" onclick="closeEditModal()" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500">
                            Annuler
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Mettre à jour
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        /* Custom scrollbar for the gallery */
        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        /* Smooth transitions */
        .image-transition {
            transition: opacity 0.3s ease-in-out;
        }
    </style>

    <script>
        let currentProperty = null;
        let currentIndex = 0;
        let currentPhotos = [];

        function openGalleryModal(id, photosJson) {
            const modal = document.getElementById("galleryModal");
            const content = document.getElementById("galleryContent");
            const mainImageView = document.getElementById("mainImageView");
            const thumbnailsGrid = document.getElementById("thumbnailsGrid");
            const imageCounter = document.getElementById("imageCounter");
            const currentImageSpan = document.getElementById("currentImage");
            const totalImagesSpan = document.getElementById("totalImages");

            currentPhotos = JSON.parse(photosJson);

            // Clear old images and set up new ones
            content.innerHTML = "";
            currentPhotos.forEach((photo, index) => {
                const img = document.createElement('img');
                img.src = `/storage/${photo}`;
                img.className = 'w-full h-48 object-cover rounded-lg shadow-sm hover:shadow-md transition-shadow cursor-pointer';
                img.alt = `Property image ${index + 1}`;
                img.onclick = () => openImageView(index);
                content.appendChild(img);
            });

            // Update counters
            totalImagesSpan.textContent = currentPhotos.length;
            currentIndex = 0;
            updateCounter();

            // Show modal and grid view
            modal.classList.remove("hidden");
            modal.classList.add("flex");
            mainImageView.classList.add("hidden");
            mainImageView.classList.remove("flex");
            thumbnailsGrid.classList.remove("hidden");
            imageCounter.classList.add("hidden");
        }

        function openImageView(index) {
            const mainImageView = document.getElementById("mainImageView");
            const thumbnailsGrid = document.getElementById("thumbnailsGrid");
            const mainImage = document.getElementById("mainImage");
            const prevBtn = document.getElementById("prevBtn");
            const nextBtn = document.getElementById("nextBtn");
            const imageCounter = document.getElementById("imageCounter");

            currentIndex = index;

            // Update main image
            mainImage.src = `/storage/${currentPhotos[currentIndex]}`;
            mainImage.alt = `Property image ${currentIndex + 1}`;

            // Toggle views
            thumbnailsGrid.classList.add("hidden");
            mainImageView.classList.remove("hidden");
            mainImageView.classList.add("flex");
            prevBtn.classList.remove("hidden");
            nextBtn.classList.remove("hidden");
            imageCounter.classList.remove("hidden");

            updateCounter();
        }

        function updateCounter() {
            const currentImageSpan = document.getElementById("currentImage");
            currentImageSpan.textContent = currentIndex + 1;
        }

        function closeGalleryModal() {
            document.getElementById("galleryModal").classList.add("hidden");
        }

        // Event listeners for navigation
        document.getElementById('prevBtn').addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                openImageView(currentIndex);
            }
        });

        document.getElementById('nextBtn').addEventListener('click', () => {
            if (currentIndex < currentPhotos.length - 1) {
                currentIndex++;
                openImageView(currentIndex);
            }
        });

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            const modal = document.getElementById("galleryModal");
            if (modal.classList.contains('hidden')) return;

            switch(e.key) {
                case 'Escape':
                    closeGalleryModal();
                    break;
                case 'ArrowLeft':
                    if (currentIndex > 0) {
                        currentIndex--;
                        openImageView(currentIndex);
                    }
                    break;
                case 'ArrowRight':
                    if (currentIndex < currentPhotos.length - 1) {
                        currentIndex++;
                        openImageView(currentIndex);
                    }
                    break;
            }
        });

        function openEditModal(id, hashedId, title, propertyType, city, neighborhood, address, surface, bedrooms, bathrooms, price, priceType, contactPhone, description, availableFrom, availableUntil, listingType) {

            // Populate form fields directly
            document.getElementById('editTitle').value = title || '';
            document.getElementById('editPropertyType').value = propertyType || '';
            document.getElementById('editCity').value = city || '';
            document.getElementById('editNeighborhood').value = neighborhood || '';
            document.getElementById('editAddress').value = address || '';
            document.getElementById('editSurface').value = surface || '';
            document.getElementById('editBedrooms').value = bedrooms || '';
            document.getElementById('editBathrooms').value = bathrooms || '';
            document.getElementById('editPrice').value = price || '';
            document.getElementById('editPriceType').value = priceType || '';
            document.getElementById('editContactPhone').value = contactPhone || '';
            document.getElementById('editDescription').value = description || '';

            // Handle dates
            if (availableFrom) {
                const availableFromDate = new Date(availableFrom);
                document.getElementById('editAvailableFrom').value = availableFromDate.toISOString().split('T')[0];
            }
            if (availableUntil) {
                const availableUntilDate = new Date(availableUntil);
                document.getElementById('editAvailableUntil').value = availableUntilDate.toISOString().split('T')[0];
            }

            // Handle listing type checkboxes
            const listingTypes = listingType ? listingType.split(',') : [];
            document.getElementById('editListingVendre').checked = listingTypes.includes('À-vendre');
            document.getElementById('editListingLouer').checked = listingTypes.includes('À-louer');

            // Set form action and hidden input
            document.getElementById('editForm').action = `/dashboard/update/${hashedId}`;
            document.getElementById('editPropertyHash').value = hashedId;

            // Show modal
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editModal').classList.add('flex');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
            document.getElementById('editModal').classList.remove('flex');
        }

        // Close edit modal when clicking outside
        document.getElementById('editModal').addEventListener('click', (e) => {
            if (e.target === document.getElementById('editModal')) {
                closeEditModal();
            }
        });

        // Close edit modal on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !document.getElementById('editModal').classList.contains('hidden')) {
                closeEditModal();
            }
        });
    </script>

</x-app-layout>
