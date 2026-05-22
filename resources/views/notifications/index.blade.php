<x-app-layout>
    <x-slot name="header">Notifications</x-slot>

    @php
        $notifications = [
            ['type' => 'Leaves', 'title' => 'Pending leave requests need review', 'body' => 'Open the leave approvals queue to review recent requests.', 'time' => '10 min ago'],
            ['type' => 'Evaluations', 'title' => 'Evaluation cycle is active', 'body' => 'Several employee scorecards are ready for annual updates.', 'time' => 'Today'],
            ['type' => 'System', 'title' => 'Monthly accrual completed', 'body' => 'Leave balances were recalculated for eligible employees.', 'time' => 'May 01'],
        ];
    @endphp

    <div class="surface-card divide-y divide-slate-100">
        @foreach($notifications as $notification)
            <div class="flex gap-4 p-5 hover:bg-slate-50">
                <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-blue-50 text-blue-600">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5" /></svg>
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-2">
                        <span class="badge-premium">{{ $notification['type'] }}</span>
                        <span class="text-xs text-slate-400">{{ $notification['time'] }}</span>
                    </div>
                    <p class="mt-2 font-semibold text-slate-950">{{ $notification['title'] }}</p>
                    <p class="mt-1 text-sm text-slate-500">{{ $notification['body'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
