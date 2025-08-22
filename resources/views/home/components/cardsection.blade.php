<section class="px-6 sm:px-16 py-8">
    <h2 class="text-3xl font-semibold">Propriétés en vedette</h2>
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center pt-2">
        <p class="text-[15px] font-medium">Découvrez les Meilleures Propriétés du Moment</p>

    </div>

    <div class="flex justify-between pt-6 w-full">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 sm:gap-6 w-full">
            @foreach ($properties->take(9) as $property)
                <a href="{{ route('proprites.details', $property->id) }}" class="w-full">
                    <div class="w-full rounded-2xl border border-[#e0dede] p-2 hover:shadow duration-400 relative">
                        <!-- Image Section with Positioned Labels -->
                        <div class="relative">
                            <img class="w-full h-80 object-cover rounded-2xl"
                                src="{{ asset('storage/' . json_decode($property->photos)[0]) }}" alt="">

                            <!-- Labels -->
                            <div class="absolute top-2 left-2 flex space-x-1">
                                @if(strpos($property->listing_type, 'À-vendre') !== false)
                                    <span class="text-white bg-[#25D366] rounded-2xl px-2 py-1 uppercase font-medium text-xs sm:text-sm">
                                        À vendre
                                    </span>
                                @endif
                                @if(strpos($property->listing_type, 'À-louer') !== false)
                                    <span class="text-white bg-[#E7C873] rounded-2xl px-3 py-1 uppercase font-medium text-xs sm:text-sm">
                                        À louer
                                    </span>
                                @endif
                            </div>

                        </div>

                        <!-- Property Details -->
                        <div class="flex justify-between items-start pt-2 px-1">
                            <div>
                                <p class="font-medium text-[#8b8b8b] text-[15px]">{{ $property->property_type }}</p>
                                <p class="font-semibold text-[#1A1A1A] text-xl">{{ $property->title }}</p>
                                <div class="flex items-center space-x-0.5 pt-1">
                                    <img src="{{ asset('images/local.svg') }}" alt="" class="w-4 h-4">
                                    <p>{{ $property->address }}</p>
                                </div>
                            </div>
                            <div>
                                <p class="font-semibold text-xl text-[#25D366]">{{ $property->price }} DH</p>
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
            <!-- Duplicate the above card for more properties -->

        </div>
    </div>

    <div class="flex justify-center pt-6">
        <a href="{{ route('proprites') }}" class="inline-flex items-center justify-center bg-green-600 text-white px-6 py-2.5 text-sm font-medium rounded-lg hover:bg-green-700 transition-all duration-200">
            Voir plus
        </a>
    </div>
</section>
