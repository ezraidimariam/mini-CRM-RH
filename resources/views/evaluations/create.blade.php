<x-app-layout>
    <x-slot name="header">Performance Audit Initiation</x-slot>

    <div class="max-w-4xl mx-auto">
        <!-- Back Navigation -->
        <div class="mb-8">
            <a href="{{ route('evaluations.index') }}" class="group inline-flex items-center gap-2 text-slate-500 hover:text-primary-600 font-bold transition-all">
                <div class="p-2 bg-white rounded-xl shadow-sm border border-slate-100 group-hover:bg-primary-50 group-hover:border-primary-100 transition-all">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </div>
                Audit Registry
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Form Architecture -->
            <div class="lg:col-span-8 premium-card p-10 animate-in fade-in slide-in-from-left-8 duration-700">
                <div class="mb-10">
                    <h2 class="text-3xl font-extrabold text-slate-900 font-display mb-2">Metrics Input</h2>
                    <p class="text-slate-500 font-medium">Quantify talent performance across key organizational dimensions.</p>
                </div>

                <form method="POST" action="{{ route('evaluations.store') }}" class="space-y-12">
                    @csrf
                    <div class="space-y-2 mb-8">
                        <x-input-label for="employee_id" :value="__('Select Personnel')" class="ml-1 text-xs font-bold uppercase tracking-wider text-slate-500" />
                        @if($employee)
                            <div class="flex items-center gap-4 p-4 bg-slate-50 border border-slate-100 rounded-2xl">
                                @if($employee->avatar)
                                    <img src="{{ asset('storage/' . $employee->avatar) }}" class="w-10 h-10 rounded-xl object-cover" />
                                @else
                                    <div class="w-10 h-10 rounded-xl bg-primary-100 text-primary-600 flex items-center justify-center font-bold text-xs">
                                        {{ substr($employee->first_name, 0, 1) }}
                                    </div>
                                @endif
                                <div>
                                    <p class="text-sm font-bold text-slate-900">{{ $employee->first_name }} {{ $employee->last_name }}</p>
                                    <p class="text-xs text-slate-500 font-medium">{{ $employee->position }}</p>
                                </div>
                                <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                            </div>
                        @else
                            <select name="employee_id" id="employee_id" required class="w-full border-slate-200 bg-white focus:border-primary-500 focus:ring-4 focus:ring-primary-500/10 rounded-2xl shadow-sm px-4 py-3 transition-all duration-200 font-bold">
                                <option value="">Identify Target Personnel</option>
                                @foreach($employees as $emp)
                                    <option value="{{ $emp->id }}" {{ old('employee_id') == $emp->id ? 'selected' : '' }}>
                                        {{ $emp->first_name }} {{ $emp->last_name }} ({{ $emp->position }})
                                    </option>
                                @endforeach
                            </select>
                        @endif
                        <x-input-error class="mt-2" :messages="$errors->get('employee_id')" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-2">
                            <x-input-label for="year" :value="__('Fiscal Year')" class="ml-1 text-xs font-bold uppercase tracking-wider text-slate-500" />
                            <select name="year" id="year" required class="w-full border-slate-200 bg-white focus:border-primary-500 focus:ring-4 focus:ring-primary-500/10 rounded-2xl shadow-sm px-4 py-3 transition-all duration-200 font-bold">
                                @for($y = now()->year; $y >= now()->year - 2; $y--)
                                    <option value="{{ $y }}" {{ $y == now()->year ? 'selected' : '' }}>CYCLE {{ $y }}</option>
                                @endfor
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('year')" />
                        </div>

                        <div class="space-y-2">
                             <x-input-label for="global_score" :value="__('Synthesis Rating')" class="ml-1 text-xs font-bold uppercase tracking-wider text-slate-500" />
                            <select name="global_score" id="global_score" required class="w-full border-slate-200 bg-primary-50/50 text-primary-700 focus:border-primary-500 focus:ring-4 focus:ring-primary-500/10 rounded-2xl shadow-sm px-4 py-3 transition-all duration-200 font-black">
                                <option value="">Select Magnitude</option>
                                <option value="5">5 - EXCEPTIONAL</option>
                                <option value="4">4 - ADVANCED</option>
                                <option value="3">3 - PROFICIENT</option>
                                <option value="2">2 - EMERGING</option>
                                <option value="1">1 - CRITICAL</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('global_score')" />
                        </div>

                        <div class="md:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-6 pt-6 border-t border-slate-50">
                             @foreach(['punctuality' => 'Integration & Presence', 'skills' => 'Technical Prowess', 'attitude' => 'Cultural Alignment', 'results' => 'Strategic Impact'] as $name => $label)
                                <div class="space-y-2">
                                    <x-input-label :for="$name" :value="__($label)" class="ml-1 text-xs font-bold uppercase tracking-wider text-slate-400" />
                                    <select name="{{ $name }}" id="{{ $name }}" required class="w-full border-slate-100 bg-slate-50/50 focus:border-primary-500 focus:ring-4 focus:ring-primary-500/10 rounded-2xl shadow-sm px-4 py-2.5 transition-all duration-200 font-bold text-sm">
                                        <option value="">Rating</option>
                                        @for($i=5; $i>=1; $i--)
                                            <option value="{{ $i }}">{{ $i }} STARS</option>
                                        @endfor
                                    </select>
                                    <x-input-error class="mt-2" :messages="$errors->get($name)" />
                                </div>
                             @endforeach
                        </div>

                        <div class="md:col-span-2 space-y-2">
                            <x-input-label for="comment" :value="__('Qualitative Feedback')" class="ml-1 text-xs font-bold uppercase tracking-wider text-slate-500" />
                            <textarea id="comment" name="comment" rows="4" class="w-full border-slate-200 bg-white focus:border-primary-500 focus:ring-4 focus:ring-primary-500/10 rounded-2xl shadow-sm px-4 py-3 transition-all duration-200 resize-none font-medium placeholder:italic placeholder:text-slate-300" placeholder="Provide detailed behavioral observations..."></textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('comment')" />
                        </div>
                    </div>

                    <div class="flex items-center justify-start gap-4 pt-8 border-t border-slate-100">
                        <x-primary-button class="px-10 h-14 text-base shadow-xl shadow-primary-500/30">
                            {{ __('Finalize Audit') }}
                        </x-primary-button>
                        <a href="{{ route('evaluations.index') }}" class="px-10 h-14 inline-flex items-center justify-center font-bold text-slate-500 hover:text-slate-900 transition-colors uppercase tracking-widest text-xs">
                            {{ __('Abort') }}
                        </a>
                    </div>
                </form>
            </div>

            <!-- Subject Sidebar -->
            <div class="lg:col-span-4 space-y-6 animate-in fade-in slide-in-from-right-8 duration-700">
                @if($employee)
                    <div class="premium-card p-1 bg-gradient-to-br from-primary-600 to-indigo-800 border-none shadow-2xl">
                        <div class="bg-white/95 backdrop-blur-sm m-1 rounded-[1.75rem] p-8 text-center">
                            <div class="relative inline-block mb-6">
                                @if($employee->avatar)
                                    <img src="{{ asset('storage/' . $employee->avatar) }}" class="w-24 h-24 rounded-[2rem] object-cover ring-4 ring-white shadow-premium mx-auto" />
                                @else
                                    <div class="w-24 h-24 rounded-[1.5rem] bg-primary-100 text-primary-600 flex items-center justify-center font-black text-3xl ring-4 ring-white shadow-premium mx-auto">
                                        {{ substr($employee->first_name, 0, 1) }}
                                    </div>
                                @endif
                            </div>
                            <h3 class="text-xl font-black text-slate-900 font-display mb-1">{{ $employee->first_name }} {{ $employee->last_name }}</h3>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-6">{{ $employee->position }}</p>

                            <div class="pt-6 border-t border-slate-100 space-y-2">
                                 <p class="text-[10px] font-black text-primary-600 uppercase tracking-widest">Department Unit</p>
                                 <p class="font-bold text-slate-700">{{ $employee->department }}</p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="premium-card p-8 bg-gradient-to-br from-primary-600 to-indigo-800 text-white border-none shadow-2xl overflow-hidden relative">
                        <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-white/5 rounded-full blur-3xl"></div>
                        <h3 class="text-lg font-black font-display mb-4">Strategic Review</h3>
                        <p class="text-sm font-medium text-primary-100/80 leading-relaxed mb-6">Select an employee from the registry to begin the performance evaluation cycle.</p>
                        <div class="flex items-center gap-3 p-3 bg-white/10 rounded-2xl border border-white/10">
                            <div class="p-2 bg-white/20 rounded-lg">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <span class="text-xs font-black uppercase tracking-wider">Awaiting Target</span>
                        </div>
                    </div>
                @endif

                <div class="premium-card p-8 bg-slate-900 text-white border-none shadow-premium">
                     <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center text-primary-400 mb-6 border border-white/10">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <p class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Audit Compliance</p>
                    <p class="text-xs text-slate-400 font-medium leading-relaxed italic opacity-80">This evaluation will be permanently archived into the personnel records. Ensure all metrics are verified against the quarterly KPI framework.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
