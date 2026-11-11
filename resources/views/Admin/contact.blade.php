<x-app-layout>
    @section('title', 'Sorvarent - ' . __('ui.contacts'))

    <div class="admin-page">
        <header class="admin-page-header">
            <div>
                <h1 class="admin-page-title">{{ __('ui.contacts') }}</h1>
                <p class="admin-page-subtitle">{{ __('ui.admin_contacts_subtitle') }}</p>
            </div>
            <span class="admin-count-badge"><strong>{{ $contacts->total() }}</strong> {{ __('ui.admin_contact_count') }}</span>
        </header>

        <section class="admin-panel" aria-label="{{ __('ui.contacts') }}">
            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>{{ __('ui.admin_name') }}</th>
                            <th>{{ __('ui.admin_email') }}</th>
                            <th>{{ __('ui.admin_phone') }}</th>
                            <th>{{ __('ui.admin_message') }}</th>
                            <th><span class="sr-only">{{ __('ui.admin_action') }}</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($contacts as $contact)
                            <tr>
                                <td class="admin-table__primary">{{ $contact->name }}</td>
                                <td><a class="admin-table__link" href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></td>
                                <td><a class="admin-table__link" href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></td>
                                <td style="min-width: 240px; max-width: 420px; white-space: normal; line-height: 1.5;">
                                    {{ $contact->message }}
                                </td>
                                <td>
                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST"
                                        onsubmit="return confirm(@js(__('ui.admin_delete_contact_confirm')))">
                                        @csrf
                                        @method('DELETE')
                                        <button class="admin-icon-button" type="submit" aria-label="{{ __('ui.admin_delete_contact') }}">
                                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="1.8" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M4 7h16M10 11v6m4-6v6M5 7l1 14h12l1-14M9 7V4h6v3" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="admin-empty" colspan="5">{{ __('ui.admin_no_contacts') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($contacts->hasPages())
                <div class="admin-pagination">{{ $contacts->links('pagination::tailwind') }}</div>
            @endif
        </section>
    </div>
</x-app-layout>
