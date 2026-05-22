@props(['value'])

<label {{ $attributes->merge(['class' => 'text-sm font-medium text-slate-700']) }}>
    {{ $value ?? $slot }}
</label>
