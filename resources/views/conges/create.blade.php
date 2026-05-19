<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Leave Request') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-6">
                        <a href="{{ route('conges.index') }}" class="text-blue-600 hover:text-blue-800">&larr; Back to Leave Requests</a>
                    </div>

                    @if(auth()->user()->employee)
                        <div class="mb-6 bg-blue-50 rounded-lg p-4">
                            <h3 class="font-semibold text-blue-900 mb-2">Your Leave Balance ({{ now()->year }})</h3>
                            @if($balance = auth()->user()->employee->leaveBalances->where('year', now()->year)->first())
                                <p class="text-blue-800"><strong>Available Days:</strong> {{ $balance->available_days }}</p>
                                <p class="text-blue-700 text-sm">Accrued: {{ $balance->accrued_days }} | Used: {{ $balance->used_days }}</p>
                            @else
                                <p class="text-blue-800">No leave balance available yet</p>
                            @endif
                        </div>
                    @endif

                    <form method="POST" action="{{ route('conges.store') }}">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Start Date *</label>
                                <input type="date" name="start_date" required min="{{ now()->toDateString() }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                @error('start_date')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">End Date *</label>
                                <input type="date" name="end_date" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                @error('end_date')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Reason</label>
                                <textarea name="reason" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Optional: Provide a reason for your leave request"></textarea>
                                @error('reason')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6 flex gap-4">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-150">
                                Submit Request
                            </button>
                            <a href="{{ route('conges.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-6 rounded-lg transition duration-150">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
