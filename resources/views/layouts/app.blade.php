<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Mini CRM RH Maya Agency') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="app-shell">
            @include('layouts.navigation')

            <div class="app-main">
                <header class="app-topbar">
                    <div class="flex min-h-16 items-center justify-between gap-4 px-5 py-3 lg:px-8">
                        <div class="min-w-0">
                            @isset($header)
                                <h1 class="truncate text-xl font-semibold text-slate-950 lg:text-2xl">{{ $header }}</h1>
                            @else
                                <h1 class="truncate text-xl font-semibold text-slate-950 lg:text-2xl">Mini CRM RH</h1>
                            @endisset
                            <p class="mt-0.5 hidden text-sm text-slate-500 sm:block">Maya Agency workforce operations</p>
                        </div>

                        <div class="flex items-center gap-3">
                            @isset($headerAction)
                                {{ $headerAction }}
                            @endisset

                            <a href="{{ route('notifications.index') }}" class="relative inline-flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-500 transition hover:bg-slate-50 hover:text-blue-600">
                                <span class="absolute right-2 top-2 h-2 w-2 rounded-full bg-blue-500"></span>
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75V9a6 6 0 10-12 0v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.08 5.455 1.31m5.714 0a3 3 0 11-5.714 0" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </header>

                <main class="px-5 py-6 lg:px-8 lg:py-8">
                    @if ($errors->any())
                        <div class="mb-6 rounded-2xl border border-rose-200 bg-rose-50 px-5 py-4 text-sm text-rose-800">
                            <p class="font-semibold">Please review the highlighted fields.</p>
                            <ul class="mt-2 list-inside list-disc space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-medium text-emerald-800">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mb-6 rounded-2xl border border-rose-200 bg-rose-50 px-5 py-4 text-sm font-medium text-rose-800">
                            {{ session('error') }}
                        </div>
                    @endif

                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
