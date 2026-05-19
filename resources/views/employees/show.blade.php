<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employee Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-6">
                        <a href="{{ route('employees.index') }}" class="text-blue-600 hover:text-blue-800">&larr; Back to Employees</a>
                    </div>

                    <div class="flex items-start gap-6 mb-8">
                        @if($employee->avatar)
                            <img class="h-24 w-24 rounded-full object-cover" src="{{ asset('storage/' . $employee->avatar) }}" alt="">
                        @else
                            <div class="h-24 w-24 rounded-full bg-blue-500 flex items-center justify-center text-white font-bold text-3xl">
                                {{ substr($employee->first_name, 0, 1) }}{{ substr($employee->last_name, 0, 1) }}
                            </div>
                        @endif
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">{{ $employee->first_name }} {{ $employee->last_name }}</h1>
                            <p class="text-gray-600">{{ $employee->position }} - {{ $employee->department }}</p>
                        </div>
                        <div class="ml-auto flex gap-2">
                            <a href="{{ route('employees.edit', $employee) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-150">
                                Edit
                            </a>
                            <a href="{{ route('evaluations.create', $employee) }}" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-150">
                                Add Evaluation
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="bg-gray-50 rounded-lg p-4">
                            <h3 class="font-semibold text-gray-700 mb-2">Contact Information</h3>
                            <p class="text-gray-600"><strong>Email:</strong> {{ $employee->email }}</p>
                            <p class="text-gray-600"><strong>Phone:</strong> {{ $employee->phone ?? 'N/A' }}</p>
                            <p class="text-gray-600"><strong>Hire Date:</strong> {{ \Carbon\Carbon::parse($employee->hire_date)->format('F d, Y') }}</p>
                            <p class="text-gray-600"><strong>Salary:</strong> {{ $employee->salary ? '$' . number_format($employee->salary, 2) : 'N/A' }}</p>
                        </div>

                        <div class="bg-gray-50 rounded-lg p-4">
                            <h3 class="font-semibold text-gray-700 mb-2">Leave Balance ({{ now()->year }})</h3>
                            @if($balance = $employee->leaveBalances->where('year', now()->year)->first())
                                <p class="text-gray-600"><strong>Accrued Days:</strong> {{ $balance->accrued_days }}</p>
                                <p class="text-gray-600"><strong>Used Days:</strong> {{ $balance->used_days }}</p>
                                <p class="text-gray-600"><strong>Available Days:</strong> <span class="font-bold text-blue-600">{{ $balance->available_days }}</span></p>
                            @else
                                <p class="text-gray-500">No leave balance for this year</p>
                            @endif
                        </div>
                    </div>

                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Leave Requests</h3>
                        @if($employee->congeRequests->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Start Date</th>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">End Date</th>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Days</th>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($employee->congeRequests as $request)
                                            <tr>
                                                <td class="px-4 py-3 text-sm text-gray-600">{{ \Carbon\Carbon::parse($request->start_date)->format('M d, Y') }}</td>
                                                <td class="px-4 py-3 text-sm text-gray-600">{{ \Carbon\Carbon::parse($request->end_date)->format('M d, Y') }}</td>
                                                <td class="px-4 py-3 text-sm text-gray-600">{{ $request->working_days }}</td>
                                                <td class="px-4 py-3 text-sm">
                                                    @if($request->status === 'approved')
                                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Approved</span>
                                                    @elseif($request->status === 'rejected')
                                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Rejected</span>
                                                    @else
                                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-gray-500">No leave requests yet</p>
                        @endif
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Evaluations</h3>
                        @if($employee->evaluations->count() > 0)
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach($employee->evaluations as $evaluation)
                                    <div class="bg-gray-50 rounded-lg p-4">
                                        <div class="flex justify-between items-center mb-2">
                                            <span class="font-semibold">{{ $evaluation->year }}</span>
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Score: {{ $evaluation->global_score }}/5</span>
                                        </div>
                                        <div class="text-sm text-gray-600 space-y-1">
                                            <p>Punctuality: {{ $evaluation->punctuality }}/5</p>
                                            <p>Skills: {{ $evaluation->skills }}/5</p>
                                            <p>Attitude: {{ $evaluation->attitude }}/5</p>
                                            <p>Results: {{ $evaluation->results }}/5</p>
                                        </div>
                                        @if($evaluation->comment)
                                            <p class="text-sm text-gray-500 mt-2 italic">"{{ $evaluation->comment }}"</p>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500">No evaluations yet</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
