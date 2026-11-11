<x-app-layout>
    @section('title', 'SorvaRent - ' . __('ui.admin_overview'))

    <style>
        .overview-stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
        }

        .overview-stat {
            position: relative;
            overflow: hidden;
            border: 1px solid #e4e9e5;
            border-top: 3px solid var(--admin-accent);
            border-radius: 12px;
            background: #fff;
            padding: 18px;
            box-shadow: 0 3px 12px rgba(32, 54, 43, 0.04);
        }

        .overview-stat::after {
            position: absolute;
            top: -25px;
            right: -25px;
            width: 88px;
            height: 88px;
            border-radius: 50%;
            background: rgba(217, 193, 140, 0.24);
            content: "";
        }

        .overview-stat:nth-child(even) {
            border-top-color: var(--admin-green);
        }

        .overview-stat:nth-child(even)::after {
            background: rgba(18, 63, 53, 0.08);
        }

        .overview-stat__label {
            position: relative;
            z-index: 1;
            color: #78827d;
            font-size: 11px;
            font-weight: 600;
        }

        .overview-stat__value {
            position: relative;
            z-index: 1;
            margin-top: 12px;
            color: var(--admin-green);
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.04em;
        }

        .overview-stat__note {
            position: relative;
            z-index: 1;
            margin-top: 4px;
            color: #87918b;
            font-size: 10px;
        }

        .overview-lower {
            display: grid;
            grid-template-columns: minmax(0, 1.4fr) minmax(240px, 0.8fr);
            gap: 18px;
            margin-top: 20px;
        }

        .overview-panel {
            overflow: hidden;
            border: 1px solid #e4e9e5;
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 3px 12px rgba(32, 54, 43, 0.04);
        }

        .overview-panel__header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            border-bottom: 1px solid #edf0ed;
            padding: 16px 18px;
        }

        .overview-panel__title {
            color: #26332e;
            font-size: 13px;
            font-weight: 700;
        }

        .overview-panel__link {
            color: var(--admin-green);
            font-size: 10px;
            font-weight: 600;
            text-decoration: none;
        }

        .overview-panel__link:hover {
            text-decoration: underline;
        }

        .overview-home-link {
            display: inline-flex;
            min-height: 38px;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: 1px solid #173f36;
            border-radius: 8px;
            background: #173f36;
            padding: 8px 13px;
            color: #fff;
            font-size: 11px;
            font-weight: 600;
            text-decoration: none;
            transition: background-color 150ms ease, transform 150ms ease;
        }

        .overview-home-link:hover {
            background: #0b4b3e;
            transform: translateY(-1px);
        }

        .overview-header-actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: flex-end;
            gap: 10px;
        }

        .overview-recent {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            border-bottom: 1px solid #f0f2f0;
            padding: 13px 18px;
        }

        .overview-recent:last-child {
            border-bottom: 0;
        }

        .overview-recent__title {
            overflow: hidden;
            color: #3d433f;
            font-size: 11px;
            font-weight: 600;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .overview-recent__meta {
            margin-top: 4px;
            color: #87918b;
            font-size: 10px;
        }

        .overview-shortcuts {
            display: grid;
            gap: 8px;
            padding: 14px;
        }

        .overview-shortcut {
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

        .overview-shortcut:hover {
            border-color: #dfd1b3;
            background: #faf7ef;
        }

        .overview-shortcut span:last-child {
            color: #829087;
            font-size: 14px;
        }

        @media (max-width: 1000px) {
            .overview-stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .overview-lower {
                grid-template-columns: minmax(0, 1fr);
            }
        }

        @media (max-width: 480px) {
            .overview-stats {
                gap: 10px;
            }

            .overview-stat {
                padding: 14px;
            }

            .overview-stat__value {
                font-size: 24px;
            }
        }
    </style>

    <div class="admin-page">
        <header class="admin-page-header">
            <div>
                <h1 class="admin-page-title">{{ __('ui.admin_overview') }}</h1>
                <p class="admin-page-subtitle">{{ __('ui.admin_overview_subtitle') }}</p>
            </div>
            <div class="overview-header-actions">
                <span class="admin-count-badge">{{ now()->translatedFormat('l d F Y') }}</span>
                <a class="overview-home-link" href="{{ route('publish') }}">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-7-7h14" />
                    </svg>
                    <span>{{ __('ui.admin_add_property') }}</span>
                </a>
            </div>
        </header>

        <section class="overview-stats" aria-label="{{ __('ui.admin_global_statistics') }}">
            <article class="overview-stat">
                <p class="overview-stat__label">{{ __('ui.users') }}</p>
                <p class="overview-stat__value">{{ number_format($stats['users']) }}</p>
                <p class="overview-stat__note">{{ __('ui.admin_registered_accounts') }}</p>
            </article>
            <article class="overview-stat">
                <p class="overview-stat__label">{{ __('ui.properties') }}</p>
                <p class="overview-stat__value">{{ number_format($stats['properties']) }}</p>
                <p class="overview-stat__note">{{ number_format($stats['publishedProperties']) }} {{ __('ui.admin_published_listings') }}</p>
            </article>
            <article class="overview-stat">
                <p class="overview-stat__label">{{ __('ui.contacts') }}</p>
                <p class="overview-stat__value">{{ number_format($stats['contacts']) }}</p>
                <p class="overview-stat__note">{{ __('ui.admin_requests_received') }}</p>
            </article>
            <article class="overview-stat">
                <p class="overview-stat__label">{{ __('ui.emails') }}</p>
                <p class="overview-stat__value">{{ number_format($stats['emails']) }}</p>
                <p class="overview-stat__note">{{ __('ui.admin_newsletter_subscribers') }}</p>
            </article>
        </section>

        <div class="overview-lower">
            <section class="overview-panel">
                <header class="overview-panel__header">
                    <h2 class="overview-panel__title">{{ __('ui.admin_recent_properties') }}</h2>
                    <a class="overview-panel__link" href="{{ route('proprites.admin') }}">{{ __('ui.admin_view_all_properties') }}</a>
                </header>
                @forelse ($recentProperties as $property)
                    <div class="overview-recent">
                        <div class="min-w-0">
                            <p class="overview-recent__title">{{ $property->title }}</p>
                            <p class="overview-recent__meta">
                                {{ $property->city }} · {{ $property->user?->name ?? __('ui.admin_owner_unavailable') }}
                            </p>
                        </div>
                        <span class="admin-status {{ $property->published ? 'admin-status--success' : 'admin-status--pending' }}">
                            {{ $property->published ? __('ui.admin_published') : __('ui.admin_pending') }}
                        </span>
                    </div>
                @empty
                    <p class="admin-empty">{{ __('ui.admin_no_properties_registered') }}</p>
                @endforelse
            </section>

            <section class="overview-panel">
                <header class="overview-panel__header">
                    <h2 class="overview-panel__title">{{ __('ui.admin_quick_access') }}</h2>
                </header>
                <nav class="overview-shortcuts" aria-label="{{ __('ui.admin_quick_access') }}">
                    <a class="overview-shortcut" href="{{ route('users') }}"><span>{{ __('ui.admin_manage_users') }}</span><span aria-hidden="true">→</span></a>
                    <a class="overview-shortcut" href="{{ route('proprites.admin') }}"><span>{{ __('ui.admin_view_properties') }}</span><span aria-hidden="true">→</span></a>
                    <a class="overview-shortcut" href="{{ route('contacts.admin') }}"><span>{{ __('ui.admin_consult_contacts') }}</span><span aria-hidden="true">→</span></a>
                    <a class="overview-shortcut" href="{{ route('mailing') }}"><span>{{ __('ui.admin_manage_emails') }}</span><span aria-hidden="true">→</span></a>
                </nav>
            </section>
        </div>
    </div>
</x-app-layout>
