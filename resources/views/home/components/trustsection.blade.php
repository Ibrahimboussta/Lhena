<section class="bg-white px-5 py-8 sm:px-8 lg:px-10">
    <div class="mx-auto grid max-w-7xl grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-4">
        @foreach ([
            ['title' => 'Annonces vérifiées', 'text' => 'Des informations claires sur chaque bien.', 'icon' => 'M9 12l2 2 4-4m5 2a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z'],
            ['title' => 'Sélection de qualité', 'text' => 'Des biens choisis avec attention.', 'icon' => 'm3 10 9-7 9 7M5 9v11h14V9M9 20v-6h6v6'],
            ['title' => 'Conseil personnalisé', 'text' => 'Un accompagnement adapté à votre projet.', 'icon' => 'M12 8v4l3 2m6-2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z'],
            ['title' => 'À votre écoute', 'text' => 'Une équipe disponible pour vous guider.', 'icon' => 'M21 11.5a8.4 8.4 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.4 8.4 0 0 1-3.8-.9L3 21l1.9-5.7a8.4 8.4 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.4 8.4 0 0 1 3.8-.9h.5a8.5 8.5 0 0 1 8 8v.5Z'],
        ] as $benefit)
            <div class="flex items-center gap-4 rounded-2xl bg-[#f1f5f2] px-4 py-5 sm:px-5">
                <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#f5dfb9] text-[#826943]">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $benefit['icon'] }}" />
                    </svg>
                </span>
                <span>
                    <span class="block text-sm font-semibold text-[#303a34]">{{ $benefit['title'] }}</span>
                    <span class="mt-1 block text-xs leading-5 text-[#69756e]">{{ $benefit['text'] }}</span>
                </span>
            </div>
        @endforeach
    </div>
</section>
