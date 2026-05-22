<x-guest-layout>
    <div class="text-center">
        <p class="text-sm font-semibold text-blue-600">403</p>
        <h1 class="mt-3 text-3xl font-semibold text-slate-950">Access restricted</h1>
        <p class="mt-3 text-sm leading-6 text-slate-500">You do not have permission to access this workspace area.</p>
        <a href="{{ route('dashboard') }}" class="btn-primary mt-6">Back to dashboard</a>
    </div>
</x-guest-layout>
