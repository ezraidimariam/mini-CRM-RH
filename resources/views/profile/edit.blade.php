<x-app-layout>
    <x-slot name="header">Profile Settings</x-slot>

    <div class="grid gap-6 xl:grid-cols-[280px_1fr]">
        <aside class="surface-card p-6">
            <div class="flex items-center gap-4">
                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-600 text-lg font-semibold text-white">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div>
                    <p class="font-semibold text-slate-950">{{ auth()->user()->name }}</p>
                    <p class="text-sm capitalize text-slate-500">{{ auth()->user()->role }}</p>
                </div>
            </div>
            <div class="mt-6 space-y-2 text-sm">
                <a href="#profile" class="block rounded-xl bg-blue-50 px-3 py-2 font-medium text-blue-700">Profile</a>
                <a href="#password" class="block rounded-xl px-3 py-2 font-medium text-slate-600 hover:bg-slate-100">Password</a>
                <a href="#danger" class="block rounded-xl px-3 py-2 font-medium text-rose-600 hover:bg-rose-50">Danger zone</a>
            </div>
        </aside>

        <div class="space-y-6">
            <section id="profile" class="surface-card p-6">
                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-slate-950">Profile information</h2>
                    <p class="mt-1 text-sm text-slate-500">Update your account name and email address.</p>
                </div>
                @include('profile.partials.update-profile-information-form')
            </section>

            <section id="password" class="surface-card p-6">
                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-slate-950">Password</h2>
                    <p class="mt-1 text-sm text-slate-500">Use a strong password to keep your workspace secure.</p>
                </div>
                @include('profile.partials.update-password-form')
            </section>

            <section id="danger" class="rounded-2xl border border-rose-200 bg-white p-6 shadow-sm">
                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-rose-900">Danger zone</h2>
                    <p class="mt-1 text-sm text-rose-600">Delete your account permanently.</p>
                </div>
                @include('profile.partials.delete-user-form')
            </section>
        </div>
    </div>
</x-app-layout>
