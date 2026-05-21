<button {{ $attributes->merge(['type' => 'submit', 'class' => 'px-6 py-3 bg-primary-600 border border-transparent rounded-2xl font-bold text-sm text-white uppercase tracking-widest hover:bg-primary-700 active:scale-95 transition-all duration-200 shadow-lg shadow-primary-500/20']) }}>
    {{ $slot }}
</button>
