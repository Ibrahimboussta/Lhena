<div>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-5">
        @csrf
        @method('patch')

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('ui.name')" class="profile-label"/>
            <x-text-input id="name" name="name" type="text"
                class="profile-field mt-1 block w-full focus:border-green-700 focus:ring-green-700"
                :value="old('name', $user->name)" required autofocus autocomplete="name"/>
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('ui.email')" class="profile-label"/>
            <x-text-input id="email" name="email" type="email"
                class="profile-field mt-1 block w-full focus:border-green-700 focus:ring-green-700"
                :value="old('email', $user->email)" required autocomplete="username"/>
        </div>

        <!-- Actions -->
        <div class="flex items-center gap-4 pt-2">
            <x-primary-button class="profile-primary">
                <i data-lucide="save" class="w-4 h-4"></i>
                {{ __('ui.save') }}
            </x-primary-button>
        </div>
    </form>
</div>
