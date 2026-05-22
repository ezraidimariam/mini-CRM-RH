<x-app-layout>
    <x-slot name="header">Evaluation Details</x-slot>

    @php $evaluation->loadMissing('employee', 'evaluatedBy'); @endphp

    <div class="grid gap-6 lg:grid-cols-[1fr_340px]">
        <section class="surface-card p-6">
            <p class="text-sm text-slate-500">Annual scorecard</p>
            <h2 class="mt-2 text-2xl font-semibold text-slate-950">{{ $evaluation->employee?->full_name }}</h2>
            <div class="mt-6 grid gap-4 md:grid-cols-5">
                @foreach(['global_score' => 'Global', 'punctuality' => 'Punctuality', 'skills' => 'Skills', 'attitude' => 'Attitude', 'results' => 'Results'] as $field => $label)
                    <div class="rounded-2xl bg-slate-50 p-4 text-center">
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">{{ $label }}</p>
                        <p class="mt-2 text-2xl font-semibold text-blue-700">{{ $evaluation->{$field} }}/5</p>
                    </div>
                @endforeach
            </div>
            <div class="mt-6 rounded-2xl border border-slate-200 p-5">
                <p class="font-semibold text-slate-950">Manager comment</p>
                <p class="mt-2 text-sm leading-6 text-slate-600">{{ $evaluation->comment ?: 'No comment provided.' }}</p>
            </div>
        </section>
        <aside class="surface-card p-6">
            <h3 class="font-semibold text-slate-950">Review metadata</h3>
            <div class="mt-5 space-y-4 text-sm">
                <div class="flex justify-between"><span class="text-slate-500">Year</span><span class="font-medium">{{ $evaluation->year }}</span></div>
                <div class="flex justify-between"><span class="text-slate-500">Evaluator</span><span class="font-medium">{{ $evaluation->evaluatedBy?->name ?? 'Unknown' }}</span></div>
                <div class="flex justify-between"><span class="text-slate-500">Created</span><span class="font-medium">{{ $evaluation->created_at->format('M d, Y') }}</span></div>
            </div>
        </aside>
    </div>
</x-app-layout>
