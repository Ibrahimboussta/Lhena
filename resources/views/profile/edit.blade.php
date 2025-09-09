<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-green-700 leading-tight">
            {{ __('Mon Profil') }}
        </h2>
        <p class="mt-1 text-sm text-green-600">
            Gérez vos informations personnelles, la sécurité de votre compte et vos préférences.
        </p>
    </x-slot>

    <div class="py-10 bg-green-50 min-h-screen">
        <div class="max-w-5xl mx-auto px-4 space-y-8">

            <!-- Update Profile Info -->
            <div class="bg-white border border-green-200 rounded-xl p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-green-700 mb-4">
                    {{ __('Informations personnelles') }}
                </h3>
                <p class="text-sm text-green-600 mb-6">
                    Mettez à jour vos informations de profil et votre adresse e-mail.
                </p>
                <div>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="bg-white border border-green-200 rounded-xl p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-green-700 mb-4">
                    {{ __('Sécurité') }}
                </h3>
                <p class="text-sm text-green-600 mb-6">
                    Changez votre mot de passe pour protéger votre compte.
                </p>
                <div>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account -->
            <div class="bg-white border border-red-200 rounded-xl p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-red-600 mb-4">
                    {{ __('Supprimer le compte') }}
                </h3>
                <p class="text-sm text-red-500 mb-6">
                    Une fois votre compte supprimé, toutes vos données seront définitivement effacées. Cette action est irréversible.
                </p>
                <div>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
