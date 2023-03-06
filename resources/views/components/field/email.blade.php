@props(['name' => 'email', 'label' => null])

<div class="flex flex-col" x-data x-id="['field']">
    <label :for="$id('field')" class="font-medium text-sm text-slate-600">{{ $label ?? str($name)->headline() }}</label>
    <div>
        <input :id="$id('field')" name="{{ $name }}" type="email" {{ $attributes->merge(['class' => 'border border-slate-300 text-sm rounded px-2.5 focus:outline-none focus:border-blue-300 focus:ring-1 focus:ring-blue-300 w-full']) }} />
        @error($name)
            <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
    </div>
</div>
