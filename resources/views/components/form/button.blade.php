<a {{ $attributes->merge(['class' => '
    inline-block cursor-pointer relative text-title px-4 py-1 bg-button
    text-white rounded-md shadow-md outline-none overflow-hidden
']) }}>
    <span>
        @isset($label) {{ $label }}
        @else {{ $slot }}
        @endisset
    </span>

    <span
        wire:loading.flex
        class="absolute inset-0 bg-green items-center justify-center"
    >
        <x-heroicon-o-arrow-path class="animate-spin w-4 h-4" />
    </span>
</a>
