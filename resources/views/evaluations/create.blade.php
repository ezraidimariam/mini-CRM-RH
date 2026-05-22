<x-app-layout>
    <x-slot name="header">Create Evaluation</x-slot>

    <div class="grid gap-6 lg:grid-cols-[1fr_340px]">
        <section class="surface-card p-6">
            <div class="mb-6">
                <h2 class="text-xl font-semibold text-slate-950">Performance scorecard</h2>
                <p class="mt-1 text-sm text-slate-500">Record a structured annual evaluation for an employee.</p>
            </div>

            <form method="POST" action="{{ route('evaluations.store') }}" class="space-y-6">
                @csrf

                <div class="grid gap-5 md:grid-cols-2">
                    <div>
                        <x-input-label for="employee_id" :value="__('Employee')" />
                        @if($employee)
                            <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                            <div class="mt-2 rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-medium text-slate-800">{{ $employee->full_name }} - {{ $employee->position }}</div>
                        @else
                            <select name="employee_id" id="employee_id" required class="mt-2 w-full">
                                <option value="">Select employee</option>
                                @foreach($employees as $emp)
                                    <option value="{{ $emp->id }}" @selected(old('employee_id') == $emp->id)>{{ $emp->full_name }} - {{ $emp->position }}</option>
                                @endforeach
                            </select>
                        @endif
                        <x-input-error class="mt-2" :messages="$errors->get('employee_id')" />
                    </div>
                    <div>
                        <x-input-label for="year" :value="__('Year')" />
                        <select name="year" id="year" required class="mt-2 w-full">
                            @for($y = now()->year; $y >= now()->year - 2; $y--)
                                <option value="{{ $y }}" @selected(old('year', now()->year) == $y)>{{ $y }}</option>
                            @endfor
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('year')" />
                    </div>
                </div>

                <div class="grid gap-5 md:grid-cols-5">
                    @foreach(['global_score' => 'Global', 'punctuality' => 'Punctuality', 'skills' => 'Skills', 'attitude' => 'Attitude', 'results' => 'Results'] as $name => $label)
                        <div>
                            <x-input-label :for="$name" :value="$label" />
                            <select name="{{ $name }}" id="{{ $name }}" required class="mt-2 w-full">
                                <option value="">Score</option>
                                @for($i = 5; $i >= 1; $i--)
                                    <option value="{{ $i }}" @selected(old($name) == $i)>{{ $i }}</option>
                                @endfor
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get($name)" />
                        </div>
                    @endforeach
                </div>

                <div>
                    <x-input-label for="comment" :value="__('Comment')" />
                    <textarea id="comment" name="comment" rows="5" class="mt-2 w-full resize-none" placeholder="Add concise manager feedback.">{{ old('comment') }}</textarea>
                    <x-input-error class="mt-2" :messages="$errors->get('comment')" />
                </div>

                <div class="flex flex-wrap gap-3 border-t border-slate-200 pt-6">
                    <x-primary-button>Save evaluation</x-primary-button>
                    <a href="{{ route('evaluations.index') }}" class="btn-secondary">Cancel</a>
                </div>
            </form>
        </section>

        <aside class="surface-card p-6">
            <h3 class="font-semibold text-slate-950">Review guidance</h3>
            <p class="mt-2 text-sm leading-6 text-slate-500">Scores range from 1 to 5. The app prevents duplicate evaluations for the same employee and year.</p>
        </aside>
    </div>
</x-app-layout>
