<x-app-layout>
    <x-slot name="header">Dashboard</x-slot>

    @php
        $isStaff = auth()->user()->role === 'admin' || auth()->user()->role === 'rh';
        $balance = $employee?->leaveBalance(now()->year);
        $avgEvaluation = $employee?->evaluations()->avg('global_score') ?? 0;
    @endphp

    <div class="space-y-6">
        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <p class="text-sm font-medium text-blue-600">Maya Agency HR cockpit</p>
                    <h2 class="mt-2 text-3xl font-semibold text-slate-950">Welcome back, {{ auth()->user()->name }}</h2>
                    <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">A clean overview of your workforce, leave operations, evaluations, and recent HR movement.</p>
                </div>
                <div class="flex gap-3">
                    @if($isStaff)
                        <a href="{{ route('employees.create') }}" class="btn-primary">Add employee</a>
                        <a href="{{ route('conges.index') }}" class="btn-secondary">Review leaves</a>
                    @else
                        <a href="{{ route('conges.create') }}" class="btn-primary">Request leave</a>
                    @endif
                </div>
            </div>
        </section>

        <section class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
            @if($isStaff)
                <div class="surface-card p-5">
                    <p class="text-sm text-slate-500">Total employees</p>
                    <p class="mt-3 text-3xl font-semibold text-slate-950">{{ $totalEmployees ?? 0 }}</p>
                    <p class="mt-2 text-xs text-slate-400">Active workforce records</p>
                </div>
                <div class="surface-card p-5">
                    <p class="text-sm text-slate-500">Pending leaves</p>
                    <p class="mt-3 text-3xl font-semibold text-amber-600">{{ $pendingRequests ?? 0 }}</p>
                    <p class="mt-2 text-xs text-slate-400">Awaiting RH decision</p>
                </div>
                <div class="surface-card p-5">
                    <p class="text-sm text-slate-500">Departments</p>
                    <p class="mt-3 text-3xl font-semibold text-slate-950">{{ $departmentStats?->count() ?? 0 }}</p>
                    <p class="mt-2 text-xs text-slate-400">Business units tracked</p>
                </div>
                <div class="surface-card p-5">
                    <p class="text-sm text-slate-500">Average score</p>
                    <p class="mt-3 text-3xl font-semibold text-blue-700">4.2<span class="text-base text-slate-400">/5</span></p>
                    <p class="mt-2 text-xs text-slate-400">Latest review baseline</p>
                </div>
            @else
                <div class="surface-card p-5">
                    <p class="text-sm text-slate-500">Accrued leave</p>
                    <p class="mt-3 text-3xl font-semibold text-slate-950">{{ $balance?->accrued_days ?? 0 }}</p>
                </div>
                <div class="surface-card p-5">
                    <p class="text-sm text-slate-500">Used leave</p>
                    <p class="mt-3 text-3xl font-semibold text-amber-600">{{ $balance?->used_days ?? 0 }}</p>
                </div>
                <div class="surface-card p-5">
                    <p class="text-sm text-slate-500">Available leave</p>
                    <p class="mt-3 text-3xl font-semibold text-emerald-600">{{ $balance?->available_days ?? 0 }}</p>
                </div>
                <div class="surface-card p-5">
                    <p class="text-sm text-slate-500">Average score</p>
                    <p class="mt-3 text-3xl font-semibold text-blue-700">{{ number_format($avgEvaluation, 1) }}<span class="text-base text-slate-400">/5</span></p>
                </div>
            @endif
        </section>

        <section class="grid gap-6 xl:grid-cols-[1fr_380px]">
            <div class="surface-card p-6">
                @if($isStaff)
                    <div class="mb-6 flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-slate-950">Department distribution</h3>
                            <p class="text-sm text-slate-500">Headcount by business unit</p>
                        </div>
                        <span class="badge-premium">Live</span>
                    </div>

                    <div class="space-y-5">
                        @forelse($departmentStats ?? [] as $department => $count)
                            <div>
                                <div class="mb-2 flex items-center justify-between text-sm">
                                    <span class="font-medium text-slate-700">{{ $department }}</span>
                                    <span class="text-slate-500">{{ $count }} members</span>
                                </div>
                                <div class="h-2.5 overflow-hidden rounded-full bg-slate-100">
                                    <div class="h-full rounded-full bg-blue-600" style="width: {{ ($totalEmployees ?? 0) > 0 ? ($count / $totalEmployees) * 100 : 0 }}%"></div>
                                </div>
                            </div>
                        @empty
                            <div class="empty-state">No department data yet.</div>
                        @endforelse
                    </div>
                @else
                    <div class="mb-6 flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-slate-950">My leave requests</h3>
                            <p class="text-sm text-slate-500">Latest submitted requests</p>
                        </div>
                        <a href="{{ route('conges.index') }}" class="btn-secondary">View all</a>
                    </div>
                    <div class="divide-y divide-slate-100">
                        @forelse($myRequests as $request)
                            <div class="flex items-center justify-between gap-4 py-4">
                                <div>
                                    <p class="font-medium text-slate-950">{{ $request->start_date->format('M d') }} - {{ $request->end_date->format('M d, Y') }}</p>
                                    <p class="text-sm text-slate-500">{{ $request->working_days }} working days</p>
                                </div>
                                <span class="{{ $request->status === 'approved' ? 'status-approved' : ($request->status === 'rejected' ? 'status-rejected' : 'status-pending') }}">{{ ucfirst($request->status) }}</span>
                            </div>
                        @empty
                            <div class="empty-state">No leave requests yet.</div>
                        @endforelse
                    </div>
                @endif
            </div>

            <div class="space-y-6">
                <div class="surface-card p-6">
                    <h3 class="text-lg font-semibold text-slate-950">Quick overview</h3>
                    <div class="mt-5 space-y-4">
                        @if($employee)
                            <div class="flex justify-between text-sm"><span class="text-slate-500">Department</span><span class="font-medium">{{ $employee->department }}</span></div>
                            <div class="flex justify-between text-sm"><span class="text-slate-500">Position</span><span class="font-medium">{{ $employee->position }}</span></div>
                            <div class="flex justify-between text-sm"><span class="text-slate-500">Hire date</span><span class="font-medium">{{ $employee->hire_date?->format('M d, Y') }}</span></div>
                        @else
                            <p class="text-sm text-slate-500">Administrative workspace profile.</p>
                        @endif
                    </div>
                </div>

                <div class="surface-card p-6">
                    <h3 class="text-lg font-semibold text-slate-950">Recent activity</h3>
                    <div class="mt-5 space-y-4">
                        @foreach($recentActivities ?? [] as $activity)
                            <div class="flex gap-3">
                                <span class="mt-1 h-2.5 w-2.5 rounded-full bg-blue-500 ring-4 ring-blue-100"></span>
                                <div>
                                    <p class="text-sm font-medium text-slate-900">{{ $activity['action'] }}</p>
                                    <p class="text-xs text-slate-500">{{ $activity['time'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
