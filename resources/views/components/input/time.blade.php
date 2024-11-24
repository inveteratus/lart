@props(['name', 'label' => null, 'value' => ''])

<x-input :name="$name" :label="$label" component="time">
    <input :id="$id('input')" type="time" name="{{ $name }}" value="{{ $value }}" {{ $attributes }} data-form-type="other" />
</x-input>
