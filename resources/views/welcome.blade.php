<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mini CRM | Premium HR Management</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-[#f5ede6] text-[#3e342a] selection:bg-primary-100 selection:text-primary-900">
        <div class="relative min-h-screen">
            <!-- Decorative Background -->
            <div class="absolute top-0 left-0 w-full h-full -z-10 overflow-hidden pointer-events-none">
                <div class="absolute -top-[10%] -right-[5%] w-[40%] h-[40%] bg-primary-200/30 blur-[120px] rounded-full"></div>
                <div class="absolute top-[20%] -left-[5%] w-[30%] h-[30%] bg-indigo-200/20 blur-[100px] rounded-full"></div>
            </div>

            <!-- Navigation -->
            <nav class="sticky top-0 z-50 bg-[#f8efe3]/90 backdrop-blur-xl border-b border-[#dcc5b4]">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-20 items-center">
                        <div class="flex items-center group">
                            <div class="p-2.5 bg-gradient-to-br from-primary-600 to-indigo-700 rounded-2xl mr-3 shadow-lg shadow-primary-500/30">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <span class="text-xl font-bold font-display tracking-tight text-slate-900">Mini CRM</span>
                        </div>
                        <div class="flex items-center gap-4">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="btn-primary py-2.5">Go to Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="text-slate-600 hover:text-primary-600 font-semibold transition-colors">Log In</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="btn-primary py-2.5">Join Now</a>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </nav>

            <main>
                <!-- Hero Section -->
                <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-32 text-center relative">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary-50 border border-primary-100 text-primary-700 text-xs font-bold uppercase tracking-widest mb-8 animate-in fade-in slide-in-from-bottom-4 duration-500">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-primary-500"></span>
                        </span>
                        New Version 2.0 is out
                    </div>

                    <h1 class="text-5xl md:text-7xl font-display font-extrabold text-slate-900 leading-[1.1] mb-8 animate-in fade-in slide-in-from-bottom-8 duration-700">
                        Reimagine Your <br/>
                        <span class="gradient-text">HR Workflow</span>
                    </h1>

                    <p class="text-xl text-slate-600 max-w-2xl mx-auto mb-12 animate-in fade-in slide-in-from-bottom-10 duration-1000">
                        Efficiently manage employees, leave requests, and performance evaluations with our state-of-the-art CRM.
                    </p>

                    <div class="flex flex-col sm:flex-row justify-center gap-4 animate-in fade-in slide-in-from-bottom-12 duration-1000">
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn-primary text-lg px-8 py-4">
                                Start Your Journey
                                <svg class="h-5 w-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </a>
                        @endif
                        <a href="#features" class="btn-secondary text-lg px-8 py-4">Explore Features</a>
                    </div>

                    <!-- Dashboard Preview Mockup -->
                    <div class="mt-24 relative max-w-5xl mx-auto animate-in fade-in zoom-in-95 duration-1000">
                        <div class="p-3 bg-white/50 backdrop-blur-xl rounded-[2.5rem] border border-white/20 shadow-2xl">
                            <div class="rounded-3xl border border-slate-200 overflow-hidden bg-slate-50 shadow-inner h-[500px] flex items-center justify-center text-slate-300">
                                <div class="text-center">
                                    <svg class="h-20 w-20 mx-auto mb-4 opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                    </svg>
                                    <p class="font-bold text-lg opacity-40">System Dashboard Preview</p>
                                </div>
                            </div>
                        </div>
                        <!-- UI Elements Overlays -->
                        <div class="absolute -right-6 top-1/4 p-6 bg-white rounded-3xl shadow-2xl border border-slate-100 animate-float hidden lg:block">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-500 font-bold uppercase tracking-wider">Leave Approved</p>
                                    <p class="text-sm font-bold text-slate-900">John Doe • 3 Days</p>
                                </div>
                            </div>
                        </div>
                        <div class="absolute -left-10 bottom-1/4 p-6 bg-white rounded-3xl shadow-2xl border border-slate-100 animate-float hidden lg:block" style="animation-delay: 1.5s">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center">
                                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-500 font-bold uppercase tracking-wider">Performance Rating</p>
                                    <p class="text-sm font-bold text-slate-900">Average: 4.8 / 5.0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Features Section -->
                <section id="features" class="py-32 bg-slate-50/50 relative">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="text-center mb-20">
                            <h2 class="text-3xl md:text-5xl font-display font-bold text-slate-900 mb-4">Powerful Features</h2>
                            <p class="text-slate-600 max-w-xl mx-auto">Everything you need to manage your modern workforce in a single, beautiful interface.</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <!-- Employee Mgmt -->
                            <div class="premium-card p-8 group">
                                <div class="w-16 h-16 bg-primary-100 text-primary-600 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 01-9-4.912"></path>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-slate-900 mb-4">Talent tracking</h3>
                                <p class="text-slate-600 leading-relaxed">Centralized employee records with department management, position tracking, and hire date history.</p>
                            </div>

                            <!-- Leave Requests -->
                            <div class="premium-card p-8 group">
                                <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-slate-900 mb-4">Smart Leave</h3>
                                <p class="text-slate-600 leading-relaxed">Effortless leave request submission and approval workflows with real-time status notifications.</p>
                            </div>

                            <!-- Performance -->
                            <div class="premium-card p-8 group">
                                <div class="w-16 h-16 bg-indigo-100 text-indigo-600 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-slate-900 mb-4">Evaluations</h3>
                                <p class="text-slate-600 leading-relaxed">Structured performance reviews with custom scoring systems and actionable feedback logs.</p>
                            </div>
                        </div>
                    </div>
                </section>
            </main>

            <!-- Footer -->
            <footer class="bg-white border-t border-slate-100 py-16">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <div class="flex items-center justify-center group mb-8">
                        <div class="p-2 bg-slate-900 rounded-xl mr-3">
                            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <span class="text-lg font-bold text-slate-900">Mini CRM</span>
                    </div>
                    <p class="text-slate-500 mb-8">&copy; {{ date('Y') }} Mini CRM. Built for the future of work.</p>
                    <div class="flex justify-center gap-6 text-sm font-semibold text-slate-400">
                        <a href="#" class="hover:text-primary-600 transition">Privacy</a>
                        <a href="#" class="hover:text-primary-600 transition">Terms</a>
                        <a href="#" class="hover:text-primary-600 transition">Contact</a>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
