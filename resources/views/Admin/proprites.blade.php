<x-app-layout>
    @section('title', 'SorvaRent - ' . __('ui.properties'))

    <style>
        .admin-property-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .admin-property-card {
            overflow: hidden;
            border: 1px solid #e4e9e5;
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 3px 12px rgba(32, 54, 43, 0.04);
        }

        .admin-property-card__image {
            position: relative;
            height: 190px;
            background: #edf2ee;
        }

        .admin-property-card__image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .admin-property-card__photo-count {
            position: absolute;
            right: 12px;
            bottom: 12px;
            border-radius: 9999px;
            background: rgba(22, 38, 31, 0.78);
            padding: 5px 9px;
            color: #fff;
            font-size: 10px;
        }

        .admin-property-card__body {
            padding: 16px;
        }

        .admin-property-card__title {
            overflow: hidden;
            color: #24352d;
            font-size: 15px;
            font-weight: 700;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .admin-property-card__location {
            overflow: hidden;
            margin-top: 5px;
            color: #7a857e;
            font-size: 11px;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .admin-property-card__owner {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 14px;
            border-top: 1px solid #edf0ed;
            padding-top: 12px;
        }

        .admin-property-card__owner-avatar {
            display: inline-flex;
            width: 28px;
            height: 28px;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #e7f0e9;
            color: #315d4e;
            font-size: 10px;
            font-weight: 700;
        }

        .admin-property-card__owner-label {
            color: #89928c;
            font-size: 9px;
        }

        .admin-property-card__owner-name {
            margin-top: 2px;
            color: #34443b;
            font-size: 11px;
            font-weight: 600;
        }

        .admin-property-card__details {
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
            margin-top: 13px;
        }

        .admin-property-card__detail {
            border-radius: 6px;
            background: #f4f7f4;
            padding: 5px 7px;
            color: #5d6b62;
            font-size: 10px;
        }

        .admin-property-card__footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-top: 14px;
            border-top: 1px solid #edf0ed;
            padding-top: 12px;
        }

        .admin-property-card__price {
            color: #173f36;
            font-size: 14px;
            font-weight: 700;
        }

        .admin-property-card__price small {
            color: #89928c;
            font-size: 10px;
            font-weight: 400;
        }

        .admin-property-card__actions {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .admin-property-card__action {
            display: inline-flex;
            min-height: 30px;
            align-items: center;
            justify-content: center;
            border: 1px solid #e4e9e5;
            border-radius: 7px;
            background: #fff;
            padding: 5px 8px;
            color: #526057;
            font-size: 10px;
            font-weight: 600;
        }

        .admin-property-card__action:hover {
            background: #f5f8f5;
        }

        .admin-property-card__action--delete {
            border-color: #f0dfda;
            background: #fff8f6;
            color: #a64e3c;
        }

        .admin-property-card__action--delete:hover {
            background: #fcece7;
        }

        @media (max-width: 1050px) {
            .admin-property-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 620px) {
            .admin-property-grid {
                grid-template-columns: minmax(0, 1fr);
            }

            .admin-property-card__image {
                height: 220px;
            }
        }
    </style>

    <div class="admin-page">
        <header class="admin-page-header">
            <div>
                <h1 class="admin-page-title">{{ __('ui.properties') }}</h1>
                <p class="admin-page-subtitle">{{ __('ui.admin_properties_subtitle') }}</p>
            </div>
            <span class="admin-count-badge"><strong>{{ $properties->total() }}</strong> {{ __('ui.admin_property_count') }}</span>
        </header>

        @if ($properties->isEmpty())
            <div class="admin-panel admin-empty">{{ __('ui.admin_no_properties') }}</div>
        @else
            <div class="admin-property-grid">
                @foreach ($properties as $property)
                    @php
                        $photos = json_decode($property->photos, true) ?: [];
                        $propertyTypeLabels = [
                            'appartement' => __('ui.admin_apartment'),
                            'maison' => __('ui.admin_house'),
                            'duplex' => __('ui.admin_duplex'),
                            'studio' => __('ui.admin_studio'),
                        ];
                        $propertyType = mb_strtolower($property->property_type);
                    @endphp
                    <article class="admin-property-card" data-property-id="{{ $property->id }}"
                        data-photos="{{ json_encode($photos) }}">
                        <div class="admin-property-card__image">
                            @if (!empty($photos))
                                <button type="button" class="h-full w-full text-left"
                                    onclick="openGalleryModal({{ $property->id }})"
                                    aria-label="{{ __('ui.admin_view_photos', ['property' => $property->title]) }}">
                                    <img src="{{ asset('storage/' . $photos[0]) }}" alt="{{ $property->title }}" loading="lazy">
                                </button>
                            @else
                                <div class="flex h-full items-center justify-center text-sm text-gray-400">{{ __('ui.admin_no_photo') }}</div>
                            @endif
                            @if (count($photos) > 1)
                                <span class="admin-property-card__photo-count">{{ __('ui.admin_photo_count', ['count' => count($photos)]) }}</span>
                            @endif
                        </div>

                        <div class="admin-property-card__body">
                            <div class="flex items-start justify-between gap-3">
                                <div class="min-w-0">
                                    <h2 class="admin-property-card__title" title="{{ $property->title }}">{{ $property->title }}</h2>
                                    <p class="admin-property-card__location" title="{{ $property->address }}">
                                        {{ $property->city }} · {{ $property->address }}
                                    </p>
                                </div>
                                <span class="admin-status {{ $property->published ? 'admin-status--success' : 'admin-status--pending' }}">
                                    {{ $property->published ? __('ui.admin_published') : __('ui.admin_pending') }}
                                </span>
                            </div>

                            <div class="admin-property-card__owner">
                                <span class="admin-property-card__owner-avatar" aria-hidden="true">
                                    {{ mb_strtoupper(mb_substr($property->user?->name ?? '?', 0, 1)) }}
                                </span>
                                <span>
                                    <span class="admin-property-card__owner-label block">{{ __('ui.admin_posted_by') }}</span>
                                    <span class="admin-property-card__owner-name block">{{ $property->user?->name ?? __('ui.admin_owner_unavailable') }}</span>
                                </span>
                            </div>

                            <div class="admin-property-card__details">
                                <span class="admin-property-card__detail">{{ $propertyTypeLabels[$propertyType] ?? ucfirst($property->property_type) }}</span>
                                @if ($property->surface)
                                    <span class="admin-property-card__detail">{{ $property->surface }} m²</span>
                                @endif
                                <span class="admin-property-card__detail">{{ $property->bedrooms }} {{ __('ui.admin_bedrooms') }}</span>
                                <span class="admin-property-card__detail">{{ $property->bathrooms }} {{ __('ui.admin_bathrooms') }}</span>
                            </div>

                            <div class="admin-property-card__footer">
                                <p class="admin-property-card__price">
                                    {{ number_format($property->price, 0, ',', ' ') }} DH
                                    @if ($property->price_type)
                                        <small>/ {{ $property->price_type }}</small>
                                    @endif
                                </p>
                                <div class="admin-property-card__actions">
                                    <form action="{{ route('properties.toggle.publish', $property->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button class="admin-property-card__action" type="submit">
                                            {{ $property->published ? __('ui.admin_unpublish') : __('ui.admin_publish') }}
                                        </button>
                                    </form>
                                    <form action="{{ route('properties.admin.destroy', $property->id) }}" method="POST"
                                        onsubmit="return confirm(@js(__('ui.admin_delete_property_confirm')))">
                                        @csrf
                                        @method('DELETE')
                                        <button class="admin-property-card__action admin-property-card__action--delete"
                                            type="submit" aria-label="{{ __('ui.admin_delete_property') }} {{ $property->title }}">
                                            {{ __('ui.admin_delete_property') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
            @if ($properties->hasPages())
                <div class="mt-5">{{ $properties->links('pagination::tailwind') }}</div>
            @endif
        @endif
    </div>

    <!-- Gallery Modal -->
    <div id="galleryModal" class="fixed inset-0 bg-black/80 hidden items-center justify-center z-50 p-4">
        <div class="relative w-full max-w-6xl max-h-[90vh] bg-black rounded-lg overflow-hidden">
            <!-- Close Button -->
            <button onclick="closeGalleryModal()" class="absolute top-4 right-4 text-white hover:text-gray-300 z-10 bg-black/50 rounded-full p-2" aria-label="{{ __('ui.admin_close_gallery') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Main Image -->
            <div id="mainImageView" class="flex items-center justify-center h-full p-4 hidden">
                <img id="mainImage" class="max-h-[85vh] max-w-full object-contain" src="" alt="{{ __('ui.admin_property_image') }}">
            </div>

            <!-- Thumbnails Grid -->
            <div id="thumbnailsGrid" class="p-4">
                <h3 class="text-white text-lg font-semibold mb-4">{{ __('ui.admin_gallery') }}</h3>
                <div id="galleryContent" class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 overflow-y-auto max-h-[70vh] custom-scrollbar"></div>
            </div>

            <!-- Navigation -->
            <button id="prevBtn" class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/50 text-white p-3 rounded-full hover:bg-black/70 transition-colors hidden" aria-label="{{ __('ui.previous_photo') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button id="nextBtn" class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/50 text-white p-3 rounded-full hover:bg-black/70 transition-colors hidden" aria-label="{{ __('ui.next_photo') }}">
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
        [x-cloak] { display: none !important; }
        .custom-scrollbar::-webkit-scrollbar { width: 8px; height: 8px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #888; border-radius: 10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #555; }
        .image-transition { transition: opacity 0.3s ease-in-out; }
    </style>

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

            const row = document.querySelector(`.admin-property-card[data-property-id="${propertyId}"]`);
            if (!row) return;

            const photos = JSON.parse(row.getAttribute('data-photos') || '[]');
            content.innerHTML = "";
            photos.forEach((photo, index) => {
                const img = document.createElement('img');
                img.src = `/storage/${photo}`;
                img.alt = @js(__('ui.admin_property_image'));
                img.className = 'w-full h-48 object-cover rounded-lg cursor-pointer';
                img.onclick = () => showImage(index);
                content.appendChild(img);
            });

            currentProperty = { id: propertyId, photos };
            currentIndex = 0;
            totalImagesSpan.textContent = photos.length;

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            thumbnailsGrid.classList.remove('hidden');
            mainImageView.classList.add('hidden');
            imageCounter.classList.add('hidden');
            prevBtn.classList.add('hidden');
            nextBtn.classList.add('hidden');
            document.body.style.overflow = 'hidden';

            modal.addEventListener('click', handleModalClickOutside);

            if (photos.length > 0) showImage(0);
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

            mainImage.src = `/storage/${photos[index]}`;
            mainImageView.classList.remove('hidden');
            thumbnailsGrid.classList.add('hidden');
            imageCounter.classList.remove('hidden');
            currentImageSpan.textContent = index + 1;

            prevBtn.classList.toggle('hidden', photos.length <= 1);
            nextBtn.classList.toggle('hidden', photos.length <= 1);

            prevBtn.onclick = (e) => { e.stopPropagation(); showImage((currentIndex - 1 + photos.length) % photos.length); };
            nextBtn.onclick = (e) => { e.stopPropagation(); showImage((currentIndex + 1) % photos.length); };
        }

        function handleModalClickOutside(e) {
            if (e.target.id === 'galleryModal') closeGalleryModal();
        }

        document.addEventListener('keydown', (e) => {
            const modal = document.getElementById("galleryModal");
            if (!modal || modal.classList.contains('hidden')) return;
            if (!currentProperty) return;

            switch(e.key) {
                case 'Escape': closeGalleryModal(); break;
                case 'ArrowLeft': showImage((currentIndex - 1 + currentProperty.photos.length) % currentProperty.photos.length); break;
                case 'ArrowRight': showImage((currentIndex + 1) % currentProperty.photos.length); break;
            }
        });
    </script>
</x-app-layout>
