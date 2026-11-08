<x-app-layout>
    @section('title', 'Lhena.ma - Mes propriétés')

    <style>
        .agency-property-toolbar {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 20px;
            border: 1px solid #e4e9e5;
            border-radius: 12px;
            background: #fff;
            padding: 12px 14px;
        }

        .agency-property-search {
            width: min(100%, 340px);
            min-height: 38px;
            border: 1px solid #e4e9e5;
            border-radius: 8px;
            background: #f7f9f7;
            padding: 8px 11px;
            color: #26332e;
            font-size: 11px;
        }

        .agency-filter-list {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .agency-filter {
            min-height: 32px;
            border-radius: 7px;
            background: #f0f4f0;
            padding: 7px 10px;
            color: #536159;
            font-size: 10px;
            font-weight: 600;
        }

        .agency-filter.is-active {
            background: #123f35;
            color: #fff;
        }

        .agency-properties-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .agency-property-card {
            display: grid;
            min-width: 0;
            grid-template-columns: minmax(130px, 0.72fr) minmax(0, 1.28fr);
            overflow: hidden;
            border: 1px solid #e4e9e5;
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 3px 12px rgba(32, 54, 43, 0.04);
        }

        .agency-property-card__image {
            position: relative;
            min-height: 220px;
            background: #edf2ee;
        }

        .agency-property-card__image img {
            width: 100%;
            height: 100%;
            min-height: 220px;
            object-fit: cover;
        }

        .agency-property-card__body {
            display: flex;
            min-width: 0;
            flex-direction: column;
            padding: 16px;
        }

        .agency-property-card__location {
            margin-top: 8px;
            color: #8a7957;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 0.07em;
            text-transform: uppercase;
        }

        .agency-property-card__title {
            margin-top: 6px;
            color: #173f36;
            font-size: 16px;
            font-weight: 700;
            line-height: 1.35;
        }

        .agency-property-card__address {
            overflow: hidden;
            margin-top: 5px;
            color: #7a857e;
            font-size: 10px;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .agency-property-card__description {
            display: -webkit-box;
            overflow: hidden;
            margin-top: 10px;
            color: #68756d;
            font-size: 11px;
            line-height: 1.5;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }

        .agency-property-card__details {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-top: 12px;
        }

        .agency-property-card__detail {
            border-radius: 6px;
            background: #f1f5f1;
            padding: 5px 7px;
            color: #526057;
            font-size: 9px;
        }

        .agency-property-card__footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            margin-top: auto;
            padding-top: 14px;
        }

        .agency-property-card__price {
            color: #173f36;
            font-size: 15px;
            font-weight: 700;
        }

        .agency-property-card__price small {
            color: #89928c;
            font-size: 9px;
            font-weight: 400;
        }

        .agency-property-card__delete {
            min-height: 30px;
            border: 1px solid #f0dfda;
            border-radius: 7px;
            background: #fff8f6;
            padding: 6px 9px;
            color: #a64e3c;
            font-size: 10px;
            font-weight: 600;
        }

        .agency-property-card__delete:hover {
            background: #fcece7;
        }

        .agency-property-empty {
            grid-column: 1 / -1;
            border: 1px dashed #d7e0d8;
            border-radius: 12px;
            background: #fff;
            padding: 46px 20px;
            text-align: center;
        }

        @media (max-width: 1100px) {
            .agency-properties-grid {
                grid-template-columns: minmax(0, 1fr);
            }
        }

        @media (max-width: 560px) {
            .agency-property-card {
                grid-template-columns: minmax(0, 1fr);
            }

            .agency-property-card__image,
            .agency-property-card__image img {
                height: 200px;
                min-height: 200px;
            }
        }
    </style>

    <div class="admin-page" x-data="{
        search: '',
        filter: 'all',
        matches(card) {
            const matchesSearch = card.dataset.search.includes(this.search.toLowerCase());
            const matchesStatus = this.filter === 'all' || card.dataset.status === this.filter;
            return matchesSearch && matchesStatus;
        }
    }">
        @if (session('success'))
            <div class="mb-5 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-xs font-medium text-green-800"
                role="status">
                {{ session('success') }}
            </div>
        @endif

        <header class="admin-page-header">
            <div>
                <span class="admin-status admin-status--success">Espace agence partenaire</span>
                <h1 class="admin-page-title mt-3">Mes propriétés listées</h1>
                <p class="admin-page-subtitle">Gérez vos annonces et suivez leur statut depuis votre espace agence.</p>
            </div>
            <a href="{{ route('publish') }}"
                class="inline-flex min-h-10 items-center justify-center gap-2 rounded-lg bg-[#123f35] px-4 py-2 text-xs font-semibold text-white transition hover:bg-[#0c3028]">
                <span aria-hidden="true">＋</span> Ajouter une propriété
            </a>
        </header>

        <div class="agency-property-toolbar">
            <input class="agency-property-search" type="search" x-model="search"
                placeholder="Rechercher par nom, ville ou adresse…" aria-label="Rechercher dans mes propriétés">
            <div class="agency-filter-list" aria-label="Filtrer les propriétés">
                <button type="button" class="agency-filter" :class="{ 'is-active': filter === 'all' }"
                    @click="filter = 'all'">Toutes ({{ $stats['all'] }})</button>
                <button type="button" class="agency-filter" :class="{ 'is-active': filter === 'published' }"
                    @click="filter = 'published'">En ligne ({{ $stats['published'] }})</button>
                <button type="button" class="agency-filter" :class="{ 'is-active': filter === 'pending' }"
                    @click="filter = 'pending'">En attente ({{ $stats['pending'] }})</button>
            </div>
        </div>

        <div class="agency-properties-grid">
            @forelse ($properties as $property)
                @php
                    $photos = json_decode($property->photos, true) ?: [];
                    $searchText = mb_strtolower($property->title . ' ' . $property->city . ' ' . $property->address);
                @endphp
                <article class="agency-property-card"
                    data-property-id="{{ $property->id }}"
                    data-photos="{{ json_encode($photos) }}"
                    data-search="{{ $searchText }}"
                    data-status="{{ $property->published ? 'published' : 'pending' }}"
                    x-show="matches($el)">
                    <div class="agency-property-card__image">
                        @if ($photos)
                            <button type="button" class="h-full w-full" onclick="openGalleryModal({{ $property->id }})"
                                aria-label="Voir les photos de {{ $property->title }}">
                                <img src="{{ asset('storage/' . $photos[0]) }}" alt="{{ $property->title }}" loading="lazy">
                            </button>
                        @else
                            <div class="flex h-full items-center justify-center text-xs text-gray-400">Aucune photo</div>
                        @endif
                    </div>

                    <div class="agency-property-card__body">
                        <div class="flex items-center justify-between gap-2">
                            <span class="admin-status {{ $property->published ? 'admin-status--success' : 'admin-status--pending' }}">
                                {{ $property->published ? '● En ligne' : '● En attente' }}
                            </span>
                            <span class="agency-property-card__location">{{ $property->city }}</span>
                        </div>

                        <h2 class="agency-property-card__title">{{ $property->title }}</h2>
                        <p class="agency-property-card__address">{{ $property->address }}</p>
                        @if ($property->description)
                            <p class="agency-property-card__description">{{ strip_tags($property->description) }}</p>
                        @endif

                        <div class="agency-property-card__details">
                            <span class="agency-property-card__detail">{{ ucfirst($property->property_type) }}</span>
                            @if ($property->surface)
                                <span class="agency-property-card__detail">{{ $property->surface }} m²</span>
                            @endif
                            <span class="agency-property-card__detail">{{ $property->bedrooms }} chambres</span>
                            <span class="agency-property-card__detail">{{ $property->bathrooms }} salles de bain</span>
                        </div>

                        <div class="agency-property-card__footer">
                            <p class="agency-property-card__price">
                                {{ number_format($property->price, 0, ',', ' ') }} DH
                                @if ($property->price_type)
                                    <small>/ {{ $property->price_type }}</small>
                                @endif
                            </p>
                            <form action="{{ route('properties.destroy', $property->id) }}" method="POST"
                                onsubmit="return confirm('Supprimer cette propriété ?')">
                                @csrf
                                @method('DELETE')
                                <button class="agency-property-card__delete" type="submit">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </article>
            @empty
                <div class="agency-property-empty">
                    <p class="text-sm font-semibold text-[#26332e]">Aucune propriété pour le moment</p>
                    <p class="mt-2 text-xs text-[#78827d]">Ajoutez votre première annonce pour la voir apparaître ici.</p>
                    <a href="{{ route('publish') }}"
                        class="mt-5 inline-flex rounded-lg bg-[#123f35] px-4 py-2 text-xs font-semibold text-white hover:bg-[#0c3028]">
                        Ajouter une propriété
                    </a>
                </div>
            @endforelse
        </div>

        @if ($properties->hasPages())
            <div class="mt-5">{{ $properties->links('pagination::tailwind') }}</div>
        @endif
    </div>

    <div id="galleryModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/80 p-4"
        onclick="if (event.target === this) closeGalleryModal()">
        <div class="relative flex max-h-[90vh] w-full max-w-5xl flex-col overflow-hidden rounded-xl bg-[#101512]">
            <div class="flex items-center justify-between px-5 py-4">
                <p class="text-sm font-semibold text-white">Galerie de la propriété</p>
                <button type="button" onclick="closeGalleryModal()" class="rounded-full bg-white/10 px-3 py-1 text-sm text-white"
                    aria-label="Fermer la galerie">✕</button>
            </div>
            <div id="galleryContent" class="grid grid-cols-2 gap-3 overflow-y-auto p-4 sm:grid-cols-3"></div>
        </div>
    </div>

    <script>
        function openGalleryModal(propertyId) {
            const card = document.querySelector(`.agency-property-card[data-property-id="${propertyId}"]`);
            if (!card) return;

            const photos = JSON.parse(card.dataset.photos || '[]');
            const gallery = document.getElementById('galleryContent');
            gallery.replaceChildren();

            photos.forEach((photo, index) => {
                const image = document.createElement('img');
                image.src = `/storage/${photo}`;
                image.alt = `Photo ${index + 1} de la propriété`;
                image.className = 'h-40 w-full rounded-lg object-cover sm:h-52';
                gallery.appendChild(image);
            });

            document.getElementById('galleryModal').classList.replace('hidden', 'flex');
            document.body.style.overflow = 'hidden';
        }

        function closeGalleryModal() {
            document.getElementById('galleryModal').classList.replace('flex', 'hidden');
            document.body.style.overflow = '';
        }

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') closeGalleryModal();
        });
    </script>
</x-app-layout>
