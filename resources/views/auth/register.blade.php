<x-guest-layout>
    <div class="mb-8 overflow-hidden text-center sm:text-left">
        <h2 class="text-3xl font-black text-slate-900 font-display">Join the Elite</h2>
        <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] mt-2">Initialize Administrative Node</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Name -->
        <div class="space-y-2">
            <x-input-label for="name" :value="__('Full Identity')" class="ml-1 text-[10px] font-black uppercase tracking-widest text-slate-500" />
            <x-text-input id="name" class="w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Johnathan Doe" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="space-y-2">
            <x-input-label for="email" :value="__('System Identifier (Email)')" class="ml-1 text-[10px] font-black uppercase tracking-widest text-slate-500" />
            <x-text-input id="email" class="w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="admin@ecosystem.io" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="space-y-2">
            <x-input-label for="password" :value="__('Secure Access Token')" class="ml-1 text-[10px] font-black uppercase tracking-widest text-slate-500" />
            <x-text-input id="password" class="w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password"
                            placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="space-y-2">
            <x-input-label for="password_confirmation" :value="__('Confirm Access Token')" class="ml-1 text-[10px] font-black uppercase tracking-widest text-slate-500" />
            <x-text-input id="password_confirmation" class="w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="pt-6">
            <x-primary-button class="w-full h-14 text-sm tracking-[0.2em] shadow-xl shadow-primary-500/25">
                {{ __('Initialize Account') }}
            </x-primary-button>
        </div>

        <div class="text-center pt-8 border-t border-slate-50">
            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">
                Already registered? 
                <a href="{{ route('login') }}" class="text-primary-600 hover:text-primary-700 ml-1">Authenticate Instance</a>
            </p>
        </div>
    </form>
</x-guest-layout>
