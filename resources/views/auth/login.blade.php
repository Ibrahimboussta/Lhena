<x-guest-layout>
    @section('title', 'Sorvarent - Se connecter')

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5" x-data="{ showPassword: false }">
        @csrf

        <div class="flex items-start justify-between gap-3">
            <div>
                <h1 class="text-2xl font-semibold tracking-tight text-[#171b18] sm:text-3xl">
                    {{ __('ui.login') }}
                </h1>
                <p class="mt-1 text-sm leading-6 text-[#85837f]">
                    {{ __('ui.login_intro') }}
                </p>
            </div>
            <span class="mt-1 shrink-0 rounded-full border border-[#f1dfca] bg-[#fbf5ee] px-3 py-1 text-[11px] font-medium text-[#985b25]">
                {{ __('ui.client_space') }}
            </span>
        </div>

        <div>
            <label for="email" class="block text-[10px] font-semibold uppercase tracking-wide text-[#272a27]">
                {{ __('ui.email') }}
            </label>
            <div class="relative mt-2">
                <svg aria-hidden="true" class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-[#a6a39f]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <rect x="3.5" y="5.5" width="17" height="13" rx="2" stroke-width="1.6" />
                    <path d="m4.5 7 7.5 6 7.5-6" stroke-width="1.6" />
                </svg>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                    placeholder="nom@exemple.ma"
                    class="block w-full rounded-xl border border-[#e7e5e2] bg-[#faf9f8] py-3 pl-10 pr-4 text-sm text-[#292b29] placeholder:text-[#aaa6a2] focus:border-[#a16e37] focus:outline-none focus:ring-2 focus:ring-[#a16e37]/20">
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <label for="password" class="block text-[10px] font-semibold uppercase tracking-wide text-[#272a27]">
                {{ __('ui.password') }}
            </label>
            <div class="relative mt-2">
                <svg aria-hidden="true" class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-[#a6a39f]" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M7 10V7a5 5 0 0 1 10 0v3h1.25A1.75 1.75 0 0 1 20 11.75v8.5A1.75 1.75 0 0 1 18.25 22h-12A1.75 1.75 0 0 1 4.5 20.25v-8.5A1.75 1.75 0 0 1 6.25 10H7Zm2 0h6V7a3 3 0 0 0-6 0v3Z" transform="translate(0 -1)" />
                </svg>
                <input id="password" name="password" required autocomplete="current-password" :type="showPassword ? 'text' : 'password'"
                    placeholder="••••••••••••"
                    class="block w-full rounded-xl border border-[#e7e5e2] bg-[#faf9f8] py-3 pl-10 pr-11 text-sm text-[#292b29] placeholder:text-[#aaa6a2] focus:border-[#a16e37] focus:outline-none focus:ring-2 focus:ring-[#a16e37]/20">
                <button type="button" @click="showPassword = !showPassword" :aria-label="showPassword ? @js(__('ui.hide_password')) : @js(__('ui.show_password'))"
                    class="absolute right-3 top-1/2 -translate-y-1/2 rounded p-1 text-[#918d88] transition hover:text-[#373a37] focus:outline-none focus:ring-2 focus:ring-[#a16e37]/30">
                    <svg x-show="!showPassword" aria-hidden="true" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M2.5 12s3.4-6 9.5-6 9.5 6 9.5 6-3.4 6-9.5 6-9.5-6-9.5-6Z" stroke-width="1.6" />
                        <circle cx="12" cy="12" r="2.5" stroke-width="1.6" />
                    </svg>
                    <svg x-show="showPassword" aria-hidden="true" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="m3 3 18 18M10.6 6.2A10.7 10.7 0 0 1 12 6c6.1 0 9.5 6 9.5 6a16 16 0 0 1-3.1 3.6M6.2 6.8C3.8 8.3 2.5 12 2.5 12s3.4 6 9.5 6c1.3 0 2.5-.3 3.5-.8" stroke-width="1.6" stroke-linecap="round" />
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between gap-3 text-xs">
            <label for="remember_me" class="flex cursor-pointer items-center gap-2 text-[#67645f]">
                <input id="remember_me" name="remember" type="checkbox" value="1"
                    class="h-4 w-4 rounded border-[#d9d6d2] text-[#9d6b36] focus:ring-[#9d6b36]/30">
                <span>{{ __('ui.remember_me') }}</span>
            </label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="font-medium text-[#8b4d19] transition hover:text-[#62340f]">
                    {{ __('ui.forgot_password') }}
                </a>
            @endif
        </div>

        <button type="submit"
            class="flex w-full items-center justify-center gap-2 rounded-xl bg-[#a16e37] px-5 py-3 text-xs font-semibold uppercase tracking-[0.08em] text-white shadow-[0_6px_12px_rgba(114,73,32,0.2)] transition hover:bg-[#8e5e2e] focus:outline-none focus:ring-2 focus:ring-[#a16e37] focus:ring-offset-2">
            {{ __('ui.login') }}
            <span aria-hidden="true">→</span>
        </button>

        <div class="flex items-center gap-3 text-[10px] uppercase tracking-wide text-[#a29e99]">
            <span class="h-px flex-1 bg-[#e8e5e2]"></span>
            <span>{{ __('ui.continue_with') }}</span>
            <span class="h-px flex-1 bg-[#e8e5e2]"></span>
        </div>

        <a href="{{ route('google.redirect') }}"
            class="flex w-full items-center justify-center gap-3 rounded-xl border border-[#e7e5e2] bg-white px-4 py-3 text-xs font-medium text-[#333533] transition hover:bg-[#faf9f8] focus:outline-none focus:ring-2 focus:ring-[#a16e37]/30">
            <img src="https://www.svgrepo.com/show/355037/google.svg" alt="" class="h-4 w-4">
            <span>{{ __('ui.continue_google') }}</span>
        </a>

        @if (Route::has('register'))
            <p class="pt-1 text-center text-xs text-[#817d78]">
                {{ __('ui.no_account') }}
                <a href="{{ route('register') }}" class="ml-1 font-medium text-[#8b4d19] transition hover:text-[#62340f]">
                    {{ __('ui.register') }}
                </a>
            </p>
        @endif
    </form>
</x-guest-layout>
