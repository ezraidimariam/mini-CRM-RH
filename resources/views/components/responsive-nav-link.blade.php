@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full rounded-xl bg-blue-50 px-3 py-2 text-start text-sm font-semibold text-blue-700 transition'
            : 'block w-full rounded-xl px-3 py-2 text-start text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-slate-950';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
