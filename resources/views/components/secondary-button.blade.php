<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn-secondary inline-flex items-center justify-center gap-2']) }}>
    {{ $slot }}
</button>

