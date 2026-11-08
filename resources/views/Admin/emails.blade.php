<x-app-layout>
    @section('title', 'Lhena.ma - Emails')

    <div class="admin-page">
        <header class="admin-page-header">
            <div>
                <h1 class="admin-page-title">Emails</h1>
                <p class="admin-page-subtitle">Adresses inscrites aux actualités et communications.</p>
            </div>
            <span class="admin-count-badge"><strong>{{ $emails->total() }}</strong> adresses</span>
        </header>

        <section class="admin-panel" aria-label="Liste des adresses email">
            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Inscription</th>
                            <th><span class="sr-only">Action</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($emails as $email)
                            @if (Auth::user()->id == $email->user_id || Auth::user()->role == 'admin')
                                <tr>
                                    <td>
                                        <a class="admin-table__link admin-table__primary" href="mailto:{{ $email->email }}">
                                            {{ $email->email }}
                                        </a>
                                    </td>
                                    <td>{{ $email->created_at?->format('d/m/Y') ?? '—' }}</td>
                                    <td>
                                        <form action="{{ route('mailing.destroy', $email->id) }}" method="POST"
                                            onsubmit="return confirm('Supprimer cette adresse email ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="admin-icon-button" type="submit" aria-label="Supprimer l’adresse email">
                                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="1.8" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M4 7h16M10 11v6m4-6v6M5 7l1 14h12l1-14M9 7V4h6v3" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <tr>
                                <td class="admin-empty" colspan="3">Aucune adresse email à afficher.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($emails->hasPages())
                <div class="admin-pagination">{{ $emails->links('pagination::tailwind') }}</div>
            @endif
        </section>
    </div>
</x-app-layout>
