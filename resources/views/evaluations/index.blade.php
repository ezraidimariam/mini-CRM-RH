<x-app-layout>
    <x-slot name="header">Evaluations</x-slot>

    <x-slot name="headerAction">
        <a href="{{ route('evaluations.create') }}" class="btn-primary">Create evaluation</a>
    </x-slot>

    <div class="space-y-6">
        <section class="grid gap-4 md:grid-cols-3">
            <div class="surface-card p-5">
                <p class="text-sm text-slate-500">Evaluation records</p>
                <p class="mt-3 text-3xl font-semibold text-slate-950">{{ $evaluations->total() }}</p>
            </div>
            <div class="surface-card p-5">
                <p class="text-sm text-slate-500">Average score</p>
                <p class="mt-3 text-3xl font-semibold text-blue-700">{{ number_format($evaluations->avg('global_score') ?? 0, 1) }}<span class="text-base text-slate-400">/5</span></p>
            </div>
            <div class="surface-card p-5">
                <p class="text-sm text-slate-500">Current review year</p>
                <p class="mt-3 text-3xl font-semibold text-slate-950">{{ now()->year }}</p>
            </div>
        </section>

        <section class="table-shell">
            <div class="border-b border-slate-200 p-5">
                <h2 class="text-lg font-semibold text-slate-950">Performance scorecards</h2>
                <p class="mt-1 text-sm text-slate-500">Annual evaluation records for Maya Agency employees.</p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="table-head">
                        <tr>
                            <th class="px-5 py-4">Employee</th>
                            <th class="px-5 py-4">Year</th>
                            <th class="px-5 py-4">Score</th>
                            <th class="px-5 py-4">Evaluator</th>
                            <th class="px-5 py-4">Status</th>
                            <th class="px-5 py-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($evaluations as $evaluation)
                            <tr class="hover:bg-slate-50">
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-sm font-semibold text-blue-700">
                                            {{ strtoupper(substr($evaluation->employee->first_name, 0, 1) . substr($evaluation->employee->last_name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <p class="font-medium text-slate-950">{{ $evaluation->employee->full_name }}</p>
                                            <p class="text-xs text-slate-500">{{ $evaluation->employee->position }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-4 text-slate-600">{{ $evaluation->year }}</td>
                                <td class="px-5 py-4">
                                    <span class="badge-premium">{{ $evaluation->global_score }}/5</span>
                                </td>
                                <td class="px-5 py-4 text-slate-600">{{ $evaluation->evaluatedBy?->name ?? 'Unknown' }}</td>
                                <td class="px-5 py-4">
                                    @if($evaluation->global_score >= 4)
                                        <span class="status-approved">Strong</span>
                                    @elseif($evaluation->global_score >= 3)
                                        <span class="status-pending">Stable</span>
                                    @else
                                        <span class="status-rejected">Needs support</span>
                                    @endif
                                </td>
                                <td class="px-5 py-4 text-right">
                                    <a href="{{ route('evaluations.show', $evaluation) }}" class="btn-secondary px-3 py-2 text-xs">Details</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-5 py-10">
                                    <div class="empty-state">
                                        <p class="font-semibold text-slate-950">No evaluations yet</p>
                                        <p class="mt-1 text-sm text-slate-500">Create the first scorecard to start tracking performance.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($evaluations->hasPages())
                <div class="border-t border-slate-200 px-5 py-4">{{ $evaluations->links() }}</div>
            @endif
        </section>
    </div>
</x-app-layout>
