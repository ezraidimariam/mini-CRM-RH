<x-app-layout>
    <x-slot name="header">Strategic Leave Management</x-slot>

    <x-slot name="headerAction">
        <a href="{{ route('conges.create') }}" class="btn-primary">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Request Time Off
        </a>
    </x-slot>

    <div class="space-y-8 animate-in fade-in slide-in-from-bottom-4 duration-700">
        <!-- Dashboard Summary -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Metric Card -->
            <div class="premium-card p-6 bg-gradient-to-br from-white to-slate-50/50">
                <div class="flex items-center gap-4">
                    <div class="p-3.5 bg-primary-100 text-primary-600 rounded-2xl shadow-sm">
                         <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-black text-slate-400 uppercase tracking-widest mb-1">Lifetime Requests</p>
                        <p class="text-3xl font-black text-slate-900 font-display">{{ $requests->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="premium-card p-6 bg-gradient-to-br from-white to-emerald-50/20">
                <div class="flex items-center gap-4">
                    <div class="p-3.5 bg-emerald-100 text-emerald-600 rounded-2xl shadow-sm">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-black text-slate-400 uppercase tracking-widest mb-1">Approved Quota</p>
                        <p class="text-3xl font-black text-emerald-600 font-display">{{ $requests->where('status', 'approved')->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="premium-card p-6 bg-gradient-to-br from-white to-amber-50/20">
                <div class="flex items-center gap-4">
                    <div class="p-3.5 bg-amber-100 text-amber-600 rounded-2xl shadow-sm">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-black text-slate-400 uppercase tracking-widest mb-1">Await Approval</p>
                        <p class="text-3xl font-black text-amber-600 font-display">{{ $requests->where('status', 'pending')->count() }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ledger Table -->
        <div class="premium-card border-none shadow-premium overflow-hidden">
             <div class="p-8 border-b border-slate-50 bg-white">
                <h3 class="text-xl font-bold text-slate-900 font-display">Time Off Ledger</h3>
                <p class="text-sm text-slate-500 font-medium">Detailed history of all leave cycles</p>
            </div>
            <div class="overflow-x-auto text-left">
                <table class="w-full">
                    <thead>
                        <tr class="bg-slate-50/50">
                            <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100">Leave Period</th>
                            <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100 text-center">Working Gap</th>
                            <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100">Context/Reason</th>
                            <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100">State</th>
                            <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($requests as $request)
                            <tr class="group hover:bg-primary-50/30 transition-colors">
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center text-slate-400 group-hover:bg-white group-hover:text-primary-500 transition-colors">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-slate-900">{{ \Carbon\Carbon::parse($request->start_date)->format('M d, Y') }}</p>
                                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">UNTIL {{ \Carbon\Carbon::parse($request->end_date)->format('M d, Y') }}</p>
                                            @if(auth()->user()->role === 'admin' || auth()->user()->role === 'rh')
                                                <p class="text-xs text-primary-600 font-semibold mt-1">Requested by: {{ $request->employee?->full_name ?? 'Unknown' }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6 text-center">
                                    <span class="inline-flex items-center px-3 py-1 bg-white border border-slate-200 rounded-xl text-xs font-black text-primary-600 shadow-sm">
                                        {{ $request->working_days }} DAYS
                                    </span>
                                </td>
                                <td class="px-8 py-6">
                                    <p class="text-sm font-medium text-slate-600 max-w-xs truncate italic group-hover:text-slate-900 transition-colors">
                                        {{ $request->reason ?? 'No context provided' }}
                                    </p>
                                </td>
                                <td class="px-8 py-6">
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
                                <td class="px-8 py-6 text-right">
                                    @if($request->status === 'pending')
                                        @if(auth()->user()->role === 'admin' || auth()->user()->role === 'rh')
                                            <!-- Approve Request -->
                                            <form action="{{ route('conges.approve', $request) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="p-2 text-slate-400 hover:text-emerald-500 hover:bg-white rounded-xl transition-all shadow-hover" title="Approve Request">
                                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                            <!-- Reject Request -->
                                            <form action="{{ route('conges.reject', $request) }}" method="POST" class="inline">
                                                @csrf
                                                <input type="hidden" name="rejected_reason" id="reject-reason-{{ $request->id }}">
                                                <button type="button" class="p-2 text-slate-400 hover:text-red-500 hover:bg-white rounded-xl transition-all shadow-hover" title="Reject Request" 
                                                        onclick="let reason = prompt('Please enter the reason for rejection:'); if(reason) { document.getElementById('reject-reason-{{ $request->id }}').value = reason; this.form.submit(); }">
                                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('conges.cancel', $request) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 text-slate-400 hover:text-red-500 hover:bg-white rounded-xl transition-all shadow-hover" title="Abort Request" onclick="return confirm('Abort this leave cycle?')">
                                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        @endif
                                    @else
                                        @if($request->status === 'rejected' && $request->rejected_reason)
                                            <span class="text-xs text-red-500 font-semibold block italic mb-1">Reason: {{ $request->rejected_reason }}</span>
                                        @endif
                                        <span class="text-xs font-bold text-slate-300 italic">Locked</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-8 py-32 text-center bg-slate-50/30">
                                    <div class="max-w-xs mx-auto">
                                        <div class="w-20 h-20 bg-white shadow-premium rounded-3xl flex items-center justify-center mx-auto mb-6 text-slate-200">
                                             <svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <p class="text-lg font-bold text-slate-900 mb-2">No cycles initiated</p>
                                        <p class="text-sm text-slate-500 leading-relaxed font-semibold italic">Your leave requests will manifest here once they are submitted into the system.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Navigation Matrix -->
        @if($requests->hasPages())
            <div class="flex justify-center pt-8">
                {{ $requests->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
