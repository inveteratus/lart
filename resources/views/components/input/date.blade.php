@props(['name', 'label' => null, 'value' => ''])

<x-input :name="$name" :label="$label" component="date">
    <div x-data="{
        visible: false,

        init() {
            new window.AirDatepicker( $id('input') )
        },

        open() {
            this.visible = true
        },
        close() {
            this.visible = false
        },
        toggle() {
            if (this.visible) {
                this.close()
            }
            else {
                this.open()
            }
        }

    }" class="relative">
        <div class="w-full rounded bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-0 focus-within:ring-blue-500 dark:focus-within:ring-blue-500 focus-within:border-transparent overflow-hidden flex relative">
            <input :id="$id('input')" type="text" name="{{ $name }}" {{ $attributes }} data-form-type="other" class="bg-slate-50 dark:bg-slate-950 text-slate-700 dark:text-slate-300 border-0 px-2 py-2 flex-grow focus:outline-none" x-ref="input" />
            <button type="button" @click="toggle()" class="border-l border-slate-300 dark:border-slate-700 px-2.5 bg-slate-50 dark:bg-slate-950 text-slate-600 dark:text-slate-400">
                <x-heroicon-o-calendar class="size-6"/>
            </button>
        </div>
        <div class="absolute top-12 right-0 bg-red-500 h-20" x-cloak x-show="visible" @click.away="close()">

        </div>
    </div>
</x-input>
