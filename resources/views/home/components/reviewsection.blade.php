<div class="pt-10 md:pt-10 px-6 sm:px-16 container mx-auto flex flex-col md:flex-row  overflow-hidden" x-data="{ testimonialActive: 2 }"
    x-cloak>
    <div class="relative w-full rounded-l-xl py-2 md:py-24 bg-[#25D366] md:w-1/2 flex flex-col item-center justify-center ">
        <div class="absolute top-0 left-0 z-10 grid-[#25D366] w-16 h-16 md:w-40 md:h-40 md:ml-20 md:mt-24"></div>
        <div class="relative text-2xl md:text-5xl py-2 px-6 md:py-6 md:px-1 md:w-64 md:mx-auto text-black font-semibold leading-tight tracking-tight mb-0 z-20">
            <span class="md:block">Ce que nos</span>
            <span class="md-block">clients disent</span>
            <span class="block">de nous !</span>
        </div>
        <div class="absolute right-0 bottom-0 mr-4 mb-4 hidden md:block">
            <button class="rounded-l-full border-r bg-gray-100 text-gray-500 focus:outline-none hover:text-black font-bold w-12 h-10"
                x-on:click="testimonialActive = testimonialActive === 1 ? 3 : testimonialActive - 1">
                &#8592;
            </button>
            <button class="rounded-r-full bg-gray-100 text-gray-500 focus:outline-none hover:text-black font-bold w-12 h-10"
                x-on:click="testimonialActive = testimonialActive >= 3 ? 1 : testimonialActive + 1">
                &#8594;
            </button>
        </div>
    </div>

    <div class="bg-gray-100 rounded-r-xl md:w-1/2">
        <div class="flex flex-col h-full relative">
            <div class="absolute top-0 left-0 mt-3 ml-4 md:mt-5 md:ml-12">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-[#25D366] fill-current w-12 h-12 md:w-16 md:h-16" viewBox="0 0 24 24">
                    <path
                        d="M6.5 10c-.223 0-.437.034-.65.065.069-.232.14-.468.254-.68.114-.308.292-.575.469-.844.148-.291.409-.488.601-.737.201-.242.475-.403.692-.604.213-.21.492-.315.714-.463.232-.133.434-.28.65-.35.208-.086.39-.16.539-.222.302-.125.474-.197.474-.197L9.758 4.03c0 0-.218.052-.597.144C8.97 4.222 8.737 4.278 8.472 4.345c-.271.05-.56.187-.882.312C7.272 4.799 6.904 4.895 6.562 5.123c-.344.218-.741.4-1.091.692C5.132 6.116 4.723 6.377 4.421 6.76c-.33.358-.656.734-.909 1.162C3.219 8.33 3.02 8.778 2.81 9.221c-.19.443-.343.896-.468 1.336-.237.882-.343 1.72-.384 2.437-.034.718-.014 1.315.028 1.747.015.204.043.402.063.539.017.109.025.168.025.168l.026-.006C2.535 17.474 4.338 19 6.5 19c2.485 0 4.5-2.015 4.5-4.5S8.985 10 6.5 10zM17.5 10c-.223 0-.437.034-.65.065.069-.232.14-.468.254-.68.114-.308.292-.575.469-.844.148-.291.409-.488.601-.737.201-.242.475-.403.692-.604.213-.21.492-.315.714-.463.232-.133.434-.28.65-.35.208-.086.39-.16.539-.222.302-.125.474-.197.474-.197L20.758 4.03c0 0-.218.052-.597.144-.191.048-.424.104-.689.171-.271.05-.56.187-.882.312-.317.143-.686.238-1.028.467-.344.218-.741.4-1.091.692-.339.301-.748.562-1.05.944-.33.358-.656.734-.909 1.162C14.219 8.33 14.02 8.778 13.81 9.221c-.19.443-.343.896-.468 1.336-.237.882-.343 1.72-.384 2.437-.034.718-.014 1.315.028 1.747.015.204.043.402.063.539.017.109.025.168.025.168l.026-.006C13.535 17.474 15.338 19 17.5 19c2.485 0 4.5-2.015 4.5-4.5S19.985 10 17.5 10z" />
                </svg>
            </div>

            <div class="h-full relative z-10">
                <div x-show.immediate="testimonialActive === 1">
                    <p class="text-gray-600 serif font-normal italic px-6 py-6 md:px-16 md:py-10 text-xl md:text-2xl"
                        x-show.transition="testimonialActive == 1">
                        « Grâce à l'expertise de cette agence, j'ai trouvé l'appartement de mes rêves. Un service impeccable et une équipe à l'écoute ! »
                    </p>
                </div>

                <div x-show.immediate="testimonialActive === 2">
                    <p class="text-gray-600 serif font-normal italic px-6 py-6 md:px-16 md:py-10 text-xl md:text-2xl"
                        x-show.transition="testimonialActive == 2">
                        « Le processus d'achat a été fluide et sans stress. L'agence a parfaitement compris mes besoins et a su me guider. »
                    </p>
                </div>

                <div x-show.immediate="testimonialActive === 3">
                    <p class="text-gray-600 serif font-normal italic px-6 py-6 md:px-16 md:py-10 text-xl md:text-2xl"
                        x-show.transition="testimonialActive == 3">
                        « Une expérience excellente pour la vente de mon bien. Je recommande vivement cette agence à toute personne souhaitant vendre ou acheter. »
                    </p>
                </div>
            </div>

            <div class="flex my-4 justify-center items-center">
                <button @click.prevent="testimonialActive = 1"
                    class="text-center font-bold shadow-xs focus:outline-none focus:shadow-outline inline-block rounded-full mx-2"
                    :class="{
                        'h-12 w-12 opacity-25 bg-[#25D366] text-gray-600': testimonialActive !=
                            1,
                        'h-16 w-16 opacity-100 bg-[#25D366] text-white': testimonialActive == 1
                    }">Client 1</button>
                <button @click.prevent="testimonialActive = 2"
                    class="text-center font-bold shadow-xs focus:outline-none focus:shadow-outline h-16 w-16 inline-block bg-[#25D366] rounded-full mx-2"
                    :class="{
                        'h-12 w-12 opacity-25 bg-[#25D366] text-gray-600': testimonialActive !=
                            2,
                        'h-16 w-16 opacity-100 bg-[#25D366] text-white': testimonialActive == 2
                    }">Client 2</button>
                <button @click.prevent="testimonialActive = 3"
                    class="text-center font-bold shadow-xs focus:outline-none focus:shadow-outline h-12 w-12 inline-block bg-[#25D366] rounded-full mx-2"
                    :class="{
                        'h-12 w-12 opacity-25 bg-[#25D366] text-gray-600': testimonialActive !=
                            3,
                        'h-16 w-16 opacity-100 bg-[#25D366] text-white': testimonialActive == 3
                    }">Client 3</button>
            </div>

            <div class="flex justify-center px-6 pt-2 pb-6 md:py-6">
                <div class="text-center" x-show="testimonialActive == 1">
                    <h2 class="text-sm md:text-base font-bold text-gray-700 leading-tight">Jean Dupont</h2>
                    <small class="text-gray-500 text-xs md:text-sm truncate">Acheteur, Paris</small>
                </div>

                <div class="text-center" x-show="testimonialActive == 2">
                    <h2 class="text-sm md:text-base font-bold text-gray-700 leading-tight">Marie Leclerc</h2>
                    <small class="text-gray-500 text-xs md:text-sm truncate">Vendeuse, Lyon</small>
                </div>

                <div class="text-center" x-show="testimonialActive == 3">
                    <h2 class="text-sm md:text-base font-bold text-gray-700 leading-tight">Luc Martin</h2>
                    <small class="text-gray-500 text-xs md:text-sm truncate">Investisseur immobilier, Bordeaux</small>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js" defer></script>
