@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-xl border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 shadow-sm transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-100']) !!}>
