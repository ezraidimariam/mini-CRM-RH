<x-app-layout>
    <x-slot name="header">Leave Request Details</x-slot>

    @php
        $congeRequest->loadMissing('employee', 'approvedBy');
        $statusClass = $congeRequest->status === 'approved' ? 'status-approved' : ($congeRequest->status === 'rejected' ? 'status-rejected' : 'status-pending');
    @endphp

    <div class="grid gap-6 lg:grid-cols-[1fr_360px]">
        <section class="surface-card p-6">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <p class="text-sm font-medium text-slate-500">Request #{{ $congeRequest->id }}</p>
                    <h2 class="mt-2 text-2xl font-semibold text-slate-950">{{ $congeRequest->employee?->full_name ?? 'Unknown employee' }}</h2>
                </div>
                <span class="{{ $statusClass }}">{{ ucfirst($congeRequest->status) }}</span>
            </div>

            <div class="mt-8 grid gap-4 md:grid-cols-3">
                <div class="rounded-2xl bg-slate-50 p-4">
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Start date</p>
                    <p class="mt-2 font-semibold text-slate-950">{{ $congeRequest->start_date->format('M d, Y') }}</p>
                </div>
                <div class="rounded-2xl bg-slate-50 p-4">
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Return date</p>
                    <p class="mt-2 font-semibold text-slate-950">{{ $congeRequest->end_date->format('M d, Y') }}</p>
                </div>
                <div class="rounded-2xl bg-slate-50 p-4">
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Working days</p>
                    <p class="mt-2 font-semibold text-slate-950">{{ $congeRequest->working_days }} days</p>
                </div>
            </div>

            <div class="mt-6 rounded-2xl border border-slate-200 p-5">
                <p class="text-sm font-semibold text-slate-950">Context / reason</p>
                <p class="mt-2 text-sm leading-6 text-slate-600">{{ $congeRequest->reason ?: 'No reason provided.' }}</p>
            </div>
        </section>

        <aside class="space-y-6">
            <div class="surface-card p-6">
                <h3 class="font-semibold text-slate-950">Decision</h3>
                <div class="mt-5 space-y-4 text-sm">
                    <div class="flex justify-between gap-4">
                        <span class="text-slate-500">Reviewed by</span>
                        <span class="font-medium text-slate-900">{{ $congeRequest->approvedBy?->name ?? 'Pending' }}</span>
                    </div>
                    <div class="flex justify-between gap-4">
                        <span class="text-slate-500">Decision date</span>
                        <span class="font-medium text-slate-900">{{ $congeRequest->decided_at?->format('M d, Y') ?? 'Pending' }}</span>
                    </div>
                </div>
                @if($congeRequest->status === 'rejected' && $congeRequest->rejected_reason)
                    <div class="mt-5 rounded-2xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-800">
                        {{ $congeRequest->rejected_reason }}
                    </div>
                @endif
            </div>

            <div class="surface-card p-6">
                <h3 class="font-semibold text-slate-950">Timeline</h3>
                <div class="mt-5 space-y-5">
                    <div class="flex gap-3">
                        <span class="mt-1 h-2.5 w-2.5 rounded-full bg-blue-500"></span>
                        <div>
                            <p class="text-sm font-medium text-slate-950">Submitted</p>
                            <p class="text-xs text-slate-500">{{ $congeRequest->created_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <span class="mt-1 h-2.5 w-2.5 rounded-full {{ $congeRequest->status === 'pending' ? 'bg-amber-500' : 'bg-emerald-500' }}"></span>
                        <div>
                            <p class="text-sm font-medium text-slate-950">{{ $congeRequest->status === 'pending' ? 'Awaiting RH review' : 'Decision recorded' }}</p>
                            <p class="text-xs text-slate-500">{{ $congeRequest->decided_at?->format('M d, Y H:i') ?? 'In progress' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</x-app-layout>
