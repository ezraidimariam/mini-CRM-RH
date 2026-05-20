<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gradient-to-br from-blue-50 to-indigo-100">
        <div class="min-h-screen flex flex-col">
            <!-- Navigation -->
            <nav class="bg-white shadow-sm border-b border-gray-200">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex items-center">
                            <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            <span class="ml-2 text-xl font-bold text-gray-900">Mini CRM</span>
                        </div>
                        <div class="flex items-center space-x-4">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">
                                        Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="px-4 py-2 text-gray-700 hover:text-gray-900 font-medium">
                                        Log in
                                    </a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Hero Section -->
            <main class="flex-1">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
                    <div class="text-center">
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900 mb-6">
                            Simplify Your
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">
                                HR Management
                            </span>
                        </h1>
                        <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
                            A powerful, simple, and professional CRM system to manage employees, leave requests, and performance evaluations with ease.
                        </p>
                        <div class="flex justify-center gap-4">
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-lg hover:from-blue-700 hover:to-indigo-700 transition shadow-lg hover:shadow-xl">
                                    Get Started
                                    <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </a>
                            @endif
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="inline-flex items-center px-8 py-3 bg-white text-gray-700 font-semibold rounded-lg border border-gray-300 hover:bg-gray-50 transition">
                                    Sign In
                                </a>
                            @endif
                        </div>
                    </div>

                    <!-- Features -->
                    <div class="mt-20 grid grid-cols-1 md:grid-cols-3 gap-8">
                        <!-- Employee Management -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                                <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Employee Management</h3>
                            <p class="text-gray-600">Track employee information, departments, positions, and hire dates in one centralized system.</p>
                        </div>

                        <!-- Leave Requests -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                                <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Leave Requests</h3>
                            <p class="text-gray-600">Streamline leave management with easy request submission and approval workflows.</p>
                        </div>

                        <!-- Performance Evaluations -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                                <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Performance Evaluations</h3>
                            <p class="text-gray-600">Conduct comprehensive performance reviews with structured scoring and feedback.</p>
                        </div>
                    </div>

                    <!-- Dashboard Preview -->
                    <div class="mt-20 bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-4">
                            <div class="flex items-center space-x-2">
                                <div class="w-3 h-3 bg-red-400 rounded-full"></div>
                                <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                                <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                            </div>
                        </div>
                        <div class="p-8 bg-gray-50">
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                                <div class="bg-white rounded-lg p-4 border border-gray-200">
                                    <div class="text-sm text-gray-600">Total Employees</div>
                                    <div class="text-2xl font-bold text-gray-900">24</div>
                                </div>
                                <div class="bg-white rounded-lg p-4 border border-gray-200">
                                    <div class="text-sm text-gray-600">Pending Requests</div>
                                    <div class="text-2xl font-bold text-gray-900">5</div>
                                </div>
                                <div class="bg-white rounded-lg p-4 border border-gray-200">
                                    <div class="text-sm text-gray-600">Departments</div>
                                    <div class="text-2xl font-bold text-gray-900">6</div>
                                </div>
                                <div class="bg-white rounded-lg p-4 border border-gray-200">
                                    <div class="text-sm text-gray-600">Avg. Rating</div>
                                    <div class="text-2xl font-bold text-gray-900">4.2/5</div>
                                </div>
                            </div>
                            <div class="bg-white rounded-lg p-4 border border-gray-200 h-32 flex items-center justify-center text-gray-400">
                                Dashboard Preview
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <footer class="bg-white border-t border-gray-200">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                    <div class="text-center text-gray-600">
                        <p>&copy; {{ date('Y') }} Mini CRM. All rights reserved.</p>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
