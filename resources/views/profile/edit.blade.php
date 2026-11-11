<x-app-layout>
    @section('title', __('ui.profile_title'))

    <style>
        .profile-page {
            max-width: 960px;
        }

        .profile-panel {
            border: 1px solid #e4e9e5;
            border-radius: 12px;
            background: #fff;
            padding: 22px;
            box-shadow: 0 3px 12px rgba(32, 54, 43, 0.04);
        }

        .profile-panel + .profile-panel {
            margin-top: 18px;
        }

        .profile-page .profile-label {
            color: #435149;
        }

        .profile-page .profile-field {
            width: 100%;
            border: 1px solid #dfe5df;
            border-radius: 8px;
            background: #fff;
            color: #26332e;
        }

        .profile-page .profile-field:focus {
            border-color: #8ba99a;
            --tw-ring-color: rgba(18, 63, 53, 0.2);
        }

        .profile-page .profile-primary {
            display: inline-flex;
            min-height: 38px;
            align-items: center;
            gap: 8px;
            border: 0;
            border-radius: 8px;
            background: #173f36;
            padding: 9px 14px;
            color: #fff;
            font-size: 11px;
            font-weight: 600;
        }

        .profile-page .profile-primary:hover {
            background: #0c3028;
        }

        .profile-page .profile-danger {
            border: 0;
            border-radius: 8px;
            background: #b94135;
            padding: 9px 14px;
            color: #fff;
            font-size: 11px;
            font-weight: 600;
        }

        .profile-page .profile-danger:hover {
            background: #9f332a;
        }

        .profile-page [class~="dark:bg-gray-800"],
        .profile-page [class~="dark:bg-gray-700"],
        .profile-page [class~="dark:bg-gray-900"],
        .profile-page [class~="dark:bg-gray-200"] {
            background-color: #fff;
        }

        .profile-page [class~="dark:text-gray-100"],
        .profile-page [class~="dark:text-gray-300"],
        .profile-page [class~="dark:text-gray-800"],
        .profile-page [class~="dark:text-white"] {
            color: #26332e;
        }

        .profile-page [class~="dark:text-gray-400"] {
            color: #647169;
        }

        .profile-page [class~="dark:text-red-400"] {
            color: #b94135;
        }

        .profile-page [class~="dark:border-gray-700"],
        .profile-page [class~="dark:border-gray-600"],
        .profile-page [class~="dark:border-gray-500"] {
            border-color: #dfe5df;
        }

        .profile-page .absolute[class~="dark:bg-gray-900"] {
            background-color: #26332e;
        }

        .profile-page button.profile-primary[class~="dark:bg-gray-200"] {
            background-color: #173f36;
            color: #fff;
        }

        @media (max-width: 640px) {
            .profile-panel {
                padding: 18px;
            }
        }
    </style>

    <div class="admin-page profile-page">
        <header class="admin-page-header">
            <div>
                <h1 class="admin-page-title">{{ __('ui.profile_title') }}</h1>
                <p class="admin-page-subtitle">{{ __('ui.profile_description') }}</p>
            </div>
        </header>

        <section class="profile-panel">
            <h2 class="text-lg font-semibold text-[#173f36]">
                {{ __('ui.personal_information') }}
            </h2>
            <p class="mt-1 mb-5 text-sm text-[#647169]">
                {{ __('ui.profile_information_text') }}
            </p>
            <div>
                    @include('profile.partials.update-profile-information-form')
            </div>
        </section>

        <section class="profile-panel">
            <h2 class="text-lg font-semibold text-[#173f36]">
                    {{ __('ui.security') }}
            </h2>
            <p class="mt-1 mb-5 text-sm text-[#647169]">
                    {{ __('ui.security_text') }}
            </p>
            <div>
                    @include('profile.partials.update-password-form')
            </div>
        </section>

        <section class="profile-panel border-red-200">
            <h2 class="text-lg font-semibold text-red-700">
                    {{ __('ui.delete_account') }}
            </h2>
            <p class="mt-1 mb-5 text-sm text-red-600">
                    {{ __('ui.delete_account_warning') }} {{ __('ui.delete_account_download_note') }}
            </p>
            <div>
                    @include('profile.partials.delete-user-form')
            </div>
        </section>
    </div>
</x-app-layout>
