<div>
    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-5">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div>
            <x-input-label for="update_password_current_password" :value="__('ui.current_password')" class="profile-label"/>
            <x-text-input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="profile-field mt-1 block w-full focus:border-green-700 focus:ring-green-700"
                autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <!-- New Password -->
        <div>
            <x-input-label for="update_password_password" :value="__('ui.new_password')" class="profile-label"/>
            <x-text-input
                id="update_password_password"
                name="password"
                type="password"
                class="profile-field mt-1 block w-full focus:border-green-700 focus:ring-green-700"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('ui.confirm_password')" class="profile-label"/>
            <x-text-input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="profile-field mt-1 block w-full focus:border-green-700 focus:ring-green-700"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Actions -->
        <div class="flex items-center gap-4 pt-2">
            <x-primary-button class="profile-primary">
                {{ __('ui.save') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2500)"
                    class="text-sm font-medium text-[#173f36]"
                >
                    {{ __('ui.password_updated') }}
                </p>
            @endif
        </div>
    </form>
</div>
