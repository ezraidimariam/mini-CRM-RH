<x-app-layout>
    <x-slot name="header">Personnel Profile</x-slot>

    <div class="max-w-6xl mx-auto space-y-10">
        <!-- Navigation & Actions -->
        <div class="flex flex-col md:flex-row items-center justify-between gap-6">
             <a href="{{ route('employees.index') }}" class="group inline-flex items-center gap-2 text-slate-500 hover:text-primary-600 font-bold transition-all">
                <div class="p-2 bg-white rounded-xl shadow-sm border border-slate-100 group-hover:bg-primary-50 group-hover:border-primary-100 transition-all">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </div>
                Back to Directory
            </a>
            <div class="flex gap-3">
                <a href="{{ route('employees.edit', $employee) }}" class="btn-secondary py-2.5">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit Personnel
                </a>
                <a href="{{ route('evaluations.create', $employee) }}" class="btn-primary py-2.5 shadow-primary-500/30">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                    </svg>
                    Run Evaluation
                </a>
            </div>
        </div>

        <!-- Hero Profile Card -->
        <div class="premium-card p-1 relative overflow-hidden bg-gradient-to-br from-primary-600 to-indigo-800 border-none shadow-2xl">
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10"></div>
            <div class="bg-white/95 backdrop-blur-sm m-1 rounded-[2.25rem] p-8 md:p-12 relative z-10 flex flex-col md:flex-row items-center gap-10">
                <div class="relative group">
                    @if($employee->avatar)
                        <img class="h-40 w-40 rounded-[2.5rem] object-cover shadow-2xl border-4 border-white group-hover:rotate-3 transition-transform duration-500" src="{{ asset('storage/' . $employee->avatar) }}" alt="">
                    @else
                        <div class="h-40 w-40 rounded-[2.5rem] bg-gradient-to-br from-primary-500 to-indigo-600 flex items-center justify-center text-white font-black text-6xl shadow-2xl border-4 border-white group-hover:rotate-3 transition-transform duration-500">
                            {{ substr($employee->first_name, 0, 1) }}
                        </div>
                    @endif
                    <div class="absolute -bottom-2 -right-2 p-3 bg-emerald-500 rounded-2xl border-4 border-white text-white shadow-lg animate-bounce">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
                
                <div class="text-center md:text-left flex-1">
                    <div class="inline-flex items-center gap-2 px-3 py-1 bg-primary-50 text-primary-600 rounded-full text-xs font-bold uppercase tracking-widest mb-4">
                        <span class="w-1.5 h-1.5 rounded-full bg-primary-500"></span>
                        Active Employee
                    </div>
                    <h1 class="text-4xl md:text-5xl font-black text-slate-900 font-display mb-2 leading-none">{{ $employee->first_name }} {{ $employee->last_name }}</h1>
                    <p class="text-xl font-bold text-slate-400 font-display mb-6">{{ $employee->position }} • <span class="text-slate-900">{{ $employee->department }} Unit</span></p>
                    
                    <div class="flex flex-wrap justify-center md:justify-start gap-4">
                        <div class="px-5 py-3 bg-slate-50 border border-slate-100 rounded-2xl shadow-sm">
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Email Alignment</p>
                            <p class="text-sm font-bold text-slate-700">{{ $employee->email }}</p>
                        </div>
                         <div class="px-5 py-3 bg-slate-50 border border-slate-100 rounded-2xl shadow-sm">
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Tenure Since</p>
                            <p class="text-sm font-bold text-slate-700">{{ \Carbon\Carbon::parse($employee->hire_date)->format('M d, Y') }}</p>
                        </div>
                         <div class="px-5 py-3 bg-emerald-50 border border-emerald-100 rounded-2xl shadow-sm">
                            <p class="text-[10px] font-black text-emerald-400 uppercase tracking-widest mb-1">Current Salary</p>
                            <p class="text-sm font-black text-emerald-700">{{ $employee->salary ? '$' . number_format($employee->salary, 2) : 'NDA' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Strategic Metrics -->
            <div class="lg:col-span-1 space-y-8">
                <!-- Leave Balance -->
                <div class="premium-card p-8 bg-slate-900 text-white border-none shadow-2xl relative overflow-hidden">
                    <div class="absolute -top-10 -right-10 w-32 h-32 bg-white/5 rounded-full blur-3xl"></div>
                    <h3 class="text-xl font-bold font-display mb-8">Leave Allocation ({{ now()->year }})</h3>
                    
                    @if($balance = $employee->leaveBalances->where('year', now()->year)->first())
                        <div class="space-y-6">
                            <div class="flex items-end justify-between">
                                <span class="text-4xl font-black text-primary-400">{{ $balance->available_days }}</span>
                                <span class="text-sm font-bold text-slate-400 opacity-60">Days Available</span>
                            </div>
                            <div class="w-full bg-white/10 rounded-full h-2">
                                <div class="bg-primary-500 h-full rounded-full" style="width: {{ ($balance->available_days / $balance->accrued_days) * 100 }}%"></div>
                            </div>
                            <div class="grid grid-cols-2 gap-4 pt-4 border-t border-white/10">
                                <div>
                                    <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1">Accrued</p>
                                    <p class="text-lg font-bold">{{ $balance->accrued_days }}</p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1">Burned</p>
                                    <p class="text-lg font-bold">{{ $balance->used_days }}</p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-6 opacity-40">
                             <p class="font-bold">Awaiting year allocation...</p>
                        </div>
                    @endif
                </div>

                <!-- Contact Detail Box -->
                <div class="premium-card p-8">
                    <h3 class="text-lg font-bold text-slate-900 mb-6">Contact Matrix</h3>
                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center text-slate-400">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Phone</p>
                                <p class="font-bold text-slate-900">{{ $employee->phone ?? 'Unlisted' }}</p>
                            </div>
                        </div>
                         <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center text-slate-400">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Internal ID</p>
                                <p class="font-bold text-slate-900">EMP-{{ str_pad($employee->id, 5, '0', STR_PAD_LEFT) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed History -->
            <div class="lg:col-span-2 space-y-8">
                 <!-- Leave History -->
                <div class="premium-card overflow-hidden">
                    <div class="p-8 border-b border-slate-100 flex items-center justify-between">
                        <h3 class="text-xl font-bold text-slate-900 font-display">Time Off Log</h3>
                        <span class="px-3 py-1 bg-slate-100 rounded-lg text-xs font-bold text-slate-500 uppercase">{{ $employee->congeRequests->count() }} Entries</span>
                    </div>
                    <div class="overflow-x-auto">
                        @if($employee->congeRequests->count() > 0)
                            <table class="w-full text-left">
                                <thead class="bg-slate-50/50">
                                    <tr>
                                        <th class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Timeline</th>
                                        <th class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Duration</th>
                                        <th class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-50">
                                    @foreach($employee->congeRequests as $request)
                                        <tr class="group hover:bg-slate-50/50 transition-colors">
                                            <td class="px-8 py-5">
                                                <p class="text-sm font-bold text-slate-900">{{ \Carbon\Carbon::parse($request->start_date)->format('M d') }} - {{ \Carbon\Carbon::parse($request->end_date)->format('M d, Y') }}</p>
                                            </td>
                                            <td class="px-8 py-5">
                                                <p class="text-sm font-black text-slate-600">{{ $request->working_days }} Days</p>
                                            </td>
                                            <td class="px-8 py-5 text-right">
                                                @if($request->status === 'approved')
                                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-50 text-emerald-600 rounded-full text-[10px] font-bold uppercase border border-emerald-100">Approved</span>
                                                @elseif($request->status === 'rejected')
                                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-red-50 text-red-600 rounded-full text-[10px] font-bold uppercase border border-red-100">Denied</span>
                                                @else
                                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-amber-50 text-amber-600 rounded-full text-[10px] font-bold uppercase border border-amber-100">Processing</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="px-8 py-16 text-center">
                                <p class="text-sm font-bold text-slate-400 uppercase tracking-widest">No history recorded</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Performance Grid -->
                <div class="premium-card p-1">
                    <div class="p-8 border-b border-slate-100 flex items-center justify-between">
                         <h3 class="text-xl font-bold text-slate-900 font-display">Performance Scorecards</h3>
                         <div class="p-2 bg-primary-50 rounded-xl text-primary-600">
                             <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                             </svg>
                         </div>
                    </div>
                    @if($employee->evaluations->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-px bg-slate-100">
                            @foreach($employee->evaluations as $evaluation)
                                <div class="bg-white p-8 hover:bg-slate-50 transition-colors">
                                    <div class="flex items-center justify-between mb-8">
                                        <div class="px-3 py-1 bg-slate-900 text-white rounded-lg text-xs font-black">{{ $evaluation->year }} Fiscal</div>
                                        <div class="text-2xl font-black text-primary-600">{{ $evaluation->global_score }}<span class="text-sm text-slate-300">/5</span></div>
                                    </div>
                                    <div class="space-y-4">
                                        @php
                                            $metrics = [
                                                ['label' => 'Technical Prowess', 'value' => $evaluation->skills],
                                                ['label' => 'Strategic Results', 'value' => $evaluation->results],
                                                ['label' => 'Cultural Alignment', 'value' => $evaluation->attitude],
                                                ['label' => 'Integration', 'value' => $evaluation->punctuality],
                                            ];
                                        @endphp
                                        @foreach($metrics as $metric)
                                            <div class="flex items-center justify-between">
                                                <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">{{ $metric['label'] }}</span>
                                                <div class="flex gap-0.5">
                                                    @for($i=1; $i<=5; $i++)
                                                        <div class="w-1.5 h-3 rounded-full {{ $i <= $metric['value'] ? 'bg-primary-500 shadow-sm shadow-primary-500/30' : 'bg-slate-100' }}"></div>
                                                    @endfor
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    @if($evaluation->comment)
                                        <div class="mt-8 pt-6 border-t border-slate-50">
                                            <p class="text-sm text-slate-500 font-medium italic leading-relaxed">"{{ $evaluation->comment }}"</p>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="py-20 text-center">
                            <p class="text-sm font-bold text-slate-400 uppercase tracking-widest leading-none">No evaluations digitized</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
