<x-app-layout>
    <x-slot name="header">Personnel Modification</x-slot>

    <div class="max-w-4xl mx-auto">
        <!-- Back Navigation -->
        <div class="mb-8">
            <a href="{{ route('employees.index') }}" class="group inline-flex items-center gap-2 text-slate-500 hover:text-primary-600 font-bold transition-all">
                <div class="p-2 bg-white rounded-xl shadow-sm border border-slate-100 group-hover:bg-primary-50 group-hover:border-primary-100 transition-all">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </div>
                Return to Directory
            </a>
        </div>

        <!-- Form Architecture -->
        <div class="premium-card p-10 animate-in fade-in slide-in-from-bottom-8 duration-700">
            <div class="flex items-center justify-between mb-12">
                <div>
                    <h2 class="text-3xl font-extrabold text-slate-900 font-display mb-2">Update Record</h2>
                    <p class="text-slate-500 font-medium">Modifying identity and alignment for <span class="text-primary-600 font-bold">{{ $employee->first_name }} {{ $employee->last_name }}</span></p>
                </div>
                <div class="relative">
                    @if($employee->avatar)
                        <img src="{{ asset('storage/' . $employee->avatar) }}" class="w-16 h-16 rounded-[1.25rem] object-cover ring-4 ring-white shadow-premium" />
                    @else
                        <div class="w-16 h-16 rounded-[1.25rem] bg-primary-100 text-primary-600 flex items-center justify-center font-bold text-xl ring-4 ring-white shadow-premium">
                            {{ substr($employee->first_name, 0, 1) }}
                        </div>
                    @endif
                </div>
            </div>

            <form method="POST" action="{{ route('employees.update', $employee) }}" enctype="multipart/form-data" class="space-y-12">
                @csrf
                @method('PUT')

                <!-- Section: Identity -->
                <div>
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-8 h-8 rounded-lg bg-primary-100 text-primary-600 flex items-center justify-center font-bold text-xs shadow-sm">01</div>
                        <h3 class="text-xl font-bold text-slate-900 font-display uppercase tracking-widest text-sm">Personal Identity</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-2">
                            <x-input-label for="first_name" :value="__('First Name')" class="ml-1 text-xs font-bold uppercase tracking-wider text-slate-500" />
                            <x-text-input id="first_name" name="first_name" type="text" class="w-full" :value="old('first_name', $employee->first_name)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
                        </div>

                        <div class="space-y-2">
                            <x-input-label for="last_name" :value="__('Last Name')" class="ml-1 text-xs font-bold uppercase tracking-wider text-slate-500" />
                            <x-text-input id="last_name" name="last_name" type="text" class="w-full" :value="old('last_name', $employee->last_name)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
                        </div>

                        <div class="space-y-2">
                            <x-input-label for="email" :value="__('Corporate Email')" class="ml-1 text-xs font-bold uppercase tracking-wider text-slate-500" />
                            <x-text-input id="email" name="email" type="email" class="w-full" :value="old('email', $employee->email)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>

                        <div class="space-y-2">
                            <x-input-label for="phone" :value="__('Contact Number')" class="ml-1 text-xs font-bold uppercase tracking-wider text-slate-500" />
                            <x-text-input id="phone" name="phone" type="text" class="w-full" :value="old('phone', $employee->phone)" />
                            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                        </div>

                        <div class="md:col-span-2">
                            <x-input-label :value="__('Update Imagery')" class="ml-1 text-xs font-bold uppercase tracking-wider text-slate-500 mb-2" />
                            <div class="group relative bg-slate-50 border-2 border-dashed border-slate-200 rounded-[2rem] p-8 text-center hover:bg-primary-50/50 hover:border-primary-300 transition-all cursor-pointer">
                                <input type="file" name="avatar" id="avatar" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                                <div class="relative z-0">
                                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-sm group-hover:scale-110 transition-transform text-slate-400 group-hover:text-primary-500">
                                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2-2v12a2 2 0 00-2 2z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-sm font-bold text-slate-900">Drop new imagery or click to browse</p>
                                </div>
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
                        </div>
                    </div>
                </div>

                <!-- Section: Assignment -->
                <div class="pt-12 border-t border-slate-100">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xs shadow-sm">02</div>
                        <h3 class="text-xl font-bold text-slate-900 font-display uppercase tracking-widest text-sm">Deployment Details</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-2">
                            <x-input-label for="department" :value="__('Department')" class="ml-1 text-xs font-bold uppercase tracking-wider text-slate-500" />
                            <x-text-input id="department" name="department" type="text" class="w-full" :value="old('department', $employee->department)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('department')" />
                        </div>

                        <div class="space-y-2">
                            <x-input-label for="position" :value="__('Position Title')" class="ml-1 text-xs font-bold uppercase tracking-wider text-slate-500" />
                            <x-text-input id="position" name="position" type="text" class="w-full" :value="old('position', $employee->position)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('position')" />
                        </div>

                        <div class="space-y-2">
                            <x-input-label for="hire_date" :value="__('Onboarding Date')" class="ml-1 text-xs font-bold uppercase tracking-wider text-slate-500" />
                            <x-text-input id="hire_date" name="hire_date" type="date" class="w-full" :value="old('hire_date', $employee->hire_date)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('hire_date')" />
                        </div>

                        <div class="space-y-2">
                            <x-input-label for="salary" :value="__('Annual Compensation')" class="ml-1 text-xs font-bold uppercase tracking-wider text-slate-500" />
                            <div class="relative">
                                <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 font-bold">$</div>
                                <x-text-input id="salary" name="salary" type="number" step="0.01" class="w-full pl-10" :value="old('salary', $employee->salary)" />
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('salary')" />
                        </div>
                    </div>
                </div>

                <!-- Interaction Matrix -->
                <div class="flex items-center justify-start gap-4 pt-12 border-t border-slate-100">
                    <x-primary-button class="px-10 h-14 text-base shadow-xl shadow-primary-500/30">
                        {{ __('Save Changes') }}
                    </x-primary-button>
                    <a href="{{ route('employees.index') }}" class="px-10 h-14 inline-flex items-center justify-center font-bold text-slate-500 hover:text-slate-900 transition-colors uppercase tracking-widest text-xs">
                        {{ __('Discard Edits') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
