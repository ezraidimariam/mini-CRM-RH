<x-app-layout>
    <x-slot name="header">Activity Logs</x-slot>

    @php
        $items = [
            ['title' => 'Leave request approved', 'meta' => 'RH decision recorded', 'time' => 'Today, 09:30'],
            ['title' => 'Employee profile updated', 'meta' => 'Workforce record changed', 'time' => 'Yesterday, 16:10'],
            ['title' => 'Evaluation created', 'meta' => 'Annual review stored', 'time' => 'Yesterday, 11:45'],
            ['title' => 'Monthly leave accrual', 'meta' => 'Balances recalculated', 'time' => 'May 01, 00:00'],
        ];
    @endphp

    <div class="surface-card p-6">
        <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
            <div>
                <h2 class="text-lg font-semibold text-slate-950">System timeline</h2>
                <p class="text-sm text-slate-500">Important HR operations and audit events.</p>
            </div>
            <button class="btn-secondary">Export logs</button>
        </div>
        <div class="space-y-5">
            @foreach($items as $item)
                <div class="flex gap-4 rounded-2xl border border-slate-200 p-4">
                    <span class="mt-1 h-3 w-3 rounded-full bg-blue-500 ring-4 ring-blue-100"></span>
                    <div class="flex-1">
                        <p class="font-medium text-slate-950">{{ $item['title'] }}</p>
                        <p class="text-sm text-slate-500">{{ $item['meta'] }}</p>
                    </div>
                    <p class="text-xs font-medium text-slate-400">{{ $item['time'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
