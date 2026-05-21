<x-app-layout>
    <x-slot name="header">Employees Directory</x-slot>

    <x-slot name="headerAction">
        <a href="{{ route('employees.create') }}" class="btn-primary">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add New Member
        </a>
    </x-slot>

    <div class="space-y-8 animate-in fade-in slide-in-from-bottom-4 duration-700">
        <!-- Search & Filters -->
        <div class="premium-card p-4">
            <form method="GET" action="{{ route('employees.index') }}" class="flex flex-col md:flex-row gap-4">
                <div class="flex-1 relative group">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-primary-500 transition-colors">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Search by name, email, or role..."
                        class="w-full pl-12 pr-4 py-3 bg-slate-50 border-none rounded-2xl focus:ring-4 focus:ring-primary-500/10 transition-all font-medium placeholder:text-slate-400">
                </div>
                <button type="submit" class="btn-primary px-8">
                    Application Search
                </button>
            </form>
        </div>

        <!-- Employees Listing -->
        <div class="premium-card overflow-hidden border-none shadow-premium">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/50">
                            <th class="px-8 py-5 text-xs font-bold text-slate-400 uppercase tracking-widest border-b border-slate-100">Member Info</th>
                            <th class="px-8 py-5 text-xs font-bold text-slate-400 uppercase tracking-widest border-b border-slate-100">Department</th>
                            <th class="px-8 py-5 text-xs font-bold text-slate-400 uppercase tracking-widest border-b border-slate-100">Position</th>
                            <th class="px-8 py-5 text-xs font-bold text-slate-400 uppercase tracking-widest border-b border-slate-100 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($employees as $employee)
                            <tr class="group hover:bg-primary-50/30 transition-colors">
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-4">
                                        <div class="relative">
                                            @if($employee->avatar)
                                                <img class="h-12 w-12 rounded-2xl object-cover shadow-sm group-hover:scale-105 transition-transform" src="{{ asset('storage/' . $employee->avatar) }}" alt="">
                                            @else
                                                <div class="h-12 w-12 rounded-2xl bg-gradient-to-br from-primary-400 to-indigo-600 flex items-center justify-center text-white font-bold text-sm shadow-md group-hover:scale-105 transition-transform">
                                                    {{ strtoupper(substr($employee->first_name, 0, 1) . substr($employee->last_name, 0, 1)) }}
                                                </div>
                                            @endif
                                            <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-emerald-500 border-2 border-white rounded-full shadow-sm"></div>
                                        </div>
                                        <div>
                                            <p class="font-bold text-slate-900 leading-none mb-1 group-hover:text-primary-600 transition-colors">{{ $employee->first_name }} {{ $employee->last_name }}</p>
                                            <p class="text-xs font-medium text-slate-500">{{ $employee->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6 text-sm">
                                    <span class="inline-flex items-center px-3 py-1 bg-white border border-slate-200 rounded-xl text-xs font-bold text-slate-600 group-hover:border-primary-200 group-hover:text-primary-600 transition-all">
                                        {{ $employee->department }}
                                    </span>
                                </td>
                                <td class="px-8 py-6 text-sm font-semibold text-slate-700">
                                    {{ $employee->position }}
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex items-center justify-end gap-2 translate-x-4 opacity-0 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-300">
                                        <a href="{{ route('employees.show', $employee) }}" class="p-2 text-slate-400 hover:text-primary-600 hover:bg-white rounded-xl transition-all shadow-hover" title="View Profile">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </a>
                                        <a href="{{ route('employees.edit', $employee) }}" class="p-2 text-slate-400 hover:text-amber-500 hover:bg-white rounded-xl transition-all shadow-hover" title="Edit Member">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 text-slate-400 hover:text-red-500 hover:bg-white rounded-xl transition-all shadow-hover" title="Remove Member" onclick="return confirm('Archive this personnel record?')">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-8 py-32 text-center bg-slate-50/30">
                                    <div class="max-w-xs mx-auto">
                                        <div class="w-20 h-20 bg-white shadow-premium rounded-3xl flex items-center justify-center mx-auto mb-6 text-slate-200">
                                            <svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <p class="text-lg font-bold text-slate-900 mb-2">No members found</p>
                                        <p class="text-sm text-slate-500 leading-relaxed font-semibold">We couldn't find any employees matching your criteria. Try adding a new member to the directory.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Navigation Footer -->
        @if($employees->hasPages())
            <div class="flex justify-center pt-8">
                {{ $employees->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
