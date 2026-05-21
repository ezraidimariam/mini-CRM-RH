<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Mini CRM') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-slate-900 selection:bg-primary-100 selection:text-primary-900">
        <div class="min-h-screen flex flex-col sm:justify-center items-center py-12 px-4 relative overflow-hidden bg-[#fcfdfe]">
            <!-- Decorative Elements -->
            <div class="absolute -top-[10%] -right-[10%] w-[50%] h-[50%] bg-primary-100/40 blur-[120px] rounded-full -z-10"></div>
            <div class="absolute -bottom-[10%] -left-[10%] w-[40%] h-[40%] bg-indigo-100/40 blur-[100px] rounded-full -z-10"></div>

            <div class="mb-10 text-center animate-in fade-in slide-in-from-bottom-4 duration-700">
                <a href="/" class="group flex flex-col items-center gap-4">
                    <div class="p-4 bg-gradient-to-br from-primary-600 to-indigo-700 rounded-3xl shadow-2xl shadow-primary-500/30 group-hover:scale-110 transition-transform duration-500">
                        <svg class="h-10 w-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <span class="text-3xl font-black font-display tracking-tight text-slate-900">Mini CRM</span>
                </a>
            </div>

            <div class="w-full sm:max-w-md animate-in fade-in slide-in-from-bottom-8 duration-1000">
                <div class="premium-card p-10 bg-white/80 backdrop-blur-xl border-white/40">
                    {{ $slot }}
                </div>
            </div>

            <p class="mt-8 text-sm font-bold text-slate-400 font-display transition-colors hover:text-primary-500">
                &copy; {{ date('Y') }} Mini CRM Ecosystem
            </p>
        </div>
    </body>
</html>
