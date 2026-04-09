<section class="bg-white border border-green-200 rounded-xl p-6 shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <header class="flex items-center gap-2">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
            {{ __('Informations du profil') }}
        </h2>
    </header>

    <p class="mt-1 text-sm text-gray-600 dark:text-white">
        {{ __("Mettez à jour les informations de votre compte et votre adresse e-mail.") }}
    </p>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-5">
        @csrf
        @method('patch')

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nom')" class="text-gray-700 dark:text-white"/>
            <x-text-input id="name" name="name" type="text"
                class="mt-1 block w-full border-green-300 focus:border-green-500 focus:ring-green-500 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                :value="old('name', $user->name)" required autofocus autocomplete="name"/>
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Adresse e-mail')" class="text-gray-700 dark:text-white"/>
            <x-text-input id="email" name="email" type="email"
                class="mt-1 block w-full border-green-300 focus:border-green-500 focus:ring-green-500 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                :value="old('email', $user->email)" required autocomplete="username"/>
        </div>

        <!-- Actions -->
        <div class="flex items-center gap-4 pt-2">
            <x-primary-button class="bg-green-600 hover:bg-green-700 focus:ring-green-500 flex items-center gap-2">
                <i data-lucide="save" class="w-4 h-4"></i>
                {{ __('Enregistrer') }}
            </x-primary-button>
        </div>
    </form>
</section>
