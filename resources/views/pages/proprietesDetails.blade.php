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
    </style>


    <section class="px-6  py-20">
        <div class="flex flex-col items-center min-h-screen px-4 py-6 bg-gray-50">

    <!-- Main Content -->
    <div class="w-full max-w-6xl grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Left: Carousel + Description -->
        <div class="md:col-span-2 bg-white rounded-2xl shadow p-4 space-y-4">

            <!-- Title & Tag -->
            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900">{{ $property->title }}</h1>
                    <p class="text-sm text-gray-500">{{ $property->created_at->diffForHumans() }}</p>
                </div>
                <span class="px-3 py-1 text-xs font-semibold rounded-full
                    {{ $property->listing_type == 'À-vendre' ? 'bg-emerald-100 text-emerald-700' : 'bg-yellow-100 text-yellow-700' }}">
                    {{ $property->listing_type }}
                </span>
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
            <div class="relative w-full h-96 rounded-lg overflow-hidden shadow">
                @foreach ($photos as $index => $photo)
                    <img src="{{ asset('storage/' . $photo) }}" alt=""
                        class="absolute w-full h-full object-cover transition-opacity duration-500
                        {{ $index !== 0 ? 'opacity-0' : '' }}">
                @endforeach

                <!-- Nav buttons -->
                <button id="prev"
                    class="absolute left-3 top-1/2 -translate-y-1/2 bg-black bg-opacity-40 text-white px-3 py-1 rounded-full hover:bg-opacity-60">
                    ❮
                </button>
                <button id="next"
                    class="absolute right-3 top-1/2 -translate-y-1/2 bg-black bg-opacity-40 text-white px-3 py-1 rounded-full hover:bg-opacity-60">
                    ❯
                </button>
            </div>

            <!-- Description (under carousel) -->
            <div class="mt-4">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Description du bien</h2>
                <p class="text-gray-600 leading-relaxed text-sm">{{ $property->description }}</p>
            </div>
        </div>

        <!-- Right: Details + Price + Booking -->
        <div class="md:col-span-1">
            <div class="sticky top-16 bg-white rounded-2xl shadow p-6 space-y-4">

                <!-- Address -->
                <div class="flex items-center gap-2">
                    <img src="{{ asset('images/local.svg') }}" class="w-5 h-5 opacity-70" alt="">
                    <a href="https://www.google.com/maps?q={{ urlencode($property->address) }}" target="_blank"
                        class="text-gray-700 hover:text-emerald-600">
                        {{ $property->address }}
                    </a>
                </div>

                <!-- Features -->
                <div class="flex flex-col gap-2 mt-2 text-gray-600 text-sm">
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('images/beds.svg') }}" class="w-5 h-5 opacity-70" alt="">
                        {{ $property->bedrooms }} Chambres
                    </div>
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('images/dosh.svg') }}" class="w-5 h-5 opacity-70" alt="">
                        {{ $property->bathrooms }} Salles de bain
                    </div>
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('images/space.svg') }}" class="w-5 h-5 opacity-70" alt="">
                        {{ $property->surface }} m²
                    </div>
                </div>

                <!-- Price -->
                <h2 class="text-2xl font-bold text-emerald-600">
                    {{ $property->price }} MAD
                    @if ($property->listing_type == 'À-louer')
                        <span class="text-sm text-gray-500">/{{ $property->price_type }}</span>
                    @endif
                </h2>

                <!-- Booking -->
                @auth
                    <a href="{{ route('checkout', $property->id) }}"
                        class="block w-full text-center bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-2 px-4 rounded-lg transition">
                        Réserver
                    </a>
                @else
                    <button onclick="openLoginModal()"
                        class="block w-full bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-2 px-4 rounded-lg transition">
                        Réserver
                    </button>
                @endauth

                <!-- Agent -->
                <button onclick="openAgentModal()"
                    class="block w-full border border-gray-300 py-2 px-4 rounded-lg hover:bg-gray-100 transition">
                    📞 Appeler l'agent
                </button>
            </div>
        </div>

    </div>
