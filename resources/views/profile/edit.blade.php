<x-app-layout class="dark:bg-gray-800">
@section('title', 'Lhena.ma - Profile')
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight dark:text-white">
            {{ __('Mon Profil') }}
        </h2>
        <p class="mt-1 text-sm text-gray-900 dark:text-white">
            Gérez vos informations personnelles, la sécurité de votre compte et vos préférences.
        </p>
    </x-slot>

    <div class="py-10 bg-green-50 min-h-screen dark:bg-gray-800">
        <div class="max-w-5xl mx-auto px-4 space-y-8 dark:text-white dark:bg-gray-800">

            <!-- Update Profile Info -->
            <div class="bg-white border border-green-200 rounded-xl p-6 shadow-sm dark:bg-gray-800">
                <h3 class="text-lg font-semibold text-green-700 mb-4 dark:text-green-400">
                    {{ __('Informations personnelles') }}
                </h3>
                <p class="text-sm text-green-600 mb-6 dark:text-white">
                    Mettez à jour vos informations de profil et votre adresse e-mail.
                </p>
                <div>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="bg-white border border-green-200 rounded-xl p-6 shadow-sm dark:bg-gray-800">
                <h3 class="text-lg font-semibold text-green-700 mb-4 dark:text-green-400">
                    {{ __('Sécurité') }}
                </h3>
                <p class="text-sm text-green-600 mb-6 dark:text-white">
                    Changez votre mot de passe pour protéger votre compte.
                </p>
                <div>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account -->
            <div class="bg-white border border-red-200 rounded-xl p-6 shadow-sm dark:bg-gray-800">
                <h3 class="text-lg font-semibold text-red-600 mb-4 dark:text-red-400">
                    {{ __('Supprimer le compte') }}
                </h3>
                <p class="text-sm text-red-500 mb-6 dark:text-red-400">
                    Une fois votre compte supprimé, toutes vos données seront définitivement effacées. Cette action est irréversible.
                </p>
                <div>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
