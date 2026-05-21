@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-slate-200 bg-white focus:border-primary-500 focus:ring-4 focus:ring-primary-500/10 rounded-2xl shadow-sm px-4 py-3 transition-all duration-200']) !!}>
