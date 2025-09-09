<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" 
      class="max-w-md mx-auto bg-white d space-y-6">
    @csrf

    <!-- Title -->
    <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-white">
        {{ __('Se connecter') }}
    </h2>

    <!-- Email -->
    <div>
        <x-input-label for="email" :value="__('Email')" class="text-gray-700 dark:text-gray-300 font-semibold" />
        <x-text-input id="email"
            class="block mt-1 w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg 
                   bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white 
                   focus:ring-2 focus:ring-green-500 focus:border-green-500"
            type="email"
            name="email"
            :value="old('email')"
            required
            autofocus
            autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div>
        <x-input-label for="password" :value="__('Mot de passe')" class="text-gray-700 dark:text-gray-300 font-semibold" />
        <x-text-input id="password"
            class="block mt-1 w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg 
                   bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white 
                   focus:ring-2 focus:ring-green-500 focus:border-green-500"
            type="password"
            name="password"
            required
            autocomplete="current-password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Remember Me & Forgot Password -->
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

    <!-- Submit Button -->
    <div class="flex justify-center">
        <x-primary-button
            class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white text-base font-semibold rounded-lg 
                   transition-all duration-300 ease-in-out transform hover:scale-105
                   focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
            {{ __('Se connecter') }}
        </x-primary-button>
    </div>

    <!-- Divider -->
    <div class="flex items-center justify-center">
        <span class="w-1/4 border-t border-gray-300 dark:border-gray-600"></span>
        <span class="mx-3 text-sm text-gray-500 dark:text-gray-400">ou</span>
        <span class="w-1/4 border-t border-gray-300 dark:border-gray-600"></span>
    </div>

    <!-- Google Login -->
    <div class="flex justify-center">
        <a href="{{ route('google.redirect') }}"
           class="p-3 bg-white border border-gray-200 rounded-full 
                  hover:bg-gray-100 
                  transition-all duration-300 ease-in-out transform hover:scale-110
                  focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 
                  flex items-center justify-center">
            <img src="https://www.svgrepo.com/show/355037/google.svg" 
                 alt="Google Icon" 
                 class="w-6 h-6"/>
        </a>
    </div>

</form>

</x-guest-layout>
