<section class="px-6 py-14 sm:px-16 ">
    <div
        class="flex flex-col sm:flex-row justify-between items-start sm:items-center  bg-[#25D366] py-6 sm:py-16 px-6 sm:px-18 w-full rounded-2xl">
        <div>
            <h2 class="text-3xl font-semibold text-white">Devenir agent immobilier</h2>
            <p class="text-white pt-2 text-[15px] font-medium">Nous collaborons avec les meilleures entreprises </p>
        </div>
        <div class="flex justify-start pt-6">
            @auth
                <button class="bg-[#E7C873] py-2 px-6 rounded-md border-0">
                    <a href="{{ route('publish') }}" class="text-black font-medium text-md flex items-center gap-x-2">
                        publier une annonce
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6 mt-1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                        </svg>
                    </a>
                </button>
            @endauth
            @guest
                <button class="bg-[#E7C873] py-2 px-6 rounded-md border-0">
                    <a href="{{ route('register') }}" class="text-black font-medium text-md flex items-center gap-x-2">
                        publier une annonce
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6 mt-1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                        </svg>
                    </a>
                </button>
            @endguest
        </div>

    </div>
</section>
