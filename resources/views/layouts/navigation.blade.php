@php
    $user = auth()->user();
    $canManagePeople = $user && ($user->role === 'admin' || $user->role === 'rh');

    $links = [
        ['label' => 'Dashboard', 'route' => 'dashboard', 'active' => 'dashboard', 'show' => true, 'icon' => 'M3 12l9-9 9 9M5 10v10h14V10'],
        ['label' => 'Employees', 'route' => 'employees.index', 'active' => 'employees.*', 'show' => $canManagePeople, 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M15 7a3 3 0 11-6 0 3 3 0 016 0z'],
        ['label' => 'Leaves', 'route' => 'conges.index', 'active' => 'conges.*', 'show' => true, 'icon' => 'M8 7V3m8 4V3M5 11h14M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
        ['label' => 'Balances', 'route' => 'balances.index', 'active' => 'balances.*', 'show' => $canManagePeople, 'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-10v2m0 8v2M5 12H3m18 0h-2'],
        ['label' => 'Evaluations', 'route' => 'evaluations.index', 'active' => 'evaluations.*', 'show' => $canManagePeople, 'icon' => 'M9 19V6a2 2 0 012-2h2a2 2 0 012 2v13M5 19v-8a2 2 0 012-2h0a2 2 0 012 2v8M15 19v-4a2 2 0 012-2h0a2 2 0 012 2v4'],
        ['label' => 'Activity Logs', 'route' => 'activity.index', 'active' => 'activity.*', 'show' => $canManagePeople, 'icon' => 'M12 8v4l3 3M12 22a10 10 0 110-20 10 10 0 010 20z'],
        ['label' => 'Archive', 'route' => 'archive.employees', 'active' => 'archive.*', 'show' => $canManagePeople, 'icon' => 'M20 7l-8 4-8-4m16 0l-8-4-8 4m16 0v10l-8 4-8-4V7'],
    ];
@endphp

<aside class="app-sidebar">
    <div class="flex h-full flex-col px-5 py-6">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-600 to-sky-500 text-white shadow-lg shadow-blue-600/20">
                <span class="text-lg font-bold">M</span>
            </div>
            <div>
                <p class="text-base font-semibold text-slate-950">Mini CRM RH</p>
                <p class="text-xs font-medium text-slate-500">Maya Agency</p>
            </div>
        </a>

        <nav class="mt-8 space-y-1">
            @foreach($links as $link)
                @if($link['show'])
                    <a href="{{ route($link['route']) }}" class="{{ request()->routeIs($link['active']) ? 'nav-item-active' : 'nav-item' }}">
                        <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="{{ $link['icon'] }}" />
                        </svg>
                        <span>{{ $link['label'] }}</span>
                    </a>
                @endif
            @endforeach
        </nav>

        <div class="mt-auto rounded-2xl border border-slate-200 bg-slate-50 p-4">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-600 text-sm font-semibold text-white">
                    {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
                </div>
                <div class="min-w-0">
                    <p class="truncate text-sm font-semibold text-slate-900">{{ $user->name ?? 'User' }}</p>
                    <p class="text-xs capitalize text-slate-500">{{ $user->role ?? 'guest' }}</p>
                </div>
            </div>
            <div class="mt-4 grid grid-cols-2 gap-2">
                <a href="{{ route('profile.edit') }}" class="btn-secondary px-3 py-2 text-xs">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-ghost w-full px-3 py-2 text-xs">Logout</button>
                </form>
            </div>
        </div>
    </div>
</aside>

<div class="border-b border-slate-200 bg-white px-5 py-4 lg:hidden">
    <div class="flex items-center justify-between">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-blue-600 text-white">
                <span class="font-bold">M</span>
            </div>
            <div>
                <p class="text-sm font-semibold text-slate-950">Mini CRM RH</p>
                <p class="text-xs text-slate-500">Maya Agency</p>
            </div>
        </a>
        <a href="{{ route('profile.edit') }}" class="rounded-xl border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-600">Profile</a>
    </div>
    <div class="mt-4 flex gap-2 overflow-x-auto pb-1">
        @foreach($links as $link)
            @if($link['show'])
                <a href="{{ route($link['route']) }}" class="{{ request()->routeIs($link['active']) ? 'shrink-0 rounded-xl bg-blue-50 px-3 py-2 text-xs font-semibold text-blue-700' : 'shrink-0 rounded-xl bg-slate-100 px-3 py-2 text-xs font-semibold text-slate-600' }}">
                    {{ $link['label'] }}
                </a>
            @endif
        @endforeach
    </div>
</div>
