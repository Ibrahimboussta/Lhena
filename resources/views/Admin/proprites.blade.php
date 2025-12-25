<x-app-layout>
    <div class="max-w-7xl mx-auto pt-10 sm:px-6 lg:px-8 dark:bg-gray-800">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800">
            <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-semibold mb-4 dark:text-white">Propriétés</h2>
                    <h2 class="text-xl font-semibold mb-4 dark:text-white">
                        {{ $properties->total() }} <span class="text-[#25D366] text-[15px]">Propriétés</span>
                    </h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-200 shadow-md rounded-lg dark:border-gray-700 dark:text-white">
                        <thead class="bg-gray-100 dark:bg-gray-800">
                            <tr>
                                <th class="p-3 text-left border">Image</th>
                                <th class="p-3 text-left border">Nom</th>
                                <th class="p-3 text-left border">Adresse</th>
                                <th class="p-3 text-left border">Métrage</th>
                                <th class="p-3 text-left border">Téléphone</th>
                                <th class="p-3 text-left border">Prix</th>
                                <th class="p-3 text-center border">Statut</th>
                                <th class="p-3 text-center border">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($properties as $property)
                                @if (Auth::user()->id == $property->user_id || Auth::user()->role == 'admin')
                                    <tr class="border-t hover:bg-gray-50" data-property-id="{{ $property->id }}" data-photos="{{ $property->photos }}">
                                        <!-- IMAGE + MODAL -->
                                        <td class="p-3 border text-center">
                                            @if ($property->photos)
                                                @php $photos = json_decode($property->photos); @endphp
                                                <div class="relative group inline-block">
                                                    <button type="button" class="relative group" onclick="event.stopPropagation(); openGalleryModal({{ $property->id }});">
                                                        <img
                                                            src="{{ asset('storage/' . $photos[0]) }}"
                                                            class="property-image w-16 h-16 object-cover rounded"
                                                            alt="Property image"
                                                        >
                                                        @if (count($photos) > 1)
                                                            <span class="absolute -top-1 -right-1 bg-black/70 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">
                                                                {{ count($photos) }}
                                                            </span>
                                                        @endif
                                                    </button>
                                                </div>
                                            @else
                                                No Image
                                            @endif
                                        </td>

                                        <!-- Property Title -->
                                        <td class="p-3 border text-sm">{{ $property->title }}</td>

                                        <!-- Address -->
                                        <td class="p-3 border">
                                            <a
                                                href="https://www.google.com/maps/search/?api=1&query={{ urlencode($property->address) }}"
                                                target="_blank"
                                                class="hover:underline text-sm"
                                            >
                                                {{ $property->address }}
                                            </a>
                                        </td>

                                        <!-- Surface -->
                                        <td class="p-3 border text-sm">{{ $property->surface }} m²</td>

                                        <!-- Phone -->
                                        <td class="p-3 border text-sm">
                                            <a href="tel:{{ $property->contact_phone }}" class="hover:underline">
                                                {{ $property->contact_phone }}
                                            </a>
                                        </td>

                                        <!-- Price -->
                                        <td class="p-3 border text-[#25D366]">
                                            {{ number_format($property->price, 2) }} DH
                                        </td>

                                        <!-- STATUS -->
                                        <td class="p-3 text-center border">
                                            <div class="flex items-center justify-center space-x-3">
                                                @if ($property->published)
                                                    <span class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">
                                                        Publié
                                                    </span>
                                                @else
                                                    <span class="px-2 py-1 text-xs font-medium text-yellow-800 bg-yellow-100 rounded-full">
                                                        En attente
                                                    </span>
                                                @endif

                                                <!-- Publish / Unpublish -->
                                                <form action="{{ route('properties.toggle.publish', $property->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    @if ($property->published)
                                                        <button
                                                            class="text-yellow-600 hover:text-yellow-800 transition"
                                                            type="submit"
                                                            title="Dépublier"
                                                        >
                                                            👁️‍🗨️
                                                        </button>
                                                    @else
                                                        <button
                                                            class="text-green-600 hover:text-green-800 transition"
                                                            type="submit"
                                                            title="Publier"
                                                        >
                                                            ✅
                                                        </button>
                                                    @endif
                                                </form>
                                            </div>
                                        </td>

                                        <!-- DELETE -->
                                        <td class="p-3 text-center border">
                                            <form action="{{ route('properties.admin.destroy', $property->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-red-500 hover:text-red-700 transition" type="submit">
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

                {{-- Pagination Links --}}
                <div class="mt-4">
                    {{ $properties->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>

    <style>
        [x-cloak] { display: none !important; }

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

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            z-index: 10;
        }
    </style>
    <!-- Gallery Modal -->
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

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        let currentProperty = null;
        let currentIndex = 0;

        function openGalleryModal(propertyId) {
            const modal = document.getElementById("galleryModal");
            const content = document.getElementById("galleryContent");
            const mainImageView = document.getElementById("mainImageView");
            const thumbnailsGrid = document.getElementById("thumbnailsGrid");
            const imageCounter = document.getElementById("imageCounter");
            const currentImageSpan = document.getElementById("currentImage");
            const totalImagesSpan = document.getElementById("totalImages");
            const prevBtn = document.getElementById("prevBtn");
            const nextBtn = document.getElementById("nextBtn");

            // Find the property row that was clicked
            const row = document.querySelector(`tr[data-property-id="${propertyId}"]`);
            if (!row) return;

            // Get the photos from the data attribute
            const photos = JSON.parse(row.getAttribute('data-photos') || '[]');

            // Clear old images and set up new ones
            content.innerHTML = "";
            photos.forEach((photo, index) => {
                const img = document.createElement('img');
                img.src = `/storage/${photo}`;
                img.className = 'w-full h-48 object-cover rounded-lg shadow-sm hover:shadow-md transition-shadow cursor-pointer';
                img.alt = `Property image ${index + 1}`;
                img.onclick = () => showImage(index);
                content.appendChild(img);
            });

            // Set up the gallery
            currentProperty = { id: propertyId, photos: photos };
            currentIndex = 0;
            totalImagesSpan.textContent = photos.length;

            // Show the modal and thumbnails grid
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            thumbnailsGrid.classList.remove('hidden');
            mainImageView.classList.add('hidden');
            mainImageView.classList.remove('flex');
            imageCounter.classList.add('hidden');
            prevBtn.classList.add('hidden');
            nextBtn.classList.add('hidden');
            document.body.style.overflow = 'hidden';

            // Show the first image if there are any
            if (photos.length > 0) {
                showImage(0);
            }
        }

        function closeGalleryModal() {
            const modal = document.getElementById("galleryModal");
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        }

        function showImage(index) {
            const photos = currentProperty?.photos || [];
            if (index < 0 || index >= photos.length) return;

            currentIndex = index;
            const mainImage = document.getElementById("mainImage");
            const mainImageView = document.getElementById("mainImageView");
            const thumbnailsGrid = document.getElementById("thumbnailsGrid");
            const imageCounter = document.getElementById("imageCounter");
            const currentImageSpan = document.getElementById("currentImage");
            const prevBtn = document.getElementById("prevBtn");
            const nextBtn = document.getElementById("nextBtn");

            // Update the main image
            mainImage.src = `/storage/${photos[index]}`;
            mainImage.className = 'max-h-[85vh] max-w-full object-contain image-transition';

            // Update UI
            currentImageSpan.textContent = index + 1;

            // Show/hide navigation buttons
            prevBtn.classList.toggle('hidden', photos.length <= 1);
            nextBtn.classList.toggle('hidden', photos.length <= 1);

            // Show the main image view and hide thumbnails
            mainImageView.classList.remove('hidden');
            mainImageView.classList.add('flex');
            thumbnailsGrid.classList.add('hidden');
            imageCounter.classList.remove('hidden');

            // Set up navigation
            prevBtn.onclick = (e) => {
                e.stopPropagation();
                showImage((currentIndex - 1 + photos.length) % photos.length);
            };

            nextBtn.onclick = (e) => {
                e.stopPropagation();
                showImage((currentIndex + 1) % photos.length);
            };
        }

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            const modal = document.getElementById("galleryModal");
            if (!modal || modal.classList.contains('hidden')) return;

            switch(e.key) {
                case 'Escape':
                    closeGalleryModal();
                    break;
                case 'ArrowLeft':
                    showImage((currentIndex - 1 + (currentProperty?.photos?.length || 0)) % (currentProperty?.photos?.length || 1));
                    break;
                case 'ArrowRight':
                    showImage((currentIndex + 1) % (currentProperty?.photos?.length || 1));
                    break;
            }
        });

        // Close modal when clicking outside the content
        document.getElementById('galleryModal').addEventListener('click', (e) => {
            if (e.target === document.getElementById('galleryModal')) {
                closeGalleryModal();
            }
        });

        // Initialize click handlers for property images
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.property-image').forEach(img => {
                img.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const propertyId = this.closest('tr').getAttribute('data-property-id');
                    if (propertyId) {
                        openGalleryModal(propertyId);
                    }
                });
            });
        });
    </script>
</x-app-layout>
