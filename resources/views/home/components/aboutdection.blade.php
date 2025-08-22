<section class="px-6 sm:px-16 py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        <!-- Image Section -->
        <div class="relative group">
            <div class="absolute -inset-2.5 bg-gray-100 rounded-3xl opacity-0 group-hover:opacity-100 transition-all duration-300"></div>
            <div class="relative">
                <img class="w-full rounded-2xl shadow-sm" src="{{ asset('images/house.jpg') }}" alt="House showcase"
                    srcset="">
            </div>
        </div>

        <!-- Text Section -->
        <div>
            <h2 class="text-3xl font-semibold text-gray-900 pt-0 sm:pt-6">Pourquoi devriez-vous travailler avec nous?</h2>
            <p class="pt-6 text-gray-600 text-[15px]">Rejoignez-nous pour une aventure professionnelle unique et
                enrichissante !</p>

            <!-- Features Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-2 gap-6 pt-10">
                <div class="space-y-6">
                    <div class="flex items-center space-x-3 group">
                        <div class="bg-gray-900/5 rounded-lg p-2 group-hover:bg-gray-900/10 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor"
                                class="size-5 text-red-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                        </div>
                        <p class="text-gray-700 font-medium">Propriétés de qualité</p>
                    </div>

                    <div class="flex items-center space-x-3 group">
                        <div class="bg-gray-900/5 rounded-lg p-2 group-hover:bg-gray-900/10 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor"
                                class="size-5 text-red-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                        </div>
                        <p class="text-gray-700 font-medium">Transactions sécurisées</p>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="flex items-center space-x-3 group">
                        <div class="bg-gray-900/5 rounded-lg p-2 group-hover:bg-gray-900/10 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor"
                                class="size-5 text-red-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                        </div>
                        <p class="text-gray-700 font-medium">Rendement garanti</p>
                    </div>

                    <div class="flex items-center space-x-3 group">
                        <div class="bg-gray-900/5 rounded-lg p-2 group-hover:bg-gray-900/10 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor"
                                class="size-5 text-red-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                        </div>
                        <p class="text-gray-700 font-medium">Accompagnement sur mesure</p>
                    </div>
                </div>
            </div>

            <!-- See More Button -->
            <div class="flex justify-start pt-8">
                <a href="{{route('a-propos')}}" class="inline-flex items-center justify-center bg-green-600 text-white px-6 py-2.5 text-sm font-medium rounded-lg hover:bg-green-700 transition-all duration-200 group">
                    Voir plus
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor"
                        class="size-5 ml-2 group-hover:translate-x-0.5 transition-transform">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
