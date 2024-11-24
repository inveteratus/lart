@props(['name' => 'password', 'label' => null])

<x-input :name="$name" :label="$label" component="password">
    <div x-data="{visible:false}">
        <input :type="visible?'text':'password'" :id="$id('input')" name="{{ $name }}" x-ref="input" {{ $attributes }} />
        <button type="button" tabindex="-1" @click.prevent.stop="visible=!visible;$refs.input.focus()">
            <x-heroicon-o-eye-slash x-cloak x-show="!visible" />
            <x-heroicon-o-eye x-cloak x-show="visible" />
        </button>
    </div>
</x-input>
