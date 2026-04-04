@extends('layouts.index')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<section class="px-3 sm:px-6 pb-24">
    <h1 class="text-4xl font-bold pt-24 mb-10">Publier une annonce (نشر إعلان)</h1>

    <div class="max-w-6xl mx-auto">
        <div class="bg-white border rounded-xl shadow-lg p-4 sm:p-8">

            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-8">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('proprites.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <div class="flex justify-between mb-12">
                    <div class="step active">1. Informations (معلومات)</div>
                    <div class="step">2. Détails (تفاصيل)</div>
                    <div class="step">3. Médias (صور)</div>
                </div>

                <div class="form-section active space-y-6">

                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">Type d'annonce et tarification (نوع الإعلان والتسعير)</h3>
                        <div class="flex flex-col gap-4 pb-4">
                            <div class="flex items-center gap-6">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="checkbox" name="listing_type[]" value="À-vendre" {{ in_array('À-vendre', old('listing_type', [])) ? 'checked' : '' }}>
                                    <span>À vendre (للبيع)</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="checkbox" name="listing_type[]" value="À-louer" {{ in_array('À-louer', old('listing_type', [])) ? 'checked' : '' }}>
                                    <span>À louer (للكراء)</span>
                                </label>
                            </div>

                            <hr class="border-t border-gray-500">

                            <div class="flex flex-wrap items-center gap-4">
                                @foreach (['' => '-- Aucun -- (لا شيء)', 'nuit' => 'Par nuit (ليلة)', 'mois' => 'Par mois (شهر)', 'an' => 'Par an (سنة)'] as $val => $label)
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="price_type" value="{{ $val }}" {{ old('price_type', '') === $val ? 'checked' : '' }}>
                                    <span>{{ $label }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">Informations principales (المعلومات الأساسية)</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Titre (العنوان) *</label>
                                <input type="text" name="title" value="{{ old('title') }}" class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Type de propriété (نوع العقار) *</label>
                                <select name="property_type" class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                                    <option value="">Sélectionnez un type (اختر نوعاً)</option>
                                    <option value="appartement" {{ old('property_type') === 'appartement' ? 'selected' : '' }}>Appartement</option>
                                    <option value="villa" {{ old('property_type') === 'villa' ? 'selected' : '' }}>Villa</option>
                                    <option value="maison" {{ old('property_type') === 'maison' ? 'selected' : '' }}>Maison</option>
                                    <option value="immeuble" {{ old('property_type') === 'immeuble' ? 'selected' : '' }}>Immeuble</option>
                                    <option value="studio" {{ old('property_type') === 'studio' ? 'selected' : '' }}>Studio</option>
                                    <option value="duplex" {{ old('property_type') === 'duplex' ? 'selected' : '' }}>Duplex</option>
                                    <option value="triplex" {{ old('property_type') === 'triplex' ? 'selected' : '' }}>Triplex</option>
                                    <option value="penthouse" {{ old('property_type') === 'penthouse' ? 'selected' : '' }}>Penthouse</option>
                                    <option value="loft" {{ old('property_type') === 'loft' ? 'selected' : '' }}>Loft</option>
                                    <option value="bureau" {{ old('property_type') === 'bureau' ? 'selected' : '' }}>Bureau</option>
                                    <option value="commerce" {{ old('property_type') === 'commerce' ? 'selected' : '' }}>Commerce</option>
                                    <option value="terrain" {{ old('property_type') === 'terrain' ? 'selected' : '' }}>Terrain</option>
                                    <option value="garage" {{ old('property_type') === 'garage' ? 'selected' : '' }}>Garage/Parking</option>
                                    <option value="entrepot" {{ old('property_type') === 'entrepot' ? 'selected' : '' }}>Entrepôt</option>
                                    <option value="riad" {{ old('property_type') === 'riad' ? 'selected' : '' }}>Riad</option>
                                    <option value="chambre" {{ old('property_type') === 'chambre' ? 'selected' : '' }}>Chambre</option>
                                    <option value="colocation" {{ old('property_type') === 'colocation' ? 'selected' : '' }}>Colocation</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">Localisation (الموقع)</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Ville (المدينة) *</label>
                                <input type="text" name="city" value="{{ old('city') }}" placeholder="Ville (المدينة)" class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Quartier (الحي)</label>
                                <input type="text" name="neighborhood" value="{{ old('neighborhood') }}" placeholder="Quartier (الحي)" class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Adresse complète (العنوان الكامل) *</label>
                            <input type="text" name="address" value="{{ old('address') }}" placeholder="Adresse complète (العنوان الكامل)" class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                        </div>
                    </div>

                </div>

                <div class="form-section space-y-6">
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">Détails de la propriété (تفاصيل العقار)</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Superficie (المساحة) (m²)</label>
                                <input type="number" name="surface" value="{{ old('surface') }}" placeholder="Ex: 120 (مثال: 120)" class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Prix (الثمن) (MAD) *</label>
                                <input type="number" name="price" value="{{ old('price') }}" placeholder="Ex: 2500000 (مثال: 2500000)" class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Nombre de chambres (عدد الغرف) *</label>
                                <input type="number" name="bedrooms" value="{{ old('bedrooms') }}" placeholder="Ex: 3 (مثال: 3)" class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Nombre de salles de bain (عدد الحمامات) *</label>
                                <input type="number" name="bathrooms" value="{{ old('bathrooms') }}" placeholder="Ex: 2 (مثال: 2)" class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">Équipements et services (التجهيزات والخدمات)</h3>

                        @php
                        $selectedAmenities = old('amenities', []);
                        @endphp

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div class="space-y-2">
                                    <h4 class="text-sm font-semibold text-gray-700">Confort intérieur (الراحة الداخلية)</h4>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm">
                                        @foreach (['Climatisation', 'Chauffage', 'Meublé', 'Cuisine équipée', 'Cheminée', 'Double vitrage', 'Eau chaude'] as $label)
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input type="checkbox" name="amenities[]" value="{{ $label }}" class="w-4 h-4" {{ in_array($label, $selectedAmenities) ? 'checked' : '' }}>
                                            <span class="text-gray-700">{{ $label }}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <h4 class="text-sm font-semibold text-gray-700">Extérieur (الخارج)</h4>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm">
                                        @foreach (['Balcon', 'Terrasse', 'Jardin', 'Piscine', 'Vue panoramique', 'Barbecue'] as $label)
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input type="checkbox" name="amenities[]" value="{{ $label }}" class="w-4 h-4" {{ in_array($label, $selectedAmenities) ? 'checked' : '' }}>
                                            <span class="text-gray-700">{{ $label }}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <h4 class="text-sm font-semibold text-gray-700">Sécurité (الأمان)</h4>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm">
                                        @foreach (['Sécurité 24/7', 'Caméras de surveillance', 'Interphone', 'Gardien'] as $label)
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input type="checkbox" name="amenities[]" value="{{ $label }}" class="w-4 h-4" {{ in_array($label, $selectedAmenities) ? 'checked' : '' }}>
                                            <span class="text-gray-700">{{ $label }}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div class="space-y-2">
                                    <h4 class="text-sm font-semibold text-gray-700">Immeuble (العمارة)</h4>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm">
                                        @foreach (['Ascenseur', 'Parking', 'Garage', 'Cave / Débarras', 'Accès PMR', 'Concierge'] as $label)
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input type="checkbox" name="amenities[]" value="{{ $label }}" class="w-4 h-4" {{ in_array($label, $selectedAmenities) ? 'checked' : '' }}>
                                            <span class="text-gray-700">{{ $label }}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <h4 class="text-sm font-semibold text-gray-700">Internet & divertissement (الإنترنت والترفيه)</h4>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm">
                                        @foreach (['WiFi', 'Fibre optique', 'TV', 'Satellite'] as $label)
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input type="checkbox" name="amenities[]" value="{{ $label }}" class="w-4 h-4" {{ in_array($label, $selectedAmenities) ? 'checked' : '' }}>
                                            <span class="text-gray-700">{{ $label }}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <h4 class="text-sm font-semibold text-gray-700">Loisirs & services (الترفيه والخدمات)</h4>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm">
                                        @foreach (['Salle de sport', 'Aire de jeux', 'Spa / Hammam', 'Laverie', 'Animaux acceptés'] as $label)
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input type="checkbox" name="amenities[]" value="{{ $label }}" class="w-4 h-4" {{ in_array($label, $selectedAmenities) ? 'checked' : '' }}>
                                            <span class="text-gray-700">{{ $label }}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">Contact et disponibilité (التواصل والتوفر)</h3>
                        <div class="space-y-2 mb-6">
                            <label class="block text-sm font-medium text-gray-700">Téléphone de contact (الهاتف) *</label>
                            <input type="tel" name="contact_phone" value="{{ old('contact_phone') }}" placeholder="Ex: +212 6XX XXX XXX (مثال: +212 6XX XXX XXX)" class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Disponible à partir de (متوفر من)</label>
                                <input type="date" name="available_from" value="{{ old('available_from') }}" class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Disponible jusqu'à (متوفر حتى)</label>
                                <input type="date" name="available_until" value="{{ old('available_until') }}" class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-section space-y-6">
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">Description et médias (الوصف والصور)</h3>
                        <div class="space-y-2 mb-6">
                            <label class="block text-sm font-medium text-gray-700">Description détaillée (الوصف التفصيلي) *</label>
                            <textarea name="description" rows="6" placeholder="Décrivez votre propriété en détail... (صف عقارك بشكل مفصل...)" class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent resize-vertical" required>{{ old('description') }}</textarea>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Photos de la propriété (صور العقار) *</label>
                            <input type="file" name="photos[]" multiple accept="image/*" class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                            <p class="text-sm text-gray-500 mt-1">Sélectionnez plusieurs photos (اختر عدة صور) - max 10 images (10 صور كحد أقصى), 20MB chacune (20 ميغابايت للصورة)</p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between items-center mt-12 pt-8 border-t border-gray-200">
                    <button type="button" class="btn prev hidden bg-gray-100 text-gray-700 hover:bg-gray-200 px-6 py-3 rounded-lg font-medium transition-colors">
                        ← Précédent (السابق)
                    </button>
                    <button type="button" class="btn next bg-green-600 text-white hover:bg-green-700 px-6 py-3 rounded-lg font-medium transition-colors">
                        Suivant (التالي) →
                    </button>
                    <button type="submit" class="btn submit hidden bg-green-600 text-white hover:bg-green-700 px-8 py-3 rounded-lg font-medium transition-colors">
                        📤 Soumettre (نشر)
                    </button>
                </div>

            </form>
        </div>
    </div>
</section>

<style>
    .step {
        padding: 12px 20px;
        border-radius: 9999px;
        border: 2px solid #d1d5db;
        color: #6b7280;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .step.active {
        background: linear-gradient(135deg, #16a34a, #15803d);
        color: white;
        border-color: #16a34a;
        box-shadow: 0 4px 12px rgba(22, 163, 74, 0.3);
    }

    .form-section {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.5s ease;
    }

    .form-section.active {
        max-height: 2000px;
    }

    input[type="checkbox"],
    input[type="radio"] {
        accent-color: #16a34a;
    }

    input[type="file"]::file-selector-button {
        background-color: #f0fdf4;
        color: #166534;
        border: 1px solid #bbf7d0;
        padding: 8px 16px;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    input[type="file"]::file-selector-button:hover {
        background-color: #dcfce7;
        border-color: #86efac;
    }

    input:focus,
    select:focus,
    textarea:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.1);
    }

    @media (max-width: 768px) {
        .step {
            padding: 8px 12px;
            font-size: 12px;
        }

        section {
            padding: 1rem;
        }
    }

</style>

<script>
    let current = 0;
    const sections = document.querySelectorAll('.form-section');
    const steps = document.querySelectorAll('.step');
    const nextBtn = document.querySelector('.next');
    const prevBtn = document.querySelector('.prev');
    const submitBtn = document.querySelector('.submit');

    function updateUI() {
        sections.forEach((s, i) => s.classList.toggle('active', i === current));
        steps.forEach((s, i) => s.classList.toggle('active', i === current));

        prevBtn.classList.toggle('hidden', current === 0);
        nextBtn.classList.toggle('hidden', current === sections.length - 1);
        submitBtn.classList.toggle('hidden', current !== sections.length - 1);

        sections[current].scrollIntoView({
            behavior: 'smooth'
        });
    }

    nextBtn.onclick = () => {
        if (current < sections.length - 1) {
            current++;
            updateUI();
        }
    };
    prevBtn.onclick = () => {
        if (current > 0) {
            current--;
            updateUI();
        }
    };

    updateUI();

</script>
@endsection
