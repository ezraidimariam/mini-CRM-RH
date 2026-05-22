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
        <div class="grid min-h-screen bg-slate-50 lg:grid-cols-[1fr_560px]">
            <section class="hidden flex-col justify-between bg-gradient-to-br from-slate-950 via-slate-900 to-blue-950 p-12 text-white lg:flex">
                <div>
                    <div class="flex items-center gap-3">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-500 shadow-lg shadow-blue-500/30">
                            <span class="text-xl font-bold">M</span>
                        </div>
                        <div>
                            <p class="text-lg font-semibold">Mini CRM RH</p>
                            <p class="text-sm text-blue-100">Maya Agency</p>
                        </div>
                    </div>

                    <div class="mt-24 max-w-xl">
                        <p class="mb-4 inline-flex rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-blue-100 ring-1 ring-white/10">Modern HR operations</p>
                        <h1 class="text-5xl font-semibold leading-tight tracking-tight">A calm workspace for people, leave, and performance.</h1>
                        <p class="mt-5 text-base leading-7 text-slate-300">Manage employees, approvals, evaluations, and workforce visibility with a clean agency-grade experience.</p>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4">
                    <div class="rounded-2xl border border-white/10 bg-white/10 p-4">
                        <p class="text-2xl font-semibold">360</p>
                        <p class="mt-1 text-xs text-slate-300">HR view</p>
                    </div>
                    <div class="rounded-2xl border border-white/10 bg-white/10 p-4">
                        <p class="text-2xl font-semibold">RH</p>
                        <p class="mt-1 text-xs text-slate-300">Approvals</p>
                    </div>
                    <div class="rounded-2xl border border-white/10 bg-white/10 p-4">
                        <p class="text-2xl font-semibold">5/5</p>
                        <p class="mt-1 text-xs text-slate-300">Reviews</p>
                    </div>
                </div>
            </section>

            <main class="flex items-center justify-center px-6 py-10">
                <div class="w-full max-w-md">
                    <div class="mb-8 lg:hidden">
                        <div class="flex items-center gap-3">
                            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-blue-600 text-white">
                                <span class="font-bold">M</span>
                            </div>
                            <div>
                                <p class="font-semibold text-slate-950">Mini CRM RH</p>
                                <p class="text-sm text-slate-500">Maya Agency</p>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-xl shadow-slate-200/70">
                        {{ $slot }}
                    </div>

                    <p class="mt-6 text-center text-xs text-slate-500">&copy; {{ date('Y') }} Maya Agency. HR operations platform.</p>
                </div>
            </main>
        </div>
    </body>
</html>
