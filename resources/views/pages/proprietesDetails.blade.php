@extends('layouts.index')
@section('title', 'Lhena.ma | ' . $property->title)
@section('meta')
    @php
        $defaultImage = asset('images/lhena-logo.png');
        $photos = json_decode($property->photos, true) ?: [];
        $mainImage = isset($photos[0]) && $photos[0] ? asset('storage/' . $photos[0]) : $defaultImage;
        $description = $property->description ? Str::limit(strip_tags($property->description), 160, '...') : 'Découvrez cette propriété sur Lhena.ma.';
        $currentUrl = url()->current();
    @endphp

    <link rel="canonical" href="{{ $currentUrl }}">
    <meta name="description" content="{{ $description }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $property->title }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:image" content="{{ $mainImage }}">
    <meta property="og:url" content="{{ $currentUrl }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $property->title }}">
    <meta name="twitter:description" content="{{ $description }}">
    <meta name="twitter:image" content="{{ $mainImage }}">
@endsection
@section('content')

    <style>
        .skeleton {
            background: linear-gradient(90deg, rgba(229, 231, 235, 1) 25%, rgba(243, 244, 246, 1) 37%, rgba(229, 231, 235, 1) 63%);
            background-size: 400% 100%;
        }

        .skeleton-animate {
            animation: shimmer 1.25s infinite;
        }

        @keyframes shimmer {
            0% {
                background-position: 100% 0;
            }

            100% {
                background-position: 0 0;
            }
        }

        /* Prevent body scroll when modal is open */
        .overflow-hidden {
            overflow: hidden !important;
        }

        /* Enhanced Fullscreen Image Viewer */
        .fullscreen-viewer {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.97);
            z-index: 9999;
            flex-direction: column;
            opacity: 0;
            transition: opacity 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            padding: 0;
            overflow: hidden;
        }

        .fullscreen-viewer.active {
            display: flex;
            opacity: 1;
        }

        .viewer-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 20px;
            background: transparent;
            position: absolute;
            top: 64px;
            left: 0;
            right: 0;
            z-index: 30;
        }

        .viewer-title {
            color: white;
            font-size: 1.1rem;
            font-weight: 500;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
        }

        .viewer-close-btn {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.35);
            color: white;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 2rem;
            font-weight: 700;
            transition: all 0.2s ease;
            backdrop-filter: blur(5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.35);
        }

        .viewer-close-btn:hover {
            background: rgba(255, 255, 255, 0.35);
            transform: rotate(90deg);
        }

        .main-image-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            width: 100%;
            padding: 60px 20px 150px;
            cursor: grab;
        }

        .main-image {
            max-width: 90%;
            max-height: 80vh;
            object-fit: contain;
            transition: opacity 0.3s ease, transform 0.3s ease;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .nav-btn {
            position: fixed;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.15);
            color: white;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 1.5rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 5;
            backdrop-filter: blur(5px);
            opacity: 0.8;
        }

        .nav-btn:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-50%) scale(1.1);
            opacity: 1;
        }

        .prev-btn {
            left: 20px;
        }

        .next-btn {
            right: 20px;
        }

        .thumbnail-container {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0) 100%);
            padding: 20px 15px 15px;
            overflow-x: auto;
            white-space: nowrap;
            text-align: center;
            display: flex;
            justify-content: center;
            z-index: 5;
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 255, 255, 0.3) transparent;
        }

        .thumbnail-container::-webkit-scrollbar {
            height: 6px;
        }

        .thumbnail-container::-webkit-scrollbar-thumb {
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 3px;
        }

        .thumbnail-scroll {
            display: inline-flex;
            gap: 12px;
            padding: 10px 0;
        }

        .thumbnail {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border: 2px solid transparent;
            border-radius: 6px;
            cursor: pointer;
            opacity: 0.7;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .thumbnail:hover {
            opacity: 0.9;
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .thumbnail.active {
            opacity: 1;
            border-color: #fff;
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.4);
        }

        .image-counter {
            position: fixed;
            top: 84px;
            right: 20px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 1rem;
            z-index: 15;
            backdrop-filter: blur(5px);
            font-weight: 500;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .property-page {
            background: #f8f6f0;
        }

        .property-shell {
            width: min(100%, 1200px);
            margin: 0 auto;
        }

        .property-heading {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 32px;
            margin-bottom: 30px;
        }

        .property-heading h1 {
            color: #173f36;
            font-size: clamp(2rem, 4vw, 3.25rem);
            font-weight: 700;
            letter-spacing: -0.045em;
            line-height: 1.05;
            text-transform: uppercase;
        }

        .property-rating {
            color: #c5a15b;
            letter-spacing: 0.08em;
        }

        .property-gallery {
            display: grid;
            grid-template-columns: minmax(0, 1.4fr) minmax(0, 1fr);
            grid-template-rows: repeat(2, minmax(140px, 1fr));
            gap: 14px;
            height: clamp(360px, 45vw, 540px);
            margin-bottom: 58px;
        }

        .property-gallery__primary {
            position: relative;
            grid-row: 1 / span 2;
            min-width: 0;
            overflow: hidden;
            border-radius: 12px;
            background: #f3f4f6;
        }

        .property-gallery__side {
            display: grid;
            grid-column: 2;
            grid-row: 1 / span 2;
            grid-template-rows: minmax(0, 1fr) minmax(0, 1fr);
            gap: 14px;
            min-width: 0;
            min-height: 0;
        }

        .property-gallery__side--single > .property-gallery__tile {
            grid-row: 1 / span 2;
        }

        .property-gallery__lower {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
            min-height: 0;
        }

        .property-gallery__lower--single > .property-gallery__tile {
            grid-column: 1 / -1;
        }

        .property-gallery--single {
            grid-template-columns: minmax(0, 1fr);
        }

        .property-gallery--single .property-gallery__primary {
            grid-column: 1 / -1;
        }

        .property-gallery__tile {
            position: relative;
            display: block;
            width: 100%;
            height: 100%;
            min-width: 0;
            min-height: 0;
            overflow: hidden;
            border: 0;
            border-radius: 10px;
            background: #f3f4f6;
            padding: 0;
            cursor: zoom-in;
        }

        .property-gallery__tile img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 350ms ease;
        }

        .property-gallery__tile:hover img {
            transform: scale(1.035);
        }

        .property-gallery__primary .property-gallery__tile {
            border-radius: 12px;
        }

        .property-gallery__more {
            position: absolute;
            inset: 0;
            display: grid;
            place-items: center;
            background: rgba(0, 0, 0, 0.56);
            color: #fff;
            font-size: 1.25rem;
            font-weight: 600;
        }

        .property-gallery__empty {
            grid-column: 1 / -1;
            grid-row: 1 / span 2;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: #f3f4f6;
            color: #6b7280;
        }

        .property-detail-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(280px, 350px);
            align-items: start;
            gap: 36px;
        }

        .property-detail-section + .property-detail-section {
            margin-top: 42px;
            border-top: 1px solid #e8e1d4;
            padding-top: 30px;
        }

        .property-detail-section h2 {
            color: #173f36;
        }

        .property-spec-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px 28px;
        }

        .property-spec {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #4b5563;
            font-size: 0.9rem;
        }

        .property-spec img {
            width: 18px;
            height: 18px;
            opacity: 0.72;
        }

        .property-booking-card {
            position: sticky;
            top: 88px;
            border: 1px solid #e9e3d8;
            border-radius: 20px;
            background: #fff;
            padding: 28px;
            box-shadow: 0 14px 40px rgba(39, 49, 42, 0.08);
        }

        .property-booking-card__intro {
            margin-bottom: 22px;
            text-align: center;
        }

        .property-booking-card__intro h2 {
            color: #173f36;
            font-size: 1.1rem;
            letter-spacing: 0.04em;
        }

        .property-booking-card__availability {
            margin-top: 12px;
            border: 1px solid #e9e3d8;
            border-radius: 12px;
            background: #f8f6f0;
            padding: 14px 16px;
            color: #173f36;
            font-weight: 600;
        }

        @media (max-width: 767px) {
            .property-heading {
                align-items: flex-start;
                flex-direction: column;
                gap: 12px;
            }

            .property-gallery {
                grid-template-columns: minmax(0, 1fr) minmax(0, 0.78fr);
                grid-template-rows: repeat(2, minmax(100px, 1fr));
                height: 360px;
                gap: 8px;
                margin-bottom: 38px;
            }

            .property-gallery__side,
            .property-gallery__lower {
                gap: 8px;
            }

            .property-detail-grid {
                grid-template-columns: minmax(0, 1fr);
                gap: 28px;
            }

            .property-booking-card {
                position: static;
            }
        }

        @media (max-width: 480px) {
            .property-gallery {
                grid-template-columns: minmax(0, 1fr);
                grid-template-rows: 260px 130px;
                height: auto;
            }

            .property-gallery--single {
                grid-template-rows: 300px;
            }

            .property-gallery__primary {
                grid-row: auto;
            }

            .property-gallery__side {
                grid-column: auto;
                grid-row: auto;
                grid-template-rows: minmax(0, 1fr);
            }

            .property-gallery__side--single > .property-gallery__tile {
                grid-row: 1;
            }

            .property-gallery__side:not(.property-gallery__side--single) > .property-gallery__tile {
                display: none;
            }

            .property-gallery__lower {
                grid-column: 1;
            }

            .property-spec-grid {
                grid-template-columns: minmax(0, 1fr);
            }
        }

    </style>


    <section class="property-page px-5 pb-12 pt-28 sm:px-8 sm:pt-32 lg:px-10 lg:pb-16">
        <div class="property-shell">
            @php
                $avgRating = (int) round($property->reviews->avg('rating') ?? 0);
                $reviewsCount = $property->reviews->count();
                $photoCount = count($photos);
            @endphp

            <header class="property-heading">
                <div class="min-w-0">
                    <div class="property-rating mb-1 text-sm" aria-label="{{ $avgRating }} sur 5 étoiles">
                        {{ str_repeat('★', $avgRating) }}<span class="text-gray-300">{{ str_repeat('☆', 5 - $avgRating) }}</span>
                        <span class="ml-2 align-middle text-xs font-normal tracking-normal text-gray-500">({{ $reviewsCount }} avis)</span>
                    </div>
                    <h1>{{ $property->title }}</h1>
                    <a href="https://www.google.com/maps?q={{ urlencode($property->address) }}" target="_blank"
                        rel="noopener noreferrer"
                        class="mt-1 inline-flex items-center gap-1.5 text-sm text-gray-500 transition hover:text-[#0b3b31]">
                        <img src="{{ asset('images/local.svg') }}" class="h-4 w-4 opacity-70" alt="" loading="lazy">
                        <span>{{ $property->address }}</span>
                    </a>
                </div>
                <div class="shrink-0 sm:text-right">
                    <span class="inline-flex rounded-full border border-[#e5ddcd] bg-[#eee9df] px-4 py-2 text-xs font-semibold uppercase tracking-[0.12em] text-[#173f36]">
                        {{ $property->listing_type == 'À-louer' ? 'Location exclusive' : 'Vente privée' }}
                    </span>
                    <p class="mt-3 text-xs font-medium uppercase tracking-[0.14em] text-gray-500">
                        Disponibilité
                    </p>
                    <p class="mt-1 text-lg font-semibold text-[#173f36]">Sur demande privée</p>
                </div>
            </header>

            <div class="property-gallery {{ $photoCount <= 1 ? 'property-gallery--single' : '' }}">
                @if ($photoCount === 0)
                    <div class="property-gallery__empty">Aucune photo disponible</div>
                @else
                    <div class="property-gallery__primary">
                        <button type="button" class="property-gallery__tile"
                            onclick="openFullscreenViewer(0)" aria-label="Ouvrir la photo 1 en plein écran">
                            <img src="{{ asset('storage/' . $photos[0]) }}" alt="Photo principale de {{ $property->title }}"
                                loading="eager">
                        </button>
                    </div>

                    @if ($photoCount > 1)
                        <div class="property-gallery__side {{ $photoCount === 2 ? 'property-gallery__side--single' : '' }}">
                            <button type="button" class="property-gallery__tile"
                                onclick="openFullscreenViewer(1)" aria-label="Ouvrir la photo 2 en plein écran">
                                <img src="{{ asset('storage/' . $photos[1]) }}" alt="Photo 2 de {{ $property->title }}"
                                    loading="lazy">
                            </button>
                            @if ($photoCount > 2)
                                <div class="property-gallery__lower {{ $photoCount === 3 ? 'property-gallery__lower--single' : '' }}">
                                    <button type="button" class="property-gallery__tile"
                                        onclick="openFullscreenViewer(2)" aria-label="Ouvrir la photo 3 en plein écran">
                                        <img src="{{ asset('storage/' . $photos[2]) }}" alt="Photo 3 de {{ $property->title }}"
                                            loading="lazy">
                                    </button>
                                    @if ($photoCount > 3)
                                        <button type="button" class="property-gallery__tile"
                                            onclick="openFullscreenViewer(3)" aria-label="Ouvrir la photo 4 et les autres en plein écran">
                                            <img src="{{ asset('storage/' . $photos[3]) }}" alt="Photo 4 de {{ $property->title }}"
                                                loading="lazy">
                                            @if ($photoCount > 4)
                                                <span class="property-gallery__more">+{{ $photoCount - 3 }}</span>
                                            @endif
                                        </button>
                                    @else
                                        <button type="button" class="property-gallery__tile"
                                            onclick="openFullscreenViewer(2)" aria-label="Ouvrir la photo 3 en plein écran">
                                            <img src="{{ asset('storage/' . $photos[2]) }}" alt="Photo 3 de {{ $property->title }}"
                                                loading="lazy">
                                        </button>
                                    @endif
                                </div>
                            @endif
                        </div>
                    @endif
                @endif
            </div>

            <div id="fullscreen-viewer" class="fullscreen-viewer">
                <div class="viewer-header">
                    <div class="viewer-title">Galerie photos</div>
                    <button class="viewer-close-btn" onclick="closeFullscreenViewer()" aria-label="Fermer la galerie">
                        &times;
                    </button>
                </div>

                <div class="main-image-container">
                    <button class="nav-btn prev-btn" onclick="navigateInViewer(-1)" aria-label="Photo précédente">
                        ❮
                    </button>
                    <img id="fullscreen-image" class="main-image" src="" alt="Photo du bien en plein écran">
                    <button class="nav-btn next-btn" onclick="navigateInViewer(1)" aria-label="Photo suivante">
                        ❯
                    </button>
                    <div class="image-counter" id="image-counter">1 / {{ $photoCount }}</div>
                </div>

                <div class="thumbnail-container">
                    <div class="thumbnail-scroll" id="thumbnail-scroll">
                        @foreach ($photos as $index => $photo)
                            <img src="{{ asset('storage/' . $photo) }}"
                                class="thumbnail {{ $index === 0 ? 'active' : '' }}"
                                data-index="{{ $index }}" onclick="goToImage({{ $index }})"
                                alt="Miniature {{ $index + 1 }}">
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="property-detail-grid">
                <div class="min-w-0">
                    <section class="property-detail-section">
                        <h2 class="mb-3 text-xl font-semibold text-gray-900">Description</h2>
                        <p class="text-base leading-8 text-gray-600">{!! nl2br(e($property->description)) !!}</p>
                    </section>

                    <section class="property-detail-section">
                        <h2 class="mb-4 text-xl font-semibold text-gray-900">Caractéristiques</h2>
                        <div class="property-spec-grid">
                            <div class="property-spec">
                                <img src="{{ asset('images/local.svg') }}" alt="" loading="lazy">
                                <span>{{ ucfirst($property->property_type) }}</span>
                            </div>
                            <div class="property-spec">
                                <img src="{{ asset('images/space.svg') }}" alt="" loading="lazy">
                                <span>{{ $property->surface }} m²</span>
                            </div>
                            <div class="property-spec">
                                <img src="{{ asset('images/beds.svg') }}" alt="" loading="lazy">
                                <span>{{ $property->bedrooms }} Chambres</span>
                            </div>
                            <div class="property-spec">
                                <img src="{{ asset('images/dosh.svg') }}" alt="" loading="lazy">
                                <span>{{ $property->bathrooms }} Salles de bain</span>
                            </div>
                        </div>
                    </section>

                    @if ($property->amenities)
                        <section class="property-detail-section">
                            <h2 class="mb-4 text-xl font-semibold text-gray-900">Équipements et services</h2>
                            <div class="property-spec-grid">
                                @foreach (json_decode($property->amenities) as $amenity)
                                    <div class="property-spec">
                                        <svg class="h-5 w-5 shrink-0 text-[#0b3b31]" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        @switch($amenity)
                                            @case('wifi')
                                                <span>WiFi</span>
                                                @break
                                            @case('parking')
                                                <span>Parking</span>
                                                @break
                                            @case('elevator')
                                                <span>Ascenseur</span>
                                                @break
                                            @case('security')
                                                <span>Sécurité 24/7</span>
                                                @break
                                            @case('ac')
                                                <span>Climatisation</span>
                                                @break
                                            @case('heating')
                                                <span>Chauffage</span>
                                                @break
                                            @case('furnished')
                                                <span>Meublé</span>
                                                @break
                                            @case('equipped_kitchen')
                                                <span>Cuisine équipée</span>
                                                @break
                                            @case('balcony')
                                                <span>Balcon</span>
                                                @break
                                            @case('terrace')
                                                <span>Terrasse</span>
                                                @break
                                            @case('garden')
                                                <span>Jardin</span>
                                                @break
                                            @case('pool')
                                                <span>Piscine</span>
                                                @break
                                            @case('gym')
                                                <span>Salle de sport</span>
                                                @break
                                            @case('concierge')
                                                <span>Concierge</span>
                                                @break
                                            @case('storage')
                                                <span>Cave/Storage</span>
                                                @break
                                            @case('panoramic_view')
                                                <span>Vue panoramique</span>
                                                @break
                                            @default
                                                <span>{{ ucfirst(str_replace('_', ' ', $amenity)) }}</span>
                                        @endswitch
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endif
                </div>

                <aside class="property-booking-card">
                    <div class="property-booking-card__intro">
                        <h2 class="font-semibold uppercase">Réserver / demande de séjour</h2>
                        <div class="property-booking-card__availability text-left">
                            <span class="block text-xs font-normal text-gray-500">Tarif &amp; disponibilité</span>
                            <span class="mt-1 block">Sur demande / devis personnalisé</span>
                        </div>
                    </div>
                    <div class="mb-5 flex items-start gap-2 text-sm text-gray-600">
                        <img src="{{ asset('images/local.svg') }}" class="mt-0.5 h-4 w-4 shrink-0 opacity-70" alt=""
                            loading="lazy">
                        <a href="https://www.google.com/maps?q={{ urlencode($property->address) }}" target="_blank"
                            rel="noopener noreferrer" class="transition hover:text-[#0b3b31]">
                            {{ $property->address }}
                        </a>
                    </div>

                    <div class="space-y-2" x-data="{
                        showAgentModal: false,
                        updateBodyScroll() {
                            if (this.showAgentModal) {
                                document.body.classList.add('overflow-hidden');
                            } else {
                                document.body.classList.remove('overflow-hidden');
                            }
                        }
                    }" x-init="updateBodyScroll()" x-effect="updateBodyScroll()">
                        <button @click="showAgentModal = true"
                            class="inline-flex w-full items-center justify-center rounded-lg bg-[#173f36] px-4 py-3 text-sm font-semibold uppercase tracking-wide text-white shadow-md transition hover:bg-[#0b4b3e]">
                            <span aria-hidden="true">☎</span>
                            <span class="ml-2">Demander les disponibilités</span>
                        </button>

                        <div x-show="showAgentModal"
                            class="fixed inset-0 z-[99999] flex items-center justify-center bg-black/50 p-4"
                            @click.self="showAgentModal = false" x-cloak>
                            <div class="w-full max-w-md rounded-xl bg-white p-6 shadow-xl">
                                <h2 class="mb-4 text-lg font-bold">Contacter l'agent</h2>
                                <p class="mb-4 text-sm text-gray-600">☎ Numéro de téléphone : 0634262436</p>
                                <div class="flex justify-end">
                                    <a href="tel:0634262436"
                                        class="mr-2 rounded-lg bg-[#0b3b31] px-4 py-2 text-white">Appeler</a>
                                    <button @click="showAgentModal = false"
                                        class="rounded-lg border px-4 py-2 transition hover:bg-gray-100">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="loginModal" class="fixed inset-0 z-[99999] items-center justify-center bg-black/50 p-4"
                        :class="{ 'hidden': !modalOpen, 'flex': modalOpen }" x-data="{ modalOpen: false }"
                        x-show="modalOpen" x-cloak>
                        <div class="w-full max-w-md rounded-xl bg-white p-6 shadow-xl">
                            <h2 class="mb-4 text-lg font-bold">Veuillez vous connecter</h2>
                            <p class="mb-4 text-sm text-gray-600">Vous devez être connecté pour réserver ce bien.</p>
                            <div class="flex justify-end space-x-2">
                                <a href="{{ route('register') }}"
                                    class="rounded-lg bg-[#0b3b31] px-4 py-2 text-white transition hover:bg-[#0b4b3e]">Se connecter</a>
                                <button @click="modalOpen = false"
                                    class="rounded-lg border px-4 py-2 transition hover:bg-gray-100">Annuler</button>
                            </div>
                        </div>
                    </div>
                    <p class="mt-5 border-t border-[#e9e3d8] pt-4 text-center text-xs leading-6 text-gray-500">
                        Réponse personnalisée · Disponibilité confirmée par notre équipe
                    </p>
                </aside>
            </div>
        </div>
        <div class="mt-10 border-t border-gray-200 pt-8 max-w-6xl mx-auto">
            <h3 class="flex items-center justify-center text-3xl font-bold text-gray-900 mb-8 gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-emerald-600" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 8h2a2 2 0 012 2v9a2 2 0 01-2 2h-6l-4 4v-4H7a2 2 0 01-2-2v-1" />
                </svg>
                Avis et commentaires
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- ✅ Review Form (if logged in) --}}
                @auth
                    <form x-data="{ loading: false }" @submit="loading = true" action="{{ route('reviews.store') }}"
                        method="POST" class="space-y-4 bg-white shadow-md border border-gray-200 rounded-xl p-6 h-fit">
                        @csrf
                        <input type="hidden" name="proprity_id" value="{{ $property->id }}">

                        {{-- Rating --}}
                        <div class="space-y-2" x-data="{ rating: {{ old('rating', 5) }} }">
                            <label class="block text-sm font-medium text-gray-700">Votre note</label>
                            <div class="flex items-center gap-2">
                                <template x-for="i in 5" :key="i">
                                    <label class="cursor-pointer">
                                        <input type="radio" name="rating" :value="i" x-model="rating"
                                            class="hidden" />
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 transition-colors duration-200"
                                            :class="i <= rating ? 'text-yellow-400' : 'text-gray-300'" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921
                                                                                1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969
                                                                                0 1.371 1.24.588 1.81l-2.8
                                                                                2.034a1 1 0 00-.364 1.118l1.07
                                                                                3.292c.3.921-.755 1.688-1.54
                                                                                1.118l-2.8-2.034a1 1 0
                                                                                00-1.176 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1
                                                                                1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1
                                                                                1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    </label>
                                </template>
                            </div>
                        </div>

                        {{-- Comment --}}
                        <div class="space-y-2">
                            <label for="comment" class="block text-sm font-medium text-gray-700">Votre avis</label>
                            <textarea id="comment" name="comment" placeholder="Partagez votre expérience..."
                                class="w-full min-h-28 rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 placeholder-gray-400">{{ old('comment') }}</textarea>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium px-5 py-2 rounded-lg transition disabled:opacity-50 disabled:cursor-not-allowed"
                                :disabled="loading">
                                <template x-if="loading">
                                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                </template>
                                <span x-text="loading ? 'Envoi en cours...' : 'Envoyer'"></span>
                            </button>
                        </div>
                    </form>
                @endauth

                {{-- ✅ Guest Message (if not logged in) --}}
                @guest
                    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm text-center h-fit">
                        <p class="text-gray-600 text-sm mb-4">
                            Connectez-vous ou créez un compte pour laisser un avis.
                        </p>
                        <div class="flex justify-center gap-3">
                            <a href="{{ route('login') }}"
                                class="px-4 py-2 rounded-md bg-red-600 text-white text-sm font-medium hover:bg-red-700 transition">
                                Se connecter
                            </a>
                            <a href="{{ route('register') }}"
                                class="px-4 py-2 rounded-md bg-emerald-600 text-white text-sm font-medium hover:bg-emerald-700 transition">
                                S’inscrire
                            </a>
                        </div>
                    </div>
                @endguest

                <!-- (Old guest reserve modal removed — now using Alpine modal near booking buttons) -->

                {{-- ✅ Comments Section --}}
                <div class="bg-white shadow-md border border-gray-200 rounded-xl p-6 max-h-96 overflow-y-auto space-y-4">
                    @if ($property->reviews->isEmpty())
                        <p class="text-sm text-gray-500 text-center">Aucun commentaire pour le moment. Soyez le premier à
                            donner votre avis.</p>
                    @else
                        @foreach ($property->reviews as $review)
                            <div class="border border-gray-200 rounded-xl p-4 bg-white shadow-sm">
                                <div class="flex items-start gap-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-semibold">
                                        {{ strtoupper(mb_substr($review->user->name, 0, 1)) }}
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center justify-between">
                                            <p class="font-semibold text-[#1A1A1A]">{{ $review->user->name }}</p>
                                            <p class="text-xs text-gray-500">{{ $review->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                        <div class="text-sm">
                                            <span class="text-yellow-400">{{ str_repeat('★', $review->rating) }}</span>

                                            <span class="text-gray-300">{{ str_repeat('☆', 5 - $review->rating) }}</span>
                                        </div>
                                        <p class="mt-2 text-sm text-gray-700 leading-relaxed">
                                            @if ($review->comment && !empty(trim($review->comment)))
                                                {{ $review->comment }}
                                            @else
                                                <span class="text-gray-400 italic">No comment provided</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>




    </section>


    <section class=" pt-12 ">


        <h2 class="flex items-center justify-center text-3xl font-bold text-gray-900 mb-8 gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-emerald-600" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 10l9-7 9 7v10a2 2 0 01-2 2H5a2 2 0 01-2-2V10z" />
            </svg>
            Des Propriétés Similaires
        </h2>

        <div class="w-full pb-12 px-6 sm:px-16 ">
            @if ($properties->isEmpty())
                <!-- ✅ Message if no properties -->
                <div class="flex justify-center">
                    <div class="bg-white border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto w-12 h-12 text-gray-400 mb-3"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.75 17L4.5 12.75l5.25-4.25M14.25 7l5.25 4.25-5.25 4.25" />
                        </svg>
                        <p class="text-gray-600 font-medium">Aucune propriété similaire trouvée</p>
                    </div>
                </div>
            @else
                <!-- ✅ Property Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 sm:gap-6 w-full">
                    @foreach ($properties->take(9) as $property)
                        <a href="{{ route('proprites.details', $property->slug) }}" class="group">
                            <div
                                class="rounded-2xl border border-gray-200 bg-white overflow-hidden shadow-sm hover:shadow-lg transition duration-300 flex flex-col z-0">

                                <!-- Image -->
                                <div class="relative w-full h-64 overflow-hidden z-0">
                                    <img class="w-full h-full object-cover group-hover:scale-105 transition duration-500 z-0"
                                        src="{{ asset('storage/' . json_decode($property->photos)[0]) }}" alt=""
                                        loading="lazy">
                                    <div class="absolute top-3 flex justify-between w-full px-3">
                                        <div class="flex space-x-2">
                                            @if (strpos($property->listing_type, 'À-louer') !== false)
                                                <span
                                                    class="text-white bg-yellow-500 rounded-full px-3 py-1 uppercase font-semibold text-xs shadow">
                                                    À louer
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="flex-1 flex flex-col p-4">

                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-500 truncate">
                                        {{ $property->property_type }}
                                    </p>

                                    <h4 class="text-base font-semibold text-gray-900 group-hover:text-emerald-600 transition truncate mt-1">
                                        {{ $property->title }}
                                    </h4>

                                    <div class="flex items-center space-x-1 text-gray-600 text-sm mt-1">
                                        <img src="{{ asset('images/local.svg') }}" alt="" class="w-4 h-4 opacity-70">
                                        <p class="truncate max-w-[180px]">
                                            {{ $property->address }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Property Features -->
                                <div class="flex items-center mt-3 text-gray-600 text-sm gap-x-6">
                                    <div class="flex items-center space-x-1">
                                        <img class="w-4 h-4 opacity-70" src="{{ asset('images/beds.svg') }}" alt="">
                                        <span>{{ $property->bedrooms }}</span>
                                    </div>
                                    <div class="flex items-center space-x-1">
                                        <img class="w-4 h-4 opacity-70" src="{{ asset('images/dosh.svg') }}" alt="">
                                        <span>{{ $property->bathrooms }}</span>
                                    </div>
                                    @if(!is_null($property->surface))
                                    <div class="flex items-center space-x-1">
                                        <img class="w-4 h-4 opacity-70" src="{{ asset('images/space.svg') }}" alt="">
                                        <span>{{ $property->surface }} m²</span>
                                    </div>
                                    @endif
                                </div>

                            </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>





        {{-- ✅ Alpine.js for star rating --}}
        <script src="//unpkg.com/alpinejs" defer></script>





    </section>
    <script>
        // ==========================
        // Fullscreen Image Viewer
        // ==========================
        let currentPhotoIndex = 0;
        const photos = @json($photos);
        const fullscreenViewer = document.getElementById('fullscreen-viewer');
        const fullscreenImage = document.getElementById('fullscreen-image');
        const imageCounter = document.getElementById('image-counter');
        const thumbnailScroll = document.getElementById('thumbnail-scroll');
        const thumbnails = document.querySelectorAll('.thumbnail');

        function openFullscreenViewer(index) {
            currentPhotoIndex = index;
            updateFullscreenImage();
            fullscreenViewer.classList.add('active');
            document.body.style.overflow = 'hidden'; // Prevent scrolling
            updateThumbnails();
            scrollToThumbnail();
        }

        function closeFullscreenViewer() {
            fullscreenViewer.classList.remove('active');
            document.body.style.overflow = ''; // Re-enable scrolling
        }

        function navigateInViewer(direction) {
            currentPhotoIndex = (currentPhotoIndex + direction + photos.length) % photos.length;
            updateFullscreenImage();
            updateThumbnails();
            scrollToThumbnail();
        }

        function goToImage(index) {
            currentPhotoIndex = index;
            updateFullscreenImage();
            updateThumbnails();
            scrollToThumbnail();
        }

        function updateFullscreenImage() {
            fullscreenImage.style.opacity = 0;
            setTimeout(() => {
                fullscreenImage.src = '{{ asset('storage/') }}/' + photos[currentPhotoIndex];
                fullscreenImage.onload = () => {
                    fullscreenImage.style.opacity = 1;
                };
                imageCounter.textContent = `${currentPhotoIndex + 1} / ${photos.length}`;
            }, 150);
        }

        function updateThumbnails() {
            thumbnails.forEach((thumb, index) => {
                if (index === currentPhotoIndex) {
                    thumb.classList.add('active');
                } else {
                    thumb.classList.remove('active');
                }
            });
        }

        function scrollToThumbnail() {
            const activeThumb = thumbnails[currentPhotoIndex];
            if (activeThumb) {
                activeThumb.scrollIntoView({
                    behavior: 'smooth',
                    block: 'nearest',
                    inline: 'center'
                });
            }
        }

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (!fullscreenViewer.classList.contains('active')) return;

            switch (e.key) {
                case 'Escape':
                    closeFullscreenViewer();
                    break;
                case 'ArrowLeft':
                    navigateInViewer(-1);
                    break;
                case 'ArrowRight':
                    navigateInViewer(1);
                    break;
            }
        });

        // Swipe support for touch devices
        let touchStartX = 0;
        let touchEndX = 0;

        fullscreenViewer.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        }, false);

        fullscreenViewer.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        }, false);

        function handleSwipe() {
            const swipeThreshold = 50; // Minimum distance to trigger navigation
            const difference = touchStartX - touchEndX;

            if (Math.abs(difference) > swipeThreshold) {
                if (difference > 0) {
                    navigateInViewer(1); // Swipe left - next image
                } else {
                    navigateInViewer(-1); // Swipe right - previous image
                }
            }
        }

        // ==========================
        // Modal Handling
        // ==========================
        function openLoginModal() {
            const modal = document.getElementById('loginModal').__x.$data;
            modal.modalOpen = true;
        }

        function closeLoginModal() {
            const modal = document.getElementById('loginModal').__x.$data;
            modal.modalOpen = false;
        }

        // Reserve modal is handled by Alpine.js within the booking section



    </script>
@endsection
