<x-guest-layout>
    <div class="mb-8 overflow-hidden">
        <h2 class="text-2xl font-black text-slate-900 font-display">Welcome Back</h2>
        <p class="text-sm font-bold text-slate-400 uppercase tracking-widest mt-1">Personnel Authentication Gateway</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div class="space-y-2">
            <x-input-label for="email" :value="__('Corporate Email')" class="ml-1 text-[10px] font-black uppercase tracking-widest text-slate-500" />
            <x-text-input id="email" class="w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="name@company.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="space-y-2">
             <div class="flex justify-between items-center ml-1">
                <x-input-label for="password" :value="__('Access Token')" class="text-[10px] font-black uppercase tracking-widest text-slate-500" />
                @if (Route::has('password.request'))
                    <a class="text-[10px] font-bold text-primary-600 hover:text-primary-700 uppercase tracking-widest transition-colors" href="{{ route('password.request') }}">
                        {{ __('Lost access?') }}
                    </a>
                @endif
            </div>
            <x-text-input id="password" class="w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password"
                            placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between pt-2">
            <label for="remember_me" class="inline-flex items-center group cursor-pointer">
                <input id="remember_me" type="checkbox" class="w-5 h-5 rounded-lg border-slate-200 text-primary-600 shadow-sm focus:ring-primary-500/20 transition-all cursor-pointer" name="remember">
                <span class="ms-3 text-xs font-bold text-slate-500 group-hover:text-slate-900 transition-colors uppercase tracking-widest">{{ __('Stay Connected') }}</span>
            </label>
        </div>

        <div class="pt-4">
            <x-primary-button class="w-full h-14 text-sm tracking-[0.2em] shadow-xl shadow-primary-500/25">
                {{ __('Authorize Access') }}
            </x-primary-button>
        </div>

        @if (Route::has('register'))
            <div class="text-center pt-8 border-t border-slate-50">
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">
                    New to the ecosystem? 
                    <a href="{{ route('register') }}" class="text-primary-600 hover:text-primary-700 ml-1">Register Talent</a>
                </p>
            </div>
        @endif
    </form>
</x-guest-layout>
