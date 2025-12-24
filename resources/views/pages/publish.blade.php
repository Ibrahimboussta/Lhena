@extends('layouts.index')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<section class="px-6 pb-24">
    <h1 class="text-4xl font-bold pt-24 mb-10">Publier une annonce</h1>

    <div class="max-w-6xl mx-auto">
        <div class="bg-white border rounded-xl shadow-lg p-8">

            {{-- ERRORS --}}
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('proprites.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- STEP HEADER --}}
                <div class="flex justify-between mb-10">
                    <div class="step active">1. Informations</div>
                    <div class="step">2. Détails</div>
                    <div class="step">3. Médias</div>
                </div>

                {{-- ================= PART 1 ================= --}}
                <div class="form-section active">

                    <!-- 🔴 YOUR ORIGINAL CODE (UNCHANGED) -->

                    <!-- Listing Type + Price Type -->
                    <div class="flex flex-wrap items-center gap-4 pb-5">
                        <div class="flex items-center gap-4">
                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="listing_type[]" value="À-vendre">
                                <span>À vendre</span>
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="listing_type[]" value="À-louer">
                                <span>À louer</span>
                            </label>
                        </div>

                        <div class="w-full grid grid-cols-2 md:grid-cols-4 gap-4">
                            @foreach (['' => '-- Aucun --', 'nuit' => 'Par nuit', 'mois' => 'Par mois', 'an' => 'Par an'] as $val => $label)
                                <label class="flex items-center gap-2">
                                    <input type="radio" name="price_type" value="{{ $val }}" {{ $val === '' ? 'checked' : '' }}>
                                    <span>{{ $label }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Title + Type -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block mb-1">Titre *</label>
                            <input type="text" name="title" class="border p-2 rounded w-full" required>
                        </div>
                        <div>
                            <label class="block mb-1">Type *</label>
                            <select name="property_type" class="border p-2 rounded w-full" required>
                                <option value="">Sélectionnez</option>
                                <option value="appartement">Appartement</option>
                                <option value="villa">Villa</option>
                            </select>
                        </div>
                    </div>

                    <!-- City + Neighborhood -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <input type="text" name="city" placeholder="Ville" class="border p-2 rounded w-full" required>
                        <input type="text" name="neighborhood" placeholder="Quartier" class="border p-2 rounded w-full">
                    </div>

                    <!-- Address -->
                    <input type="text" name="address" placeholder="Adresse complète" class="border p-2 rounded w-full mb-4">

                </div>

                {{-- ================= PART 2 ================= --}}
                <div class="form-section">

                    <!-- Surface + Rooms -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <input type="number" name="surface" placeholder="Superficie (m²)" class="border p-2 rounded w-full" required>
                        <input type="number" name="price" placeholder="Prix (MAD)" class="border p-2 rounded w-full" required>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <input type="number" name="bedrooms" placeholder="Chambres" class="border p-2 rounded w-full" required>
                        <input type="number" name="bathrooms" placeholder="Salles de bain" class="border p-2 rounded w-full" required>
                    </div>

                    <input type="tel" name="contact_phone" placeholder="Téléphone" class="border p-2 rounded w-full mb-4" required>

                    <!-- Dates -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <input type="date" name="available_from" class="border p-2 rounded w-full" required>
                        <input type="date" name="available_until" class="border p-2 rounded w-full">
                    </div>

                </div>

                {{-- ================= PART 3 ================= --}}
                <div class="form-section">

                    <!-- Description -->
                    <textarea name="description" rows="4" class="border p-2 rounded w-full mb-4" required></textarea>

                    <!-- Photos -->
                    <input type="file" name="photos[]" multiple class="border p-2 rounded w-full">

                </div>

                {{-- NAVIGATION --}}
                <div class="flex justify-between mt-10">
                    <button type="button" class="btn prev hidden">Précédent</button>
                    <button type="button" class="btn next">Suivant</button>
                    <button type="submit" class="btn submit hidden bg-green-600 text-white">
                        Soumettre l'annonce
                    </button>
                </div>

            </form>
        </div>
    </div>
</section>

{{-- STYLES --}}
<style>
.step {
    padding: 8px 16px;
    border-radius: 9999px;
    border: 1px solid #d1d5db;
    color: #6b7280;
    font-weight: 500;
}
.step.active {
    background: #16a34a;
    color: white;
    border-color: #16a34a;
}

.form-section {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.5s ease;
}
.form-section.active {
    max-height: 5000px;
}

.btn {
    padding: 10px 24px;
    border-radius: 8px;
    border: 1px solid #d1d5db;
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
