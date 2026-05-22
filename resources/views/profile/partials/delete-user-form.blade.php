<section>
    <p class="text-sm leading-6 text-slate-600">
        Once your account is deleted, all related account data will be permanently removed. Enter your password to confirm this action.
    </p>

    <form method="post" action="{{ route('profile.destroy') }}" class="mt-6 space-y-4" onsubmit="return confirm('Delete this account permanently?')">
        @csrf
        @method('delete')

        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" name="password" type="password" class="mt-2 block w-full max-w-md" placeholder="{{ __('Password') }}" />
            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
        </div>

        <x-danger-button>
            {{ __('Delete account') }}
        </x-danger-button>
    </form>
</section>
