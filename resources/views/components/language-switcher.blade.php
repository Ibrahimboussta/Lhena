<div class="relative" x-data="{ open: false }" @keydown.escape.window="open = false">
    <button
        type="button"
        @click="open = !open"
        @click.away="open = false"
        :aria-expanded="open.toString()"
        aria-haspopup="true"
        aria-label="{{ __('ui.choose_language') }}"
        class="inline-flex min-h-10 items-center gap-2 rounded-full border border-current/20 px-3 py-2 text-xs font-semibold transition hover:bg-black/5 focus:outline-none focus-visible:ring-2 focus-visible:ring-[#b49a70] focus-visible:ring-offset-2"
    >
        <svg aria-hidden="true" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
            <circle cx="12" cy="12" r="9" />
            <path stroke-linecap="round" d="M3 12h18M12 3a15 15 0 0 1 0 18M12 3a15 15 0 0 0 0 18" />
        </svg>
        <span>{{ strtoupper(app()->getLocale()) }}</span>
        <svg aria-hidden="true" class="h-3 w-3 transition-transform" :class="{ 'rotate-180': open }" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 11.168l3.71-3.938a.75.75 0 1 1 1.09 1.03l-4.25 4.5a.75.75 0 0 1-1.09 0l-4.25-4.5a.75.75 0 0 1 .02-1.06Z" clip-rule="evenodd" />
        </svg>
    </button>

    <div
        x-cloak
        x-show="open"
        x-transition.origin.top
        class="absolute end-0 top-full z-[70] mt-2 w-48 overflow-hidden rounded-xl border border-[#e8e2d7] bg-white p-1 text-[#252b29] shadow-xl"
        role="menu"
        aria-label="{{ __('ui.choose_language') }}"
    >
        @foreach (['fr' => ['Français', 'FR'], 'ar' => ['العربية', 'AR']] as $locale => [$language, $short])
            <form method="POST" action="{{ route('locale.switch') }}" role="none">
                @csrf
                <input type="hidden" name="locale" value="{{ $locale }}">
                <input type="hidden" name="redirect_to" value="{{ request()->getRequestUri() }}">
                <button
                    type="submit"
                    role="menuitemradio"
                    aria-checked="{{ app()->getLocale() === $locale ? 'true' : 'false' }}"
                    class="flex w-full items-center justify-between rounded-lg px-3 py-2.5 text-start text-sm transition hover:bg-[#f7f4ed] focus:outline-none focus-visible:ring-2 focus-visible:ring-inset focus-visible:ring-[#173d35] {{ app()->getLocale() === $locale ? 'bg-[#f7f4ed] font-semibold text-[#173d35]' : 'text-[#4d5752]' }}"
                >
                    <span>{{ $language }}</span>
                    <span class="text-xs text-[#8a8f8c]">{{ $short }}</span>
                </button>
            </form>
        @endforeach
    </div>
</div>
