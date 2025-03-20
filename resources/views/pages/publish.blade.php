@extends('layouts.index')
@section('content')
    <section class="px-6 sm:px-16 pt-20">

        <h1 class="text-4xl font-bold pt-8">Publier une annonce</h1>


        <div class="pt-8">
            <div class="container mx-auto  border  border-[#25D366]">
                <div class="bg-white shadow rounded-lg p-6">
                    <h1 class="text-xl font-semibold mb-2 text-gray-900 ">Informations personnelles</h1>
                    <p class="text-gray-600  mb-3">Utilisez une adresse permanente où vous pouvez recevoir du courrier.</p>
                    <form action="{{ route('proprites.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="flex flex-wrap items-center gap-4 pb-5">
                            <!-- Checkboxes Section -->
                            <div class="flex flex-wrap items-center gap-4">
                                <label for="À-vendre" class="flex items-center space-x-2">
                                    <input type="checkbox" id="À-vendre" name="listing_type[]" value="À-vendre">
                                    <span>À vendre</span>
                                </label>
                                <label for="À-louer" class="flex items-center space-x-2">
                                    <input type="checkbox" id="À-louer" name="listing_type[]" value="À-louer">
                                    <span>À louer</span>
                                </label>
                            </div>

                            
                            <!-- Radio Buttons Section -->
                            <div class="w-full">
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="price_type" value="" checked>
                                        <span>-- Aucun --</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="price_type" value="nuit" required>
                                        <span>Par nuit</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="price_type" value="mois">
                                        <span>Par mois</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="price_type" value="an">
                                        <span>Par an</span>
                                    </label>
                                </div>
                            </div>

                        </div>


                        <!-- Titre et Type de propriété -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

                            <input type="text" name="title"
                                placeholder="Titre de l'annonce (ex: Appartement 2 pièces à Casablanca)"
                                class="border p-2 rounded w-full" required>

                            <select name="property_type" class="border p-2 rounded w-full" required>
                                <option value="">Type de propriété</option>
                                <option value="appartement">Appartement</option>
                                <option value="maison">Maison</option>
                                <option value="terrain">Terrain</option>
                                <option value="villa">Villa</option>
                            </select>
                        </div>

                        <!-- Ville et Quartier -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <input type="text" name="city" placeholder="Ville (ex: Casablanca)"
                                class="border p-2 rounded w-full" required>

                            <input type="text" name="neighborhood" placeholder="Quartier (ex: Maarif)"
                                class="border p-2 rounded w-full">
                        </div>

                        <!-- Adresse et Superficie -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <input type="text" name="address" placeholder="Adresse complète (facultatif)"
                                class="border p-2 rounded w-full">

                            <input type="number" name="surface" placeholder="Superficie (m²)"
                                class="border p-2 rounded w-full" required>
                        </div>

                        <!-- Nombre de chambres et de salles de bain -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <input type="number" name="bedrooms" placeholder="Nombre de chambres"
                                class="border p-2 rounded w-full" required>

                            <input type="number" name="bathrooms" placeholder="Nombre de salles de bain"
                                class="border p-2 rounded w-full" required>
                        </div>

                        <!-- Prix et Téléphone -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <input type="number" name="price" placeholder="Prix (MAD)" class="border p-2 rounded w-full"
                                required>

                            <input type="tel" name="contact_phone" placeholder="Numéro de téléphone"
                                class="border p-2 rounded w-full" required>
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <textarea name="description" placeholder="Description détaillée de la propriété" class="border p-2 rounded w-full"
                                rows="4" required></textarea>
                        </div>

                        <!-- Photos -->
                        <div class="mb-4">
                            <label class="block mb-2 font-medium text-sm">Ajouter des photos (Max: 10)</label>
                            <input multiple type="file" name="photos[]" id="photos" multiple accept="image/*"
                                class="border p-2 rounded w-full" onchange="checkFiles(this)">
                            <p id="file-error" class="text-red-500 text-sm mt-1 hidden">Vous pouvez télécharger jusqu'à 10
                                images maximum.</p>
                        </div>

                        <!-- Bouton de soumission -->
                        <div class="flex justify-end mt-6">
                            @auth
                                <button type="submit"
                                    class="bg-black text-white px-6 py-2 rounded hover:bg-gray-800">Soumettre
                                    l'annonce</button>
                            @endauth

                            @guest
                                <a href="{{ route('register') }}"
                                    class="bg-[#E7C873] text-black px-6 py-2 rounded inline-block">
                                    Créez un compte pour publier
                                </a>
                            @endguest
                        </div>
                    </form>

                </div>
            </div>
        </div>



        <script>
            function checkFiles(input) {
                const maxFiles = 10;
                const errorText = document.getElementById('file-error');

                if (input.files.length > maxFiles) {
                    errorText.classList.remove('hidden');
                    input.value = ""; // reset file input
                } else {
                    errorText.classList.add('hidden');
                }
            }
        </script>
    </section>
@endsection
