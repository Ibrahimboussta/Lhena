<section class="bg-white px-5 py-16 sm:px-8 lg:px-10 lg:py-24">
    <div class="mx-auto grid max-w-7xl items-center gap-12 lg:grid-cols-2 lg:gap-16">
        <div class="relative">
            <div class="absolute -bottom-5 -left-5 h-2/3 w-2/3 rounded-[2rem] bg-[#f1f5f2]"></div>
            <img class="relative h-[330px] w-full rounded-[2rem] object-cover shadow-xl sm:h-[440px]" src="{{ asset('images/about.png') }}" alt="Une maison contemporaine au Maroc" loading="lazy">
            <div class="absolute bottom-5 right-5 rounded-2xl bg-white/95 px-5 py-4 shadow-lg backdrop-blur sm:bottom-8 sm:right-8">
                <p class="text-xs font-medium uppercase tracking-wide text-[#90764b]">{{ __('ui.in_your_corner') }}</p>
                <p class="mt-1 text-sm font-semibold text-[#28332c]">{{ __('ui.from_click_to_keys') }}</p>
            </div>
        </div>

        <div>
            <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-[#90764b]">{{ __('ui.our_experience') }}</p>
            <h2 class="mt-3 text-3xl font-semibold leading-tight tracking-tight text-[#242923] sm:text-4xl">
                {{ __('ui.project_attention') }}
            </h2>
            <p class="mt-5 text-sm leading-7 text-[#68736d] sm:text-base">
                {{ __('ui.project_support') }}
            </p>

            <div class="mt-8 grid gap-3 sm:grid-cols-2">
                @foreach ([
                    ['title' => __('ui.simple_search'), 'text' => __('ui.simple_search_text')],
                    ['title' => __('ui.selected_properties'), 'text' => __('ui.selected_properties_text')],
                    ['title' => __('ui.property_advice'), 'text' => __('ui.property_advice_text')],
                    ['title' => __('ui.smooth_journey'), 'text' => __('ui.smooth_journey_text')],
                ] as $feature)
                    <div class="rounded-2xl bg-[#f1f5f2] p-4">
                        <div class="flex items-center gap-2 text-sm font-semibold text-[#34443c]">
                            <span class="flex h-7 w-7 items-center justify-center rounded-lg bg-[#f5dfb9] text-[#826943]" aria-hidden="true">✓</span>
                            {{ $feature['title'] }}
                        </div>
                        <p class="mt-2 text-xs leading-5 text-[#68736d]">{{ $feature['text'] }}</p>
                    </div>
                @endforeach
            </div>

            <a href="{{ route('a-propos') }}" class="mt-8 inline-flex items-center gap-2 rounded-full bg-[#0b3b31] px-6 py-3 text-sm font-semibold text-white transition hover:bg-[#0b4b3e]">
                {{ __('ui.learn_more') }}
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6" />
                </svg>
            </a>
        </div>
    </div>
</section>
