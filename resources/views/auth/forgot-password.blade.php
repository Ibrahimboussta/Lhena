<x-guest-layout>
    <div class="max-w-md mx-auto p-6 bg-white dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700 space-y-6">
        
        <!-- Title -->
        <div>
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                {{ __('Mot de passe oublié ?') }}
            </h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                {{ __('Pas de problème. Indiquez simplement votre adresse e-mail et nous vous enverrons un lien pour réinitialiser votre mot de passe.') }}
            </p>
        </div>

        <!-- Statut de la session -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Form -->
        <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
            @csrf

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
                    required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Submit -->
            <div class="flex items-center justify-center pt-2">
                <x-primary-button
                    class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg 
                           transition-all duration-300 ease-in-out focus:outline-none 
                           focus:ring-2 focus:ring-green-400 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
                    {{ __('Envoyer le lien de réinitialisation') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
