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
                                <th class="p-3 text-left border">Téléphone</th>
                                <th class="p-3 text-left border">Prix</th>
                                <th class="p-3 text-left border">Disponibilité</th>
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
                                                    <button onclick="openGalleryModal({{ $property->id }}); event.stopPropagation();">
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
                                        <td class="p-3 border text-sm">{{ $property->contact_phone }}</td>
                                        <td class="p-3 border text-sm text-[#25D366]">{{ number_format($property->price, 2) }}
                                            DH</td>
                                        <td class="p-3 border">

                                            {{ $property->available_from }} / {{ $property->available_until }}

                                        </td>

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
                                            <form action="{{ route('properties.destroy', $property->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="inline-flex items-center px-3 py-1.5 bg-red-50 text-red-700 text-sm font-medium rounded-md hover:bg-red-100 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                                    type="submit">
                                                    <span class="sr-only">Supprimer</span>
                                                    🗑
                                                </button>
                                            </form>
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
            <div id="mainImageView" class="flex items-center justify-center h-full p-4 hidden">
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
        const properties = @json($properties);
        let currentProperty = null;
        let currentIndex = 0;

        function openGalleryModal(id) {
            const modal = document.getElementById("galleryModal");
            const content = document.getElementById("galleryContent");
            const mainImageView = document.getElementById("mainImageView");
            const thumbnailsGrid = document.getElementById("thumbnailsGrid");
            const imageCounter = document.getElementById("imageCounter");
            const currentImageSpan = document.getElementById("currentImage");
            const totalImagesSpan = document.getElementById("totalImages");

            currentProperty = properties.find(p => p.id === id);
            const photos = JSON.parse(currentProperty.photos);

            // Clear old images and set up new ones
            content.innerHTML = "";
            photos.forEach((photo, index) => {
                const img = document.createElement('img');
                img.src = `/storage/${photo}`;
                img.className = 'w-full h-48 object-cover rounded-lg shadow-sm hover:shadow-md transition-shadow cursor-pointer';
                img.alt = `Property image ${index + 1}`;
                img.onclick = () => openImageView(index);
                content.appendChild(img);
            });

            // Update counters
            totalImagesSpan.textContent = photos.length;
            currentIndex = 0;
            updateCounter();

            // Show modal and grid view
            modal.classList.remove("hidden");
            modal.classList.add("flex");
            mainImageView.classList.add("hidden");
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

            const photos = JSON.parse(currentProperty.photos);
            currentIndex = index;

            // Update main image
            mainImage.src = `/storage/${photos[currentIndex]}`;
            mainImage.alt = `Property image ${currentIndex + 1}`;

            // Toggle views
            thumbnailsGrid.classList.add("hidden");
            mainImageView.classList.remove("hidden");
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
            const photos = JSON.parse(currentProperty.photos);
            if (currentIndex > 0) {
                currentIndex--;
                openImageView(currentIndex);
            }
        });

        document.getElementById('nextBtn').addEventListener('click', () => {
            const photos = JSON.parse(currentProperty.photos);
            if (currentIndex < photos.length - 1) {
                currentIndex++;
                openImageView(currentIndex);
            }
        });

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            const modal = document.getElementById("galleryModal");
            if (modal.classList.contains('hidden')) return;

            const photos = currentProperty ? JSON.parse(currentProperty.photos) : [];

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
                    if (currentIndex < photos.length - 1) {
                        currentIndex++;
                        openImageView(currentIndex);
                    }
                    break;
            }
        });
    </script>

</x-app-layout>
