<section class="px-6 sm:px-16 py-8">
    <h2 class="text-3xl font-semibold">Propriétés en vedette</h2>
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center pt-2">
        <p class="text-[15px] font-medium">Découvrez les Meilleures Propriétés du Moment</p>

    </div>

    <div class="flex justify-between pt-6 w-full">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 sm:gap-6 w-full">
        @foreach ($properties->take(9) as $property)
            <a href="{{ route('proprites.details', $property->slug) }}" class="w-full group">
                <div class="w-full rounded-2xl border border-gray-200 bg-white overflow-hidden shadow-sm hover:shadow-md transition duration-300 flex flex-col">

                    <!-- ✅ Image Section with fixed size -->
                    <div class="relative w-full h-64 overflow-hidden">
                       <img src="{{ asset(json_decode($property->photos)[0]) }}" alt="">


                        <!-- Labels -->
                        <div class="absolute top-3 left-3 flex space-x-2">
                            @if(strpos($property->listing_type, 'À-vendre') !== false)
                                <span class="text-white bg-emerald-500 rounded-full px-3 py-1 uppercase font-semibold text-xs shadow">
                                    À vendre
                                </span>
                            @endif
                            @if(strpos($property->listing_type, 'À-louer') !== false)
                                <span class="text-white bg-yellow-500 rounded-full px-3 py-1 uppercase font-semibold text-xs shadow">
                                    À louer
                                </span>
                            @endif
                            @if($property->vip_package && $property->vip_until && $property->vip_until > now())
                                <span class="bg-gradient-to-r from-amber-500 to-yellow-400 text-white px-3 py-1 rounded-lg uppercase font-bold text-xs shadow-lg flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    VIP
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- ✅ Property Content -->
                    <div class="flex-1 flex flex-col p-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-sm font-medium text-gray-500">{{ $property->property_type }}</p>
                                <h4 class="text-lg font-semibold text-gray-900 group-hover:text-emerald-600 transition">
                                    {{ $property->title }}
                                </h4>
                                <div class="flex items-center space-x-1 text-gray-600 text-sm mt-1">
                                    <img src="{{ asset('images/local.svg') }}" alt="" class="w-4 h-4 opacity-70">
                                    <p class="truncate max-w-[180px]">{{ $property->address }}</p>
                                </div>
                            </div>
                            <p class="font-semibold text-lg text-emerald-600 whitespace-nowrap">
                                {{ number_format($property->price, 0, ',', ' ') }} DH
                            </p>
                        </div>

                        <!-- ✅ Property Features -->
                    <div class="flex items-center mt-4 text-gray-600 text-sm gap-x-6">
                        <div class="flex items-center space-x-1">
                            <img class="w-4 h-4 opacity-70" src="{{ asset('images/beds.svg') }}" alt="">
                            <span>{{ $property->bedrooms }}</span>
                        </div>
                        <div class="flex items-center space-x-1">
                            <img class="w-4 h-4 opacity-70" src="{{ asset('images/dosh.svg') }}" alt="">
                            <span>{{ $property->bathrooms }}</span>
                        </div>
                        <div class="flex items-center space-x-1">
                            <img class="w-4 h-4 opacity-70" src="{{ asset('images/space.svg') }}" alt="">
                            <span>{{ $property->surface }} m²</span>
                        </div>
                    </div>

                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>


    <div class="flex justify-center pt-6">
        <a href="{{ route('proprites') }}" class="inline-flex items-center justify-center bg-green-600 text-white px-6 py-2.5 text-sm font-medium rounded-lg hover:bg-green-700 transition-all duration-200">
            Voir plus
        </a>
    </div>
</section>
