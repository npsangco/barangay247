@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm', 'style' => 'color: #3B4953;']) }}>
    {{ $value ?? $slot }}
</label>
