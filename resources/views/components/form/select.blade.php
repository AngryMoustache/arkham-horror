<select {{ $attributes->except('options')->merge([
    'class' => 'bg-gray-100 rounded-md shadow-sm outline-none px-2 py-1 w-full'
]) }}>
    @isset($label)
        <option value="">{{ $label }}</option>
    @endisset

    @foreach ($options as $key => $value)
        <option value="{{ $key }}">
            {{ $value }}
        </option>
    @endforeach
</select>
