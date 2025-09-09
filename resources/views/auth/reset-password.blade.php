<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}" class="space-y-6 max-w-md mx-auto p-6 bg-white dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Adresse e-mail')" class="text-gray-700 dark:text-gray-300 font-semibold" />
            <x-text-input id="email"
                class="block mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 
                       bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white 
                       focus:ring-2 focus:ring-green-500 focus:border-green-500"
                type="email"
                name="email"
                :value="old('email', $request->email)"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Nouveau mot de passe')" class="text-gray-700 dark:text-gray-300 font-semibold" />
            <x-text-input id="password"
                class="block mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 
                       bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white 
                       focus:ring-2 focus:ring-green-500 focus:border-green-500"
                type="password"
                name="password"
                required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
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

        <!-- Submit -->
        <div class="flex items-center justify-center pt-4">
            <x-primary-button
                class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg 
                       transition-all duration-300 ease-in-out focus:outline-none 
                       focus:ring-2 focus:ring-green-400 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
                {{ __('Réinitialiser le mot de passe') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
