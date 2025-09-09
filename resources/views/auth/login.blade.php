<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-gray-700 dark:text-gray-300 font-semibold" />
            <x-text-input id="email"
                class="block mt-1 w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-green-500"
                type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Mot de passe')" class="text-gray-700 dark:text-gray-300 font-semibold" />
            <x-text-input id="password"
                class="block mt-1 w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-green-500"
                type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="flex items-center space-x-2">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 dark:border-gray-700 text-green-600 focus:ring-green-500 dark:focus:ring-green-600">
                <span class="text-sm text-gray-600 dark:text-gray-400">{{ __('Se souvenir de moi') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                    class="text-sm font-medium text-green-600 hover:text-green-700 dark:text-green-400 dark:hover:text-green-300">
                    {{ __('Mot de passe oublié ?') }}
                </a>
            @endif
        </div>

        <!-- Submit -->
        <div>
            <div class="flex justify-center mt-4">
                <x-primary-button
                    class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white text-base font-semibold rounded-lg shadow-md shadow-green-200
               transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg hover:shadow-green-300
               focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
                    {{ __('Se connecter') }}
                </x-primary-button>

                <a href="{{ route('google.redirect') }}"
                    class="px-6 py-2 bg-red-500 hover:bg-red-600 text-white text-base font-semibold rounded-lg shadow-md shadow-red-200
          transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg hover:shadow-red-300
          focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 dark:focus:ring-offset-gray-900 flex justify-center items-center gap-2">
                    Continuer avec Google
                </a>

            </div>

        </div>
    </form>
</x-guest-layout>
