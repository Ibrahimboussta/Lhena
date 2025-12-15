@extends('layouts.index')
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

        /* Enhanced Fullscreen Image Viewer */
        .fullscreen-viewer {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.97);
            z-index: 1000;
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
            background: linear-gradient(to bottom, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0) 100%);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            z-index: 10;
            backdrop-filter: blur(8px);
        }

        .viewer-title {
            color: white;
            font-size: 1.1rem;
            font-weight: 500;
            text-shadow: 0 1px 3px rgba(0,0,0,0.3);
        }

        .viewer-close-btn {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 1.5rem;
            transition: all 0.2s ease;
            backdrop-filter: blur(5px);
        }

        .viewer-close-btn:hover {
            background: rgba(255, 255, 255, 0.2);
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
            background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0) 100%);
            padding: 20px 15px 15px;
            overflow-x: auto;
            white-space: nowrap;
            text-align: center;
            display: flex;
            justify-content: center;
            z-index: 5;
            scrollbar-width: thin;
            scrollbar-color: rgba(255,255,255,0.3) transparent;
        }

        .thumbnail-container::-webkit-scrollbar {
            height: 6px;
        }

        .thumbnail-container::-webkit-scrollbar-thumb {
            background-color: rgba(255,255,255,0.3);
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
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .thumbnail:hover {
            opacity: 0.9;
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
        }

        .thumbnail.active {
            opacity: 1;
            border-color: #fff;
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.4);
        }

        .image-counter {
            position: fixed;
            top: 20px;
            right: 20px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            z-index: 15;
            backdrop-filter: blur(5px);
            font-weight: 500;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }
    </style>


    <section class="px-6 py-20">
        <div class="flex flex-col items-center min-h-screen py-6 bg-gray-50 ">

            <!-- Main Content -->
            <div class="w-full max-w-6xl grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Left: Carousel + Description -->
                <div class="md:col-span-2 bg-white rounded-2xl shadow p-4 space-y-4">

                    <!-- Title & Tags -->
                    <div class="flex justify-between items-start">
                        <div class="space-y-1">
                            <h1 class="text-2xl md:text-3xl font-bold text-gray-900">{{ $property->title }}</h1>
                            <p class="text-sm text-gray-500">{{ $property->created_at->diffForHumans() }}</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span
                                class="px-3 py-1 text-xs font-semibold rounded-full
                        {{ $property->listing_type == 'À-vendre' ? 'bg-emerald-100 text-emerald-700' : 'bg-yellow-100 text-yellow-700' }}">
                                {{ $property->listing_type }}
                            </span>
                        </div>
                    </div>

                    <!-- Rating -->
                    @php
                        $avgRating = (int) round($property->reviews->avg('rating') ?? 0);
                        $reviewsCount = $property->reviews->count();
                    @endphp
                    <div class="flex items-center gap-2">
                        <span class="text-yellow-400 text-lg">{{ str_repeat('★', $avgRating) }}<span
                                class="text-gray-300">{{ str_repeat('☆', 5 - $avgRating) }}</span></span>
                        <span class="text-sm text-gray-600">({{ $reviewsCount }} avis)</span>
                    </div>

                    <!-- Carousel -->
                    <div id="carousel-container" class="relative w-full h-96 rounded-lg overflow-hidden shadow">
                        @foreach ($photos as $index => $photo)
                            <img src="{{ asset('storage/' . $photo) }}" alt="Property image {{ $index + 1 }}"
                                 loading="lazy"
                                 data-index="{{ $index }}"
                                 class="absolute w-full h-full object-cover transition-opacity duration-500 cursor-zoom-in
                                 {{ $index !== 0 ? 'opacity-0' : '' }}"
                                 onclick="openFullscreenViewer({{ $index }})">
                        @endforeach

                        <!-- Nav buttons -->
                        <button id="prev"
                            class="absolute left-3 top-1/2 -translate-y-1/2 bg-black bg-opacity-40 text-white w-10 h-10 flex items-center justify-center rounded-full hover:bg-opacity-60 transition-all z-10"
                            aria-label="Previous image">
                            ❮
                        </button>
                        <button id="next"
                            class="absolute right-3 top-1/2 -translate-y-1/2 bg-black bg-opacity-40 text-white w-10 h-10 flex items-center justify-center rounded-full hover:bg-opacity-60 transition-all z-10"
                            aria-label="Next image">
                            ❯
                        </button>

                        <!-- Indicators -->
                        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                            @foreach ($photos as $index => $photo)
                                <button class="indicator w-3 h-3 rounded-full transition-all {{ $index === 0 ? 'bg-white w-6' : 'bg-gray-400' }}"
                                        data-index="{{ $index }}"
                                        aria-label="Go to image {{ $index + 1 }}">
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <!-- Fullscreen Image Viewer -->
                    <div id="fullscreen-viewer" class="fullscreen-viewer">
                        <div class="viewer-header">
                            <div class="viewer-title">Gallery</div>
                            <button class="viewer-close-btn" onclick="closeFullscreenViewer()" aria-label="Close">
                                &times;
                            </button>
                        </div>

                        <div class="main-image-container">
                            <button class="nav-btn prev-btn" onclick="navigateInViewer(-1)" aria-label="Previous image">
                                ❮
                            </button>
                            <img id="fullscreen-image" class="main-image" src="" alt="Fullscreen property image">
                            <button class="nav-btn next-btn" onclick="navigateInViewer(1)" aria-label="Next image">
                                ❯
                            </button>
                            <div class="image-counter" id="image-counter">1 / {{ count($photos) }}</div>
                        </div>

                        <div class="thumbnail-container">
                            <div class="thumbnail-scroll" id="thumbnail-scroll">
                                @foreach($photos as $index => $photo)
                                    <img src="{{ asset('storage/' . $photo) }}"
                                         class="thumbnail {{ $index === 0 ? 'active' : '' }}"
                                         data-index="{{ $index }}"
                                         onclick="goToImage({{ $index }})"
                                         alt="Thumbnail {{ $index + 1 }}">
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Description (under carousel) -->
                    <div class="mt-4">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">Description du bien</h2>
                        <p class="text-gray-600 leading-relaxed text-sm">{!! nl2br(e($property->description)) !!}</p>
                    </div>
                </div>

                <!-- Right: Details + Price + Booking -->
                <div class="md:col-span-1">
                    <div class="sticky top-16 bg-white rounded-2xl shadow p-6 space-y-4">

                        <!-- Address -->
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('images/local.svg') }}" class="w-5 h-5 opacity-70" alt=""
                                loading="lazy">
                            <a href="https://www.google.com/maps?q={{ urlencode($property->address) }}" target="_blank"
                                class="text-gray-700 hover:text-emerald-600">
                                {{ $property->address }}
                            </a>
                        </div>

                        <!-- Features & Amenities -->
                        <div class="space-y-6">
                            <!-- Basic Features -->
                            <div class="flex flex-col gap-2 text-gray-600 text-sm">
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('images/beds.svg') }}" class="w-5 h-5 opacity-70" alt=""
                                        loading="lazy">
                                    {{ $property->bedrooms }} Chambres
                                </div>
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('images/dosh.svg') }}" class="w-5 h-5 opacity-70" alt=""
                                        loading="lazy">
                                    {{ $property->bathrooms }} Salles de bain
                                </div>
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('images/space.svg') }}" class="w-5 h-5 opacity-70" alt=""
                                        loading="lazy">
                                    {{ $property->surface }} m²
                                </div>
                            </div>

                            <!-- Amenities -->
                            @if ($property->amenities)
                                <div class="border-t pt-4">
                                    <h3 class="text-gray-900 font-semibold mb-3">Équipements et services</h3>
                                    <div class="grid grid-cols-1 gap-2 text-sm">
                                        @foreach (json_decode($property->amenities) as $amenity)
                                            <div class="flex items-center gap-2 text-gray-600">
                                                <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
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
                                </div>
                            @endif
                        </div>

                        <!-- Price -->
                        <h2 class="text-2xl font-bold text-emerald-600">
                            {{ $property->price }} MAD
                            @if ($property->listing_type == 'À-louer')
                                <span class="text-sm text-gray-500">/{{ $property->price_type }}</span>
                            @endif
                        </h2>

                        <!-- Booking -->
                        <div class="space-y-2" x-data="{ showAgentModal: false, showReserveModal: false }">

                            <!-- Réserver Button (opens modal showing publisher phone) -->
                            <button @click="showReserveModal = true" class="w-full">
                                <span
                                    class="inline-flex items-center justify-center w-full bg-emerald-600 text-white px-6 py-2.5 text-sm font-medium rounded-lg hover:bg-emerald-700 transition-all duration-200">
                                    Réserver
                                </span>
                            </button>

                            <!-- Reserve Modal -->
                            <div x-show="showReserveModal"
                                class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
                                @click.self="showReserveModal = false" x-cloak>
                                <div class="bg-white p-6 rounded-lg max-w-md w-full">
                                    <h2 class="text-lg font-bold mb-4">Réserver cette propriété</h2>
                                    <p class="mb-4">📞 Numéro de tel : {{ $property->contact_phone }}</p>
                                    <div class="flex justify-end">
                                        <a href="tel:{{ $property->contact_phone }}"
                                            class="mr-2 px-4 py-2 bg-emerald-600 text-white rounded-lg">Appeler</a>
                                        <button @click="showReserveModal = false"
                                            class="px-4 py-2 rounded-lg border hover:bg-gray-100 transition">Fermer</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Appeler l'agent Button -->
                            <button @click="showAgentModal = true"
                                class="inline-flex items-center justify-center w-full border border-gray-300 py-2 px-4 rounded-lg hover:bg-gray-100 transition">
                                <span>📞</span>
                                <span class="ml-2">Appeler l'agent</span>
                            </button>

                            <!-- Agent Modal -->
                            <div x-show="showAgentModal"
                                class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
                                @click.self="showAgentModal = false" x-cloak>
                                <div class="bg-white p-6 rounded-lg max-w-md w-full">
                                    <h2 class="text-lg font-bold mb-4">Contacter l'agent</h2>
                                    <p class="mb-4">📞 Numéro de tel : 0634262436</p>
                                    <div class="flex justify-end">
                                        <a href="tel:0634262436"
                                            class="mr-2 px-4 py-2 bg-emerald-600 text-white rounded-lg">Appeler</a>
                                        <button @click="showAgentModal = false"
                                            class="px-4 py-2 rounded-lg border hover:bg-gray-100 transition">Fermer</button>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Login Modal -->
                        <div id="loginModal" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50"
                            :class="{ 'hidden': !modalOpen, 'flex': modalOpen }" x-data="{ modalOpen: false }"
                            x-show="modalOpen" x-cloak>
                            <div class="bg-white p-6 rounded-lg max-w-md w-full">
                                <h2 class="text-lg font-bold mb-4">Veuillez vous connecter</h2>
                                <p class="mb-4">Vous devez être connecté pour réserver ce bien.</p>
                                <div class="flex justify-end space-x-2">
                                    <a href="{{ route('register') }}"
                                        class="bg-emerald-600 text-white px-4 py-2 rounded-lg hover:bg-emerald-700 transition">Se
                                        connecter</a>
                                    <button @click="modalOpen = false"
                                        class="px-4 py-2 rounded-lg border hover:bg-gray-100 transition">Annuler</button>
                                </div>
                            </div>
                        </div>

                        <!-- Agent Modal -->


                    </div>
                </div>

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

        <div class="w-full pb-12 px-6 sm:px-16">
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
                                class="rounded-2xl border border-gray-200 bg-white overflow-hidden shadow-sm hover:shadow-lg transition duration-300 flex flex-col">

                                <!-- Image -->
                                <div class="relative w-full h-64 overflow-hidden">
                                    <img class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                                        src="{{ asset('storage/' . json_decode($property->photos)[0]) }}" alt=""
                                        loading="lazy">
                                    <div class="absolute top-3 flex justify-between w-full px-3">
                                        <div class="flex space-x-2">
                                            @if (strpos($property->listing_type, 'À-vendre') !== false)
                                                <span
                                                    class="text-white bg-emerald-500 rounded-full px-3 py-1 uppercase font-semibold text-xs shadow">
                                                    À vendre
                                                </span>
                                            @endif
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
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="text-sm font-medium text-gray-500">{{ $property->property_type }}
                                            </p>
                                            <h4
                                                class="text-lg font-semibold text-gray-900 group-hover:text-emerald-600 transition">
                                                {{ $property->title }}
                                            </h4>
                                            <div class="flex items-center space-x-1 text-gray-600 text-sm mt-1">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-4 h-4 opacity-70 text-gray-500" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                <p class="truncate max-w-[180px]">{{ $property->address }}</p>
                                            </div>
                                        </div>
                                        <p class="font-semibold text-lg text-emerald-600 whitespace-nowrap">
                                            {{ number_format($property->price, 0, ',', ' ') }} DH
                                        </p>
                                    </div>

                                    <!-- Features -->
                                    <div class="flex items-center mt-4 text-gray-600 text-sm gap-x-6">
                                        <div class="flex items-center space-x-1">
                                            <img class="w-4 h-4 opacity-70" src="{{ asset('images/beds.svg') }}"
                                                alt="" loading="lazy">
                                            <span>{{ $property->bedrooms }}</span>
                                        </div>
                                        <div class="flex items-center space-x-1">
                                            <img class="w-4 h-4 opacity-70" src="{{ asset('images/dosh.svg') }}"
                                                alt="" loading="lazy">
                                            <span>{{ $property->bathrooms }}</span>
                                        </div>
                                        <div class="flex items-center space-x-1">
                                            <img class="w-4 h-4 opacity-70" src="{{ asset('images/space.svg') }}"
                                                alt="" loading="lazy">
                                            <span>{{ $property->surface }} m²</span>
                                        </div>
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

            switch(e.key) {
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

        // Click on indicators to navigate
        thumbnails.forEach((thumbnail, index) => {
            thumbnail.addEventListener('click', () => {
                goToImage(index);
            });
        });

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



        // ==========================
        // Carousel Handling
        // ==========================
        let currentSlide = 0;
        const slides = document.querySelectorAll('#carousel-container img');
        const indicators = document.querySelectorAll('.absolute.bottom-4 button');

        function showSlide(index) {
            slides.forEach((slide, idx) => {
                slide.classList.add('opacity-0');
                indicators[idx].classList.add('bg-gray-400');
                indicators[idx].classList.remove('bg-white');
            });

            slides[index].classList.remove('opacity-0');
            indicators[index].classList.remove('bg-gray-400');
            indicators[index].classList.add('bg-white');
        }

        // Show initial slide on load
        if (slides.length > 0) {
            showSlide(currentSlide);
        }

        const prevBtn = document.getElementById('prev');
        const nextBtn = document.getElementById('next');

        if (prevBtn && nextBtn) {
            prevBtn.addEventListener('click', () => {
                currentSlide = (currentSlide - 1 + slides.length) % slides.length;
                showSlide(currentSlide);
            });

            nextBtn.addEventListener('click', () => {
                currentSlide = (currentSlide + 1) % slides.length;
                showSlide(currentSlide);
            });
        }

        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                currentSlide = index;
                showSlide(currentSlide);
            });
        });
    </script>
@endsection
