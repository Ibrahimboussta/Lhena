<x-app-layout>
    @section('title', 'Sorvarent - Utilisateurs')

    <div class="admin-page">
        <header class="admin-page-header">
            <div>
                <h1 class="admin-page-title">Utilisateurs</h1>
                <p class="admin-page-subtitle">Consultez les comptes inscrits sur la plateforme.</p>
            </div>
            <span class="admin-count-badge"><strong>{{ $users->total() }}</strong> utilisateurs</span>
        </header>

        <section class="admin-panel" aria-label="Liste des utilisateurs">
            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Utilisateur</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            <th>Date d’inscription</th>
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
                                        {{ $user->role === 'admin' ? 'Admin' : 'Utilisateur' }}
                                    </span>
                                </td>
                                <td>{{ $user->created_at?->format('d/m/Y') ?? '—' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="admin-empty" colspan="4">Aucun utilisateur à afficher.</td>
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
