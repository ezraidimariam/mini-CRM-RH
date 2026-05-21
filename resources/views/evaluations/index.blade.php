<x-app-layout>
    <x-slot name="header">Performance Analytics</x-slot>

    <x-slot name="headerAction">
        <a href="{{ route('evaluations.create') }}" class="btn-primary">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Initiate Evaluation
        </a>
    </x-slot>

    <div class="space-y-8 animate-in fade-in slide-in-from-bottom-4 duration-700">
        <!-- Dashboard Summary -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="premium-card p-8 bg-gradient-to-br from-primary-600 to-indigo-800 text-white border-none relative overflow-hidden">
                <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-white/5 rounded-full blur-3xl"></div>
                <div class="relative z-10 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-black uppercase tracking-widest text-primary-200 mb-2">Cycle Volume</p>
                        <p class="text-5xl font-black font-display leading-none">{{ $evaluations->count() }}</p>
                        <p class="text-sm font-bold text-primary-100/60 mt-4 italic">Digitized performance records</p>
                    </div>
                    <div class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center backdrop-blur-md border border-white/20">
                         <svg class="h-8 w-8 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="premium-card p-8">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <p class="text-xs font-black text-slate-400 uppercase tracking-widest mb-1">Global Rating Average</p>
                        <h3 class="text-3xl font-black text-slate-900 font-display">{{ round($evaluations->avg('global_score') ?? 0, 1) }}<span class="text-lg text-slate-300 font-bold">/5.0</span></h3>
                    </div>
                    <div class="p-4 bg-amber-50 text-amber-500 rounded-[2rem] border border-amber-100 shadow-sm">
                        <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </div>
                </div>
                <div class="w-full bg-slate-100 rounded-full h-2 flex overflow-hidden">
                    <div class="bg-gradient-to-r from-amber-400 to-primary-600 h-full rounded-full transition-all duration-1000" style="width: {{ (round($evaluations->avg('global_score') ?? 0, 1) / 5) * 100 }}%"></div>
                </div>
                <p class="text-xs font-bold text-slate-400 mt-4 italic uppercase tracking-wider">Organizational health trending upwards</p>
            </div>
        </div>

        <!-- Matrix Table -->
        <div class="premium-card border-none shadow-premium overflow-hidden">
            <div class="p-8 border-b border-slate-50 bg-white">
                <h3 class="text-xl font-bold text-slate-900 font-display">Performance Matrix</h3>
                <p class="text-sm text-slate-500 font-medium">Historical audit of talent quality</p>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-slate-50/50">
                            <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100">Evaluated Entity</th>
                            <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100">Fiscal Window</th>
                            <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100">Quality Score</th>
                            <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100">Audit Status</th>
                            <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($evaluations as $evaluation)
                            <tr class="group hover:bg-primary-50/30 transition-colors">
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-4">
                                        @if($evaluation->employee->avatar)
                                            <img class="h-10 w-10 rounded-xl object-cover shadow-sm group-hover:scale-105 transition-transform" src="{{ asset('storage/' . $evaluation->employee->avatar) }}" alt="">
                                        @else
                                            <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-primary-400 to-indigo-600 flex items-center justify-center text-white font-bold text-xs group-hover:scale-105 transition-transform">
                                                {{ substr($evaluation->employee->first_name, 0, 1) }}
                                            </div>
                                        @endif
                                        <div>
                                            <p class="text-sm font-bold text-slate-900 group-hover:text-primary-600 transition-colors leading-none mb-1">{{ $evaluation->employee->first_name }} {{ $evaluation->employee->last_name }}</p>
                                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">{{ $evaluation->employee->position }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <span class="inline-flex items-center px-3 py-1 bg-white border border-slate-200 rounded-lg text-[10px] font-black text-slate-600 group-hover:border-primary-100 group-hover:text-primary-600 transition-all">
                                        YEAR {{ $evaluation->year }}
                                    </span>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-3">
                                        <div class="text-base font-black text-slate-900">{{ $evaluation->global_score }}<span class="text-[10px] text-slate-300">/5</span></div>
                                        <div class="flex gap-0.5">
                                            @for($i=1; $i<=5; $i++)
                                                <div class="w-1.5 h-3 rounded-full {{ $i <= $evaluation->global_score ? 'bg-primary-500 shadow-sm' : 'bg-slate-100' }}"></div>
                                            @endfor
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    @if($evaluation->global_score >= 4)
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-50 text-emerald-600 rounded-full text-[10px] font-black uppercase tracking-widest border border-emerald-100">Exceptional</span>
                                    @elseif($evaluation->global_score >= 3)
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-primary-50 text-primary-600 rounded-full text-[10px] font-black uppercase tracking-widest border border-primary-100">Mainstream</span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-red-50 text-red-600 rounded-full text-[10px] font-black uppercase tracking-widest border border-red-100">Critical</span>
                                    @endif
                                </td>
                                <td class="px-8 py-6 text-right">
                                    <a href="{{ route('employees.show', $evaluation->employee) }}" class="p-2 text-slate-400 hover:text-primary-600 hover:bg-white rounded-xl transition-all shadow-hover" title="Examine Full Report">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-8 py-32 text-center bg-slate-50/30">
                                    <div class="max-w-xs mx-auto">
                                        <div class="w-20 h-20 bg-white shadow-premium rounded-3xl flex items-center justify-center mx-auto mb-6 text-slate-200">
                                             <svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                            </svg>
                                        </div>
                                        <p class="text-lg font-bold text-slate-900 mb-2">No metrics available</p>
                                        <p class="text-sm text-slate-500 leading-relaxed font-semibold italic">Digitized performance evaluations will populate this matrix once initiated by management.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Navigation Matrix -->
        @if($evaluations->hasPages())
            <div class="flex justify-center pt-8">
                {{ $evaluations->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
