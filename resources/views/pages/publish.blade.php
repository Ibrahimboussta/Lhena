@extends('layouts.index')
@section('title', 'Lhena.ma - Publier une annonce')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<section class="publish-page px-3 sm:px-6 pb-24">
    <header class="publish-intro">
        <p class="publish-eyebrow">Processus guidé en 3 étapes · Accompagnement conciergerie LHENA</p>
        <div class="publish-intro__row">
            <div>
                <h1 class="publish-title">Publier une annonce <span lang="ar">(نشر إعلان)</span></h1>
                <p class="publish-subtitle">Proposez votre bien d’exception aux voyageurs et résidents haut de gamme au Maroc. Remplissez les informations ci-dessous pour débuter.</p>
            </div>
            <p class="publish-save-status"><span aria-hidden="true"></span>Votre annonce sera envoyée pour validation</p>
        </div>
    </header>

    <div class="publish-container mx-auto">
        <div class="publish-card">

            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-8">
                <p class="mb-2 font-semibold">Votre annonce n’a pas été publiée. Corrigez les erreurs suivantes :</p>
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form id="property-publish-form" action="{{ route('proprites.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <div class="publish-steps" aria-label="Progression du formulaire">
                    <div class="step active" aria-current="step"><span class="step__number">1</span><span>Informations <small>(معلومات)</small></span></div>
                    <span class="publish-steps__connector" aria-hidden="true"></span>
                    <div class="step"><span class="step__number">2</span><span>Détails <small>(تفاصيل)</small></span></div>
                    <span class="publish-steps__connector" aria-hidden="true"></span>
                    <div class="step"><span class="step__number">3</span><span>Médias <small>(صور)</small></span></div>
                </div>

                <div class="form-section active space-y-6">

                    <div class="publish-section">
                        <div class="publish-section__header">
                            <h3><span>01</span> Location et tarification <small>(الكراء والتسعير)</small></h3>
                            <span class="publish-required">Requis / ضروري</span>
                        </div>
                        <div class="flex flex-col gap-4 pb-4">
                            <input type="hidden" name="listing_type[]" value="À-louer">
                            <p class="publish-helper">Toutes les annonces sont proposées exclusivement à la location (جميع الإعلانات مخصصة للكراء).</p>
                            <p class="publish-field-caption">Fréquence du contrat de location (دورية عقد الكراء)</p>

                            <div class="publish-price-options">
                                @foreach (['nuit' => 'Par nuit (ليلة)', 'mois' => 'Par mois (شهر)', 'an' => 'Par an (سنة)'] as $val => $label)
                                <label class="publish-price-option">
                                    <input type="radio" name="price_type" value="{{ $val }}" {{ old('price_type', '') === $val ? 'checked' : '' }}>
                                    <span>{{ $label }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="publish-section">
                        <div class="publish-section__header">
                            <h3><span>02</span> Informations principales <small>(المعلومات الأساسية)</small></h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Titre (العنوان) *</label>
                                <input type="text" name="title" value="{{ old('title') }}" placeholder="Ex. Riad contemporain avec piscine chauffée – Marrakech" class="publish-input border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                                <p class="publish-helper">Un titre accrocheur valorisant l’architecture et les atouts.</p>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Type de propriété (نوع العقار) *</label>
                                <select name="property_type" class="publish-input border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                                    <option value="">Sélectionnez un type (اختر نوعاً)</option>
                                    <option value="appartement" {{ old('property_type') === 'appartement' ? 'selected' : '' }}>Appartement</option>
                                    <option value="maison" {{ old('property_type') === 'maison' ? 'selected' : '' }}>Maison</option>
                                    <option value="duplex" {{ old('property_type') === 'duplex' ? 'selected' : '' }}>Duplex</option>
                                    <option value="studio" {{ old('property_type') === 'studio' ? 'selected' : '' }}>Studio</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="publish-section">
                        <div class="publish-section__header">
                            <h3><span>03</span> Localisation <small>(الموقع)</small></h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Ville (المدينة) *</label>
                                <input type="text" name="city" value="{{ old('city') }}" placeholder="Ville (المدينة) – ex. Marrakech, Casablanca, Tanger…" class="publish-input border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Quartier (الحي)</label>
                                <input type="text" name="neighborhood" value="{{ old('neighborhood') }}" placeholder="Quartier (الحي) – ex. Palmeraie, Guéliz…" class="publish-input border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Adresse complète (العنوان الكامل) *</label>
                            <input type="text" name="address" value="{{ old('address') }}" placeholder="Adresse complète (العنوان الكامل) – Rue, résidence, N° de porte…" class="publish-input border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                            <p class="publish-helper">L’adresse exacte restera confidentielle et ne sera communiquée qu’aux locataires validés.</p>
                        </div>
                    </div>

                </div>

                <div class="form-section space-y-6">
                    <div class="publish-section">
                        <div class="publish-section__header">
                            <h3><span>04</span> Détails de la propriété <small>(تفاصيل العقار)</small></h3>
                        </div>
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

                    <div class="publish-section">
                        <div class="publish-section__header">
                            <h3><span>05</span> Équipements et services <small>(التجهيزات والخدمات)</small></h3>
                        </div>

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

                    <div class="publish-section">
                        <div class="publish-section__header">
                            <h3><span>06</span> Contact et disponibilité <small>(التواصل والتوفر)</small></h3>
                        </div>
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
                    <div class="publish-section">
                        <div class="publish-section__header">
                            <h3><span>07</span> Description et médias <small>(الوصف والصور)</small></h3>
                        </div>
                        <div class="space-y-2 mb-6">
                            <label class="block text-sm font-medium text-gray-700">Description détaillée (الوصف التفصيلي) *</label>
                            <textarea name="description" rows="6" placeholder="Décrivez votre propriété en détail... (صف عقارك بشكل مفصل...)" class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent resize-vertical" required>{{ old('description') }}</textarea>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Photos de la propriété (صور العقار) *</label>
                            <input type="file" name="photos[]" multiple accept="image/*" required class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                            <p class="text-sm text-gray-500 mt-1">Sélectionnez plusieurs photos (اختر عدة صور) - max 10 images (10 صور كحد أقصى), 20MB chacune (20 ميغابايت للصورة)</p>
                        </div>
                    </div>
                </div>

                <div class="publish-navigation">
                    <button type="button" class="btn prev hidden publish-button publish-button--back">
                        ← Précédent
                    </button>
                    <button type="button" class="btn next publish-button publish-button--next">
                        Suivant <span lang="ar">(التالي)</span> →
                    </button>
                    <button type="submit" form="property-publish-form" class="btn submit hidden publish-button publish-button--next">
                        Publier mon annonce →
                    </button>
                </div>

            </form>
        </div>
        <div class="publish-benefits" aria-label="Les avantages de publier avec LHENA">
            <article><span aria-hidden="true">▣</span><div><strong>Photographie pro</strong><small>Mise en valeur offerte sur demande.</small></div></article>
            <article><span aria-hidden="true">♙</span><div><strong>Locataires filtrés</strong><small>Vérification de solvabilité rigoureuse.</small></div></article>
            <article><span aria-hidden="true">↔</span><div><strong>Gestion clé en main</strong><small>Check-in, état des lieux &amp; ménage.</small></div></article>
        </div>
    </div>
</section>

<style>
    .publish-page {
        min-height: 100vh;
        background: #f7f9f7;
        padding-top: 96px;
    }

    .publish-intro,
    .publish-container {
        width: min(100%, 1080px);
        margin-right: auto;
        margin-left: auto;
    }

    .publish-intro {
        margin-bottom: 24px;
        border-bottom: 1px solid #e4e9e5;
        padding-bottom: 18px;
    }

    .publish-eyebrow {
        display: inline-flex;
        align-items: center;
        border: 1px solid #e8e3d9;
        border-radius: 999px;
        background: #f1eee7;
        padding: 5px 12px;
        color: #947e55;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
    }

    .publish-intro__row {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 20px;
        margin-top: 10px;
    }

    .publish-title {
        color: #173f36;
        font-size: clamp(25px, 3.5vw, 34px);
        font-weight: 700;
        letter-spacing: -0.04em;
        line-height: 1.2;
    }

    .publish-title span {
        color: #78827d;
        font-size: 0.68em;
        font-weight: 500;
        letter-spacing: 0;
    }

    .publish-subtitle {
        max-width: 700px;
        margin-top: 6px;
        color: #78827d;
        font-size: 13px;
        line-height: 1.6;
    }

    .publish-save-status {
        display: inline-flex;
        flex: 0 0 auto;
        align-items: center;
        gap: 8px;
        border: 1px solid #e4e9e5;
        border-radius: 999px;
        background: #fff;
        padding: 8px 12px;
        color: #78827d;
        font-size: 10px;
    }

    .publish-save-status span {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #138b69;
    }

    .publish-card {
        border: 1px solid #e4e9e5;
        border-radius: 16px;
        background: #fff;
        padding: 26px 30px;
        box-shadow: 0 8px 24px rgba(32, 54, 43, 0.05);
    }

    .publish-steps {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 42px minmax(0, 0.72fr) 42px minmax(0, 0.72fr);
        align-items: center;
        gap: 10px;
        margin: 0 auto 28px;
        max-width: 780px;
    }

    .step {
        display: flex;
        min-height: 42px;
        align-items: center;
        justify-content: center;
        gap: 8px;
        border-radius: 9999px;
        border: 1px solid #e4e9e5;
        background: #fff;
        padding: 8px 14px;
        color: #78827d;
        font-weight: 600;
        font-size: 12px;
        line-height: 1.25;
        text-align: center;
        transition: background-color 180ms ease, border-color 180ms ease, color 180ms ease;
    }

    .step small {
        color: #89938d;
        font-size: 10px;
        font-weight: 400;
    }

    .step__number {
        display: inline-grid;
        width: 20px;
        height: 20px;
        flex: 0 0 auto;
        place-items: center;
        border-radius: 50%;
        background: #f1f4f1;
        color: #64736a;
        font-size: 10px;
    }

    .step.active {
        border-color: #173f36;
        background: #173f36;
        color: #fff;
        box-shadow: 0 5px 14px rgba(23, 63, 54, 0.2);
    }

    .step.active small {
        color: #d7e2dc;
    }

    .step.active .step__number,
    .step.is-complete .step__number {
        background: #138b69;
        color: #fff;
    }

    .step.is-complete {
        border-color: #cbd9ce;
        color: #173f36;
    }

    .publish-steps__connector {
        height: 1px;
        background: #dfe7e1;
    }

    .form-section {
        display: none;
        overflow: visible;
    }

    .form-section {
        animation: publish-step-in 180ms ease-out;
    }

    .form-section.active {
        display: block;
    }

    @keyframes publish-step-in {
        from { opacity: 0; transform: translateY(5px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .publish-section {
        border-bottom: 1px solid #e6ebe7;
        padding: 0 0 22px;
    }

    .publish-section:last-child {
        border-bottom: 0;
        padding-bottom: 0;
    }

    .publish-section__header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        border-bottom: 1px solid #edf0ed;
        margin-bottom: 18px;
        padding-bottom: 12px;
    }

    .publish-section__header h3 {
        display: flex;
        align-items: center;
        gap: 9px;
        color: #26332e;
        font-size: 14px;
        font-weight: 700;
    }

    .publish-section__header h3 > span {
        display: inline-grid;
        width: 22px;
        height: 22px;
        place-items: center;
        border-radius: 6px;
        background: #edf2ee;
        color: #173f36;
        font-size: 9px;
    }

    .publish-section__header small {
        color: #89938d;
        font-size: 11px;
        font-weight: 400;
    }

    .publish-required {
        border: 1px solid #e8dcc3;
        border-radius: 4px;
        background: #faf6ed;
        padding: 4px 7px;
        color: #947e55;
        font-size: 9px;
        white-space: nowrap;
    }

    .publish-field-caption {
        color: #52645a;
        font-size: 10px;
        font-weight: 600;
        letter-spacing: 0.04em;
        text-transform: uppercase;
    }

    .publish-helper {
        color: #89938d;
        font-size: 10px;
        line-height: 1.5;
    }

    .publish-price-options {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 9px;
    }

    .publish-price-option {
        display: flex;
        min-height: 48px;
        align-items: center;
        gap: 8px;
        border: 1px solid #e4e9e5;
        border-radius: 10px;
        background: #fff;
        padding: 9px 11px;
        color: #34443b;
        cursor: pointer;
        font-size: 11px;
        transition: border-color 150ms ease, background-color 150ms ease;
    }

    .publish-price-option:has(input:checked) {
        border-color: #173f36;
        background: #f0f5f1;
    }

    .publish-price-option input,
    .publish-page input[type="checkbox"],
    .publish-page input[type="radio"] {
        accent-color: #173f36;
    }

    .publish-page label.block {
        color: #435149;
        font-size: 11px;
        font-weight: 600;
    }

    .publish-page .publish-input,
    .publish-page input:not([type="checkbox"]):not([type="radio"]):not([type="hidden"]),
    .publish-page select,
    .publish-page textarea {
        min-height: 42px;
        border-color: #dfe5df;
        border-radius: 9px;
        background-color: #fff;
        color: #26332e;
        font-size: 11px;
        box-shadow: none;
    }

    .publish-page textarea {
        min-height: 140px;
    }

    .publish-page input::placeholder,
    .publish-page textarea::placeholder {
        color: #9aa39e;
    }

    .publish-page input:focus,
    .publish-page select:focus,
    .publish-page textarea:focus {
        border-color: #8ba99a;
        outline: none;
        box-shadow: 0 0 0 3px rgba(23, 63, 54, 0.09);
    }

    .publish-page input[type="file"] {
        min-height: auto;
        background: #fbfcfb;
    }

    .publish-page input[type="file"]::file-selector-button {
        border: 1px solid #d7e2da;
        border-radius: 6px;
        background: #edf3ee;
        padding: 8px 12px;
        color: #173f36;
        cursor: pointer;
        font-size: 11px;
        font-weight: 600;
    }

    .publish-page input[type="file"]::file-selector-button:hover {
        background: #e2ece4;
        border-color: #b6cbbb;
    }

    .publish-page .form-section h4 {
        color: #435149;
        font-size: 11px;
    }

    .publish-page .form-section label.flex {
        color: #526057;
        font-size: 11px;
    }

    .publish-navigation {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        border-top: 1px solid #e6ebe7;
        margin-top: 4px;
        padding-top: 18px;
    }

    .publish-button {
        display: inline-flex;
        min-height: 42px;
        align-items: center;
        justify-content: center;
        gap: 8px;
        border: 1px solid transparent;
        border-radius: 9px;
        padding: 10px 18px;
        font-size: 12px;
        font-weight: 600;
        transition: background-color 150ms ease, transform 150ms ease;
    }

    .publish-button.hidden {
        display: none !important;
    }

    .publish-button--next {
        margin-left: auto;
        background: #138b69;
        color: #fff;
        box-shadow: 0 3px 8px rgba(19, 139, 105, 0.18);
    }

    .publish-button--next:hover {
        background: #0b7658;
        transform: translateY(-1px);
    }

    .publish-button--back {
        border-color: #dfe5df;
        background: #fff;
        color: #526057;
    }

    .publish-button--back:hover {
        background: #f5f7f5;
    }

    .publish-benefits {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 12px;
        margin-top: 18px;
    }

    .publish-benefits article {
        display: flex;
        align-items: center;
        gap: 10px;
        border: 1px solid #e4e9e5;
        border-radius: 11px;
        background: #fff;
        padding: 12px;
    }

    .publish-benefits article > span {
        display: grid;
        width: 30px;
        height: 30px;
        flex: 0 0 auto;
        place-items: center;
        border-radius: 8px;
        background: #edf2ee;
        color: #173f36;
        font-size: 15px;
    }

    .publish-benefits article:nth-child(2) > span {
        background: #f4eee3;
        color: #947e55;
    }

    .publish-benefits strong,
    .publish-benefits small {
        display: block;
    }

    .publish-benefits strong {
        color: #34443b;
        font-size: 9px;
        letter-spacing: 0.06em;
        text-transform: uppercase;
    }

    .publish-benefits small {
        margin-top: 3px;
        color: #89938d;
        font-size: 9px;
    }

    @media (max-width: 768px) {
        .publish-page {
            padding-top: 84px;
        }

        .publish-intro__row {
            align-items: flex-start;
            flex-direction: column;
            gap: 10px;
        }

        .publish-card {
            padding: 20px 16px;
        }

        .publish-steps {
            grid-template-columns: minmax(0, 1fr) 14px minmax(0, 1fr) 14px minmax(0, 1fr);
            gap: 5px;
            margin-bottom: 22px;
        }

        .step {
            min-height: 40px;
            gap: 5px;
            padding: 6px 5px;
            font-size: 10px;
        }

        .step small {
            display: none;
        }

        .publish-price-options {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .publish-benefits {
            grid-template-columns: minmax(0, 1fr);
        }

        .publish-page .publish-section {
            padding-bottom: 18px;
        }
    }

    @media (max-width: 420px) {
        .publish-eyebrow {
            font-size: 8px;
        }

        .publish-title {
            font-size: 24px;
        }

        .publish-section__header h3 {
            flex-wrap: wrap;
            font-size: 12px;
        }

        .publish-required {
            font-size: 8px;
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
    const publishForm = document.querySelector('#property-publish-form');

    function updateUI() {
        sections.forEach((s, i) => s.classList.toggle('active', i === current));
        steps.forEach((s, i) => {
            s.classList.toggle('active', i === current);
            s.classList.toggle('is-complete', i < current);
            if (i === current) {
                s.setAttribute('aria-current', 'step');
            } else {
                s.removeAttribute('aria-current');
            }
        });

        prevBtn.classList.toggle('hidden', current === 0);
        nextBtn.classList.toggle('hidden', current === sections.length - 1);
        submitBtn.classList.toggle('hidden', current !== sections.length - 1 || !publishForm.checkValidity());
    }

    nextBtn.onclick = () => {
        const requiredFields = sections[current].querySelectorAll('[required]');
        const invalidField = Array.from(requiredFields).find(field => !field.checkValidity());
        if (invalidField) {
            invalidField.reportValidity();
            return;
        }

        if (current < sections.length - 1) {
            current++;
            updateUI();
            document.querySelector('.publish-card').scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    };
    prevBtn.onclick = () => {
        if (current > 0) {
            current--;
            updateUI();
            document.querySelector('.publish-card').scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    };

    publishForm.addEventListener('input', updateUI);
    publishForm.addEventListener('change', updateUI);
    updateUI();

</script>
@endsection
