<footer class="border-t border-[#e7ece8] bg-white">
    <div class="mx-auto max-w-7xl px-5 py-12 sm:px-8 lg:px-10 lg:py-16">
        <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-[1.4fr_0.8fr_0.8fr_1.2fr]">
            <div>
                <a href="/" class="inline-flex items-center gap-3">
                    <img class="h-10 w-auto" src="{{ asset('images/newlogo.png') }}" alt="{{ __('ui.sorvarent_logo') }}">
                </a>
                <p class="mt-4 max-w-sm text-sm leading-6 text-[#68736d]">
                    {{ __('ui.footer_intro') }}
                </p>
            </div>

            <div>
                <h4 class="text-xs font-semibold uppercase tracking-[0.14em] text-[#34443c]">{{ __('ui.discover') }}</h4>
                <ul class="mt-4 space-y-3 text-sm text-[#68736d]">
                    <li><a class="transition hover:text-[#0b3b31]" href="/">{{ __('ui.home') }}</a></li>
                    <li><a class="transition hover:text-[#0b3b31]" href="{{ route('proprites') }}">{{ __('ui.all_properties') }}</a></li>
                    <li><a class="transition hover:text-[#0b3b31]" href="{{ route('a-propos') }}">{{ __('ui.about') }}</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-xs font-semibold uppercase tracking-[0.14em] text-[#34443c]">{{ __('ui.need_help') }}</h4>
                <ul class="mt-4 space-y-3 text-sm text-[#68736d]">
                    <li><a class="transition hover:text-[#0b3b31]" href="{{ route('contact') }}">{{ __('ui.contact_us') }}</a></li>
                    <li><a class="transition hover:text-[#0b3b31]" href="{{ route('publish') }}">{{ __('ui.publish_listing') }}</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-xs font-semibold uppercase tracking-[0.14em] text-[#34443c]">{{ __('ui.newsletter') }}</h4>
                <p class="mt-4 text-sm leading-6 text-[#68736d]">{{ __('ui.newsletter_text') }}</p>
                <form action="{{ route('mailing.store') }}" method="POST" class="mt-4 flex flex-col gap-2 sm:flex-row">
                    @csrf
                    <input type="email" name="email" required autocomplete="email" class="min-w-0 flex-1 rounded-full border border-[#dce4df] bg-[#f7f9f7] px-4 py-2.5 text-sm focus:border-[#0b3b31] focus:ring-[#0b3b31]" placeholder="{{ __('ui.email_address') }}">
                    <button type="submit" class="rounded-full bg-[#0b3b31] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#0b4b3e]">{{ __('ui.subscribe') }}</button>
                </form>
            </div>
        </div>

        <div class="mt-10 flex flex-col gap-3 border-t border-[#e7ece8] pt-5 text-xs text-[#7b857f] sm:flex-row sm:items-center sm:justify-between">
            © {{ now()->year }} SorvaRent. {{ __('ui.all_rights_reserved') }}
            <nav aria-label="{{ __('ui.legal_information') }}" class="flex flex-wrap gap-x-5 gap-y-2">
                <a class="transition hover:text-[#0b3b31]" href="{{ route('legal.cgu') }}">{{ __('ui.terms') }}</a>
                <a class="transition hover:text-[#0b3b31]" href="{{ route('legal.privacy') }}">{{ __('ui.privacy') }}</a>
            </nav>
        </div>
    </div>
</footer>
