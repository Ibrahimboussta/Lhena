{{-- !herosection --}}
{{ __('messages.welcome') }}

<section class="hero-wrapper">
    <!-- LCP IMAGE -->
    <img src="{{ asset('images/logo3-png.webp') }}" alt="Lhena Hero Image" class="hero-img" loading="eager"
        fetchpriority="high" width="1200" height="800">

    <!-- CONTENT -->
    <div class="hero-content max-w-7xl mx-auto text-center px-4">
        <h1
            class="text-2xl sm:text-3xl md:text-5xl font-bold text-white text-center leading-snug max-w-[90%] sm:max-w-[80%] md:max-w-[55%] backdrop-blur-sm bg-gray/50 p-4 sm:p-6 rounded-lg mx-auto">
            Simplifiez votre recherche immobilière au Maroc avec notre plateforme fiable.
        </h1>

        <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 mt-2 md:mt-4">
            <a href="{{ route('proprites') }}"
                class="inline-flex items-center justify-center bg-green-600 text-white px-6 py-2.5 text-sm font-medium rounded-lg hover:bg-green-700 transition-all duration-200">
                Explorez nos offres
            </a>
            <a href="{{ route('contact') }}"
                class="inline-flex items-center justify-center bg-white text-black px-6 py-2.5 text-sm font-medium border border-gray-200 rounded-lg hover:bg-gray-50 transition-all duration-200">
                Contactez-nous
            </a>
        </div>
    </div>
</section>

</div>
</div>
</div>
</section>


</section>

<script src="//unpkg.com/alpinejs" defer></script>

{{-- !endherosection --}}
