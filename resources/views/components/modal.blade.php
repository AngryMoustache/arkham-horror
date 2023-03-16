<div
    x-transition.opacity
    style="background: rgba(0, 0, 0, 0.8); display: none;"
    {{ $attributes->merge([
        'class' => 'fixed inset-0 flex items-center justify-center z-100',
    ]) }}
>
    {{ $slot }}
</div>
