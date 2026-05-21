<x-app-layout>
    <x-slot name="header">Time Off Activation</x-slot>

    <div class="max-w-4xl mx-auto">
        <!-- Back Navigation -->
        <div class="mb-8">
            <a href="{{ route('conges.index') }}" class="group inline-flex items-center gap-2 text-slate-500 hover:text-primary-600 font-bold transition-all">
                <div class="p-2 bg-white rounded-xl shadow-sm border border-slate-100 group-hover:bg-primary-50 group-hover:border-primary-100 transition-all">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </div>
                Return to Ledger
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
             <!-- Form Architecture -->
            <div class="lg:col-span-8 premium-card p-10 animate-in fade-in slide-in-from-left-8 duration-700">
                <div class="mb-10">
                    <h2 class="text-3xl font-extrabold text-slate-900 font-display mb-2">Request Cycle</h2>
                    <p class="text-slate-500 font-medium">Initiate a formal leave request for administrative review.</p>
                </div>

                <form method="POST" action="{{ route('conges.store') }}" class="space-y-10">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-2">
                            <x-input-label for="start_date" :value="__('Departure Date')" class="ml-1 text-xs font-bold uppercase tracking-wider text-slate-500" />
                            <x-text-input id="start_date" name="start_date" type="date" required min="{{ now()->toDateString() }}" class="w-full" />
                            <x-input-error class="mt-2" :messages="$errors->get('start_date')" />
                        </div>

                        <div class="space-y-2">
                            <x-input-label for="end_date" :value="__('Return Date')" class="ml-1 text-xs font-bold uppercase tracking-wider text-slate-500" />
                            <x-text-input id="end_date" name="end_date" type="date" required class="w-full" />
                            <x-input-error class="mt-2" :messages="$errors->get('end_date')" />
                        </div>

                        <div class="md:col-span-2 space-y-2">
                            <x-input-label for="reason" :value="__('Contextual Rationale')" class="ml-1 text-xs font-bold uppercase tracking-wider text-slate-500" />
                            <textarea id="reason" name="reason" rows="4" class="w-full border-slate-200 bg-white focus:border-primary-500 focus:ring-4 focus:ring-primary-500/10 rounded-2xl shadow-sm px-4 py-3 transition-all duration-200 resize-none font-medium placeholder:italic placeholder:text-slate-300" placeholder="e.g. Annual restorative rest..."></textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('reason')" />
                        </div>
                    </div>

                    <div class="flex items-center justify-start gap-4 pt-8 border-t border-slate-100">
                        <x-primary-button class="px-10 h-14 text-base shadow-xl shadow-primary-500/30">
                            {{ __('Submit for Review') }}
                        </x-primary-button>
                        <a href="{{ route('conges.index') }}" class="px-10 h-14 inline-flex items-center justify-center font-bold text-slate-500 hover:text-slate-900 transition-colors uppercase tracking-widest text-xs">
                            {{ __('Discard') }}
                        </a>
                    </div>
                </form>
            </div>

            <!-- Balance Sidebar -->
            <div class="lg:col-span-4 space-y-6 animate-in fade-in slide-in-from-right-8 duration-700">
                @if(auth()->user()->employee)
                    <div class="premium-card p-8 bg-slate-900 text-white border-none shadow-2xl relative overflow-hidden">
                        <div class="absolute -top-10 -right-10 w-24 h-24 bg-white/5 rounded-full blur-2xl"></div>
                        <h3 class="text-sm font-black uppercase tracking-widest text-slate-500 mb-8 leading-none">Your Allocation ({{ now()->year }})</h3>

                        @if($balance = auth()->user()->employee->leaveBalances->where('year', now()->year)->first())
                            <div class="space-y-6">
                                <div>
                                    <p class="text-5xl font-black text-primary-400 font-display mb-1">{{ $balance->available_days }}</p>
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest opacity-60">Strategic Balance</p>
                                </div>
                                <div class="pt-6 border-t border-white/10 space-y-3">
                                    <div class="flex justify-between items-center text-xs">
                                        <span class="font-bold text-slate-500 uppercase tracking-wider">Annual Accrual</span>
                                        <span class="font-black">{{ $balance->accrued_days }}</span>
                                    </div>
                                    <div class="flex justify-between items-center text-xs">
                                        <span class="font-bold text-slate-500 uppercase tracking-wider">Historical Usage</span>
                                        <span class="font-black">{{ $balance->used_days }}</span>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-6 opacity-40">
                                <p class="text-sm font-bold italic">No allocation digitized for the current cycle.</p>
                            </div>
                        @endif
                    </div>
                @endif

                <div class="premium-card p-8 bg-primary-50 border-primary-100/50">
                    <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center text-primary-500 mb-6 shadow-sm">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <p class="text-xs font-bold text-primary-700 uppercase tracking-widest mb-2">Policy Directive</p>
                    <p class="text-[13px] text-primary-900/70 font-medium leading-relaxed italic">All leave requests are processed within a 72-hour administrative window. Please ensure your return date aligns with project deliverables.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
