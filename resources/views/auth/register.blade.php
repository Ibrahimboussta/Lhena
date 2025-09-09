<x-guest-layout>
<form method="POST" action="{{ route('register') }}" 
      class="max-w-md mx-auto bg-white dark:bg-gray-900  rounded-2xl space-y-6">
    @csrf

    
    <!-- Nom -->
    <div>
        <!-- Title -->
        <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-white">
            {{ __('Créer un compte') }}
        </h2>
        <x-input-label for="name" :value="__('Nom')" class="text-gray-700 dark:text-gray-300 font-semibold" />
        <x-text-input id="name"
            class="block mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 
                   bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white 
                   focus:ring-2 focus:ring-green-500 focus:border-green-500"
            type="text"
            name="name"
            :value="old('name')"
            required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Adresse e-mail -->
    <div>
        <x-input-label for="email" :value="__('Adresse e-mail')" class="text-gray-700 dark:text-gray-300 font-semibold" />
        <x-text-input id="email"
            class="block mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 
                   bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white 
                   focus:ring-2 focus:ring-green-500 focus:border-green-500"
            type="email"
            name="email"
            :value="old('email')"
            required autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Mot de passe -->
    <div>
        <x-input-label for="password" :value="__('Mot de passe')" class="text-gray-700 dark:text-gray-300 font-semibold" />
        <x-text-input id="password"
            class="block mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 
                   bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white 
                   focus:ring-2 focus:ring-green-500 focus:border-green-500"
            type="password"
            name="password"
            required autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirmer le mot de passe -->
    <div>
        <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" class="text-gray-700 dark:text-gray-300 font-semibold" />
        <x-text-input id="password_confirmation"
            class="block mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 
                   bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white 
                   focus:ring-2 focus:ring-green-500 focus:border-green-500"
            type="password"
            name="password_confirmation"
            required autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <!-- Buttons Row -->
<div class="flex items-center justify-around gap-3  pt-2">
    <!-- Submit -->
    <x-primary-button
        class="flex-1 px-6 py-3 w-32 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg 
               transition-all duration-300 ease-in-out focus:outline-none 
               focus:ring-2 focus:ring-green-400 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
        {{ __('S\'inscrire') }}
    </x-primary-button>

    <!-- Google Signup -->
    <a href="{{ route('google.redirect') }}"
       class="flex items-center gap-2 px-4 py-3 bg-white border border-gray-300 rounded-lg 
              hover:bg-gray-100 transition-all duration-300 ease-in-out 
              focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2">
        <img src="https://www.svgrepo.com/show/355037/google.svg" 
             alt="Google Icon" 
             class="w-5 h-5"/>
        <span class="text-sm font-medium text-gray-700">Connect with Google</span>
    </a>
</div>


    <!-- Redirect to Login -->
    <p class="text-sm text-center text-gray-600 dark:text-gray-400 pt-2">
        {{ __('Déjà un compte ?') }}
        <a href="{{ route('login') }}" 
           class="font-medium text-green-600 hover:text-green-700 dark:text-green-400 dark:hover:text-green-300">
            {{ __('Se connecter') }}
        </a>
    </p>
</form>


</x-guest-layout>
