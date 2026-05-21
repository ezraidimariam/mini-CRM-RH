<x-app-layout>
    <x-slot name="header">Dashboard Overview</x-slot>

    <div class="space-y-10">
        <!-- Key Metrics Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @if(auth()->user()->role === 'admin' || auth()->user()->role === 'rh')
                <!-- Total Employees -->
                <div class="premium-card p-6 relative overflow-hidden group">
                    <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-primary-50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-primary-100 text-primary-600 rounded-2xl shadow-sm shadow-primary-200/50">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <span class="badge-premium bg-blue-50 text-blue-600 text-[10px]">+2 this month</span>
                        </div>
                        <p class="text-3xl font-bold text-slate-900 font-display mb-1">{{ $totalEmployees ?? 0 }}</p>
                        <p class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Total Staff</p>
                    </div>
                </div>

                <!-- Pending Requests -->
                <div class="premium-card p-6 relative overflow-hidden group">
                    <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-amber-50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-amber-100 text-amber-600 rounded-2xl shadow-sm shadow-amber-200/50">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            @if(($pendingRequests ?? 0) > 0)
                            <div class="flex h-2 w-2 relative">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-amber-500"></span>
                            </div>
                            @endif
                        </div>
                        <p class="text-3xl font-bold text-slate-900 font-display mb-1">{{ $pendingRequests ?? 0 }}</p>
                        <p class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Pending Leaves</p>
                    </div>
                </div>

                <!-- Total Departments -->
                <div class="premium-card p-6 relative overflow-hidden group">
                    <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-emerald-50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-emerald-100 text-emerald-600 rounded-2xl shadow-sm shadow-emerald-200/50">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5.581m0 0H9m5.581 0a2 2 0 100-4 2 2 0 000 4zM9 7h.01M9 3h.01M15 7h.01M15 3h.01"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-3xl font-bold text-slate-900 font-display mb-1">{{ isset($departmentStats) ? $departmentStats->count() : 0 }}</p>
                        <p class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Business Units</p>
                    </div>
                </div>

                <!-- Average Rating -->
                <div class="premium-card p-6 relative overflow-hidden group">
                    <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-indigo-50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-indigo-100 text-indigo-600 rounded-2xl shadow-sm shadow-indigo-200/50">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            </div>
                            <span class="badge-premium bg-emerald-50 text-emerald-600 text-[10px]">Exceptional</span>
                        </div>
                        <p class="text-3xl font-bold text-slate-900 font-display mb-1">4.2<span class="text-base text-slate-400">/5</span></p>
                        <p class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Avg. Rating</p>
                    </div>
                </div>
            @else
                @php
                    $balance = $employee?->leaveBalance(now()->year);
                    $avgEvaluation = $employee?->evaluations()->avg('global_score') ?? 0;
                @endphp
                <!-- Accrued Leaves -->
                <div class="premium-card p-6 relative overflow-hidden group">
                    <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-primary-50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-primary-100 text-primary-600 rounded-2xl shadow-sm shadow-primary-200/50">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-3xl font-bold text-slate-900 font-display mb-1">{{ $balance?->accrued_days ?? 0 }}</p>
                        <p class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Accrued Leaves</p>
                    </div>
                </div>

                <!-- Used Leaves -->
                <div class="premium-card p-6 relative overflow-hidden group">
                    <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-amber-50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-amber-100 text-amber-600 rounded-2xl shadow-sm shadow-amber-200/50">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-3xl font-bold text-slate-900 font-display mb-1">{{ $balance?->used_days ?? 0 }}</p>
                        <p class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Used Leaves</p>
                    </div>
                </div>

                <!-- Available Leaves -->
                <div class="premium-card p-6 relative overflow-hidden group">
                    <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-emerald-50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-emerald-100 text-emerald-600 rounded-2xl shadow-sm shadow-emerald-200/50">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-3xl font-bold text-slate-900 font-display mb-1">{{ $balance?->available_days ?? 0 }}</p>
                        <p class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Available Leaves</p>
                    </div>
                </div>

                <!-- Average Rating -->
                <div class="premium-card p-6 relative overflow-hidden group">
                    <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-indigo-50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-indigo-100 text-indigo-600 rounded-2xl shadow-sm shadow-indigo-200/50">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-3xl font-bold text-slate-900 font-display mb-1">{{ number_format($avgEvaluation, 1) }}<span class="text-base text-slate-400">/5</span></p>
                        <p class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Avg. Score</p>
                    </div>
                </div>
            @endif
        </div>

        <!-- Main Content Section -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Left Side: Workforce Distribution (Admin/RH) or My Leave Requests (Employee) -->
            @if(auth()->user()->role === 'admin' || auth()->user()->role === 'rh')
                <div class="lg:col-span-8 premium-card p-8 bg-gradient-to-br from-white to-slate-50/30">
                    <div class="flex items-center justify-between mb-10">
                        <div>
                            <h3 class="text-xl font-bold text-slate-900 mb-1">Workforce Distribution</h3>
                            <p class="text-sm text-slate-500 font-medium">Headcount by department</p>
                        </div>
                        <div class="flex gap-2">
                             <div class="flex items-center gap-1.5 px-3 py-1.5 bg-white border border-slate-200 rounded-xl text-xs font-bold text-slate-600 cursor-pointer hover:border-primary-300 transition-colors">
                                <span class="w-1.5 h-1.5 rounded-full bg-primary-500"></span> Live
                             </div>
                        </div>
                    </div>

                    @if(isset($departmentStats) && $departmentStats->count() > 0)
                        <div class="space-y-8">
                            @foreach($departmentStats as $department => $count)
                                <div class="group">
                                    <div class="flex justify-between items-end mb-2.5">
                                        <span class="text-sm font-bold text-slate-700 group-hover:text-primary-600 transition-colors">{{ $department }}</span>
                                        <span class="text-xs font-extrabold text-slate-900 bg-white px-2 py-1 rounded-lg border border-slate-100 shadow-sm">{{ $count }} Members</span>
                                    </div>
                                    <div class="w-full bg-slate-100 rounded-full h-3 flex overflow-hidden">
                                        <div class="bg-gradient-to-r from-primary-500 to-indigo-600 h-full rounded-full transition-all duration-1000 shadow-sm shadow-primary-500/20" style="width: {{ isset($totalEmployees) ? ($count / $totalEmployees) * 100 : 0 }}%"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-24 border-2 border-dashed border-slate-200 rounded-[2rem]">
                            <div class="p-4 bg-slate-100 rounded-3xl inline-block mb-4">
                                <svg class="h-10 w-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                            </div>
                            <p class="text-slate-500 font-bold">No organizational data</p>
                        </div>
                    @endif
                </div>
            @else
                <!-- My Recent Leave Requests -->
                <div class="lg:col-span-8 premium-card p-8 bg-gradient-to-br from-white to-slate-50/30">
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <h3 class="text-xl font-bold text-slate-900 mb-1">My Recent Leave Requests</h3>
                            <p class="text-sm text-slate-500 font-medium">Status of your submitted time-off requests</p>
                        </div>
                        <a href="{{ route('conges.index') }}" class="px-4 py-2 bg-slate-50 hover:bg-slate-100 rounded-xl text-xs font-bold text-slate-600 transition-colors border border-slate-200">View Ledger</a>
                    </div>

                    @if(isset($myRequests) && $myRequests->count() > 0)
                        <div class="overflow-x-auto text-left">
                            <table class="w-full">
                                <thead>
                                    <tr class="text-slate-400 text-[10px] font-black uppercase tracking-widest border-b border-slate-100 pb-3">
                                        <th class="pb-3">Period</th>
                                        <th class="pb-3 text-center">Days</th>
                                        <th class="pb-3">Reason</th>
                                        <th class="pb-3">Status</th>
                                        <th class="pb-3 text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-50">
                                    @foreach($myRequests as $request)
                                        <tr class="group hover:bg-primary-50/30 transition-colors">
                                            <td class="py-4">
                                                <p class="text-sm font-bold text-slate-900">{{ \Carbon\Carbon::parse($request->start_date)->format('M d, Y') }}</p>
                                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">to {{ \Carbon\Carbon::parse($request->end_date)->format('M d, Y') }}</p>
                                            </td>
                                            <td class="py-4 text-center">
                                                <span class="inline-flex items-center px-2.5 py-0.5 bg-white border border-slate-200 rounded-xl text-xs font-black text-primary-600 shadow-sm">
                                                    {{ $request->working_days }} Days
                                                </span>
                                            </td>
                                            <td class="py-4 max-w-xs truncate italic text-slate-500 text-sm">
                                                {{ $request->reason ?? 'No reason provided' }}
                                            </td>
                                            <td class="py-4">
                                                @if($request->status === 'approved')
                                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-50 text-emerald-600 rounded-full text-[10px] font-black uppercase tracking-widest border border-emerald-100">
                                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Approved
                                                    </span>
                                                @elseif($request->status === 'rejected')
                                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-red-50 text-red-600 rounded-full text-[10px] font-black uppercase tracking-widest border border-red-100">
                                                        <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Denied
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-amber-50 text-amber-600 rounded-full text-[10px] font-black uppercase tracking-widest border border-amber-100">
                                                        <span class="animate-pulse w-1.5 h-1.5 rounded-full bg-amber-500"></span> Pending
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="py-4 text-right">
                                                @if($request->status === 'pending')
                                                    <form action="{{ route('conges.cancel', $request) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="p-2 text-slate-400 hover:text-red-500 hover:bg-white rounded-xl transition-all shadow-hover" title="Abort Request" onclick="return confirm('Abort this leave cycle?')">
                                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                @else
                                                    @if($request->status === 'rejected' && $request->rejected_reason)
                                                        <span class="text-[10px] text-red-500 font-bold block italic" title="{{ $request->rejected_reason }}">View Reason</span>
                                                    @else
                                                        <span class="text-xs font-bold text-slate-350 italic">Locked</span>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-16 border-2 border-dashed border-slate-200 rounded-[2rem]">
                            <p class="text-slate-400 font-bold text-sm">No leave requests initiated yet.</p>
                            <a href="{{ route('conges.create') }}" class="text-primary-600 text-xs font-bold hover:underline mt-2 inline-block">Create your first request →</a>
                        </div>
                    @endif
                </div>
            @endif

            <!-- Quick Access Menu -->
            <div class="lg:col-span-4 space-y-6">
                <div class="premium-card p-8">
                    <h3 class="text-lg font-bold text-slate-900 mb-6 flex items-center gap-2">
                        <svg class="h-5 w-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Quick Actions
                    </h3>
                    <div class="space-y-4">
                        @if(auth()->user()->role === 'admin' || auth()->user()->role === 'rh')
                            <a href="{{ route('employees.create') }}" class="flex items-center gap-4 p-4 rounded-2xl bg-primary-50 text-primary-700 border border-primary-100 hover:bg-primary-100 transition-all duration-300 group">
                                <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center shadow-sm text-primary-600 group-hover:scale-110 transition-transform">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                    </svg>
                                </div>
                                <span class="font-bold text-sm">Add New Talent</span>
                            </a>
                        @endif
                        <a href="{{ route('conges.create') }}" class="flex items-center gap-4 p-4 rounded-2xl bg-emerald-50 text-emerald-700 border border-emerald-100 hover:bg-emerald-100 transition-all duration-300 group">
                            <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center shadow-sm text-emerald-600 group-hover:scale-110 transition-transform">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <span class="font-bold text-sm">Submit Request</span>
                        </a>
                        @if(auth()->user()->role === 'admin' || auth()->user()->role === 'rh')
                            <a href="{{ route('evaluations.index') }}" class="flex items-center gap-4 p-4 rounded-2xl bg-indigo-50 text-indigo-700 border border-indigo-100 hover:bg-indigo-100 transition-all duration-300 group">
                                <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center shadow-sm text-indigo-600 group-hover:scale-110 transition-transform">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                </div>
                                <span class="font-bold text-sm">Review Ratings</span>
                            </a>
                        @endif
                    </div>
                </div>

                @if(auth()->user()->role === 'admin' || auth()->user()->role === 'rh')
                    <div class="premium-card p-8 bg-slate-900 text-white border-none">
                        <h3 class="text-lg font-bold mb-4">Pulse Check</h3>
                        <p class="text-slate-400 text-sm mb-6 leading-relaxed">Your organization's engagement score is up by 8.4% since last quarter.</p>
                        <div class="flex items-center gap-3 text-emerald-400 font-bold text-sm">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                            Trending Upward
                        </div>
                    </div>
                @elseif($employee)
                    <!-- Employee Profile / Position Card -->
                    <div class="premium-card p-8 bg-slate-900 text-white border-none">
                        <h3 class="text-lg font-bold mb-4">My Position</h3>
                        <div class="space-y-4 text-xs font-semibold text-slate-350">
                            <div class="flex justify-between border-b border-slate-800 pb-2">
                                <span class="text-slate-400">Department</span>
                                <span class="text-slate-200">{{ $employee?->department ?? 'N/A' }}</span>
                            </div>
                            <div class="flex justify-between border-b border-slate-800 pb-2">
                                <span class="text-slate-400">Job Title</span>
                                <span class="text-slate-200">{{ $employee?->position ?? 'N/A' }}</span>
                            </div>
                            <div class="flex justify-between border-b border-slate-800 pb-2">
                                <span class="text-slate-400">Hire Date</span>
                                <span class="text-slate-200">{{ $employee?->hire_date ? \Carbon\Carbon::parse($employee?->hire_date)->format('M d, Y') : 'N/A' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-400">Contact</span>
                                <span class="text-slate-200">{{ $employee?->phone ?? 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Role-based Bottom Feed: Live Activity Feed (Admin/RH) or Performance Reviews (Employee) -->
        @if(auth()->user()->role === 'admin' || auth()->user()->role === 'rh')
            <div class="premium-card p-1">
                <div class="p-7 flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-bold text-slate-900">Live Activity Feed</h3>
                        <p class="text-sm text-slate-500 font-medium">Real-time system updates</p>
                    </div>
                    <button class="px-4 py-2 bg-slate-50 hover:bg-slate-100 rounded-xl text-xs font-bold text-slate-600 transition-colors border border-slate-200">Export Logs</button>
                </div>
                <div class="border-t border-slate-100">
                    @if(isset($recentActivities) && count($recentActivities) > 0)
                        <div class="divide-y divide-slate-100">
                            @foreach($recentActivities as $activity)
                                <div class="flex items-center justify-between p-6 hover:bg-slate-50/50 transition-colors group">
                                    <div class="flex items-center gap-5">
                                        <div class="w-12 h-12 rounded-2xl bg-white border border-slate-200 flex items-center justify-center text-primary-600 group-hover:scale-110 transition-transform shadow-sm">
                                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zm-11-1a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-slate-900">{{ $activity['action'] ?? 'System Event' }}</p>
                                            <p class="text-xs text-slate-500 font-medium mt-0.5">Automated log • {{ $activity['user'] ?? 'Global' }}</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-xs text-slate-400 font-bold uppercase tracking-widest">{{ $activity['time'] ?? 'Just now' }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-20 px-4">
                            <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-200">
                                 <svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                                </svg>
                            </div>
                            <p class="text-slate-400 font-bold">Waiting for system signals...</p>
                        </div>
                    @endif
                </div>
            </div>
        @else
            <div class="premium-card p-1">
                <div class="p-7">
                    <h3 class="text-xl font-bold text-slate-900 font-display">My Performance Scorecards</h3>
                    <p class="text-sm text-slate-500 font-medium">History of your official evaluations and metrics</p>
                </div>
                <div class="border-t border-slate-100 overflow-x-auto text-left">
                    @if(isset($myEvaluations) && $myEvaluations->count() > 0)
                        <table class="w-full text-left">
                            <thead>
                                <tr class="bg-slate-50/50">
                                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100">Evaluation Cycle</th>
                                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100 text-center">Overall Score</th>
                                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100 text-center">Punctuality</th>
                                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100 text-center">Skills</th>
                                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100 text-center">Attitude</th>
                                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100 text-center">Results</th>
                                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100">Review Feedback</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                @foreach($myEvaluations as $eval)
                                    <tr class="hover:bg-slate-50/30 transition-colors">
                                        <td class="px-8 py-6 font-bold text-slate-900">Year {{ $eval->year }}</td>
                                        <td class="px-8 py-6 text-center">
                                            <span class="inline-flex items-center px-3 py-1 bg-indigo-50 text-indigo-700 border border-indigo-150 rounded-xl font-extrabold text-xs">
                                                {{ number_format($eval->global_score, 1) }} / 5.0
                                            </span>
                                        </td>
                                        <td class="px-8 py-6 text-center text-slate-650 font-semibold">{{ $eval->punctuality }} / 5</td>
                                        <td class="px-8 py-6 text-center text-slate-650 font-semibold">{{ $eval->skills }} / 5</td>
                                        <td class="px-8 py-6 text-center text-slate-650 font-semibold">{{ $eval->attitude }} / 5</td>
                                        <td class="px-8 py-6 text-center text-slate-650 font-semibold">{{ $eval->results }} / 5</td>
                                        <td class="px-8 py-6 text-slate-500 italic font-medium max-w-xs truncate" title="{{ $eval->comment }}">{{ $eval->comment }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="text-center py-16">
                            <p class="text-slate-400 font-bold text-sm">No evaluation reports archived yet.</p>
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
