<x-app-layout>
    <x-slot name="header">Request Leave</x-slot>

    @if(!auth()->user()->employee && auth()->user()->role === 'employee')
        <div class="rounded-2xl border border-rose-200 bg-rose-50 p-6 text-rose-800">
            Your account is not linked to an employee profile. Please contact HR before submitting a leave request.
        </div>
    @else
        <div class="grid gap-6 lg:grid-cols-[1fr_360px]">
            <section class="surface-card p-6">
                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-slate-950">Leave request form</h2>
                    <p class="mt-1 text-sm text-slate-500">Submit your dates and context for RH review.</p>
                </div>

                <form method="POST" action="{{ route('conges.store') }}" class="space-y-6">
                    @csrf

                    <div class="grid gap-5 md:grid-cols-2">
                        <div>
                            <x-input-label for="start_date" :value="__('Start date')" />
                            <x-text-input id="start_date" name="start_date" type="date" required min="{{ now()->toDateString() }}" class="mt-2 w-full" />
                            <x-input-error class="mt-2" :messages="$errors->get('start_date')" />
                        </div>
                        <div>
                            <x-input-label for="end_date" :value="__('End date')" />
                            <x-text-input id="end_date" name="end_date" type="date" required class="mt-2 w-full" />
                            <x-input-error class="mt-2" :messages="$errors->get('end_date')" />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="reason" :value="__('Reason')" />
                        <textarea id="reason" name="reason" rows="5" class="mt-2 w-full resize-none" placeholder="Add a short context for this request.">{{ old('reason') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('reason')" />
                    </div>

                    <div class="flex flex-wrap gap-3 border-t border-slate-200 pt-6">
                        <x-primary-button>Submit request</x-primary-button>
                        <a href="{{ route('conges.index') }}" class="btn-secondary">Cancel</a>
                    </div>
                </form>
            </section>

            <aside class="space-y-6">
                @if(auth()->user()->employee && $balance = auth()->user()->employee->leaveBalances->where('year', now()->year)->first())
                    <div class="surface-card p-6">
                        <p class="text-sm font-medium text-slate-500">{{ now()->year }} leave balance</p>
                        <p class="mt-3 text-4xl font-semibold text-blue-700">{{ $balance->available_days }}</p>
                        <p class="mt-1 text-sm text-slate-500">available days</p>
                        <div class="mt-6 space-y-3 text-sm">
                            <div class="flex justify-between"><span class="text-slate-500">Accrued</span><span class="font-medium">{{ $balance->accrued_days }}</span></div>
                            <div class="flex justify-between"><span class="text-slate-500">Used</span><span class="font-medium">{{ $balance->used_days }}</span></div>
                        </div>
                    </div>
                @endif

                <div class="surface-card p-6">
                    <h3 class="font-semibold text-slate-950">Policy note</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-500">Requests are reviewed by RH. Weekends are excluded from working day calculation, and balance is deducted only after approval.</p>
                </div>
            </aside>
        </div>
    @endif
</x-app-layout>
