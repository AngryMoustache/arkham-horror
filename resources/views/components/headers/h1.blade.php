<h1 class="{{ isset($mb) ? $mb : 'mb-6' }}">
    <span {{ $attributes->merge([
        'class' => 'text-4xl pl-1'
    ]) }}>
        @isset($title) {{ $title }}
        @else {{ $slot }}
        @endisset
    </span>

    <div
        style="gap: 2px"
        class="pt-2 flex flex-col"
    >
        <div class="w-full h-px bg-green"></div>
        <div class="w-full h-px bg-green"></div>
    </div>
</h1>
