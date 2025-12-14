<x-guest-layout>
    <!-- Simple Terms Modal -->
    <div id="termsModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
        <div class="bg-white dark:bg-gray-800 rounded-lg w-full max-w-2xl max-h-[80vh] flex flex-col">
            <!-- Header -->
            <div class="p-4 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Conditions d'utilisation</h3>
                <button onclick="document.getElementById('termsModal').classList.add('hidden')" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                    ×
                </button>
            </div>

            <!-- Content -->
            <div class="p-6 overflow-hidden">
                <div class="space-y-6 text-sm text-gray-600 dark:text-gray-300">
                    <div>
                        <h4 class="font-medium text-gray-900 dark:text-white mb-2">1. Acceptation des conditions générales</h4>
                        <p class="mb-2">En créant un compte sur notre plateforme, vous reconnaissez avoir pris connaissance et accepté sans réserve l'ensemble des présentes conditions générales d'utilisation.</p>
                        <p>Ces conditions s'appliquent à tous les utilisateurs, qu'ils soient propriétaires, locataires ou simples visiteurs de la plateforme.</p>
                    </div>

                    <div>
                        <h4 class="font-medium text-gray-900 dark:text-white mb-2">2. Compte utilisateur</h4>
                        <ul class="list-disc pl-5 space-y-1 mb-2">
                            <li>Vous devez être âgé d'au moins 18 ans pour créer un compte</li>
                            <li>Vous êtes responsable de la confidentialité de vos identifiants de connexion</li>
                            <li>Vous vous engagez à fournir des informations exactes et à jour</li>
                            <li>Toute activité sur votre compte est de votre responsabilité</li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="font-medium text-gray-900 dark:text-white mb-2">3. Publication de biens immobiliers</h4>
                        <p class="mb-2">En tant que propriétaire ou gestionnaire de biens, vous vous engagez à :</p>
                        <ul class="list-disc pl-5 space-y-1 mb-2">
                            <li>Fournir des informations complètes et exactes sur les biens proposés</li>
                            <li>Mettre à jour régulièrement la disponibilité des logements</li>
                            <li>Respecter les lois et réglementations en vigueur</li>
                            <li>Ne pas publier de contenu trompeur ou inexact</li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="font-medium text-gray-900 dark:text-white mb-2">4. Réservations et paiements</h4>
                        <p class="mb-2">Les réservations sont soumises aux conditions suivantes :</p>
                        <ul class="list-disc pl-5 space-y-1 mb-2">
                            <li>Le paiement est sécurisé via notre plateforme</li>
                            <li>Les conditions d'annulation sont définies par chaque propriétaire</li>
                            <li>Les frais de service sont clairement indiqués avant la réservation</li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="font-medium text-gray-900 dark:text-white mb-2">5. Données personnelles</h4>
                        <p>Nous nous engageons à protéger vos données personnelles conformément au RGPD. En utilisant nos services, vous acceptez notre politique de confidentialité concernant le traitement de vos données.</p>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="p-4 border-t border-gray-200 dark:border-gray-700 flex justify-end">
                <button onclick="document.getElementById('termsModal').classList.add('hidden')" class="px-4 py-2 bg-gray-900 text-white rounded hover:bg-gray-800">
                    Fermer
                </button>
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('register') }}" class="max-w-md mx-auto bg-white dark:bg-gray-800 rounded-lg p-6 space-y-4">
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
                type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Adresse e-mail -->
        <div>
            <x-input-label for="email" :value="__('Adresse e-mail')" class="text-gray-700 dark:text-gray-300 font-semibold" />
            <x-text-input id="email"
                class="block mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700
                   bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white
                   focus:ring-2 focus:ring-green-500 focus:border-green-500"
                type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Mot de passe -->
        <div>
            <x-input-label for="password" :value="__('Mot de passe')" class="text-gray-700 dark:text-gray-300 font-semibold" />
            <x-text-input id="password"
                class="block mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700
                   bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white
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
                   bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white
                   focus:ring-2 focus:ring-green-500 focus:border-green-500"
                type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Terms and Conditions -->
        <div class="pt-2">
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="terms"
                           name="terms"
                           type="checkbox"
                           class="w-4 h-4 text-green-600 border-gray-300 rounded"
                           required>
                </div>
                <div class="ml-2 text-sm">
                    <label for="terms" class="text-gray-700 dark:text-gray-300">
                        J'accepte les
                        <button type="button"
                                onclick="document.getElementById('termsModal').classList.remove('hidden')"
                                class="text-green-600 hover:underline">
                            conditions d'utilisation
                        </button>
                        <span class="text-red-500">*</span>
                    </label>
                    @error('terms')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Buttons Row -->
        <div class="flex flex-col md:flex-row items-stretch md:items-center gap-3 pt-6">

    <!-- Submit Button -->
   <x-primary-button
    class="w-full md:flex-1 px-6 py-4 md:py-3
    flex items-center justify-center text-center
    bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg
    transition-all duration-300 ease-in-out focus:outline-none
    focus:ring-2 focus:ring-green-400 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
    {{ __('S\'inscrire') }}
</x-primary-button>


    <!-- Google Signup Button -->
    <a href="{{ route('google.redirect') }}"
       class="w-full md:flex-2 flex items-center justify-center gap-2
       px-4 py-4 md:py-3
       bg-white border border-gray-300 rounded-lg
       hover:bg-gray-100 transition-all duration-300 ease-in-out
       focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2">

        <img src="https://www.svgrepo.com/show/355037/google.svg"
             alt="Google Icon"
             class="w-5 h-5" />

        <span class="text-sm font-medium text-gray-700">
            Connect with Google
        </span>
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


    </form>
</x-guest-layout>
