<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Mini CRM') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-[#fcfdfe] text-slate-900">
        <div class="min-h-screen flex flex-col bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-primary-50/50 via-transparent to-transparent">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white/40 backdrop-blur-md border-b border-slate-200/60 sticky top-0 z-40">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5">
                        <div class="flex justify-between items-center gap-4">
                            <h1 class="text-2xl font-bold text-slate-900 tracking-tight font-display">{{ $header }}</h1>
                            @isset($headerAction)
                                <div class="flex-shrink-0 animate-in fade-in slide-in-from-right-4 duration-500">{{ $headerAction }}</div>
                            @endisset
                        </div>
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex-1 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full">
                @if ($errors->any())
                    <div class="mb-8 bg-red-50/50 backdrop-blur-sm border border-red-100 text-red-900 px-6 py-5 rounded-3xl flex items-start gap-4 shadow-xl shadow-red-900/5 animate-in fade-in slide-in-from-top-4">
                        <div class="p-2 bg-red-100 rounded-2xl text-red-600 flex-shrink-0">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-red-900 mb-1">Attention required</h3>
                            <ul class="list-disc list-inside space-y-1 text-sm text-red-800/80">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                @if (session('success'))
                    <div class="mb-8 bg-emerald-50/50 backdrop-blur-sm border border-emerald-100 text-emerald-900 px-6 py-5 rounded-3xl flex items-center gap-4 shadow-xl shadow-emerald-900/5 animate-in fade-in slide-in-from-top-4">
                        <div class="p-2 bg-emerald-100 rounded-2xl text-emerald-600 flex-shrink-0">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span class="font-bold">{{ session('success') }}</span>
                    </div>
                @endif

                <div class="animate-in fade-in duration-700">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>
