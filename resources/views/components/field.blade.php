@props([
    'label' => null,
])

<label>
    {{ $label }}

    <x-input :$attributes />

    <x-dynamic-component component="input"  />
</label>
