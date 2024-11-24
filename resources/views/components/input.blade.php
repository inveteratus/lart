@props(['component', 'name', 'label' => null])

<div class="input-{{ $component }}" x-data x-id="['input']">
    <label :for="$id('input')">{{ $label ?? str($name)->title() }}</label>
    <div>
        {{ $slot }}
        @error($name)
            <span class="error">{{ $message }}</span>
        @enderror
    </div>
</div>
