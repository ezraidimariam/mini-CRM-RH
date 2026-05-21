@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center gap-2 px-4 py-2 bg-primary-50/50 text-primary-700 font-bold text-sm rounded-2xl transition-all duration-300'
            : 'inline-flex items-center gap-2 px-4 py-2 text-slate-500 font-semibold text-sm hover:text-primary-600 hover:bg-slate-50/80 rounded-2xl transition-all duration-300';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
