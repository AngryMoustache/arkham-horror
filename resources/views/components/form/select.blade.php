<select {{ $attributes->merge([
    'class' => 'bg-gray-100 rounded-md shadow-sm outline-none px-2 py-1'
]) }}>
    @isset($label)
        <option value="">{{ $label }}</option>
    @endisset

    @foreach ($options as $option)
        <option value="{{ $option->id }}">
            {{ $option->name }}
        </option>
    @endforeach
</select>
