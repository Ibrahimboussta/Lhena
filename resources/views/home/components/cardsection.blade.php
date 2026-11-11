<section class="bg-[#f4f8f5] px-5 py-16 sm:px-8 lg:px-10 lg:py-20">
    <div class="mx-auto max-w-7xl">
        <div class="mb-8 flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-[#90764b]">{{ __('ui.signature_selection') }}</p>
                <h2 class="mt-2 text-3xl font-semibold tracking-tight text-[#242923] sm:text-4xl">{{ __('ui.places_with_more') }}</h2>
                <p class="mt-3 max-w-2xl text-sm leading-6 text-[#68736d] sm:text-base">{{ __('ui.featured_text') }}</p>
            </div>
            <a href="{{ route('proprites') }}" class="inline-flex shrink-0 items-center gap-2 text-sm font-semibold text-[#0b3b31] transition hover:gap-3">
                {{ __('ui.all_listings') }}
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6" />
                </svg>
            </a>
        </div>

        @php
            $featuredProperties = $properties->take(9);
            $showDemoCards = $featuredProperties->isEmpty();

            if ($showDemoCards) {
                $featuredProperties = collect([
                    (object) [
                        'listing_type' => 'À-louer',
                        'property_type' => 'Maison',
                        'title' => 'Maison lumineuse avec jardin',
                        'address' => 'Marrakech, Guéliz',
                        'bedrooms' => 4,
                        'bathrooms' => 3,
                        'surface' => 280,
                        'price' => 2850000,
                        'slug' => null,
                        'photos' => json_encode(['images/appart2.jpg']),
                    ],
                    (object) [
                        'listing_type' => 'À-louer',
                        'property_type' => 'Appartement',
                        'title' => 'Appartement au cœur de la ville',
                        'address' => 'Casablanca, Maarif',
                        'bedrooms' => 3,
                        'bathrooms' => 2,
                        'surface' => 145,
                        'price' => 12500,
                        'slug' => null,
                        'photos' => json_encode(['images/appart1.jpg']),
                    ],
                    (object) [
                        'listing_type' => 'À-louer',
                        'property_type' => 'Duplex',
                        'title' => 'Duplex entre ville et nature',
                        'address' => 'Rabat, Hay Riad',
                        'bedrooms' => 5,
                        'bathrooms' => 4,
                        'surface' => 320,
                        'price' => 3600000,
                        'slug' => null,
                        'photos' => json_encode(['images/appart3.jpg']),
                    ],
                ]);
            }
        @endphp

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($featuredProperties as $property)
                @php
                    $photos = json_decode($property->photos, true);
                    $photoCount = is_array($photos) ? max(count($photos), 1) : 1;
                    $firstPhoto = is_array($photos) && count($photos) > 0
                        ? ($showDemoCards ? asset($photos[0]) : asset('storage/' . $photos[0]))
                        : asset('images/appart1.jpg');
                    $propertyUrl = $showDemoCards
                        ? route('proprites')
                        : route('proprites.details', $property->slug);
                    $whatsappMessage = __('ui.whatsapp_message_prefix') . $property->title . ' ». ' . $propertyUrl;
                    $whatsappUrl = 'https://wa.me/212634262436?text=' . urlencode($whatsappMessage);
                @endphp
                <article class="group flex h-full flex-col overflow-hidden rounded-[1.4rem] border border-[#e7ece8] bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-[#173c2e]/10">
                    <div class="property-image-loader relative h-60 overflow-hidden sm:h-64">
                        <a href="{{ $propertyUrl }}" class="absolute inset-0" aria-label="{{ __('ui.view_details') }} : {{ $property->title }}">
                            <img class="h-full w-full object-cover transition duration-700 group-hover:scale-105" src="{{ $firstPhoto }}" alt="{{ $property->title }}" loading="lazy">
                        </a>
                        <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-black/25 via-transparent to-black/5"></div>
                        <span class="absolute left-4 top-4 inline-flex items-center gap-1.5 rounded-full bg-white/95 px-3.5 py-2 text-[10px] font-semibold uppercase tracking-wide text-[#796341] shadow-sm">
                            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path d="m12 2.8 2.85 5.78 6.38.93-4.62 4.5 1.09 6.35L12 17.36l-5.7 3 1.09-6.35-4.62-4.5 6.38-.93L12 2.8Z" />
                            </svg>
                            {{ $showDemoCards ? __('ui.example') : __('ui.signature_pick') }}
                        </span>
                        <button type="button" x-data="{ favorite: false }" @click="favorite = !favorite" :aria-pressed="favorite.toString()" aria-label="{{ __('ui.add_favorite') }}" class="absolute right-4 top-4 flex h-11 w-11 items-center justify-center rounded-full bg-white/95 text-[#29332d] shadow-md transition hover:scale-105 hover:text-[#a34c3f] focus:outline-none focus:ring-2 focus:ring-[#0b3b31] focus:ring-offset-2">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" :fill="favorite ? 'currentColor' : 'none'" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78Z" />
                            </svg>
                        </button>
                        <span class="absolute bottom-4 right-4 rounded-lg bg-[#28332c]/85 px-3 py-1.5 text-xs font-semibold text-white shadow-sm backdrop-blur-sm">
                            1 / {{ $photoCount }} {{ __('ui.photos') }}
                        </span>
                    </div>

                    <div class="flex flex-1 flex-col p-5">
                        <p class="text-xs font-medium text-[#90764b]">{{ $property->property_type }}</p>
                        <h3 class="mt-1 truncate text-xl font-semibold text-[#28332c] transition group-hover:text-[#0b3b31]">
                            <a href="{{ $propertyUrl }}">{{ $property->title }}</a>
                        </h3>
                        <div class="mt-2 flex items-center gap-1.5 text-sm text-[#68736d]">
                            <img src="{{ asset('images/local.svg') }}" alt="" class="h-4 w-4 opacity-70">
                            <span class="truncate">{{ $property->address }}</span>
                        </div>

                        <div class="mt-5 flex flex-wrap gap-2">
                            <span class="inline-flex items-center gap-1.5 rounded-lg bg-[#f1f5f2] px-2.5 py-2 text-xs text-[#52645a]">
                                <img class="h-4 w-4 opacity-70" src="{{ asset('images/beds.svg') }}" alt="">
                                {{ $property->bedrooms }} {{ __('ui.bedrooms_label') }}
                            </span>
                            <span class="inline-flex items-center gap-1.5 rounded-lg bg-[#f1f5f2] px-2.5 py-2 text-xs text-[#52645a]">
                                <img class="h-4 w-4 opacity-70" src="{{ asset('images/dosh.svg') }}" alt="">
                                {{ $property->bathrooms }} {{ __('ui.bathrooms_label') }}
                            </span>
                            @if (!is_null($property->surface))
                                <span class="inline-flex items-center gap-1.5 rounded-lg bg-[#f1f5f2] px-2.5 py-2 text-xs text-[#52645a]">
                                    <img class="h-4 w-4 opacity-70" src="{{ asset('images/space.svg') }}" alt="">
                                    {{ $property->surface }} m²
                                </span>
                            @endif
                        </div>

                        <div class="mt-5 border-t border-[#edf0ed] pt-4">
                            <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" class="inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-[#003b31] px-4 py-3.5 text-center text-sm font-semibold leading-tight text-white shadow-md shadow-[#003b31]/15 transition hover:bg-[#075344] focus:outline-none focus:ring-2 focus:ring-[#0b3b31] focus:ring-offset-2">
                                <svg class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 11.5a8.4 8.4 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.4 8.4 0 0 1-3.8-.9L3 21l1.9-5.7a8.4 8.4 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.4 8.4 0 0 1 3.8-.9h.5a8.5 8.5 0 0 1 8 8v.5Z" />
                                </svg>
                                <span>{{ __('ui.whatsapp_details') }}</span>
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
