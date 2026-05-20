<x-app-layout>
    <x-slot name="header">Add New Employee</x-slot>

    <div class="max-w-3xl">
        <!-- Breadcrumb -->
        <div class="mb-6">
            <a href="{{ route('employees.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium">
                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Employees
            </a>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-8">
            <h2 class="text-2xl font-bold text-slate-900 mb-8">Create New Employee</h2>

            <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <!-- Personal Information Section -->
                <div>
                    <h3 class="text-lg font-semibold text-slate-800 mb-4 pb-4 border-b border-slate-200">Personal Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- First Name -->
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">First Name *</label>
                            <input type="text" name="first_name" value="{{ old('first_name') }}" required
                                class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-slate-500 transition text-slate-900 placeholder:text-slate-400 @error('first_name') border-red-500 @enderror">
                            @error('first_name')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Last Name -->
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Last Name *</label>
                            <input type="text" name="last_name" value="{{ old('last_name') }}" required
                                class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-slate-500 transition text-slate-900 placeholder:text-slate-400 @error('last_name') border-red-500 @enderror">
                            @error('last_name')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Email *</label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-slate-500 transition text-slate-900 placeholder:text-slate-400 @error('email') border-red-500 @enderror">
                            @error('email')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Phone</label>
                            <input type="text" name="phone" value="{{ old('phone') }}"
                                class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-slate-500 transition text-slate-900 placeholder:text-slate-400">
                            @error('phone')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Avatar -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Profile Photo</label>
                            <div class="flex items-center">
                                <label class="w-full px-4 py-3 border-2 border-dashed border-slate-300 rounded-lg cursor-pointer hover:border-blue-500 transition bg-slate-50 hover:bg-blue-50">
                                    <div class="flex items-center justify-center">
                                        <svg class="h-6 w-6 text-slate-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                        <span class="text-slate-600">Click to upload photo</span>
                                    </div>
                                    <input type="file" name="avatar" accept="image/*" class="hidden">
                                </label>
                            </div>
                            @error('avatar')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Job Information Section -->
                <div>
                    <h3 class="text-lg font-semibold text-slate-800 mb-4 pb-4 border-b border-slate-200">Job Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Department -->
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Department *</label>
                            <input type="text" name="department" value="{{ old('department') }}" required
                                class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-slate-500 transition text-slate-900 placeholder:text-slate-400 @error('department') border-red-500 @enderror">
                            @error('department')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Position -->
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Position *</label>
                            <input type="text" name="position" value="{{ old('position') }}" required
                                class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-slate-500 transition text-slate-900 placeholder:text-slate-400 @error('position') border-red-500 @enderror">
                            @error('position')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Hire Date -->
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Hire Date *</label>
                            <input type="date" name="hire_date" value="{{ old('hire_date') }}" required
                                class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-slate-500 transition text-slate-900 @error('hire_date') border-red-500 @enderror">
                            @error('hire_date')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Salary -->
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Salary</label>
                            <input type="number" name="salary" value="{{ old('salary') }}" step="0.01" min="0"
                                class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-slate-500 transition text-slate-900 placeholder:text-slate-400">
                            @error('salary')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-4 pt-6 border-t border-slate-200">
                    <button type="submit" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-200 shadow-sm hover:shadow">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Create Employee
                    </button>
                    <a href="{{ route('employees.index') }}" class="inline-flex items-center px-6 py-3 bg-slate-100 text-slate-700 font-semibold rounded-lg hover:bg-slate-200 transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
