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
            <a href="{{route('proprites.details')}}" class="w-full">
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
            <a href="{{route('proprites')}}" class="text-black font-medium text-md ">Voir plus</a>
        </button>
    </div>
</section>