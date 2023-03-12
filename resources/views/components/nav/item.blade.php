@props([
    'route',
    'label',
    'icon' => '',
    'activeIcon' => Str::replace('-o-', '-s-', $icon),
    'active' => $route === request()->url(),
])

<a
    href="{{ $route }}"
    class="group flex flex-col px-3 py-2 text-title"
>
    <span class="inline-flex items-center">
        @if (filled($icon))
            <x-dynamic-component :component="$active ? $activeIcon : $icon" class="w-8 h-8" />
            <span class="text-lg ml-3 pt-1">{{ $label }}</span>
        @else
            <span class="text-lg">{{ $label }}</span>
        @endif
    </span>

    <div
        style="gap: 2px"
        class="
            pt-1 flex flex-col transition-opacity
            group-hover:opacity-100
            {{ $active ? 'opacity-100' : 'opacity-0' }}
        "
    >
        <div class="w-full h-px bg-green"></div>
        <div class="w-full h-px bg-green"></div>
    </div>
</a>
