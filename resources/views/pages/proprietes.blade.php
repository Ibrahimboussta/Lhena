@extends('layouts.index')
@section('title', 'Lhena.ma - Propriétés')
@section('content')
<style>
    .properties-page {
        min-height: 100vh;
        background: #f4f8f5;
    }

    .properties-page__container {
        width: min(100% - 2rem, 1440px);
        margin: 0 auto;
        padding: 7rem 0 4rem;
    }

    .properties-page__heading {
        margin-bottom: 1.5rem;
    }

    .properties-page__eyebrow {
        color: #90764b;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.18em;
        text-transform: uppercase;
    }

    .properties-page__title {
        margin-top: 0.5rem;
        color: #242923;
        font-size: clamp(1.8rem, 3vw, 2.5rem);
        font-weight: 600;
        letter-spacing: -0.035em;
    }

    .properties-page__subtitle {
        margin-top: 0.5rem;
        color: #68736d;
        font-size: 0.95rem;
    }

    .properties-filter {
        position: relative;
        z-index: 20;
        margin-bottom: 2rem;
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 1.4rem;
        background: rgba(15, 25, 20, 0.92);
        padding: 1.25rem;
        box-shadow: 0 16px 38px rgba(23, 60, 46, 0.12);
        backdrop-filter: blur(22px);
        -webkit-backdrop-filter: blur(22px);
    }

    .properties-filter__header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .properties-filter__eyebrow {
        color: #d9c18c;
        font-size: 0.65rem;
        font-weight: 700;
        letter-spacing: 0.18em;
        text-transform: uppercase;
    }

    .properties-filter__tabs {
        display: flex;
        gap: 0.25rem;
        border-radius: 0.75rem;
        background: rgba(255, 255, 255, 0.08);
        padding: 0.25rem;
    }

    .properties-filter__tab {
        min-width: 5.5rem;
        border: 1px solid transparent;
        border-radius: 0.55rem;
        background: transparent;
        padding: 0.55rem 0.85rem;
        color: rgba(255, 255, 255, 0.68);
        font-size: 0.75rem;
        font-weight: 600;
        transition: background-color 180ms ease, color 180ms ease, border-color 180ms ease;
    }

    .properties-filter__tab:hover {
        background: rgba(255, 255, 255, 0.08);
        color: #fff;
    }

    .properties-filter__tab.is-active {
        background: #d9c18c;
        color: #17211b;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.18);
    }

    .properties-filter__basic,
    .properties-filter__range {
        display: grid;
        gap: 0.75rem;
    }

    .properties-filter__basic {
        grid-template-columns: repeat(4, minmax(0, 1fr));
    }

    .properties-filter__range {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .properties-filter__control {
        min-height: 48px;
        width: 100%;
        border: 1px solid rgba(255, 255, 255, 0.2) !important;
        border-radius: 0.75rem !important;
        background-color: rgba(255, 255, 255, 0.08) !important;
        padding: 0.75rem 0.9rem !important;
        color: #fff !important;
        font-size: 0.9rem !important;
        box-shadow: none !important;
    }

    .properties-filter__control:focus {
        border-color: #d9c18c !important;
        outline: none;
        box-shadow: 0 0 0 3px rgba(217, 193, 140, 0.2) !important;
    }

    .properties-filter__control::placeholder {
        color: rgba(255, 255, 255, 0.58);
    }

    .properties-filter .relative > div:first-child {
        min-height: 48px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 0.75rem;
        background: rgba(255, 255, 255, 0.08);
        padding: 0.75rem 0.9rem;
        color: #fff;
        box-shadow: none;
        transition: border-color 180ms ease, box-shadow 180ms ease, background-color 180ms ease;
    }

    .properties-filter .relative > div:first-child:hover {
        border-color: #d9c18c;
        background: rgba(255, 255, 255, 0.11);
    }

    .properties-filter .relative > div[x-show="open"] {
        overflow: hidden;
        margin-top: 0.4rem;
        border: 1px solid #e2e9e3;
        border-radius: 0.85rem;
        box-shadow: 0 12px 30px rgba(23, 60, 46, 0.12);
        color: #29332d;
    }

    .properties-filter .relative > div[x-show="open"] > input {
        min-height: 44px;
        border: 0;
        border-bottom: 1px solid #edf0ed;
        padding: 0.7rem 0.9rem;
        color: #34443c;
        outline: none;
    }

    .properties-filter .relative ul li {
        color: #52645a;
        transition: background-color 150ms ease, color 150ms ease;
    }

    .properties-filter .relative ul li:hover,
    .properties-filter .relative ul li.bg-emerald-100 {
        background: #f1f5f2;
        color: #0b3b31;
    }

    .properties-filter__submit {
        display: inline-flex;
        min-height: 48px;
        width: 100%;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        border: 0;
        border-radius: 0.75rem;
        background: #d9c18c;
        padding: 0.75rem 1rem;
        color: #17211b;
        font-size: 0.9rem;
        font-weight: 600;
        box-shadow: 0 5px 14px rgba(0, 0, 0, 0.2);
        transition: background-color 180ms ease, transform 180ms ease;
    }

    .properties-filter__submit:hover {
        transform: translateY(-1px);
        background: #e6d2a5;
    }

    .properties-card-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 1.5rem;
    }

    .properties-card {
        display: flex;
        min-width: 0;
        flex-direction: column;
        overflow: hidden;
        border: 1px solid #e7ece8;
        border-radius: 1.4rem;
        background: #fff;
        box-shadow: 0 2px 6px rgba(23, 60, 46, 0.04);
        transition: transform 300ms ease, box-shadow 300ms ease;
    }

    .properties-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 18px 34px rgba(23, 60, 46, 0.12);
    }

    .properties-card__image {
        position: relative;
        height: 15rem;
        overflow: hidden;
        background: #e8eee9;
    }

    .properties-card__image-link {
        position: absolute;
        inset: 0;
        display: block;
    }

    .properties-card__image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 700ms ease;
    }

    .properties-card:hover .properties-card__image img {
        transform: scale(1.05);
    }

    .properties-card__image::after {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.25), transparent 60%);
        content: "";
        pointer-events: none;
    }

    .properties-card__badge,
    .properties-card__photo-count {
        position: absolute;
        z-index: 1;
        border-radius: 9999px;
        background: rgba(255, 255, 255, 0.95);
        padding: 0.45rem 0.8rem;
        color: #796341;
        font-size: 0.65rem;
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .properties-card__badge {
        top: 1rem;
        left: 1rem;
    }

    .properties-card__photo-count {
        right: 1rem;
        bottom: 1rem;
        border-radius: 0.6rem;
        background: rgba(40, 51, 44, 0.85);
        color: #fff;
        letter-spacing: normal;
        text-transform: none;
        backdrop-filter: blur(8px);
    }

    .properties-card__body {
        display: flex;
        flex: 1;
        flex-direction: column;
        padding: 1.25rem;
    }

    .properties-card__type {
        color: #90764b;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .properties-card__title {
        overflow: hidden;
        margin-top: 0.25rem;
        color: #28332c;
        font-size: 1.2rem;
        font-weight: 600;
        text-overflow: ellipsis;
        white-space: nowrap;
        transition: color 180ms ease;
    }

    .properties-card:hover .properties-card__title {
        color: #0b3b31;
    }

    .properties-card__address {
        display: flex;
        align-items: center;
        gap: 0.4rem;
        overflow: hidden;
        margin-top: 0.5rem;
        color: #68736d;
        font-size: 0.875rem;
    }

    .properties-card__address img {
        width: 1rem;
        height: 1rem;
        flex: 0 0 auto;
        opacity: 0.7;
    }

    .properties-card__address span {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .properties-card__features {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-top: 1.25rem;
    }

    .properties-card__feature {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        border-radius: 0.6rem;
        background: #f1f5f2;
        padding: 0.5rem 0.65rem;
        color: #52645a;
        font-size: 0.75rem;
    }

    .properties-card__feature img {
        width: 1rem;
        height: 1rem;
        opacity: 0.7;
    }

    .properties-card__footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 0.75rem;
        margin-top: auto;
        border-top: 1px solid #edf0ed;
        padding-top: 1rem;
    }

    .properties-card__whatsapp {
        display: inline-flex;
        width: 100%;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        border-radius: 1rem;
        background: #003b31;
        padding: 0.85rem 1rem;
        color: #fff;
        font-size: 0.85rem;
        font-weight: 600;
        line-height: 1.3;
        text-align: center;
        text-decoration: none;
        box-shadow: 0 5px 14px rgba(0, 59, 49, 0.14);
        transition: background-color 180ms ease, box-shadow 180ms ease;
    }

    .properties-card__whatsapp:hover {
        background: #075344;
        box-shadow: 0 7px 18px rgba(0, 59, 49, 0.2);
    }

    .properties-card__whatsapp svg {
        width: 1.2rem;
        height: 1.2rem;
        flex: 0 0 auto;
    }

    .properties-card__price {
        margin-bottom: 0.85rem;
    }

    .properties-empty {
        grid-column: 1 / -1;
        border: 1px dashed #d4dfd6;
        border-radius: 1.25rem;
        background: rgba(255, 255, 255, 0.75);
        padding: 3rem 1.5rem;
        color: #68736d;
        text-align: center;
    }

    @media (max-width: 900px) {
        .properties-filter__basic {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .properties-card-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1.1rem;
        }
    }

    @media (max-width: 560px) {
        .properties-page__container {
            width: min(100% - 1.25rem, 1440px);
            padding-top: 6rem;
        }

        .properties-filter {
            padding: 1rem;
        }

        .properties-filter__header {
            align-items: flex-start;
            flex-direction: column;
        }

        .properties-filter__tabs {
            width: 100%;
        }

        .properties-filter__tab {
            min-width: 0;
            flex: 1;
            padding: 0.6rem 0.45rem;
            font-size: 0.8rem;
        }

        .properties-filter__basic,
        .properties-filter__range,
        .properties-card-grid {
            grid-template-columns: minmax(0, 1fr);
        }

        .properties-card__image {
            height: 14rem;
        }
    }
</style>

<section class="properties-page">
    <div class="properties-page__container">
        <div class="properties-page__heading">
            <p class="properties-page__eyebrow">Sélection Lhena</p>
            <h1 class="properties-page__title">Trouvez votre prochain coup de cœur</h1>
            <p class="properties-page__subtitle">Explorez notre sélection de biens immobiliers et trouvez celui qui vous correspond.</p>
        </div>

            <!-- Search Form -->
            <form action="{{ route('properties.search') }}" method="GET"
                x-data="{ active: @js(request()->filled('min_price') || request()->filled('max_price') ? 2 : ((request()->filled('from_date') || request()->filled('to_date')) ? 3 : 1)) }"
                class="properties-filter">

                <!-- Toggle Buttons -->
                <div class="properties-filter__header">
                    <span class="properties-filter__eyebrow">Recherche immobilière</span>
                    <div class="properties-filter__tabs">
                    <button type="button" @click="active = (active === 1 ? null : 1)" :class="{ 'is-active': active === 1 }" class="properties-filter__tab">
                        Filtres
                    </button>
                    <button type="button" @click="active = (active === 2 ? null : 2)" :class="{ 'is-active': active === 2 }" class="properties-filter__tab">
                        Prix
                    </button>
                    <button type="button" @click="active = (active === 3 ? null : 3)" :class="{ 'is-active': active === 3 }" class="properties-filter__tab">
                        Dates
                    </button>
                    </div>
                </div>

                <!-- Sections -->
                <div class="space-y-4">
                    <!-- Part 1: Basic Filters -->
                    <div x-show="active === 1" x-transition class="properties-filter__basic">
                        <input type="hidden" name="listing_type" value="À-louer">

                        <div x-data="{
  open: false,
  search: '',
  selected: @js(request('property_type', '')),
  types: [
    { value: '', label: 'Type' },
    { value: 'appartement', label: 'Appartement' },
    { value: 'maison', label: 'Maison' },
    { value: 'duplex', label: 'Duplex' },
    { value: 'studio', label: 'Studio' }
  ],
  get filtered() {
    return this.types.filter(o => o.label.toLowerCase().includes(this.search.toLowerCase()));
  }
}" @click.away="open = false" @keydown.escape.window="open = false" class="relative">
                            <div @click.stop="open = !open" class="flex cursor-pointer items-center justify-between text-sm">
                                <span x-text="types.find(o => o.value === selected)?.label || 'Type'"></span>
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                            </div>
                            <div x-show="open" x-cloak class="absolute z-50 w-full bg-white">
                                <input type="text" x-model="search" placeholder="Rechercher un type..." class="w-full text-sm focus:outline-none">
                                <ul class="max-h-48 overflow-y-auto">
                                    <template x-for="option in filtered" :key="option.value">
                                        <li @click="selected = option.value; open = false" :class="{'bg-emerald-100': selected === option.value}" class="px-3 py-2 cursor-pointer hover:bg-emerald-50 text-sm" x-text="option.label"></li>
                                    </template>
                                </ul>
                            </div>
                            <input type="hidden" name="property_type" :value="selected">
                        </div>

                        <div x-data="{
  open: false,
  search: '',
  selected: @js(request('ville', '')),
  villes: [
    { value: '', label: 'Ville' },
    { value: 'agadir', label: 'Agadir' },
    { value: 'ait melloul', label: 'Ait Melloul' },
    { value: 'asfi', label: 'Asfi' },
    { value: 'azemmour', label: 'Azemmour' },
    { value: 'ben guerir', label: 'Ben Guerir' },
    { value: 'beni mellal', label: 'Beni Mellal' },
    { value: 'berkane', label: 'Berkane' },
    { value: 'berrechid', label: 'Berrechid' },
    { value: 'boujdour', label: 'Boujdour' },
    { value: 'bouznika', label: 'Bouznika' },
    { value: 'casablanca', label: 'Casablanca' },
    { value: 'chefchaouen', label: 'Chefchaouen' },
    { value: 'dakhla', label: 'Dakhla' },
    { value: 'el jadida', label: 'El Jadida' },
    { value: 'el kelaa des sraghna', label: 'El Kelaa des Sraghna' },
    { value: 'errachidia', label: 'Errachidia' },
    { value: 'essaouira', label: 'Essaouira' },
    { value: 'fes', label: 'Fès' },
    { value: 'fnideq', label: 'Fnideq' },
    { value: 'guelmim', label: 'Guelmim' },
    { value: 'guercif', label: 'Guercif' },
    { value: 'ifrane', label: 'Ifrane' },
    { value: 'kenitra', label: 'Kénitra' },
    { value: 'khemisset', label: 'Khemisset' },
    { value: 'khenifra', label: 'Khenifra' },
    { value: 'khouribga', label: 'Khouribga' },
    { value: 'laayoune', label: 'Laâyoune' },
    { value: 'larache', label: 'Larache' },
    { value: 'marrakech', label: 'Marrakech' },
    { value: 'martil', label: 'Martil' },
    { value: 'mechra bel ksiri', label: 'Mechra Bel Ksiri' },
    { value: 'meknes', label: 'Meknès' },
    { value: 'midelt', label: 'Midelt' },
    { value: 'mohammedia', label: 'Mohammedia' },
    { value: 'nador', label: 'Nador' },
    { value: 'ouarzazate', label: 'Ouarzazate' },
    { value: 'ouazzane', label: 'Ouazzane' },
    { value: 'oued zem', label: 'Oued Zem' },
    { value: 'oujda', label: 'Oujda' },
    { value: 'rabat', label: 'Rabat' },
    { value: 'safi', label: 'Safi' },
    { value: 'sale', label: 'Salé' },
    { value: 'sefrou', label: 'Sefrou' },
    { value: 'settat', label: 'Settat' },
    { value: 'sidi bennour', label: 'Sidi Bennour' },
    { value: 'sidi kacem', label: 'Sidi Kacem' },
    { value: 'sidi slimane', label: 'Sidi Slimane' },
    { value: 'skhirat', label: 'Skhirat' },
    { value: 'tanger', label: 'Tanger' },
    { value: 'taourirt', label: 'Taourirt' },
    { value: 'tarfaya', label: 'Tarfaya' },
    { value: 'taroudant', label: 'Taroudant' },
    { value: 'taza', label: 'Taza' },
    { value: 'temara', label: 'Témara' },
    { value: 'tetouan', label: 'Tétouan' },
    { value: 'tinghir', label: 'Tinghir' },
    { value: 'tiznit', label: 'Tiznit' },
    { value: 'zagora', label: 'Zagora' }
  ],
  get filtered() {
    return this.villes.filter(o => o.label.toLowerCase().includes(this.search.toLowerCase()));
  }
}" @keydown.escape.window="open = false" class="relative">
                            <div @click.stop="open = !open" class="flex cursor-pointer items-center justify-between text-sm">
                                <span x-text="villes.find(o => o.value === selected)?.label || 'Ville'"></span>
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                            </div>
                            <div x-show="open" x-cloak @click.away="open = false" class="absolute z-50 w-full bg-white">
                                <input type="text" x-model="search" placeholder="Rechercher une ville..." class="w-full text-sm focus:outline-none">
                                <ul class="max-h-48 overflow-y-auto">
                                    <template x-for="option in filtered" :key="option.value">
                                        <li @click="selected = option.value; open = false" :class="{'bg-emerald-100': selected === option.value}" class="px-3 py-2 cursor-pointer hover:bg-emerald-50 text-sm" x-text="option.label"></li>
                                    </template>
                                </ul>
                            </div>
                            <input type="hidden" name="ville" :value="selected">
                        </div>

                        <div x-data="{
  open: false,
  search: '',
  selected: @js(request('quartier', '')),
  quartiers: [
    { value: '', label: 'Quartier' },
    { value: 'centre-ville', label: 'Centre-ville' },
    { value: 'residence', label: 'Résidentiel' },
    { value: 'bord', label: 'Bord de mer' },
    { value: 'maarif', label: 'Maârif' },
    { value: 'gueliz', label: 'Guéliz' },
    { value: 'agdal', label: 'Agdal' },
    { value: 'hay hassani', label: 'Hay Hassani' },
    { value: 'ain sebaa', label: 'Aïn Sebaâ' },
    { value: 'sidi maarouf', label: 'Sidi Maârouf' },
    { value: 'ain diab', label: 'Aïn Diab' },
    { value: 'sidi moumen', label: 'Sidi Moumen' },
    { value: 'hay el fath', label: 'Hay El Fath' },
    { value: 'hay riad', label: 'Hay Riad' },
    { value: 'bouskoura', label: 'Bouskoura' },
    { value: 'oulfa', label: 'Oulfa' },
    { value: 'el jadida', label: 'El Jadida' },
    { value: 'sidi bouzid', label: 'Sidi Bouzid' },
    { value: 'medina', label: 'Médina' },
    { value: 'sidi bernoussi', label: 'Sidi Bernoussi' },
    { value: 'anfa', label: 'Anfa' },
    { value: 'californie', label: 'Californie' },
    { value: 'ain chok', label: 'Aïn Chock' },
    { value: 'sidi othmane', label: 'Sidi Othmane' },
    { value: 'el manar', label: 'El Manar' },
    { value: 'el houda', label: 'El Houda' },
    { value: 'souk el had', label: 'Souk El Had' },
    { value: 'sidi abbad', label: 'Sidi Abbad' },
    { value: 'targa', label: 'Targa' },
    { value: 'mhamid', label: 'Mhamid' },
    { value: 'massira', label: 'Massira' },
    { value: 'sidi youssef ben ali', label: 'Sidi Youssef Ben Ali' },
    { value: 'ain mezouar', label: 'Aïn Mezouar' },
    { value: 'autres', label: 'Autres...' }
  ],
  get filtered() {
    return this.quartiers.filter(o => o.label.toLowerCase().includes(this.search.toLowerCase()));
  }
}" @keydown.escape.window="open = false" class="relative">
                            <div @click.stop="open = !open" class="flex cursor-pointer items-center justify-between text-sm">
                                <span x-text="quartiers.find(o => o.value === selected)?.label || 'Quartier'"></span>
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                            </div>
                            <div x-show="open" x-cloak @click.away="open = false" class="absolute z-50 w-full bg-white">
                                <input type="text" x-model="search" placeholder="Rechercher un quartier..." class="w-full text-sm focus:outline-none">
                                <ul class="max-h-48 overflow-y-auto">
                                    <template x-for="option in filtered" :key="option.value">
                                        <li @click="selected = option.value; open = false" :class="{'bg-emerald-100': selected === option.value}" class="px-3 py-2 cursor-pointer hover:bg-emerald-50 text-sm" x-text="option.label"></li>
                                    </template>
                                </ul>
                            </div>
                            <input type="hidden" name="quartier" :value="selected">
                        </div>
                        <button type="submit" class="properties-filter__submit">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                            </svg>
                            Rechercher
                        </button>
                    </div>

                    <!-- Part 2: Price Range -->
                    <div x-show="active === 2" x-transition class="properties-filter__range">
                        <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Prix min" min="0" class="properties-filter__control">
                        <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Prix max" min="0" class="properties-filter__control">
                        <button type="submit" class="properties-filter__submit">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                            </svg>
                            Rechercher
                        </button>
                    </div>

                    <!-- Part 3: Date Range -->
                    <div x-show="active === 3" x-transition class="properties-filter__range">
                        <input type="date" name="from_date" value="{{ request('from_date') }}" class="properties-filter__control">
                        <input type="date" name="to_date" value="{{ request('to_date') }}" class="properties-filter__control">
                        <button type="submit" class="properties-filter__submit">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                            </svg>
                            Rechercher
                        </button>
                    </div>
                </div>
            </form>


            <!-- Property Cards -->
            <div class="properties-card-grid">
                    @foreach ($properties->take(9) as $property)
                    @php
                        $photos = json_decode($property->photos, true);
                        $photoCount = is_array($photos) ? max(count($photos), 1) : 1;
                        $firstPhoto = is_array($photos) && count($photos) > 0
                            ? asset('storage/' . $photos[0])
                            : asset('images/appart1.jpg');
                        $propertyUrl = route('proprites.details', $property->slug);
                        $whatsappMessage = 'Bonjour, je souhaite en savoir plus sur le bien « ' . $property->title . ' ». ' . $propertyUrl;
                        $whatsappUrl = 'https://wa.me/212634262436?text=' . urlencode($whatsappMessage);
                    @endphp
                    <article class="properties-card">
                        <div class="properties-card__image">
                            <a href="{{ $propertyUrl }}" class="properties-card__image-link" aria-label="Voir {{ $property->title }}">
                                <img src="{{ $firstPhoto }}" alt="{{ $property->title }}" loading="lazy">
                            </a>
                            <span class="properties-card__badge">
                                {{ strpos($property->listing_type, 'À-louer') !== false ? 'À louer' : $property->listing_type }}
                            </span>
                            <span class="properties-card__photo-count">1 / {{ $photoCount }} photos</span>
                        </div>

                        <div class="properties-card__body">
                            <p class="properties-card__type">{{ $property->property_type }}</p>
                            <h2 class="properties-card__title">
                                <a href="{{ $propertyUrl }}">{{ $property->title }}</a>
                            </h2>
                            <div class="properties-card__address">
                                <img src="{{ asset('images/local.svg') }}" alt="">
                                <span>{{ $property->address }}</span>
                            </div>

                            <div class="properties-card__features">
                                <span class="properties-card__feature">
                                    <img src="{{ asset('images/beds.svg') }}" alt="">
                                    {{ $property->bedrooms }} chambres
                                </span>
                                <span class="properties-card__feature">
                                    <img src="{{ asset('images/dosh.svg') }}" alt="">
                                    {{ $property->bathrooms }} salles de bain
                                </span>
                                @if (!is_null($property->surface))
                                    <span class="properties-card__feature">
                                        <img src="{{ asset('images/space.svg') }}" alt="">
                                        {{ $property->surface }} m²
                                    </span>
                                @endif
                            </div>

                            <div class="properties-card__footer">
                                <div class="w-full">
                                    <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" class="properties-card__whatsapp">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 11.5a8.4 8.4 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.4 8.4 0 0 1-3.8-.9L3 21l1.9-5.7a8.4 8.4 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.4 8.4 0 0 1 3.8-.9h.5a8.5 8.5 0 0 1 8 8v.5Z" />
                                        </svg>
                                        <span>Consulter sur WhatsApp</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                    @endforeach

                    @if ($properties->isEmpty())
                        <div class="properties-empty">
                            Aucun bien ne correspond à votre recherche. Modifiez vos filtres et réessayez.
                        </div>
                    @endif
            </div>

            <!-- Pagination -->
            <div class="flex justify-center pt-6">
                <div class="flex space-x-2">
                    {{ $properties->links('vendor.pagination.custom') }}
                </div>
            </div>




    </div>
</section>


<script src="//unpkg.com/alpinejs" defer></script>

@endsection
