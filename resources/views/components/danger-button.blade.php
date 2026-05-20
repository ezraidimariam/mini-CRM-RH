<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn-danger inline-flex items-center justify-center gap-2']) }}>
    {{ $slot }}
</button>
