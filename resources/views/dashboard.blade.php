<x-app-layout>
    <x-slot name="header">Dashboard</x-slot>

    <div class="space-y-8">
        <!-- Key Metrics -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
            <!-- Total Employees -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-xs font-semibold text-slate-600 uppercase tracking-wide mb-2">Total Employees</p>
                        <p class="text-3xl font-bold text-slate-900">{{ $totalEmployees ?? 0 }}</p>
                        <p class="text-xs text-slate-500 mt-2">Active staff</p>
                    </div>
                    <div class="p-3 rounded-xl bg-blue-50 text-blue-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Pending Requests -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-xs font-semibold text-slate-600 uppercase tracking-wide mb-2">Pending Requests</p>
                        <p class="text-3xl font-bold text-slate-900">{{ $pendingRequests ?? 0 }}</p>
                        <p class="text-xs text-slate-500 mt-2">Awaiting approval</p>
                    </div>
                    <div class="p-3 rounded-xl bg-amber-50 text-amber-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Departments -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-xs font-semibold text-slate-600 uppercase tracking-wide mb-2">Departments</p>
                        <p class="text-3xl font-bold text-slate-900">{{ isset($departmentStats) ? $departmentStats->count() : 0 }}</p>
                        <p class="text-xs text-slate-500 mt-2">Departments</p>
                    </div>
                    <div class="p-3 rounded-xl bg-emerald-50 text-emerald-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5.581m0 0H9m5.581 0a2 2 0 100-4 2 2 0 000 4zM9 7h.01M9 3h.01M15 7h.01M15 3h.01"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Average Score -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-xs font-semibold text-slate-600 uppercase tracking-wide mb-2">Avg. Rating</p>
                        <p class="text-3xl font-bold text-slate-900">4.2<span class="text-lg">/5</span></p>
                        <p class="text-xs text-slate-500 mt-2">Performance</p>
                    </div>
                    <div class="p-3 rounded-xl bg-purple-50 text-purple-600">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts and Details -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Employees by Department -->
            <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-slate-900">Employees by Department</h3>
                    <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                @if(isset($departmentStats) && $departmentStats->count() > 0)
                    <div class="space-y-5">
                        @foreach($departmentStats as $department => $count)
                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm font-medium text-slate-700">{{ $department }}</span>
                                    <span class="text-sm font-semibold text-slate-900">{{ $count }}</span>
                                </div>
                                <div class="w-full bg-slate-200 rounded-full h-2">
                                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-2 rounded-full transition-all duration-300" style="width: {{ isset($totalEmployees) ? ($count / $totalEmployees) * 100 : 0 }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="h-12 w-12 text-slate-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                        <p class="text-slate-500 text-sm">No department data available</p>
                    </div>
                @endif
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-slate-900">Quick Actions</h3>
                    <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <div class="space-y-3">
                    <a href="{{ route('employees.create') }}" class="block w-full p-4 rounded-lg bg-blue-50 hover:bg-blue-100 text-blue-700 font-semibold transition flex items-center gap-3 border border-blue-100">
                        <svg class="h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                        Add Employee
                    </a>
                    <a href="{{ route('conges.create') }}" class="block w-full p-4 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-700 font-semibold transition flex items-center gap-3 border border-emerald-100">
                        <svg class="h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Request Leave
                    </a>
                    <a href="{{ route('evaluations.index') }}" class="block w-full p-4 rounded-lg bg-purple-50 hover:bg-purple-100 text-purple-700 font-semibold transition flex items-center gap-3 border border-purple-100">
                        <svg class="h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        View Evaluations
                    </a>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <h3 class="text-lg font-bold text-slate-900 mb-6">Recent Activities</h3>
            @if(isset($recentActivities) && count($recentActivities) > 0)
                <div class="space-y-4">
                    @foreach($recentActivities as $activity)
                        <div class="flex items-start p-3 rounded-lg hover:bg-slate-50 transition">
                            <div class="p-2 rounded-xl bg-blue-50 text-blue-600 mr-4 flex-shrink-0">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zm-11-1a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-slate-900">{{ $activity['action'] ?? 'Activity' }}</p>
                                <p class="text-xs text-slate-500 mt-1">{{ $activity['time'] ?? 'Recently' }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-slate-500 text-sm text-center py-8">No recent activities</p>
            @endif
        </div>
    </div>
</x-app-layout>
