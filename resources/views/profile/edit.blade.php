<x-app-layout>
    <x-slot name="header">Account Convergence</x-slot>

    <div class="max-w-4xl mx-auto space-y-10 animate-in fade-in slide-in-from-bottom-8 duration-700">
        <!-- Identity Configuration -->
        <div class="premium-card p-10 bg-white">
            <div class="mb-8">
                <h3 class="text-2xl font-black text-slate-900 font-display">Identity Resolution</h3>
                <p class="text-xs font-black text-slate-400 uppercase tracking-widest mt-1">Configure your administrative profile parameters</p>
            </div>
            <div class="max-w-2xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <!-- Security Configuration -->
        <div class="premium-card p-10 bg-white">
            <div class="mb-8 flex items-center gap-4">
                <div class="p-3 bg-amber-50 text-amber-600 rounded-2xl border border-amber-100">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-2xl font-black text-slate-900 font-display">Security Protocol</h3>
                    <p class="text-xs font-black text-slate-400 uppercase tracking-widest mt-1">Rotate your access credentials</p>
                </div>
            </div>
            <div class="max-w-2xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <!-- Danger Zone -->
        <div class="premium-card p-10 bg-red-50/30 border-red-100/50">
             <div class="mb-8 flex items-center gap-4">
                <div class="p-3 bg-red-100 text-red-600 rounded-2xl border border-red-200">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-2xl font-black text-red-900 font-display">Termination Node</h3>
                    <p class="text-xs font-black text-red-700/50 uppercase tracking-widest mt-1">Permanent decommissioning of your instance</p>
                </div>
            </div>
            <div class="max-w-2xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
