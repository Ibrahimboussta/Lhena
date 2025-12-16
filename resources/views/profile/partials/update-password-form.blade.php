<section class="bg-white border border-green-200 rounded-xl p-6 shadow-sm">
    <header>
        <h2 class="text-xl font-semibold text-green-700">
            {{ __('Mettre à jour le mot de passe') }}
        </h2>

        <p class="mt-1 text-sm text-green-600">
            {{ __('Assurez-vous d’utiliser un mot de passe long, unique et sécurisé pour protéger votre compte.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-5">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div>
            <x-input-label for="update_password_current_password" :value="__('Mot de passe actuel')" class="text-green-700"/>
            <x-text-input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="mt-1 block w-full border-green-300 focus:border-green-500 focus:ring-green-500 rounded-lg"
                autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <!-- New Password -->
        <div>
            <x-input-label for="update_password_password" :value="__('Nouveau mot de passe')" class="text-green-700"/>
            <x-text-input
                id="update_password_password"
                name="password"
                type="password"
                class="mt-1 block w-full border-green-300 focus:border-green-500 focus:ring-green-500 rounded-lg"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirmer le mot de passe')" class="text-green-700"/>
            <x-text-input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="mt-1 block w-full border-green-300 focus:border-green-500 focus:ring-green-500 rounded-lg"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Actions -->
        <div class="flex items-center gap-4 pt-2">
            <x-primary-button class="bg-green-600 hover:bg-green-700 focus:ring-green-500">
                {{ __('Enregistrer') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2500)"
                    class="text-sm text-green-600 font-medium"
                >
                    {{ __('Mot de passe mis à jour !') }}
                </p>
            @endif
        </div>
    </form>
</section>
