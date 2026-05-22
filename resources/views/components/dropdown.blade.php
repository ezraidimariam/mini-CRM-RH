@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white'])

@php
$alignmentClasses = match ($align) {
    'left' => 'origin-top-left left-0',
    'top' => 'origin-top',
    default => 'origin-top-right right-0',
};

$width = match ($width) {
    '48' => 'w-48',
    '56' => 'w-56',
    default => $width,
};
@endphp

<details class="group relative">
    <summary class="list-none cursor-pointer [&::-webkit-details-marker]:hidden">
        {{ $trigger }}
    </summary>

    <div class="absolute z-50 mt-2 {{ $width }} rounded-2xl shadow-lg {{ $alignmentClasses }}">
        <div class="rounded-2xl border border-slate-200 bg-white ring-1 ring-black/5 {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</details>
