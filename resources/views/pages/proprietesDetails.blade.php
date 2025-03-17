@extends('layouts.index')
@section('content')
    <section class="px-6 sm:px-16 py-20">
        <div class="flex flex-col items-center min-h-screen px-4 space-y-8">

            <!-- Premier Bloc : Carrousel + Sidebar -->
            <div class="flex flex-col md:flex-row w-full max-w-screen-xl bg-white rounded-lg ">

                <!-- Section gauche : Carrousel -->
                <div class="w-full md:w-2/3 p-4">
                    <!-- Titre de l'annonce -->
                    <h1 class="text-2xl font-semibold text-gray-800 mb-2 text-center md:text-left">{{ $property->title }}
                    </h1>

                    <!-- Carrousel -->
                    <div class="relative w-full bg-white rounded-lg shadow-lg overflow-hidden">
                        <!-- Slides Container -->
                        <div class="relative w-full h-80" id="carousel-container">
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

                    <div class="flex items-center justify-between pt-4 px-4 gap-x-4">
                        <!-- Adresse avec icône -->
                        <div class="flex items-center space-x-0.5">
                            <img src="{{ asset('images/local.svg') }}" alt="" class="w-4 h-4">
                            <a href="https://www.google.com/maps?q={{ urlencode($property->address) }}" target="_blank">
                                <p>{{ $property->address }}</p>
                            </a>
                        </div>
                    
                        <!-- Prix -->
                        <div class="flex items-center gap-x-3">
                            <p class="text-black text-lg">Prix:</p>
                            <h2 class="text-lg font-semibold text-[#25D366]">{{ $property->price }}DH</h2>
                        </div>
                    </div>
                    


                </div>


                <!-- Sidebar (droite) -->
                <div class="w-full md:w-1/3 flex flex-col items-center justify-center p-6 border-l border-gray-200">
                    <div class="flex flex-col gap-4 w-full max-w-xs text-center">
                        
                        <button
                            class="bg-[#E7C873] text-black py-2 rounded-md hover:bg-amber-400 transition-colors duration-300">
                            A vendre
                        </button>
                        <button
                            class="bg-blue-700 text-white py-2 rounded-md hover:bg-blue-950 transition-colors duration-300">
                            Appeler l'agent
                        </button>
                        <button
                            class="bg-green-500 text-white py-2 rounded-md hover:bg-green-600 transition-colors duration-300">
                            Discuter sur WhatsApp
                        </button>
                        
                    </div>
                </div>
            </div>

            <!-- Deuxième Bloc : Description + Google Maps -->
            <div class="flex flex-col md:flex-row w-full max-w-screen-xl bg-white rounded-lg ">

                <!-- Section gauche : Description -->
                <div class="w-full md:w-2/3 flex flex-col justify-between p-6 border-r border-gray-200">
                    
                    <ul class="flex  space-x-2 text-gray-700 text-sm">
                        <li class="flex items-center gap-2  ">
                            <img src="{{ asset('images/beds.svg') }}" class="w-4 h-4" alt="Chambres">
                            {{ $property->bedrooms }}
                            chambres  |
                        </li>
                        
                        <li class="flex items-center gap-2">
                            <img src="{{ asset('images/dosh.svg') }}" class="w-4 h-4" alt="Salle de bain">
                            {{ $property->bathrooms }} salles de bain  |
                        </li>
                        
                        <li class="flex  items-center gap-2">
                            <img src="{{ asset('images/space.svg') }}" class="w-4 h-4" alt="Superficie">
                            {{ $property->surface }}
                             m² 
                        </li>
                        

                    </ul>
                    <h2 class="text-xl mt-4  font-semibold text-gray-800">Description du bien</h2>
                    <p class="text-gray-600 mt-4  text-sm ">
                        {{ $property->description }}
                    </p>
                </div>

                <!-- Section droite : Google Maps -->


            </div>

            <section id="testimonials" aria-label="Ce que nos clients disent" class="">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <ul role="list" class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-6 sm:gap-8 lg:mt-20 lg:max-w-none lg:grid-cols-3">
                        <li>
                            <ul role="list" class="flex flex-col gap-y-6 sm:gap-y-8">
                                <li>
                                    <figure class="relative rounded-2xl bg-white p-6 shadow shadow-slate-900/10">
                                        <svg aria-hidden="true" width="105" height="78" class="absolute left-6 top-6 fill-slate-100">
                                            <path d="M25.086 77.292c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622C1.054 58.534 0 53.411 0 47.686c0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C28.325 3.917 33.599 1.507 39.324 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Zm54.24 0c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622-2.11-4.52-3.164-9.643-3.164-15.368 0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C82.565 3.917 87.839 1.507 93.564 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Z"></path>
                                        </svg>
                                        <blockquote class="relative">
                                            <p class="text-lg tracking-tight text-slate-900">Nous avons trouvé la maison de nos rêves grâce à cet agent immobilier. Le service était exceptionnel et l'équipe très professionnelle.</p>
                                        </blockquote>
                                        <figcaption class="relative mt-6 flex items-center justify-between border-t border-slate-100 pt-6">
                                            <div>
                                                <div class="font-display text-base text-slate-900">Sophie Durand</div>
                                            </div>
                                            <div class="overflow-hidden rounded-full bg-slate-50">
                                                <img alt="" class="h-14 w-14 object-cover" style="color:transparent" src="https://randomuser.me/api/portraits/men/15.jpg">
                                            </div>
                                        </figcaption>
                                    </figure>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <ul role="list" class="flex flex-col gap-y-6 sm:gap-y-8">
                                <li>
                                    <figure class="relative rounded-2xl bg-white p-6 shadow shadow-slate-900/10">
                                        <svg aria-hidden="true" width="105" height="78" class="absolute left-6 top-6 fill-slate-100">
                                            <path d="M25.086 77.292c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622C1.054 58.534 0 53.411 0 47.686c0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C28.325 3.917 33.599 1.507 39.324 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Zm54.24 0c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622-2.11-4.52-3.164-9.643-3.164-15.368 0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C82.565 3.917 87.839 1.507 93.564 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Z"></path>
                                        </svg>
                                        <blockquote class="relative">
                                            <p class="text-lg tracking-tight text-slate-900">L'achat de ma première maison a été une expérience inoubliable grâce à cette agence. Ils m'ont accompagné à chaque étape et m'ont trouvé un bien parfait.</p>
                                        </blockquote>
                                        <figcaption class="relative mt-6 flex items-center justify-between border-t border-slate-100 pt-6">
                                            <div>
                                                <div class="font-display text-base text-slate-900">Marc Dupont</div>
                                            </div>
                                            <div class="overflow-hidden rounded-full bg-slate-50">
                                                <img alt="" class="h-14 w-14 object-cover" style="color:transparent" src="https://randomuser.me/api/portraits/women/15.jpg">
                                            </div>
                                        </figcaption>
                                    </figure>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <ul role="list" class="flex flex-col gap-y-6 sm:gap-y-8">
                                <li>
                                    <figure class="relative rounded-2xl bg-white p-6 shadow shadow-slate-900/10">
                                        <svg aria-hidden="true" width="105" height="78" class="absolute left-6 top-6 fill-slate-100">
                                            <path d="M25.086 77.292c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622C1.054 58.534 0 53.411 0 47.686c0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C28.325 3.917 33.599 1.507 39.324 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Zm54.24 0c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622-2.11-4.52-3.164-9.643-3.164-15.368 0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C82.565 3.917 87.839 1.507 93.564 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Z"></path>
                                        </svg>
                                        <blockquote class="relative">
                                            <p class="text-lg tracking-tight text-slate-900">Une expérience incroyable. L'équipe était à l'écoute et a su nous guider dans l'achat de notre appartement. Je les recommande vivement!</p>
                                        </blockquote>
                                        <figcaption class="relative mt-6 flex items-center justify-between border-t border-slate-100 pt-6">
                                            <div>
                                                <div class="font-display text-base text-slate-900">Isabelle Martin</div>
                                            </div>
                                            <div class="overflow-hidden rounded-full bg-slate-50">
                                                <img alt="" class="h-14 w-14 object-cover" style="color:transparent" src="https://randomuser.me/api/portraits/men/16.jpg">
                                            </div>
                                        </figcaption>
                                    </figure>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </section>
            

        </div>

        <script>
            // Simple JavaScript for handling image transition and navigation
            let currentSlide = 0;
            const slides = document.querySelectorAll('#carousel-container img');
            const indicators = document.querySelectorAll('.absolute.bottom-4 button');

            // Function to show the current slide
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

            // Show the initial slide
            showSlide(currentSlide);

            // Previous button click
            document.getElementById('prev').addEventListener('click', () => {
                currentSlide = (currentSlide - 1 + slides.length) % slides.length;
                showSlide(currentSlide);
            });

            // Next button click
            document.getElementById('next').addEventListener('click', () => {
                currentSlide = (currentSlide + 1) % slides.length;
                showSlide(currentSlide);
            });

            // Indicators click
            indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', () => {
                    currentSlide = index;
                    showSlide(currentSlide);
                });
            });
        </script>
    </section>
@endsection
