<x-guest-layout>
    @section('title', 'SorvaRent - Mot de passe oublié')

    <div class="mx-auto w-full max-w-md space-y-6">
        <x-auth-session-status :status="session('status')" />

        <div>
            <h1 class="text-2xl font-semibold tracking-tight text-[#171b18] sm:text-3xl">
                {{ __('ui.forgot_password') }}
            </h1>
            <p class="mt-2 text-sm leading-6 text-[#85837f]">
                {{ __('ui.forgot_password_intro') }}
            </p>
        </div>

        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
            @csrf

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

            <button type="submit"
                class="flex w-full items-center justify-center gap-2 rounded-xl bg-[#a16e37] px-5 py-3 text-xs font-semibold uppercase tracking-[0.08em] text-white shadow-[0_6px_12px_rgba(114,73,32,0.2)] transition hover:bg-[#8e5e2e] focus:outline-none focus:ring-2 focus:ring-[#a16e37] focus:ring-offset-2">
                {{ __('ui.send_reset_link') }}
                <span aria-hidden="true">→</span>
            </button>
        </form>

        <p class="text-center text-xs text-[#817d78]">
            {{ __('ui.remembered_password') }}
            <a href="{{ route('login') }}" class="ml-1 font-medium text-[#8b4d19] transition hover:text-[#62340f]">
                {{ __('ui.login') }}
            </a>
        </p>
    </div>
</x-guest-layout>
