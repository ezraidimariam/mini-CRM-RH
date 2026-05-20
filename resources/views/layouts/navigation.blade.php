<nav x-data="{ open: false }" class="bg-white border-b border-slate-200 shadow-sm sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-slate-900 font-bold text-xl flex items-center hover:text-slate-700 transition">
                        <div class="p-2 bg-gradient-to-br from-blue-600 to-indigo-700 rounded-xl mr-3 shadow-sm">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        Mini CRM
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-1 ml-10 lg:flex">
                    <a href="{{ route('dashboard') }}" class="px-4 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 hover:text-slate-900 {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-700' : '' }} transition-all duration-200 flex items-center gap-2">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 11l4-4m0 0l4-4m-4 4l-4-4m4 4l4 4"></path>
                        </svg>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('employees.index') }}" class="px-4 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 hover:text-slate-900 {{ request()->routeIs('employees.*') ? 'bg-blue-50 text-blue-700' : '' }} transition-all duration-200 flex items-center gap-2">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span>Employees</span>
                    </a>
                    <a href="{{ route('conges.index') }}" class="px-4 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 hover:text-slate-900 {{ request()->routeIs('conges.*') ? 'bg-blue-50 text-blue-700' : '' }} transition-all duration-200 flex items-center gap-2">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span>Leave</span>
                    </a>
                    <a href="{{ route('evaluations.index') }}" class="px-4 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 hover:text-slate-900 {{ request()->routeIs('evaluations.*') ? 'bg-blue-50 text-blue-700' : '' }} transition-all duration-200 flex items-center gap-2">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        <span>Evaluations</span>
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden lg:flex lg:items-center gap-4">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2.5 text-sm font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100 rounded-lg transition-all duration-200">
                            <div class="truncate">{{ Auth::user()->name }}</div>
                            <svg class="fill-current h-4 w-4 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <div class="border-t border-slate-100"></div>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Mobile Menu Button -->
            <div class="lg:hidden flex items-center gap-2">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-lg text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden border-t border-slate-200 lg:hidden">
        <div class="px-4 pt-4 pb-3 space-y-2">
            <a href="{{ route('dashboard') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-700' : '' }} transition">
                Dashboard
            </a>
            <a href="{{ route('employees.index') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 {{ request()->routeIs('employees.*') ? 'bg-blue-50 text-blue-700' : '' }} transition">
                Employees
            </a>
            <a href="{{ route('conges.index') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 {{ request()->routeIs('conges.*') ? 'bg-blue-50 text-blue-700' : '' }} transition">
                Leave Requests
            </a>
            <a href="{{ route('evaluations.index') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 {{ request()->routeIs('evaluations.*') ? 'bg-blue-50 text-blue-700' : '' }} transition">
                Evaluations
            </a>
        </div>

        <!-- Mobile User Section -->
        <div class="border-t border-slate-200 px-4 py-4 space-y-2">
            <div class="text-sm font-medium text-slate-900">{{ Auth::user()->name }}</div>
            <div class="text-xs text-slate-500">{{ Auth::user()->email }}</div>
            <a href="{{ route('profile.edit') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 transition mt-2">
                Profile
            </a>
            <form method="POST" action="{{ route('logout') }}" class="mt-2">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 transition">
                    Log Out
                </button>
            </form>
        </div>
    </div>
</nav>
