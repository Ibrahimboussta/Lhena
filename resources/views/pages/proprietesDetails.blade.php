@extends('layouts.index')
@section('content')
    <section class="px-6  py-20">
        <div class="flex flex-col items-center min-h-screen px-4 space-y-1">

            <!-- Premier Bloc : Carrousel + Sidebar -->
            <div class="flex flex-col md:flex-row w-full max-w-screen-xl bg-white rounded-lg ">

                <!-- Section gauche : Carrousel -->
                <div class="w-full md:w-3/3 px-0">
                    <!-- Titre de l'annonce -->
                    <!-- Desktop & Tablet Version -->
                    <div class="hidden md:flex flex-col pb-4 ">
                        <div class="flex justify-between items-center">
                            <p class="text-3xl font-semibold ">{{ $property->title }}</p>
                            <span
                                class="bg-red-100 text-red-600 py-1 px-3 test-sm mr-3 rounded-full hover:bg-gray-900 transition-colors duration-300 border border-red-400 cursor-auto">
                                @if ($property->listing_type == 'À-vendre')
                                    À-vendre
                                @elseif($property->listing_type == 'À-louer')
                                    À-louer
                                @else
                                    {{ $property->listing_type }}
                                @endif
                            </span>
                        </div>
                        <p class="text-sm text-gray-600 px-2">{{ $property->created_at->diffForHumans() }}</p>
                    </div>

                    <!-- Mobile Sticky Bottom Bar -->
                    <div
                        class="fixed bottom-0 left-0 w-full bg-white border-t border-[#25D366] px-4 py-2 flex justify-between items-center z-50  md:hidden">
                        <div class="flex flex-col">
                            <p class="text-xl font-semibold ">{{ $property->title }}</p>
                            <p class="text-[12px] text-gray-600 px-1">{{ $property->created_at->diffForHumans() }}</p>
                        </div>
                        <h2 class="text-md font-bold text-[#25D366]">
                            {{ $property->price }} DH
                        </h2>
                    </div>

                    </h1>

                    <!-- Carrousel -->
                    <div class="relative w-full bg-white rounded-lg shadow-lg overflow-hidden">
                        <!-- Slides Container -->
                        <div class="relative w-full h-96" id="carousel-container">
                            <!-- Carousel Images -->
                            @foreach ($photos as $index => $photo)
                                <img src="{{ asset('storage/' . $photo) }}"
                                    class="absolute w-full h-full object-cover transition-opacity duration-600 rounded-lg {{ $index !== 0 ? 'opacity-0' : '' }}" />
                            @endforeach
                        </div>

                        <!-- Navigation Buttons -->
                        <button id="prev"
                            class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white px-2 rounded-full hover:bg-opacity-70">
                            &#10094;
                        </button>

                        <button id="next"
                            class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white px-2 rounded-full hover:bg-opacity-70">
                            &#10095;
                        </button>

                        <!-- Indicators -->
                        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                            @foreach ($photos as $index => $photo)
                                <button
                                    class="w-3 h-3 rounded-full {{ $index === 0 ? 'bg-white' : 'bg-gray-400' }}"></button>
                            @endforeach
                        </div>
                    </div>

                    <!-- Adresse avec icône -->
                    <div class="flex items-center space-x-0.5 pt-4">
                        <img src="{{ asset('images/local.svg') }}" alt="" class="w-4 h-4">
                        <a href="https://www.google.com/maps?q={{ urlencode($property->address) }}" target="_blank">
                            <p class="text-xl">{{ $property->address }}</p>
                        </a>
                    </div>

                    <!-- Prix -->




                </div>


                <!-- Sidebar (droite) -->
                <div
                    class="w-full md:w-1/3 flex flex-col items-center justify-start pt-3 md:pt-16 p-6 border-l border-gray-200">
                    <div class="flex flex-col gap-4 w-full max-w-xs text-center">
                        <h2 class="hidden md:block text-xl text-start font-semibold text-black">
                            @if ($property->listing_type == 'À-louer')
                                @if ($property->price_type == 'nuit')
                                    <span class="text-[#25D366]">{{ $property->price }}</span> MAD/nuit
                                @elseif($property->price_type == 'mois')
                                    <span class="text-[#25D366]">{{ $property->price }}</span> MAD/mois
                                @elseif($property->price_type == 'an')
                                    <span class="text-[#25D366]">{{ $property->price }}</span> MAD/an
                                @endif
                            @else
                                {{ $property->price }} MAD
                            @endif

                        </h2>





                        @auth
                            <!-- Si connecté : lien direct vers checkout -->
                            <a href="{{ route('checkout', $property->id) }}"
                                class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-700 transition-colors duration-300">
                                Réserver
                            </a>
                        @endauth

                        @guest
                            <!-- Si pas connecté : bouton qui ouvre modal -->
                            <button onclick="openLoginModal()"
                                class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-700 transition-colors duration-300">
                                Réserver
                            </button>

                            <!-- Modal -->
                            <div id="loginModal"
                                class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-50">
                                <!-- Contenu du modal -->
                                <div class="bg-white rounded-lg shadow-lg p-6 w-80 relative">
                                    <button onclick="closeLoginModal()"
                                        class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">
                                        ✖
                                    </button>

                                    <h2 class="text-lg font-semibold mb-4 text-center text-gray-800">
                                        Veuillez vous connecter pour réserver
                                    </h2>

                                    <a href="{{ route('register') }}"
                                        class="block w-full bg-green-500 text-white text-center py-2 px-5 text-sm rounded-md hover:bg-green-600 transition-colors duration-300 font-semibold">
                                        S'inscrire
                                    </a>
                                </div>
                            </div>

                            <!-- Script -->
                            <script>
                                function openLoginModal() {
                                    document.getElementById('loginModal').classList.remove('hidden');
                                }

                                function closeLoginModal() {
                                    document.getElementById('loginModal').classList.add('hidden');
                                }
                            </script>
                        @endguest



                        <button onclick="openAgentModal()"
                            class="bg-white text-black border border-red-500 py-2 px-4 rounded-md hover:bg-red-700 transition-colors duration-300">
                            Appeler l'agent
                        </button>

                        <!-- Modal -->
                        <div id="agentModal"
                            class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-50">
                            <div class="bg-white rounded-lg shadow-lg p-6 w-80 relative">
                                <button onclick="closeAgentModal()"
                                    class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">
                                    ✖
                                </button>

                                <h2 class="text-xl font-semibold mb-4 text-center">Contacter l'agent</h2>

                                <p class="text-lg font-bold text-gray-800 text-center mb-4">
                                    📞 <a href="tel: +212-6342-624" class="text-blue-700 hover:underline">
                                        +212-6342-624
                                    </a>
                                </p>

                                <button onclick="closeAgentModal()"
                                    class="w-full bg-black text-white py-2 rounded-md hover:bg-gray-800 transition-colors duration-300">
                                    Fermer
                                </button>
                            </div>
                        </div>




                    </div>
                </div>
            </div>

            <!-- Deuxième Bloc : Description + Google Maps -->
            <div class="flex flex-col md:flex-row w-full max-w-screen-xl bg-white rounded-lg ">

                <!-- Section gauche : Description -->
                <div class="w-full md:w-2/3 flex flex-col justify-between px-2 border-r border-gray-200">

                    <ul class="flex flex-col md:flex-row md:space-x-4 space-y-2 md:space-y-0 text-gray-700 text-sm">
                        <li class="flex items-center gap-1 justify-center">
                            <img src="{{ asset('images/beds.svg') }}" class="w-6 h-6" alt="Chambres">
                            {{ $property->bedrooms }} chambres |
                        </li>

                        <li class="flex items-center gap-2">
                            <img src="{{ asset('images/dosh.svg') }}" class="w-6 h-6" alt="Salle de bain">
                            {{ $property->bathrooms }} salles de bain |
                        </li>

                        <li class="flex items-center gap-2">
                            <img src="{{ asset('images/space.svg') }}" class="w-6 h-6" alt="Superficie">
                            {{ $property->surface }} m²
                        </li>
                    </ul>

                    <h2 class="text-xl mt-4  font-semibold text-gray-800">Description du bien</h2>
                    <p class="text-gray-600 mt-4  text-sm ">
                        {{ $property->description }}
                    </p>
                </div>

            </div>
        </div>

        <section class=" pt-12 ">


            <h2 class="text-center text-3xl font-semibold mb-4 ">Des Propriétés Similaires</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 sm:gap-6 w-full pt-7">

                @foreach ($properties as $property)
                    <a href="{{ route('proprites.details', $property->id) }}" class="w-full">
                        <div class="w-full rounded-2xl border border-[#e0dede] p-2 hover:shadow duration-400 relative">
                            <!-- Image Section with Positioned Labels -->
                            <div class="relative">
                                <img class="w-full h-80 object-cover rounded-2xl"
                                    src="{{ asset('storage/' . json_decode($property->photos)[0]) }}" alt="">

                                <!-- Labels -->
                                <div class="absolute top-4 left-4 flex space-x-2">
                                    @if (strpos($property->listing_type, 'À-vendre') !== false)
                                        <span
                                            class="text-white bg-[#25D366] rounded-lg px-3 py-1 uppercase font-medium text-xs">
                                            À vendre
                                        </span>
                                    @endif
                                    @if (strpos($property->listing_type, 'À-louer') !== false)
                                        <span
                                            class="text-white bg-[#E7C873] rounded-lg px-3 py-1 uppercase font-medium text-xs">
                                            À louer
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Property Details -->
                            <div class="flex justify-between items-start pt-2 px-1">
                                <div>
                                    <p class="font-semibold text-[#1A1A1A] text-xl">{{ $property->title }}</p>
                                    <div class="flex items-center space-x-0.5 pt-1">
                                        <img src="{{ asset('images/local.svg') }}" alt="" class="w-4 h-4">
                                        <p>{{ $property->address }}</p>
                                    </div>
                                </div>
                                <div>
                                    <p class="font-semibold text-[#25D366]">{{ $property->price }} DH</p>
                                </div>
                            </div>

                            <!-- Property Features -->
                            <div class="flex items-center py-2 px-1 gap-x-4">
                                <div class="flex items-center space-x-0.5">
                                    <img class="w-4 h-4" src="{{ asset('images/beds.svg') }}" alt="">
                                    <p>{{ $property->bedrooms }}</p>
                                </div>
                                <div class="flex items-center space-x-0.5">
                                    <img class="w-4 h-4" src="{{ asset('images/dosh.svg') }}" alt="">
                                    <p>{{ $property->bathrooms }}</p>
                                </div>
                                <div class="flex items-center space-x-0.5">
                                    <img class="w-4 h-4" src="{{ asset('images/space.svg') }}" alt="">
                                    <p>{{ $property->surface }} m²</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

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

    </section>
@endsection
