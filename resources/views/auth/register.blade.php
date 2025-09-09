<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Nom -->
        <div>
            <x-input-label for="name" :value="__('Nom')" class="text-gray-700 dark:text-gray-300 font-semibold" />
            <x-text-input id="name"
                class="block mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700
                       bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-white
                       focus:ring-2 focus:ring-green-500 focus:border-green-500"
                type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Adresse e-mail -->
        <div>
            <x-input-label for="email" :value="__('Adresse e-mail')" class="text-gray-700 dark:text-gray-300 font-semibold" />
            <x-text-input id="email"
                class="block mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700
                       bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-white
                       focus:ring-2 focus:ring-green-500 focus:border-green-500"
                type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Mot de passe -->
        <div>
            <x-input-label for="password" :value="__('Mot de passe')" class="text-gray-700 dark:text-gray-300 font-semibold" />
            <x-text-input id="password"
                class="block mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700
                       bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-white
                       focus:ring-2 focus:ring-green-500 focus:border-green-500"
                type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmer le mot de passe -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')"
                class="text-gray-700 dark:text-gray-300 font-semibold" />
            <x-text-input id="password_confirmation"
                class="block mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700
                       bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-white
                       focus:ring-2 focus:ring-green-500 focus:border-green-500"
                type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Footer -->
        <div class="flex flex-col items-center justify-center space-y-3 pt-4">
            <a href="{{ route('login') }}"
                class="text-sm text-green-600 hover:text-green-700 dark:text-green-400 dark:hover:text-green-300">
                {{ __('Se connecter') }}
            </a>


            <a href="{{ route('google.redirect') }}"
                class="px-6 py-2 bg-red-500 hover:bg-red-600 text-white text-base font-semibold rounded-lg shadow-md shadow-red-200
          transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg hover:shadow-red-300
          focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 dark:focus:ring-offset-gray-900 flex justify-center items-center gap-2">
                Continuer avec Google
            </a>
            <!-- Submit Button -->
            <x-primary-button
                class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-md
                     transition-all duration-300 ease-in-out transform hover:scale-105
                       hover:shadow-lg hover:shadow-green-300 focus:outline-none focus:ring-2
                       focus:ring-green-400 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
                {{ __('S\'inscrire') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
