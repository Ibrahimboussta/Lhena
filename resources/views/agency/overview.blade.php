<x-app-layout>
    @section('title', 'Sorvarent - ' . __('ui.agency_overview_title'))

    <style>
        .agency-overview-stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
        }

        .agency-overview-stat {
            position: relative;
            overflow: hidden;
            border: 1px solid #e4e9e5;
            border-top: 3px solid var(--admin-accent);
            border-radius: 12px;
            background: #fff;
            padding: 20px;
            box-shadow: 0 3px 12px rgba(32, 54, 43, 0.04);
        }

        .agency-overview-stat::after {
            position: absolute;
            top: -24px;
            right: -24px;
            width: 84px;
            height: 84px;
            border-radius: 50%;
            background: rgba(217, 193, 140, 0.24);
            content: "";
        }

        .agency-overview-stat:nth-child(even) {
            border-top-color: var(--admin-green);
        }

        .agency-overview-stat:nth-child(even)::after {
            background: rgba(18, 63, 53, 0.08);
        }

        .agency-overview-stat__label,
        .agency-overview-stat__value,
        .agency-overview-stat__note {
            position: relative;
            z-index: 1;
        }

        .agency-overview-stat__label {
            color: #78827d;
            font-size: 11px;
            font-weight: 600;
        }

        .agency-overview-stat__value {
            margin-top: 12px;
            color: var(--admin-green);
            font-size: 29px;
            font-weight: 700;
            letter-spacing: -0.04em;
        }

        .agency-overview-stat__note {
            margin-top: 4px;
            color: #87918b;
            font-size: 10px;
        }

        .agency-overview-lower {
            display: grid;
            grid-template-columns: minmax(0, 1.4fr) minmax(240px, 0.8fr);
            gap: 18px;
            margin-top: 20px;
        }

        .agency-overview-panel {
            overflow: hidden;
            border: 1px solid #e4e9e5;
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 3px 12px rgba(32, 54, 43, 0.04);
        }

        .agency-overview-panel__header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            border-bottom: 1px solid #edf0ed;
            padding: 16px 18px;
        }

        .agency-overview-panel__title {
            color: #26332e;
            font-size: 13px;
            font-weight: 700;
        }

        .agency-overview-link {
            color: var(--admin-green);
            font-size: 10px;
            font-weight: 600;
            text-decoration: none;
        }

        .agency-overview-link:hover {
            text-decoration: underline;
        }

        .agency-overview-cta {
            display: inline-flex;
            min-height: 42px;
            flex: 0 0 auto;
            align-items: center;
            justify-content: center;
            gap: 9px;
            border: 1px solid #d9c18c;
            border-radius: 8px;
            background: #d9c18c;
            padding: 10px 16px;
            color: #26332e;
            font-size: 12px;
            font-weight: 600;
            line-height: 1.2;
            text-decoration: none;
            box-shadow: 0 3px 8px rgba(80, 65, 36, 0.12);
            transition: background-color 150ms ease, box-shadow 150ms ease, transform 150ms ease;
        }

        .agency-overview-cta:hover {
            border-color: #c7aa6b;
            background: #e6d2a5;
            color: #26332e;
            box-shadow: 0 5px 12px rgba(80, 65, 36, 0.16);
            transform: translateY(-1px);
        }

        .agency-overview-cta:focus-visible {
            outline: 3px solid rgba(138, 121, 87, 0.35);
            outline-offset: 3px;
        }

        .agency-overview-header__actions {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-end;
            gap: 10px;
        }

        .agency-overview-cta--small {
            min-height: 36px;
            margin-top: 12px;
            padding: 8px 13px;
            font-size: 11px;
        }

        @media (max-width: 600px) {
            .agency-overview-header {
                align-items: flex-start;
            }

            .agency-overview-header .agency-overview-cta {
                align-self: stretch;
            }
        }

        .agency-overview-recent {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            border-bottom: 1px solid #f0f2f0;
            padding: 13px 18px;
        }

        .agency-overview-recent:last-child {
            border-bottom: 0;
        }

        .agency-overview-recent__title {
            overflow: hidden;
            color: #3d433f;
            font-size: 11px;
            font-weight: 600;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .agency-overview-recent__meta {
            margin-top: 4px;
            color: #87918b;
            font-size: 10px;
        }

        .agency-overview-shortcuts {
            display: grid;
            gap: 8px;
            padding: 14px;
        }

        .agency-overview-shortcut {
            display: flex;
            min-height: 42px;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            border: 1px solid #e9eeea;
            border-radius: 8px;
            background: #fbfcfb;
            padding: 10px 12px;
            color: #405047;
            font-size: 11px;
            font-weight: 600;
            text-decoration: none;
            transition: background-color 140ms ease, border-color 140ms ease;
        }

        .agency-overview-shortcut:hover {
            border-color: #cbd9ce;
            background: #f3f7f3;
        }

        @media (max-width: 900px) {
            .agency-overview-lower {
                grid-template-columns: minmax(0, 1fr);
            }
        }

        @media (max-width: 600px) {
            .agency-overview-stats {
                grid-template-columns: minmax(0, 1fr);
                gap: 10px;
            }

            .agency-overview-stat {
                padding: 16px;
            }
        }
    </style>

    <div class="admin-page">
        <header class="admin-page-header agency-overview-header">
            <div>
                <span class="admin-status admin-status--neutral">{{ __('ui.agency_partner_space') }}</span>
                <h1 class="admin-page-title mt-3">{{ __('ui.agency_overview_title') }}</h1>
                <p class="admin-page-subtitle">{{ __('ui.agency_overview_subtitle') }}</p>
            </div>
            <div class="agency-overview-header__actions">
                <a href="{{ route('publish') }}" class="agency-overview-cta">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-7-7h14" />
                    </svg>
                    <span>{{ __('ui.add_property') }}</span>
                </a>
            </div>
        </header>

        <section class="agency-overview-stats" aria-label="{{ __('ui.agency_property_statistics') }}">
            <article class="agency-overview-stat">
                <p class="agency-overview-stat__label">{{ __('ui.my_properties') }}</p>
                <p class="agency-overview-stat__value">{{ number_format($stats['properties']) }}</p>
                <p class="agency-overview-stat__note">{{ __('ui.agency_portfolio_listings') }}</p>
            </article>
            <article class="agency-overview-stat">
                <p class="agency-overview-stat__label">{{ __('ui.online') }}</p>
                <p class="agency-overview-stat__value">{{ number_format($stats['published']) }}</p>
                <p class="agency-overview-stat__note">{{ __('ui.agency_visible_online') }}</p>
            </article>
            <article class="agency-overview-stat">
                <p class="agency-overview-stat__label">{{ __('ui.pending') }}</p>
                <p class="agency-overview-stat__value">{{ number_format($stats['pending']) }}</p>
                <p class="agency-overview-stat__note">{{ __('ui.agency_to_follow_or_publish') }}</p>
            </article>
        </section>

        <div class="agency-overview-lower">
            <section class="agency-overview-panel">
                <header class="agency-overview-panel__header">
                    <h2 class="agency-overview-panel__title">{{ __('ui.agency_recent_properties') }}</h2>
                    <a class="agency-overview-link" href="{{ route('dashboard') }}">{{ __('ui.agency_view_all') }}</a>
                </header>
                @forelse ($recentProperties as $property)
                    <div class="agency-overview-recent">
                        <div class="min-w-0">
                            <p class="agency-overview-recent__title">{{ $property->title }}</p>
                            <p class="agency-overview-recent__meta">
                                {{ $property->city }} · {{ __('ui.agency_added_on', ['date' => $property->created_at->format('d/m/Y')]) }}
                            </p>
                        </div>
                        <span class="admin-status {{ $property->published ? 'admin-status--success' : 'admin-status--pending' }}">
                            {{ $property->published ? __('ui.online') : __('ui.pending') }}
                        </span>
                    </div>
                @empty
                    <div class="p-8 text-center">
                        <p class="text-xs text-[#78827d]">{{ __('ui.agency_no_properties_yet') }}</p>
                        <a class="agency-overview-cta agency-overview-cta--small"
                            href="{{ route('publish') }}">{{ __('ui.agency_create_first_listing') }}</a>
                    </div>
                @endforelse
            </section>

            <section class="agency-overview-panel">
                <header class="agency-overview-panel__header">
                    <h2 class="agency-overview-panel__title">{{ __('ui.agency_quick_access') }}</h2>
                </header>
                <nav class="agency-overview-shortcuts" aria-label="{{ __('ui.agency_quick_access') }}">
                    <a class="agency-overview-shortcut" href="{{ route('dashboard') }}">
                        <span>{{ __('ui.agency_manage_properties') }}</span><span aria-hidden="true">→</span>
                    </a>
                    <a class="agency-overview-shortcut" href="{{ route('publish') }}">
                        <span>{{ __('ui.add_property') }}</span><span aria-hidden="true">→</span>
                    </a>
                    <a class="agency-overview-shortcut" href="{{ route('profile.edit') }}">
                        <span>{{ __('ui.agency_account_settings') }}</span><span aria-hidden="true">→</span>
                    </a>
                </nav>
            </section>
        </div>
    </div>
</x-app-layout>
