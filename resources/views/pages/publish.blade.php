@extends('layouts.index')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<section class="px-6 pb-24">
    <h1 class="text-4xl font-bold pt-24 mb-10">Publier une annonce</h1>

    <div class="max-w-6xl mx-auto">
        <div class="bg-white border rounded-xl shadow-lg p-8">

            {{-- ERRORS --}}
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

                    {{-- STEP HEADER --}}
                    <div class="flex justify-between mb-12">
                        <div class="step active">1. Informations</div>
                        <div class="step">2. Détails</div>
                        <div class="step">3. Médias</div>
                    </div>

                    {{-- ================= PART 1 ================= --}}
                    <div class="form-section active space-y-6">

                        <!-- 🔴 YOUR ORIGINAL CODE (UNCHANGED) -->

                        <!-- Listing Type + Price Type -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold mb-4 text-gray-800">Type d'annonce et tarification</h3>
                            <div class="flex flex-wrap items-center gap-6 pb-4">
                                <div class="flex items-center gap-4">
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="checkbox" name="listing_type[]" value="À-vendre" class="w-4 h-4 text-green-600">
                                        <span class="text-gray-700">À vendre</span>
                                    </label>
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="checkbox" name="listing_type[]" value="À-louer" class="w-4 h-4 text-blue-600">
                                        <span class="text-gray-700">À louer</span>
                                    </label>
                                </div>

                                <div class="w-full grid grid-cols-2 md:grid-cols-4 gap-4">
                                    @foreach (['' => '-- Aucun --', 'nuit' => 'Par nuit', 'mois' => 'Par mois', 'an' => 'Par an'] as $val => $label)
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input type="radio" name="price_type" value="{{ $val }}" {{ $val === '' ? 'checked' : '' }} class="w-4 h-4 text-green-600">
                                            <span class="text-gray-700">{{ $label }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Title + Type -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold mb-4 text-gray-800">Informations principales</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Titre *</label>
                                    <input type="text" name="title" class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Type de propriété *</label>
                                    <select name="property_type" class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                                        <option value="">Sélectionnez un type</option>
                                        <option value="appartement">Appartement</option>
                                        <option value="villa">Villa</option>
                                        <option value="maison">Maison</option>
                                        <option value="studio">Studio</option>
                                        <option value="duplex">Duplex</option>
                                        <option value="triplex">Triplex</option>
                                        <option value="penthouse">Penthouse</option>
                                        <option value="loft">Loft</option>
                                        <option value="bureau">Bureau</option>
                                        <option value="commerce">Commerce</option>
                                        <option value="terrain">Terrain</option>
                                        <option value="garage">Garage/Parking</option>
                                        <option value="entrepot">Entrepôt</option>
                                        <option value="riad">Riad</option>
                                        <option value="chambre">Chambre</option>
                                        <option value="colocation">Colocation</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Location -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold mb-4 text-gray-800">Localisation</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Ville *</label>
                                    <input type="text" name="city" placeholder="Ville" class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Quartier</label>
                                    <input type="text" name="neighborhood" placeholder="Quartier" class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Adresse complète *</label>
                                <input type="text" name="address" placeholder="Adresse complète" class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                            </div>
                        </div>

                    </div>

                    {{-- ================= PART 2 ================= --}}
                    <div class="form-section space-y-6">

                        <!-- Property Details -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold mb-4 text-gray-800">Détails de la propriété</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Superficie (m²) *</label>
                                    <input type="number" name="surface" placeholder="Ex: 120" class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Prix (MAD) *</label>
                                    <input type="number" name="price" placeholder="Ex: 2500000" class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Nombre de chambres *</label>
                                    <input type="number" name="bedrooms" placeholder="Ex: 3" class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Nombre de salles de bain *</label>
                                    <input type="number" name="bathrooms" placeholder="Ex: 2" class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                                </div>
                            </div>
                        </div>

                        <!-- Contact & Availability -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold mb-4 text-gray-800">Contact et disponibilité</h3>
                            <div class="space-y-2 mb-6">
                                <label class="block text-sm font-medium text-gray-700">Téléphone de contact *</label>
                                <input type="tel" name="contact_phone" placeholder="Ex: +212 6XX XXX XXX" class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                            </div>

                            <!-- Dates -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Disponible à partir de *</label>
                                    <input type="date" name="available_from" class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Disponible jusqu'à</label>
                                    <input type="date" name="available_until" class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- ================= PART 3 ================= --}}
                    <div class="form-section space-y-6">

                        <!-- Description & Media -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold mb-4 text-gray-800">Description et médias</h3>
                            <div class="space-y-2 mb-6">
                                <label class="block text-sm font-medium text-gray-700">Description détaillée *</label>
                                <textarea name="description" rows="6" placeholder="Décrivez votre propriété en détail..." class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent resize-vertical" required></textarea>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Photos de la propriété *</label>
                                <input type="file" name="photos[]" multiple accept="image/*" class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-green-500 focus:border-transparent file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                                <p class="text-sm text-gray-500 mt-1">Sélectionnez plusieurs photos (max 10 images, 20MB chacune)</p>
                            </div>
                        </div>

                    </div>

                    {{-- NAVIGATION --}}
                    <div class="flex justify-between items-center mt-12 pt-8 border-t border-gray-200">
                        <button type="button" class="btn prev hidden bg-gray-100 text-gray-700 hover:bg-gray-200 px-6 py-3 rounded-lg font-medium transition-colors">
                            ← Précédent
                        </button>
                        <button type="button" class="btn next bg-green-600 text-white hover:bg-green-700 px-6 py-3 rounded-lg font-medium transition-colors">
                            Suivant →
                        </button>
                        <button type="submit" class="btn submit hidden bg-green-600 text-white hover:bg-green-700 px-8 py-3 rounded-lg font-medium transition-colors">
                            📤 Soumettre l'annonce
                        </button>
                    </div>

            </form>
        </div>
    </div>
</section>

{{-- STYLES --}}
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

/* Custom checkbox and radio styling */
input[type="checkbox"], input[type="radio"] {
    accent-color: #16a34a;
}

/* File input styling */
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

/* Focus states */
input:focus, select:focus, textarea:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.1);
}

/* Responsive improvements */
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

{{-- SCRIPT --}}
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

    sections[current].scrollIntoView({ behavior: 'smooth' });
}

nextBtn.onclick = () => { if (current < sections.length - 1) { current++; updateUI(); } };
prevBtn.onclick = () => { if (current > 0) { current--; updateUI(); } };

updateUI();
</script>
@endsection
