@props(['name' => 'password', 'label' => null])

<div class="flex flex-col" x-data x-id="['field']">
    <label :for="$id('field')" class="font-medium text-sm text-slate-600">{{ $label ?? str($name)->headline() }}</label>
    <div>

        <div class="flex border border-slate-300 rounded focus-within:border-blue-300 focus-within:ring-1 focus-within:ring-blue-300 overflow-hidden" x-data="{visible:false}">
            <input :id="$id('field')" name="{{ $name }}" :type="visible?'text':'password'" {{ $attributes->merge(['class' => "border-none focus:border-none text-sm px-2.5 focus:outline-none flex-grow"]) }} x-ref="input" />
            <button type="button" tabindex="-1" class="p-2 bg-neutral-100 border-l border-slate-300 text-slate-500 focus:outline-none" @click.stop.prevent="visible=!visible;$refs.input.focus()">
                <x-icons.eye class="w-5 h-5" x-cloak x-show="visible" />
                <x-icons.eye-slash class="w-5 h-5" x-show="!visible" />
            </button>
        </div>

        @error($name)
            <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
    </div>
</div>
