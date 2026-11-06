<section class="bg-white px-5 py-16 sm:px-8 lg:px-10 lg:py-20">
    <div class="mx-auto max-w-7xl">
        <div class="mx-auto max-w-2xl text-center">
            <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-[#90764b]">Un parcours simple</p>
            <h2 class="mt-3 text-3xl font-semibold tracking-tight text-[#242923] sm:text-4xl">Du premier regard à votre nouveau chez-vous</h2>
            <p class="mt-4 text-sm leading-6 text-[#68736d] sm:text-base">Nous vous accompagnons à chaque étape de votre projet immobilier.</p>
        </div>

        <div class="mt-10 grid gap-5 md:grid-cols-3">
            @foreach ([
                ['number' => '01', 'title' => 'Explorez', 'text' => 'Parcourez les biens et utilisez les filtres pour préciser votre recherche.', 'icon' => 'M21 21l-4.35-4.35m0 0A7.5 7.5 0 1 0 6.05 6.05a7.5 7.5 0 0 0 10.6 10.6Z'],
                ['number' => '02', 'title' => 'Échangez', 'text' => 'Contactez-nous pour obtenir des informations et organiser la suite.', 'icon' => 'M21 11.5a8.4 8.4 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.4 8.4 0 0 1-3.8-.9L3 21l1.9-5.7a8.4 8.4 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.4 8.4 0 0 1 3.8-.9h.5a8.5 8.5 0 0 1 8 8v.5Z'],
                ['number' => '03', 'title' => 'Concrétisez', 'text' => 'Avancez à votre rythme vers le bien qui correspond à vos envies.', 'icon' => 'M9 12l2 2 4-4m5 2a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z'],
            ] as $step)
                <div class="rounded-[1.5rem] border border-[#e7ece8] bg-[#f7f9f7] p-6 sm:p-7">
                    <div class="flex items-center justify-between">
                        <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#e6eee8] text-[#0b3b31]">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $step['icon'] }}" />
                            </svg>
                        </span>
                        <span class="text-sm font-semibold tracking-[0.14em] text-[#b4a17d]">{{ $step['number'] }}</span>
                    </div>
                    <h3 class="mt-6 text-lg font-semibold text-[#28332c]">{{ $step['title'] }}</h3>
                    <p class="mt-2 text-sm leading-6 text-[#68736d]">{{ $step['text'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
