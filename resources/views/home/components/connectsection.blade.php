<section class="px-6 py-14 sm:px-16 ">
    <div
        class="flex flex-col sm:flex-row justify-between items-start sm:items-center bg-gray-50 py-6 sm:py-16 px-6 sm:px-18 w-full rounded-2xl border border-gray-200">
        <div>
            <h2 class="text-3xl font-semibold text-gray-900">Devenir agent immobilier</h2>
            <p class="text-gray-600 pt-2 text-[15px] font-medium">Nous collaborons avec les meilleures entreprises </p>
        </div>
        <div class="flex justify-start pt-6">
            @auth
                <a href="{{ route('publish') }}" class="inline-flex items-center justify-center bg-black text-white px-6 py-2.5 text-sm font-medium rounded-lg hover:bg-gray-800 transition-all duration-200 group">
                    publier une annonce
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 ml-2 group-hover:translate-x-0.5 transition-transform">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                    </svg>
                </a>
            @endauth
            @guest
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center bg-black text-white px-6 py-2.5 text-sm font-medium rounded-lg hover:bg-gray-800 transition-all duration-200 group">
                    publier une annonce
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 ml-2 group-hover:translate-x-0.5 transition-transform">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                    </svg>
                </a>
            @endguest
        </div>

    </div>
</section>
