<x-guest-layout>
    @section('title', 'Lhena.ma - Créer un compte')

    <div class="mx-auto w-full max-w-lg">
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="mb-5 flex items-start justify-between gap-3">
            <div>
                <h1 class="text-2xl font-semibold tracking-tight text-[#171b18]">
                    {{ __('Créer un compte') }}
                </h1>
                <p class="mt-1 text-xs leading-5 text-[#85837f]">
                    Renseignez vos coordonnées pour rejoindre Lhena.ma
                </p>
            </div>
            <a href="{{ route('login') }}" class="mt-1 shrink-0 text-right text-[10px] font-medium uppercase tracking-wide text-[#686660] transition hover:text-[#8b4d19]">
                <span aria-hidden="true">‹</span> Nouveau<br>membre
            </a>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-3.5" x-data="{ showPassword: false, showConfirmation: false }">
            @csrf

            <div>
                <label for="name" class="block text-[10px] font-medium text-[#686660]">
                    {{ __('Nom complet') }}
                </label>
                <div class="relative mt-1">
                    <svg aria-hidden="true" class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-[#777d85]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <circle cx="9" cy="8" r="3.5" stroke-width="1.6" />
                        <path d="M2.5 20v-1.2A5.8 5.8 0 0 1 8.3 13h1.4a5.8 5.8 0 0 1 5.8 5.8V20h-13ZM16 4.8a3.5 3.5 0 0 1 0 6.4M18 13.5a5 5 0 0 1 3.5 4.8V20" stroke-width="1.6" stroke-linecap="round" />
                    </svg>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus autocomplete="name"
                        placeholder="ex. Youssef Bennani"
                        class="block w-full rounded-lg border border-[#d6d7da] bg-white py-2.5 pl-10 pr-3 text-xs text-[#292b29] placeholder:text-[#858b94] focus:border-[#a16e37] focus:outline-none focus:ring-2 focus:ring-[#a16e37]/20">
                </div>
                <x-input-error :messages="$errors->get('name')" class="mt-1" />
            </div>

            <div>
                <label for="email" class="block text-[10px] font-medium text-[#686660]">
                    {{ __('Adresse e-mail') }}
                </label>
                <div class="relative mt-1">
                    <svg aria-hidden="true" class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-[#777d85]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <rect x="3.5" y="5.5" width="17" height="13" rx="2" stroke-width="1.6" />
                        <path d="m4.5 7 7.5 6 7.5-6" stroke-width="1.6" />
                    </svg>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="username"
                        placeholder="nom@exemple.ma"
                        class="block w-full rounded-lg border border-[#d6d7da] bg-white py-2.5 pl-10 pr-3 text-xs text-[#292b29] placeholder:text-[#858b94] focus:border-[#a16e37] focus:outline-none focus:ring-2 focus:ring-[#a16e37]/20">
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <div class="grid gap-3 sm:grid-cols-2">
                <div>
                    <label for="password" class="block text-[10px] font-medium text-[#686660]">
                        {{ __('Mot de passe') }}
                    </label>
                    <div class="relative mt-1">
                        <svg aria-hidden="true" class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-[#777d85]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <rect x="4" y="10" width="16" height="11" rx="2" stroke-width="1.6" />
                            <path d="M8 10V7a4 4 0 1 1 8 0v3M12 14v3" stroke-width="1.6" stroke-linecap="round" />
                        </svg>
                        <input id="password" name="password" :type="showPassword ? 'text' : 'password'" required autocomplete="new-password"
                            placeholder="••••••••"
                            class="block w-full rounded-lg border border-[#d6d7da] bg-white py-2.5 pl-10 pr-10 text-xs text-[#292b29] placeholder:text-[#858b94] focus:border-[#a16e37] focus:outline-none focus:ring-2 focus:ring-[#a16e37]/20">
                        <button type="button" @click="showPassword = !showPassword" :aria-label="showPassword ? 'Masquer le mot de passe' : 'Afficher le mot de passe'"
                            class="absolute right-2.5 top-1/2 -translate-y-1/2 text-[#777d85] hover:text-[#333] focus:outline-none focus:ring-2 focus:ring-[#a16e37]/30">
                            <svg aria-hidden="true" x-show="!showPassword" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M2.5 12s3.4-6 9.5-6 9.5 6 9.5 6-3.4 6-9.5 6-9.5-6-9.5-6Z" stroke-width="1.6" />
                                <circle cx="12" cy="12" r="2.5" stroke-width="1.6" />
                            </svg>
                            <svg aria-hidden="true" x-show="showPassword" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="m3 3 18 18M10.6 6.2A10.7 10.7 0 0 1 12 6c6.1 0 9.5 6 9.5 6a16 16 0 0 1-3.1 3.6M6.2 6.8C3.8 8.3 2.5 12 2.5 12s3.4 6 9.5 6c1.3 0 2.5-.3 3.5-.8" stroke-width="1.6" stroke-linecap="round" />
                            </svg>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
                </div>

                <div>
                    <label for="password_confirmation" class="block text-[10px] font-medium text-[#686660]">
                        {{ __('Confirmer') }}
                    </label>
                    <div class="relative mt-1">
                        <svg aria-hidden="true" class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-[#777d85]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M20 11a8 8 0 1 0 1 4M20 4v7h-7" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M8 12.5 11 15l5-5" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <input id="password_confirmation" name="password_confirmation" :type="showConfirmation ? 'text' : 'password'" required autocomplete="new-password"
                            placeholder="••••••••"
                            class="block w-full rounded-lg border border-[#d6d7da] bg-white py-2.5 pl-10 pr-10 text-xs text-[#292b29] placeholder:text-[#858b94] focus:border-[#a16e37] focus:outline-none focus:ring-2 focus:ring-[#a16e37]/20">
                        <button type="button" @click="showConfirmation = !showConfirmation" :aria-label="showConfirmation ? 'Masquer la confirmation' : 'Afficher la confirmation'"
                            class="absolute right-2.5 top-1/2 -translate-y-1/2 text-[#777d85] hover:text-[#333] focus:outline-none focus:ring-2 focus:ring-[#a16e37]/30">
                            <svg aria-hidden="true" x-show="!showConfirmation" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M2.5 12s3.4-6 9.5-6 9.5 6 9.5 6-3.4 6-9.5 6-9.5-6-9.5-6Z" stroke-width="1.6" />
                                <circle cx="12" cy="12" r="2.5" stroke-width="1.6" />
                            </svg>
                            <svg aria-hidden="true" x-show="showConfirmation" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="m3 3 18 18M10.6 6.2A10.7 10.7 0 0 1 12 6c6.1 0 9.5 6 9.5 6a16 16 0 0 1-3.1 3.6M6.2 6.8C3.8 8.3 2.5 12 2.5 12s3.4 6 9.5 6c1.3 0 2.5-.3 3.5-.8" stroke-width="1.6" stroke-linecap="round" />
                            </svg>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                </div>
            </div>

            <div class="pt-1">
                <div class="flex items-start gap-2">
                    <input id="terms" name="terms" type="checkbox" required
                        class="mt-0.5 h-4 w-4 shrink-0 rounded border-[#c9c8c5] text-[#9d6b36] focus:ring-[#9d6b36]/30">
                    <label for="terms" class="text-[11px] leading-5 text-[#67645f]">
                        J'accepte les
                        <a href="{{ route('legal.cgu') }}" class="font-medium text-[#8b4d19] underline underline-offset-2 hover:text-[#62340f]">Conditions générales d’utilisation</a>
                        et reconnais avoir pris connaissance de la
                        <a href="{{ route('legal.privacy') }}" class="font-medium text-[#8b4d19] underline underline-offset-2 hover:text-[#62340f]">Politique de confidentialité</a>
                        <span class="text-red-600">*</span>
                    </label>
                </div>
                @error('terms')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="flex w-full items-center justify-center gap-2 rounded-lg bg-[#a16e37] px-5 py-3 text-xs font-semibold uppercase tracking-wide text-white shadow-[0_6px_12px_rgba(114,73,32,0.2)] transition hover:bg-[#8e5e2e] focus:outline-none focus:ring-2 focus:ring-[#a16e37] focus:ring-offset-2">
                {{ __('S’inscrire') }}
                <span aria-hidden="true">→</span>
            </button>

            <div class="flex items-center gap-3 text-[10px] uppercase tracking-wide text-[#a29e99]">
                <span class="h-px flex-1 bg-[#e8e5e2]"></span>
                <span>Ou continuer avec</span>
                <span class="h-px flex-1 bg-[#e8e5e2]"></span>
            </div>

            <a href="{{ route('google.redirect') }}"
                class="flex w-full items-center justify-center gap-2 rounded-lg border border-[#e7e5e2] bg-white px-4 py-2.5 text-xs font-medium text-[#333533] transition hover:bg-[#faf9f8] focus:outline-none focus:ring-2 focus:ring-[#a16e37]/30">
                <img src="https://www.svgrepo.com/show/355037/google.svg" alt="" class="h-4 w-4">
                <span>Continuer avec Google</span>
            </a>

            <p class="pt-1 text-center text-xs text-[#817d78]">
                {{ __('Déjà un compte ?') }}
                <a href="{{ route('login') }}" class="ml-1 font-medium text-[#8b4d19] transition hover:text-[#62340f]">
                    {{ __('Se connecter') }}
                </a>
            </p>
        </form>
    </div>
</x-guest-layout>
