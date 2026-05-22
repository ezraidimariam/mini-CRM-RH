<x-guest-layout>
    <div>
        <p class="text-sm font-semibold text-blue-600">Create workspace access</p>
        <h2 class="mt-2 text-3xl font-semibold text-slate-950">Register account</h2>
        <p class="mt-2 text-sm text-slate-500">Join the Mini CRM RH Maya Agency platform.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-5">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Full name')" />
            <x-text-input id="name" class="mt-2 block w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Maya Stone" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email address')" />
            <x-text-input id="email" class="mt-2 block w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="maya@agency.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="mt-2 block w-full" type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm password')" />
            <x-text-input id="password_confirmation" class="mt-2 block w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <x-primary-button class="w-full justify-center">
            {{ __('Create account') }}
        </x-primary-button>

        <p class="text-center text-sm text-slate-500">
            Already have access?
            <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-700">Sign in</a>
        </p>
    </form>
</x-guest-layout>
