<x-app-layout>
    @section('title', 'SorvaRent - ' . __('ui.users'))

    <div class="admin-page">
        <header class="admin-page-header">
            <div>
                <h1 class="admin-page-title">{{ __('ui.users') }}</h1>
                <p class="admin-page-subtitle">{{ __('ui.admin_users_subtitle') }}</p>
            </div>
            <span class="admin-count-badge"><strong>{{ $users->total() }}</strong> {{ __('ui.admin_user_count') }}</span>
        </header>

        <section class="admin-panel" aria-label="{{ __('ui.users') }}">
            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>{{ __('ui.admin_user') }}</th>
                            <th>{{ __('ui.admin_email') }}</th>
                            <th>{{ __('ui.admin_role') }}</th>
                            <th>{{ __('ui.admin_signup_date') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>
                                    <div class="admin-user-cell">
                                        <span class="admin-user-avatar" aria-hidden="true">
                                            {{ mb_strtoupper(mb_substr($user->name, 0, 1)) }}
                                        </span>
                                        <span class="admin-table__primary">{{ $user->name }}</span>
                                    </div>
                                </td>
                                <td>
                                    <a class="admin-table__link" href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                </td>
                                <td>
                                    <span class="admin-status {{ $user->role === 'admin' ? 'admin-status--success' : 'admin-status--pending' }}">
                                        {{ $user->role === 'admin' ? __('ui.admin_admin_role') : __('ui.admin_user_role') }}
                                    </span>
                                </td>
                                <td>{{ $user->created_at?->format('d/m/Y') ?? '—' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="admin-empty" colspan="4">{{ __('ui.admin_no_users') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($users->hasPages())
                <div class="admin-pagination">{{ $users->links('pagination::tailwind') }}</div>
            @endif
        </section>
    </div>
</x-app-layout>
