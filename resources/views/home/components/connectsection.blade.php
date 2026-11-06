<section class="bg-[#f4f8f5] px-5 py-14 sm:px-8 lg:px-10 lg:py-20">
    <div class="mx-auto grid max-w-7xl overflow-hidden rounded-[2rem] bg-[#073a30] shadow-xl shadow-[#073a30]/10 lg:grid-cols-[1.05fr_0.95fr]">
        <div class="px-7 py-10 sm:px-12 sm:py-14">
            <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-[#e2c48f]">Votre projet immobilier</p>
            <h2 class="mt-3 max-w-xl text-3xl font-semibold leading-tight tracking-tight text-white sm:text-4xl">
                Nous sommes là pour vous aider à trouver votre place.
            </h2>
            <p class="mt-5 max-w-lg text-sm leading-7 text-white/70 sm:text-base">
                Vous avez une question ou souhaitez être accompagné dans votre recherche ? Échangeons sur vos envies et vos critères.
            </p>
            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 rounded-full bg-[#e2c48f] px-6 py-3.5 text-sm font-semibold text-[#26342d] transition hover:bg-[#efd6a9]">
                    Contacter notre équipe
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6" />
                    </svg>
                </a>
                <a href="{{ route('proprites') }}" class="inline-flex items-center justify-center rounded-full border border-white/25 px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-white/10">
                    Explorer les annonces
                </a>
            </div>
        </div>
        <div class="relative hidden min-h-[300px] overflow-hidden lg:block">
            <img src="{{ asset('images/appart1.jpg') }}" alt="Intérieur lumineux d’un appartement" class="absolute inset-0 h-full w-full object-cover opacity-80" loading="lazy">
            <div class="absolute inset-0 bg-gradient-to-r from-[#073a30] via-[#073a30]/30 to-transparent"></div>
            <div class="absolute bottom-8 right-8 rounded-2xl border border-white/20 bg-[#073a30]/70 px-5 py-4 text-white backdrop-blur">
                <p class="text-xs uppercase tracking-wide text-[#e2c48f]">Lhena</p>
                <p class="mt-1 text-sm font-medium">Un nouveau regard sur l’immobilier.</p>
            </div>
        </div>
    </div>
</section>
