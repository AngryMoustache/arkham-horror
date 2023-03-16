<h2 {{ $attributes->merge([
    'class' => 'text-2xl pl-1'
]) }}>
    @isset($title) {{ $title }}
    @else {{ $slot }}
    @endisset
</h2>
