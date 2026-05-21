<button {{ $attributes->merge(['type' => 'button', 'class' => 'px-6 py-3 bg-white border border-slate-200 rounded-2xl font-bold text-sm text-slate-700 uppercase tracking-widest hover:bg-slate-50 active:scale-95 transition-all duration-200 shadow-sm']) }}>
    {{ $slot }}
</button>
