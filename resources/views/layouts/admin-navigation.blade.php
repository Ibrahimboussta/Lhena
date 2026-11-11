<style>
    .admin-shell {
        --admin-green: #123f35;
        --admin-green-dark: #0c3028;
        --admin-accent: #d9c18c;
        --admin-ink: #26332e;
        --admin-muted: #78827d;
        --admin-line: #e4e9e5;
        min-height: 100vh;
        background: #f8f7f3;
        color: var(--admin-ink);
    }

    .admin-sidebar {
        position: fixed;
        inset: 0 auto 0 0;
        z-index: 20;
        display: flex;
        width: 248px;
        flex-direction: column;
        border-right: 1px solid var(--admin-line);
        background: #f4f1e8;
        padding: 18px 14px;
    }

    .admin-sidebar__header {
        display: block;
    }

    .admin-menu-toggle {
        display: none;
    }

    .admin-brand {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 4px 6px 24px;
        color: var(--admin-green);
    }

    .admin-brand img {
        width: 120px;
        height: 52px;
        object-fit: contain;
    }

    .admin-brand__name {
        font-size: 13px;
        font-weight: 700;
        line-height: 1.15;
    }

    .admin-brand__caption {
        margin-top: 3px;
        color: #78827d;
        font-size: 9px;
        letter-spacing: 0.1em;
        text-transform: uppercase;
    }

    .admin-nav-label {
        margin: 18px 8px 7px;
        color: #877c64;
        font-size: 9px;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
    }

    .admin-nav-link {
        display: flex;
        min-height: 38px;
        align-items: center;
        gap: 10px;
        border-left: 3px solid transparent;
        border-radius: 8px;
        padding: 8px 10px;
        color: #5e625f;
        font-size: 12px;
        font-weight: 500;
        text-decoration: none;
        transition: background-color 150ms ease, color 150ms ease;
    }

    .admin-nav-link:hover {
        background: #e9eee9;
        color: var(--admin-green);
    }

    .admin-nav-link.is-active {
        border-left-color: var(--admin-accent);
        background: var(--admin-green);
        color: #fff;
        box-shadow: 0 3px 8px rgba(18, 63, 53, 0.16);
    }

    .admin-nav-link__icon {
        display: inline-flex;
        width: 17px;
        justify-content: center;
        font-size: 14px;
    }

    .admin-account {
        margin-top: auto;
        border: 1px solid var(--admin-line);
        border-radius: 10px;
        background: #fff;
        padding: 12px;
    }

    .admin-account__label {
        margin-bottom: 8px;
        color: #81775f;
        font-size: 9px;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .admin-account__name {
        color: var(--admin-ink);
        font-size: 11px;
        font-weight: 600;
    }

    .admin-account__role {
        margin-top: 2px;
        color: var(--admin-muted);
        font-size: 10px;
    }

    .admin-logout {
        margin-top: 8px;
        color: var(--admin-green);
        font-size: 10px;
        font-weight: 600;
    }

    .admin-main {
        min-height: 100vh;
        margin-left: 248px;
    }

    .admin-topbar {
        position: sticky;
        top: 0;
        z-index: 10;
        display: flex;
        min-height: 62px;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        border-bottom: 1px solid var(--admin-line);
        background: rgba(255, 255, 255, 0.94);
        padding: 10px 28px;
        backdrop-filter: blur(12px);
    }

    .admin-search {
        width: min(100%, 360px);
        border: 1px solid #e8ece8;
        border-radius: 8px;
        background: #faf9f6;
        padding: 9px 12px;
        color: var(--admin-ink);
        font-size: 11px;
        outline: none;
    }

    .admin-search:focus {
        border-color: #c7aa6b;
        box-shadow: 0 0 0 3px rgba(217, 193, 140, 0.24);
    }

    .admin-topbar__right {
        display: flex;
        align-items: center;
        gap: 12px;
        color: #5e625f;
        font-size: 10px;
    }

    .admin-live {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border-radius: 9999px;
        background: #f4eddd;
        padding: 6px 10px;
        color: #75613b;
        font-size: 10px;
        font-weight: 600;
    }

    .admin-live::before {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #3a9b60;
        content: "";
    }

    .admin-content {
        padding: 26px 28px 40px;
    }

    .admin-page {
        max-width: 1440px;
        margin: 0 auto;
    }

    .admin-page-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 20px;
    }

    .admin-page-title {
        color: var(--admin-green);
        font-size: 24px;
        font-weight: 700;
        letter-spacing: -0.035em;
        line-height: 1.2;
    }

    .admin-page-subtitle {
        margin-top: 6px;
        color: #78827d;
        font-size: 12px;
    }

    .admin-count-badge {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        border: 1px solid #e4e9e5;
        border-radius: 9999px;
        background: #fff;
        padding: 7px 12px;
        color: #536159;
        font-size: 11px;
        white-space: nowrap;
    }

    .admin-count-badge strong {
        color: var(--admin-green);
        font-size: 13px;
    }

    .admin-panel {
        overflow: hidden;
        border: 1px solid #e4e9e5;
        border-radius: 12px;
        background: #fff;
        box-shadow: 0 3px 12px rgba(32, 54, 43, 0.04);
    }

    .admin-table-wrap {
        overflow-x: auto;
    }

    .admin-table {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
    }

    .admin-table thead {
        background: #f8f7f3;
    }

    .admin-table th {
        padding: 12px 16px;
        color: #738078;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 0.07em;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .admin-table td {
        border-top: 1px solid #edf0ed;
        padding: 13px 16px;
        color: #46534b;
        font-size: 12px;
        vertical-align: middle;
    }

    .admin-table tbody tr {
        transition: background-color 140ms ease;
    }

    .admin-table tbody tr:hover {
        background: #f8faf8;
    }

    .admin-table__primary {
        color: #26332e !important;
        font-weight: 600;
    }

    .admin-table__secondary {
        display: block;
        margin-top: 3px;
        color: #87918b;
        font-size: 10px;
    }

    .admin-table__link {
        color: #8a7957;
        text-decoration: none;
    }

    .admin-table__link:hover {
        text-decoration: underline;
    }

    .admin-user-cell {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .admin-user-avatar {
        display: inline-flex;
        width: 34px;
        height: 34px;
        flex: 0 0 auto;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #f4eddd;
        color: #75613b;
        font-size: 12px;
        font-weight: 700;
    }

    .admin-status {
        display: inline-flex;
        align-items: center;
        border-radius: 9999px;
        padding: 5px 9px;
        font-size: 10px;
        font-weight: 600;
        white-space: nowrap;
    }

    .admin-status--success {
        background: #eaf4ed;
        color: #326b47;
    }

    .admin-status--neutral {
        background: #f4eddd;
        color: #75613b;
    }

    .admin-status--pending {
        background: #f8f1df;
        color: #8a6c2d;
    }

    .admin-icon-button {
        display: inline-flex;
        width: 32px;
        height: 32px;
        align-items: center;
        justify-content: center;
        border: 1px solid #f0dfda;
        border-radius: 8px;
        background: #fff8f6;
        color: #a64e3c;
        transition: background-color 140ms ease;
    }

    .admin-icon-button:hover {
        background: #fcece7;
    }

    .admin-empty {
        padding: 34px 16px !important;
        color: #87918b !important;
        text-align: center;
    }

    .admin-pagination {
        border-top: 1px solid #edf0ed;
        padding: 14px 16px;
    }

    @media (max-width: 760px) {
        .admin-sidebar {
            position: static;
            width: 100%;
            padding: 12px;
        }

        .admin-sidebar__header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .admin-brand {
            min-width: 0;
            padding: 0;
        }

        .admin-brand img {
            width: 108px;
            height: 46px;
        }

        .admin-menu-toggle {
            display: inline-flex;
            width: 40px;
            height: 40px;
            flex: 0 0 auto;
            align-items: center;
            justify-content: center;
            border: 1px solid #dce5de;
            border-radius: 9px;
            background: #fff;
            color: var(--admin-green);
            box-shadow: 0 2px 6px rgba(32, 54, 43, 0.05);
        }

        .admin-menu-toggle:focus-visible {
            outline: 3px solid rgba(217, 193, 140, 0.55);
            outline-offset: 2px;
        }

        .admin-sidebar nav {
            display: none;
            margin-top: 12px;
            border-top: 1px solid #dce5de;
            padding-top: 8px;
        }

        .admin-sidebar nav.is-open {
            display: block;
        }

        .admin-account {
            display: none;
        }

        .admin-nav-label {
            display: block;
            margin: 12px 8px 6px;
        }

        .admin-nav-link {
            min-height: 42px;
            padding: 9px 10px;
        }

        .admin-account.is-open {
            display: block;
            margin-top: 12px;
        }

        .admin-main {
            margin-left: 0;
        }

        .admin-topbar {
            position: static;
            padding: 10px 16px;
        }

        .admin-search {
            width: min(58vw, 320px);
        }

        .admin-content {
            padding: 20px 14px 32px;
        }

        .admin-page-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .admin-table th,
        .admin-table td {
            padding-right: 12px;
            padding-left: 12px;
        }
    }

    @media (max-width: 440px) {
        .admin-topbar__right .admin-currency {
            display: none;
        }
    }

    html[dir="rtl"] .admin-sidebar {
        right: 0;
        left: auto;
        border-right: 0;
        border-left: 1px solid var(--admin-line);
    }

    html[dir="rtl"] .admin-main {
        margin-right: 0;
        margin-left: 0;
        margin-inline-start: 248px;
    }

    html[dir="rtl"] .admin-nav-link {
        border-left: 0;
        border-inline-start: 3px solid transparent;
    }

    html[dir="rtl"] .admin-nav-link.is-active {
        border-left-color: transparent;
        border-inline-start-color: var(--admin-accent);
    }

    html[dir="rtl"] .admin-table {
        text-align: start;
    }

    @media (max-width: 760px) {
        html[dir="rtl"] .admin-main {
            margin-inline-start: 0;
        }
    }
</style>

<aside class="admin-sidebar" x-data="{ menuOpen: false }">
    <div class="admin-sidebar__header">
        <a class="admin-brand" href="{{ Auth::user()->role === 'admin' ? route('admin.overview') : route('agency.overview') }}">
            <img class="h-20 sm:h-20" src="{{ asset('images/newlogo.png') }}" alt="">
        </a>
        <button type="button" class="admin-menu-toggle" @click="menuOpen = !menuOpen"
            :aria-expanded="menuOpen.toString()" aria-controls="admin-mobile-navigation"
            :aria-label="menuOpen ? @js(__('ui.close_menu')) : @js(__('ui.open_menu'))">
            <svg x-show="!menuOpen" width="21" height="21" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg x-show="menuOpen" x-cloak width="21" height="21" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path stroke-linecap="round" d="m6 6 12 12M18 6 6 18" />
            </svg>
        </button>
    </div>

    <nav id="admin-mobile-navigation" :class="{ 'is-open': menuOpen }"
        aria-label="{{ Auth::user()->role === 'admin' ? __('ui.admin_panel') : __('ui.agency_space') }}">
        @if (Auth::user()->role === 'admin')
            <p class="admin-nav-label">{{ __('ui.admin_panel') }}</p>
            <a href="{{ route('admin.overview') }}"
                @click="menuOpen = false"
                class="admin-nav-link {{ request()->routeIs('admin.overview') ? 'is-active' : '' }}">
                <span class="admin-nav-link__icon" aria-hidden="true">▤</span>
                <span>{{ __('ui.global_overview') }}</span>
            </a>
            <a href="{{ route('users') }}"
                @click="menuOpen = false"
                class="admin-nav-link {{ request()->routeIs('users') ? 'is-active' : '' }}">
                <span class="admin-nav-link__icon" aria-hidden="true">▦</span>
                <span>{{ __('ui.users') }}</span>
            </a>
            <a href="{{ route('proprites.admin') }}"
                @click="menuOpen = false"
                class="admin-nav-link {{ request()->routeIs('proprites.admin') ? 'is-active' : '' }}">
                <span class="admin-nav-link__icon" aria-hidden="true">⌂</span>
                <span>{{ __('ui.properties') }}</span>
            </a>
            <a href="{{ route('contacts.admin') }}"
                @click="menuOpen = false"
                class="admin-nav-link {{ request()->routeIs('contacts.admin') ? 'is-active' : '' }}">
                <span class="admin-nav-link__icon" aria-hidden="true">♧</span>
                <span>{{ __('ui.contacts') }}</span>
            </a>
            <a href="{{ route('mailing') }}"
                @click="menuOpen = false"
                class="admin-nav-link {{ request()->routeIs('mailing') ? 'is-active' : '' }}">
                <span class="admin-nav-link__icon" aria-hidden="true">✉</span>
                <span>{{ __('ui.emails') }}</span>
            </a>
            <a href="{{ route('vouchers.admin') }}"
                @click="menuOpen = false"
                class="admin-nav-link {{ request()->routeIs('vouchers.admin') ? 'is-active' : '' }}">
                <span class="admin-nav-link__icon" aria-hidden="true">▤</span>
                <span>{{ __('ui.reservation_documents') }}</span>
            </a>
        @else
            <p class="admin-nav-label">{{ __('ui.supervision') }}</p>
            <a href="{{ route('agency.overview') }}"
                @click="menuOpen = false"
                class="admin-nav-link {{ request()->routeIs('agency.overview') ? 'is-active' : '' }}">
                <span class="admin-nav-link__icon" aria-hidden="true">▤</span>
                <span>{{ __('ui.global_overview') }}</span>
            </a>
            <a href="{{ route('dashboard') }}"
                @click="menuOpen = false"
                class="admin-nav-link {{ request()->routeIs('dashboard') ? 'is-active' : '' }}">
                <span class="admin-nav-link__icon" aria-hidden="true">⌂</span>
                <span>{{ __('ui.my_properties') }}</span>
            </a>
            <a href="{{ route('publish') }}" @click="menuOpen = false"
                class="admin-nav-link {{ request()->routeIs('publish') ? 'is-active' : '' }}">
                <span class="admin-nav-link__icon" aria-hidden="true">＋</span>
                <span>{{ __('ui.add_property') }}</span>
            </a>
        @endif
        <a href="{{ url('/') }}" @click="menuOpen = false" class="admin-nav-link">
            <span class="admin-nav-link__icon" aria-hidden="true">⌂</span>
            <span>{{ __('ui.home_page') }}</span>
        </a>
    </nav>

    <div class="admin-account" :class="{ 'is-open': menuOpen }">
        <p class="admin-account__label">{{ Auth::user()->role === 'admin' ? __('ui.admin_console') : __('ui.agency_account') }}</p>
        <p class="admin-account__name">{{ Auth::user()->name }}</p>
        <p class="admin-account__role">{{ Auth::user()->role === 'admin' ? __('ui.administrator') : __('ui.agency_owner') }}</p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="admin-logout">{{ __('ui.logout') }}</button>
        </form>
    </div>
</aside>
