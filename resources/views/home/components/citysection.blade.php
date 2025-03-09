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



    <link href="https://cdn.jsdelivr.net/npm/keen-slider@6.8.6/keen-slider.min.css" rel="stylesheet" />

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
</section>