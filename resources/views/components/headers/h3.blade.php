<h3 {{ $attributes->merge([
    'class' => 'text-lg pl-1'
]) }}>
    @isset($title) {{ $title }}
    @else {{ $slot }}
    @endisset
</h3>
