@extends('layouts.index')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 pt-20 pb-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="px-6 sm:px-8 py-8 border-b border-gray-200">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Modifier la propriété</h1>
                <p class="text-gray-600">Mettez à jour les informations de cette annonce</p>
            </div>

            <!-- Form Content -->
            <div class="p-6 sm:p-8">
                <form action="{{ route('proprites.update', $property->slug) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Error Messages -->
                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                            <p class="text-red-700 font-semibold mb-2">Veuillez corriger les erreurs:</p>
                            <ul class="list-none space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-600">• {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Main Information Section -->
                    <div class="mb-8">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">Informations principales</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Titre *</label>
                                <input type="text" name="title" value="{{ old('title', $property->title) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" required>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Type de propriété *</label>
                                <input type="text" name="property_type" value="{{ old('property_type', $property->property_type) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" required>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Ville *</label>
                                <input type="text" name="city" value="{{ old('city', $property->city) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" required>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Quartier *</label>
                                <input type="text" name="neighborhood" value="{{ old('neighborhood', $property->neighborhood) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" required>
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Adresse *</label>
                                <input type="text" name="address" value="{{ old('address', $property->address) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" required>
                            </div>
                        </div>
                    </div>

                    <!-- Property Details Section -->
                    <div class="mb-8">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">Détails de la propriété</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Surface (m²) *</label>
                                <input type="number" name="surface" value="{{ old('surface', $property->surface) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" required>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Chambres *</label>
                                <input type="number" name="bedrooms" value="{{ old('bedrooms', $property->bedrooms) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" required>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Salles de bain *</label>
                                <input type="number" name="bathrooms" value="{{ old('bathrooms', $property->bathrooms) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" required>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Prix *</label>
                                <input type="number" name="price" value="{{ old('price', $property->price) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" required>
                            </div>
                        </div>
                    </div>

                    <!-- Pricing Section -->
                    <div class="mb-8">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">Tarification</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Type de prix</label>
                                <input type="text" name="price_type" value="{{ old('price_type', $property->price_type) }}" placeholder="nuit, mois, an" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Téléphone de contact *</label>
                                <input type="text" name="contact_phone" value="{{ old('contact_phone', $property->contact_phone) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" required>
                            </div>
                        </div>
                    </div>

                    <!-- Description Section -->
                    <div class="mb-8">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">Description</h2>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                            <textarea name="description" rows="4" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition resize-none" placeholder="Décrivez votre propriété...">{{ old('description', $property->description) }}</textarea>
                        </div>
                    </div>

                    <!-- Photos Section -->
                    <div class="mb-8">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">Galerie photos</h2>
                        <div class="mb-4">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Ajouter des photos (laisser vide pour conserver les actuelles)</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-green-500 transition cursor-pointer">
                                <input type="file" name="photos[]" multiple class="hidden" id="fileInput">
                                <label for="fileInput" class="cursor-pointer">
                                    <svg class="mx-auto h-12 w-12 text-gray-400 mb-2" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                        <path d="M28 8H12a4 4 0 00-4 4v20a4 4 0 004 4h24a4 4 0 004-4V20m-8-12l-3.172-3.172a4 4 0 00-5.656 0L9.172 20M21 4v20m14 0v4"></path>
                                    </svg>
                                    <p class="text-gray-600">Cliquez pour ajouter des photos ou glissez-déposez</p>
                                </label>
                            </div>
                        </div>
                        @if($property->photos)
                            <div>
                                <p class="text-sm font-semibold text-gray-700 mb-3">Photos actuelles</p>
                                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                                    @foreach(json_decode($property->photos) as $photo)
                                        <div class="relative group">
                                            <img src="{{ asset('storage/' . $photo) }}" class="w-full h-24 object-cover rounded-lg shadow" alt="Photo">
                                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 rounded-lg transition flex items-center justify-center">
                                                <span class="text-white text-sm font-semibold opacity-0 group-hover:opacity-100 transition">✓</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex flex-col gap-3 pt-6 border-t border-gray-200">
                        <button type="submit" class="w-full text-sm px-8 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition font-semibold shadow-md hover:shadow-lg">
                            Mettre à jour la propriété
                        </button>
                        <a href="{{ route('proprites.admin') }}" class="w-full text-center px-6 py-2.5 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition font-medium">
                            Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
