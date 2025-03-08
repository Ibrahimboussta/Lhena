<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link href="https://cdn.jsdelivr.net/npm/keen-slider@6.8.6/keen-slider.min.css" rel="stylesheet" />

</head>

<body>


    <section class="px-6 sm:px-16 py-8">
        <h2 class="text-3xl font-semibold text-[#1A1A1A]">Catégories en vedette : Explorez les propriétés</h2>
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center pt-2">
            <p class="text-[15px] font-medium">Explorez une large gamme de propriétés par catégorie</p>
            <a href="">
                <div class="flex items-center gap-x-2 mt-2 sm:mt-0">
                    <p class="font-medium text-[#1A1A1A] text-[15px]">Voir toutes les catégories</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                    </svg>
                </div>
            </a>
        </div>

        <div class="grid grid-cols-2 sm:flex sm:flex-nowrap justify-center sm:justify-between pt-6 gap-2 sm:gap-x-4">
            <a href="" class="w-full">
                <div
                    class="flex items-center gap-x-3 border border-gray-300 w-full px-1 sm:px-3 py-1 rounded-xl hover:shadow duration-400">
                    <img class="w-14 h-14 rounded-xl" src="{{ asset('images/casa.jpg') }}" alt="">
                    <div>
                        <p class="font-semibold text-lg">Appartement</p>
                        <p class="text-sm">4 Propriétés</p>
                    </div>
                </div>
            </a>
            <a href="" class="w-full">
                <div
                    class="flex items-center gap-x-3 border border-gray-300 w-full px-1 sm:px-3 py-1 rounded-xl hover:shadow duration-400">
                    <img class="w-14 h-14 rounded-xl" src="{{ asset('images/casa.jpg') }}" alt="">
                    <div>
                        <p class="font-semibold text-lg">Appartement</p>
                        <p class="text-sm">4 Propriétés</p>
                    </div>
                </div>
            </a>
            <a href="" class="w-full">
                <div
                    class="flex items-center gap-x-3 border border-gray-300 w-full px-1 sm:px-3 py-1 rounded-xl hover:shadow duration-400">
                    <img class="w-14 h-14 rounded-xl" src="{{ asset('images/casa.jpg') }}" alt="">
                    <div>
                        <p class="font-semibold text-lg">Appartement</p>
                        <p class="text-sm">4 Propriétés</p>
                    </div>
                </div>
            </a>
            <a href="" class="w-full">
                <div
                    class="flex items-center gap-x-3 border border-gray-300 w-full px-1 sm:px-3 py-1 rounded-xl hover:shadow duration-400">
                    <img class="w-14 h-14 rounded-xl" src="{{ asset('images/casa.jpg') }}" alt="">
                    <div>
                        <p class="font-semibold text-lg">Appartement</p>
                        <p class="text-sm">4 Propriétés</p>
                    </div>
                </div>
            </a>
            <a href="" class="w-full">
                <div
                    class="flex items-center gap-x-3 border border-gray-300 w-full px-1 sm:px-3 py-1 rounded-xl hover:shadow duration-400">
                    <img class="w-14 h-14 rounded-xl" src="{{ asset('images/casa.jpg') }}" alt="">
                    <div>
                        <p class="font-semibold text-lg">Appartement</p>
                        <p class="text-sm">4 Propriétés</p>
                    </div>
                </div>
            </a>
        </div>

    </section>



    <section class="px-6 sm:px-16 py-8">
        <h2 class="text-3xl font-semibold">Propriétés en vedette</h2>
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center pt-2">
            <p class="text-[15px] font-medium">Découvrez les Meilleures Propriétés du Moment</p>
            <div class="flex items-center gap-x-2 sm:gap-x-4 mt-2 sm:mt-0">
                <a href="">
                    <button
                        class="font-medium text-[#1A1A1A] text-[13px] rounded-xl border border-black px-3 py-1 bg-[#FFF8F6]">
                        Toutes les propriétés
                    </button>
                </a>
                <a href="">
                    <button class="font-medium text-[#1A1A1A] text-[13px]">À vendre</button>
                </a>
                <a href="">
                    <button class="font-medium text-[#1A1A1A] text-[13px]">À louer</button>
                </a>
            </div>
        </div>

        <div class="flex justify-between pt-6 w-full">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 sm:gap-6 w-full">
                <a href="" class="w-full">
                    <div class="w-full rounded-2xl border border-[#e0dede] p-2 hover:shadow duration-400 relative">
                        <!-- Image Section with Positioned Labels -->
                        <div class="relative">
                            <img class="w-full h-80 object-cover rounded-2xl" src="{{ asset('images/casa.jpg') }}"
                                alt="">

                            <!-- Labels -->
                            <div class="absolute top-4 left-4 flex space-x-2">
                                <span
                                    class="text-white bg-[#25D366] rounded-2xl px-3 py-1 uppercase font-medium text-xs sm:text-sm">
                                    À vendre
                                </span>
                                <span
                                    class="text-white bg-[#E7C873] rounded-2xl px-3 py-1 uppercase font-medium text-xs sm:text-sm">
                                    À louer
                                </span>
                            </div>
                        </div>

                        <!-- Property Details -->
                        <div class="flex justify-between items-start pt-2 px-1">
                            <div>
                                <p class="font-semibold text-[#1A1A1A] text-xl">Maison familiale de luxe</p>
                                <div class="flex items-center space-x-0.5 pt-1">
                                    <img src="{{ asset('images/local.svg') }}" alt="" class="w-4 h-4">
                                    <p>1800-1818 79th St</p>
                                </div>
                            </div>
                            <div>
                                <p class="font-semibold text-[#1F4B43]">$395,000</p>
                            </div>
                        </div>

                        <!-- Property Features -->
                        <div class="flex items-center py-2 px-1 gap-x-4">
                            <div class="flex items-center space-x-0.5">
                                <img class="w-4 h-4" src="{{ asset('images/beds.svg') }}" alt="">
                                <p>4 lits</p>
                            </div>
                            <div class="flex items-center space-x-0.5">
                                <img class="w-4 h-4" src="{{ asset('images/dosh.svg') }}" alt="">
                                <p>1 salle de bain</p>
                            </div>
                            <div class="flex items-center space-x-0.5">
                                <img class="w-4 h-4" src="{{ asset('images/space.svg') }}" alt="">
                                <p>400 pieds carrés</p>
                            </div>
                        </div>
                    </div>
                </a>



















                <!-- Duplicate the above card for more properties -->

            </div>



        </div>

        <div class="flex justify-center pt-6">
            <button class="bg-[#E7C873] py-2 px-8 rounded-md fborder-0">
                <a href="" class="text-black font-medium text-md ">Voir plus</a>
            </button>
        </div>
    </section>



    <section class="px-6 sm:px-16 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <!-- Image Section -->
            <div>
                <img class="w-full rounded-2xl" src="{{ asset('images/house.jpg') }}" alt=""
                    srcset="">
            </div>

            <!-- Text Section -->
            <div>
                <h2 class="text-3xl font-semibold pt-0 sm:pt-6">Pourquoi devriez-vous travailler avec nous?</h2>
                <p class="pt-6 text-[15px] font-medium">Rejoignez-nous pour une aventure professionnelle unique et
                    enrichissante !</p>

                <!-- Features Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-2 gap-4 pt-10">
                    <div class="space-y-4">
                        <div class="flex items-center space-x-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="bg-[#fcf2f0] rounded-full p-1 size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                            <p>100% sécurisé</p>
                        </div>

                        <div class="flex items-center space-x-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="bg-[#fcf2f0] rounded-full p-1 size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                            <p>100% sécurisé</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-center space-x-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="bg-[#fcf2f0] rounded-full p-1 size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                            <p>100% sécurisé</p>
                        </div>

                        <div class="flex items-center space-x-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="bg-[#fcf2f0] rounded-full p-1 size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                            <p>100% sécurisé</p>
                        </div>
                    </div>
                </div>

                <!-- See More Button -->
                <div class="flex justify-start pt-6">
                    <button class="bg-[#E7C873] py-2 px-6 rounded-md border-0">
                        <a href="" class="text-black font-medium text-md flex items-center gap-x-2">Voir
                            plus
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6 mt-1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                            </svg>
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </section>





    <section class=" px-6 sm:px-16 py-8">
        <div class="">
            <h2 class="text-3xl font-semibold">Trouver des propriétés dans ces villess</h2>
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center pt-2">
                <p class="text-[15px] font-medium">Découvrez des propriétés exceptionnelles dans ces villes</p>
                <a href="">
                    <div class="flex items-center gap-x-2 mt-2 sm:mt-0">
                        <p class="font-medium text-[#1A1A1A] text-[15px]">Voir toutes les villes</p>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                        </svg>
                    </div>
                </a>
            </div>

            <div class="mt-8">
                <div id="keen-slider" class="keen-slider">
                    <a href="">
                        <div class="keen-slider__slide transition-opacity duration-500 relative group">
                            <blockquote class="rounded-lg p-2 shadow-xs sm:p-3">
                                <div class="relative">
                                    <!-- Dark overlay effect on hover -->
                                    <img alt="" src="{{ asset('images/casa.jpg') }}"
                                        class="w-full rounded-xl h-full object-cover transition-all duration-400 group-hover:opacity-70 group-hover:scale-95" />

                                    <!-- Casablanca text that shows on hover, centered on the image -->
                                    <div
                                        class="absolute inset-0 flex justify-center items-center opacity-0 group-hover:opacity-100 transition-opacity duration-400">
                                        <p class="text-black text-5xl font-bold">Casablanca</p>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                    </a>


                    <a href="">
                        <div class="keen-slider__slide transition-opacity duration-500 relative group">
                            <blockquote class="rounded-lg p-2 shadow-xs sm:p-3">
                                <div class="relative">
                                    <!-- Dark overlay effect on hover -->
                                    <img alt="" src="{{ asset('images/casa.jpg') }}"
                                        class="w-full rounded-xl h-full object-cover transition-all duration-400 group-hover:opacity-70 group-hover:scale-95" />

                                    <!-- Casablanca text that shows on hover, centered on the image -->
                                    <div
                                        class="absolute inset-0 flex justify-center items-center opacity-0 group-hover:opacity-100 transition-opacity duration-400">
                                        <p class="text-black text-5xl font-bold">Casablanca</p>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                    </a>


                    <a href="">
                        <div class="keen-slider__slide transition-opacity duration-500 relative group">
                            <blockquote class="rounded-lg p-2 shadow-xs sm:p-3">
                                <div class="relative">
                                    <!-- Dark overlay effect on hover -->
                                    <img alt="" src="{{ asset('images/casa.jpg') }}"
                                        class="w-full rounded-xl h-full object-cover transition-all duration-400 group-hover:opacity-70 group-hover:scale-95" />

                                    <!-- Casablanca text that shows on hover, centered on the image -->
                                    <div
                                        class="absolute inset-0 flex justify-center items-center opacity-0 group-hover:opacity-100 transition-opacity duration-400">
                                        <p class="text-black text-5xl font-bold">Casablanca</p>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                    </a>


                    <a href="">
                        <div class="keen-slider__slide transition-opacity duration-500 relative group">
                            <blockquote class="rounded-lg p-2 shadow-xs sm:p-3">
                                <div class="relative">
                                    <!-- Dark overlay effect on hover -->
                                    <img alt="" src="{{ asset('images/casa.jpg') }}"
                                        class="w-full rounded-xl h-full object-cover transition-all duration-400 group-hover:opacity-70 group-hover:scale-95" />

                                    <!-- Casablanca text that shows on hover, centered on the image -->
                                    <div
                                        class="absolute inset-0 flex justify-center items-center opacity-0 group-hover:opacity-100 transition-opacity duration-400">
                                        <p class="text-black text-5xl font-bold">Casablanca</p>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                    </a>

                </div>

                <div class="mt-6 flex items-center justify-center gap-4">
                    <button aria-label="Previous slide" id="keen-slider-previous"
                        class="text-gray-600 transition-colors hover:text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                    </button>

                    <p class="w-16 text-center text-sm text-gray-700">
                        <span id="keen-slider-active"></span>
                        /
                        <span id="keen-slider-count"></span>
                    </p>

                    <button aria-label="Next slide" id="keen-slider-next"
                        class="text-gray-600 transition-colors hover:text-gray-900">
                        <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>


    <section class=" px-6 sm:px-16 py-8">


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Card 1 -->
            <div class="bg-white border border-[#E4E4E4] rounded-2xl overflow-hidden">
                <img src="{{ asset('images/casa.jpg') }}" alt="Property Image" class="w-full h-48 object-cover">
                <div class="p-4 w-full text-center">
                    <p class="text-sm text-gray-500 text-center">Apartment • March 19, 2024</p>
                    <h3 class="text-medium font-semibold mt-2 text-center">Housing Markets That Changed the Most This
                        Week</h3>
                    <a href="#" class="">Read More →</a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white border border-[#E4E4E4] rounded-2xl overflow-hidden">
                <img src="{{ asset('images/casa.jpg') }}" alt="Property Image" class="w-full h-48 object-cover">
                <div class="p-4 w-full text-center">
                    <p class="text-sm text-gray-500 text-center">Apartment • March 19, 2024</p>
                    <h3 class="text-medium font-semibold mt-2 text-center">Housing Markets That Changed the Most This
                        Week</h3>
                    <a href="#" class="">Read More →</a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white border border-[#E4E4E4] rounded-2xl overflow-hidden">
                <img src="{{ asset('images/casa.jpg') }}" alt="Property Image" class="w-full h-48 object-cover">
                <div class="p-4 w-full text-center">
                    <p class="text-sm text-gray-500 text-center">Apartment • March 19, 2024</p>
                    <h3 class="text-medium font-semibold mt-2 text-center">Housing Markets That Changed the Most This
                        Week</h3>
                    <a href="#" class="">Read More →</a>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="bg-white border border-[#E4E4E4] rounded-2xl overflow-hidden">
                <img src="{{ asset('images/casa.jpg') }}" alt="Property Image" class="w-full h-48 object-cover">
                <div class="p-4 w-full text-center">
                    <p class="text-sm text-gray-500 text-center">Apartment • March 19, 2024</p>
                    <h3 class="text-medium font-semibold mt-2 text-center">Housing Markets That Changed the Most This
                        Week</h3>
                    <a href="#" class="">Read More →</a>
                </div>
            </div>
        </div>
    </section>


    <section class="px-6 sm:px-16 py-8">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center  bg-[#25D366] py-6 sm:py-14 px-6 sm:px-18 w-full rounded-3xl">
            <div>
                <h2 class="text-3xl font-semibold text-white">Devenir agent immobilier</h2>
                <p class="text-white pt-2 text-[15px] font-medium">Nous collaborons avec les meilleures entreprises mondiales</p>
            </div>
            <div class="flex justify-start pt-6">
                <button class="bg-[#E7C873] py-2 px-6 rounded-md border-0">
                    <a href="" class="text-black font-medium text-md flex items-center gap-x-2">
                        publier une annonce
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6 mt-1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                        </svg>
                    </a>
                </button>
            </div>

        </div>
    </section>










    <script type="module">
        import KeenSlider from 'https://cdn.jsdelivr.net/npm/keen-slider@6.8.6/+esm'

        const keenSliderActive = document.getElementById('keen-slider-active')
        const keenSliderCount = document.getElementById('keen-slider-count')

        const keenSlider = new KeenSlider(
            '#keen-slider', {
                loop: true,
                defaultAnimation: {
                    duration: 750,
                },
                slides: {
                    origin: 'center',
                    perView: 1,
                    spacing: 16,
                },
                breakpoints: {
                    '(min-width: 640px)': {
                        slides: {
                            origin: 'center',
                            perView: 1.5,
                            spacing: 16,
                        },
                    },
                    '(min-width: 768px)': {
                        slides: {
                            origin: 'center',
                            perView: 1.75,
                            spacing: 16,
                        },
                    },
                    '(min-width: 1024px)': {
                        slides: {
                            origin: 'center',
                            perView: 3,
                            spacing: 16,
                        },
                    },
                },
                created(slider) {
                    slider.slides[slider.track.details.rel].classList.remove('opacity-40')

                    keenSliderActive.innerText = slider.track.details.rel + 1
                    keenSliderCount.innerText = slider.slides.length
                },
                slideChanged(slider) {
                    slider.slides.forEach((slide) => slide.classList.add('opacity-40'))

                    slider.slides[slider.track.details.rel].classList.remove('opacity-40')

                    keenSliderActive.innerText = slider.track.details.rel + 1
                },
            },
            []
        )

        const keenSliderPrevious = document.getElementById('keen-slider-previous')
        const keenSliderNext = document.getElementById('keen-slider-next')

        keenSliderPrevious.addEventListener('click', () => keenSlider.prev())
        keenSliderNext.addEventListener('click', () => keenSlider.next())
    </script>

</body>

</html>