</div>
<div class="mt-10 border-t border-gray-200 pt-8 max-w-6xl mx-auto">
                    <h3 class="flex items-center justify-center text-3xl font-bold text-gray-900 mb-8 gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8h2a2 2 0 012 2v9a2 2 0 01-2 2h-6l-4 4v-4H7a2 2 0 01-2-2v-1" />
                        </svg>
                        Avis et commentaires
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- ✅ Review Form (if logged in) --}}
                        @auth
                            <form action="{{ route('reviews.store') }}" method="POST"
                                class="space-y-4 bg-white shadow-md border border-gray-200 rounded-xl p-6 h-fit">
                                @csrf
                                <input type="hidden" name="proprity_id" value="{{ $property->id }}">

                                {{-- Rating --}}
                                <div class="space-y-2" x-data="{ rating: {{ old('rating', 5) }} }">
                                    <label class="block text-sm font-medium text-gray-700">Votre note</label>
                                    <div class="flex items-center gap-2">
                                        <template x-for="i in 5" :key="i">
                                            <label class="cursor-pointer">
                                                <input type="radio" name="rating" :value="i" x-model="rating" class="hidden" />
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-7 h-7 transition-colors duration-200"
                                                    :class="i <= rating ? 'text-yellow-400' : 'text-gray-300'"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921
                                                        1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969
                                                        0 1.371 1.24.588 1.81l-2.8
                                                        2.034a1 1 0 00-.364 1.118l1.07
                                                        3.292c.3.921-.755 1.688-1.54
                                                        1.118l-2.8-2.034a1 1 0
                                                        00-1.176 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1
                                                        1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1
                                                        1 0 00.951-.69l1.07-3.292z"/>
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
                                            class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium px-5 py-2 rounded-lg transition">
                                        Envoyer
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
                                    class="px-4 py-2 rounded-lg bg-gray-800 text-white text-sm font-medium hover:bg-gray-900 transition">
                                        Se connecter
                                    </a>
                                    <a href="{{ route('register') }}"
                                    class="px-4 py-2 rounded-lg bg-emerald-600 text-white text-sm font-medium hover:bg-emerald-700 transition">
                                        S’inscrire
                                    </a>
                                </div>
                            </div>
                        @endguest

                        {{-- ✅ Comments Section --}}
                        <div class="bg-white shadow-md border border-gray-200 rounded-xl p-6 max-h-96 overflow-y-auto space-y-4">
                            @if ($property->reviews->isEmpty())
                                <p class="text-sm text-gray-500 text-center">Aucun commentaire pour le moment. Soyez le premier à donner votre avis.</p>
                            @else
                                @foreach ($property->reviews as $review)
                                    <div class="border border-gray-200 rounded-xl p-4 bg-white shadow-sm">
                                        <div class="flex items-start gap-3">
                                            <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-semibold">
                                                {{ strtoupper(mb_substr($review->user->name, 0, 1)) }}
                                            </div>
                                            <div class="flex-1">
                                                <div class="flex items-center justify-between">
                                                    <p class="font-semibold text-[#1A1A1A]">{{ $review->user->name }}</p>
                                                    <p class="text-xs text-gray-500">{{ $review->created_at->diffForHumans() }}</p>
                                                </div>
                                                <div class="text-sm">
                                                    <span class="text-yellow-400">{{ str_repeat('★', $review->rating) }}</span>
                                                    <span class="text-gray-300">{{ str_repeat('☆', 5 - $review->rating) }}</span>
                                                </div>
                                                <p class="mt-2 text-sm text-gray-700 leading-relaxed">{{ $review->comment }}</p>
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
    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 10l9-7 9 7v10a2 2 0 01-2 2H5a2 2 0 01-2-2V10z" />
    </svg>
    Des Propriétés Similaires
</h2>

<div class="w-full pt-6">
    @if ($properties->isEmpty())
        <!-- ✅ Message if no properties -->
        <div class="flex justify-center">
            <div class="bg-white border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto w-12 h-12 text-gray-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9.75 17L4.5 12.75l5.25-4.25M14.25 7l5.25 4.25-5.25 4.25" />
                </svg>
                <p class="text-gray-600 font-medium">Aucune propriété similaire trouvée</p>
            </div>
        </div>
    @else
        <!-- ✅ Property Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 sm:gap-6">
            @foreach ($properties->take(9) as $property)
                <a href="{{ route('proprites.details', $property->id) }}" class="group">
                    <div class="rounded-2xl border border-gray-200 bg-white overflow-hidden shadow-sm hover:shadow-lg transition duration-300 flex flex-col">

                        <!-- Image -->
                        <div class="relative w-full h-64 overflow-hidden">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                                 src="{{ asset('storage/' . json_decode($property->photos)[0]) }}" alt="">
                            <div class="absolute top-3 left-3 flex space-x-2">
                                @if(strpos($property->listing_type, 'À-vendre') !== false)
                                    <span class="text-white bg-emerald-500 rounded-full px-3 py-1 uppercase font-semibold text-xs shadow">
                                        À vendre
                                    </span>
                                @endif
                                @if(strpos($property->listing_type, 'À-louer') !== false)
                                    <span class="text-white bg-yellow-500 rounded-full px-3 py-1 uppercase font-semibold text-xs shadow">
                                        À louer
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="flex-1 flex flex-col p-4">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">{{ $property->property_type }}</p>
                                    <h4 class="text-lg font-semibold text-gray-900 group-hover:text-emerald-600 transition">
                                        {{ $property->title }}
                                    </h4>
                                    <div class="flex items-center space-x-1 text-gray-600 text-sm mt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 opacity-70 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
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
                                    <img class="w-4 h-4 opacity-70" src="{{ asset('images/beds.svg') }}" alt="">
                                    <span>{{ $property->bedrooms }}</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <img class="w-4 h-4 opacity-70" src="{{ asset('images/dosh.svg') }}" alt="">
                                    <span>{{ $property->bathrooms }}</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <img class="w-4 h-4 opacity-70" src="{{ asset('images/space.svg') }}" alt="">
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
        // Modal Handling
        // ==========================
        function openModal() {
            document.getElementById('phoneModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('phoneModal').classList.add('hidden');
        }

        function openAgentModal() {
            document.getElementById('agentModal').classList.remove('hidden');
        }

        function closeAgentModal() {
            document.getElementById('agentModal').classList.add('hidden');
        }

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
