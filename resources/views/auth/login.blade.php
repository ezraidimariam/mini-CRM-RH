<x-guest-layout>
    <div>
        <p class="text-sm font-semibold text-blue-600">Secure HR access</p>
        <h2 class="mt-2 text-3xl font-semibold text-slate-950">Welcome back</h2>
        <p class="mt-2 text-sm text-slate-500">Sign in to manage Maya Agency workforce operations.</p>
    </div>

    <x-auth-session-status class="mt-6" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-5">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email address')" />
            <x-text-input id="email" class="mt-2 block w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="name@company.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <div class="flex items-center justify-between">
                <x-input-label for="password" :value="__('Password')" />
                @if (Route::has('password.request'))
                    <a class="text-sm font-medium text-blue-600 hover:text-blue-700" href="{{ route('password.request') }}">Forgot password?</a>
                @endif
            </div>
            <x-text-input id="password" class="mt-2 block w-full" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <label for="remember_me" class="flex items-center gap-3">
            <input id="remember_me" type="checkbox" class="rounded border-slate-300 text-blue-600 focus:ring-blue-500" name="remember">
            <span class="text-sm text-slate-600">{{ __('Remember this device') }}</span>
        </label>

        <x-primary-button class="w-full justify-center">
            {{ __('Sign in') }}
        </x-primary-button>

        @if (Route::has('register'))
            <p class="text-center text-sm text-slate-500">
                New to the workspace?
                <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-700">Create account</a>
            </p>
        @endif
    </form>
</x-guest-layout>
