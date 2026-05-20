<x-app-layout>
    <x-slot name="header">Employee Evaluations</x-slot>

    <x-slot name="headerAction">
        <a href="{{ route('evaluations.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-200 shadow-md hover:shadow-lg">
            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            New Evaluation
        </a>
    </x-slot>

    <div class="space-y-6">
        <!-- Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Total Evaluations -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Total Evaluations</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $evaluations->count() }}</p>
                    </div>
                </div>
            </div>

            <!-- Average Score -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Average Score</p>
                        <p class="text-2xl font-bold text-gray-900">{{ round($evaluations->avg('global_score') ?? 0, 1) }}/5</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Evaluations Table -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-blue-50 to-blue-100 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Employee</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Position</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Year</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Performance</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Evaluated By</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($evaluations as $evaluation)
                            <tr class="hover:bg-blue-50 transition duration-150">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        @if($evaluation->employee->avatar)
                                            <img class="h-10 w-10 rounded-full object-cover" src="{{ asset('storage/' . $evaluation->employee->avatar) }}" alt="">
                                        @else
                                            <div class="h-10 w-10 rounded-full bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center text-white font-bold text-sm">
                                                {{ strtoupper(substr($evaluation->employee->first_name, 0, 1) . substr($evaluation->employee->last_name, 0, 1)) }}
                                            </div>
                                        @endif
                                        <div class="ml-4">
                                            <p class="text-sm font-semibold text-gray-900">{{ $evaluation->employee->first_name }} {{ $evaluation->employee->last_name }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-gray-700">{{ $evaluation->employee->position }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">
                                        {{ $evaluation->year }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        @if($evaluation->global_score >= 4)
                                            <span class="px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800">
                                                ⭐ {{ $evaluation->global_score }}/5
                                            </span>
                                        @elseif($evaluation->global_score >= 3)
                                            <span class="px-3 py-1 text-sm font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                ⭐ {{ $evaluation->global_score }}/5
                                            </span>
                                        @else
                                            <span class="px-3 py-1 text-sm font-semibold rounded-full bg-red-100 text-red-800">
                                                ⭐ {{ $evaluation->global_score }}/5
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-gray-700">{{ $evaluation->evaluatedBy->name ?? 'System' }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('employees.show', $evaluation->employee) }}" class="inline-flex items-center px-3 py-1 text-sm rounded-md bg-blue-100 text-blue-700 hover:bg-blue-200 transition">
                                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        View
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <svg class="h-12 w-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                    <p class="text-gray-600 font-medium">No evaluations yet</p>
                                    <p class="text-gray-500 text-sm mt-1">Create a new evaluation to get started</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        @if($evaluations->hasPages())
            <div class="mt-6">
                {{ $evaluations->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
