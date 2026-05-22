<x-app-layout>
    <x-slot name="header">Leave Balances</x-slot>

    <div class="space-y-6">
        <div class="grid gap-4 md:grid-cols-3">
            <div class="surface-card p-5"><p class="text-sm text-slate-500">Tracked balances</p><p class="mt-2 text-3xl font-semibold">{{ $balances->total() }}</p></div>
            <div class="surface-card p-5"><p class="text-sm text-slate-500">Current year</p><p class="mt-2 text-3xl font-semibold">{{ now()->year }}</p></div>
            <div class="surface-card p-5"><p class="text-sm text-slate-500">Policy accrual</p><p class="mt-2 text-3xl font-semibold">1.5/mo</p></div>
        </div>

        <div class="table-shell">
            <table class="w-full text-left text-sm">
                <thead class="table-head">
                    <tr>
                        <th class="px-5 py-4">Employee</th>
                        <th class="px-5 py-4">Year</th>
                        <th class="px-5 py-4">Accrued</th>
                        <th class="px-5 py-4">Used</th>
                        <th class="px-5 py-4">Available</th>
                        <th class="px-5 py-4">Last accrual</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($balances as $balance)
                        <tr class="hover:bg-slate-50">
                            <td class="px-5 py-4 font-medium text-slate-950">{{ $balance->employee?->full_name ?? 'Unknown' }}</td>
                            <td class="px-5 py-4 text-slate-600">{{ $balance->year }}</td>
                            <td class="px-5 py-4">{{ $balance->accrued_days }}</td>
                            <td class="px-5 py-4">{{ $balance->used_days }}</td>
                            <td class="px-5 py-4"><span class="badge-premium">{{ $balance->available_days }} days</span></td>
                            <td class="px-5 py-4 text-slate-500">{{ $balance->last_accrual_date?->format('M d, Y') ?? 'Not accrued' }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="px-5 py-10"><div class="empty-state">No leave balances yet.</div></td></tr>
                    @endforelse
                </tbody>
            </table>
            <div class="border-t border-slate-200 px-5 py-4">{{ $balances->links() }}</div>
        </div>
    </div>
</x-app-layout>
