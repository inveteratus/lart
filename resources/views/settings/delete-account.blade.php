<form action="{{ route('settings.delete') }}" method="post" class="flex flex-col space-y-2">

    <div class="flex flex-col space-y-1">
        <label for="password" class="font-medium text-sm text-slate-600">Password</label>
        <div class="flex flex-col space-y-0.5 w-full">
            <div class="flex border border-slate-300 rounded focus-within:border-blue-300 focus-within:ring-1 focus-within:ring-blue-300 overflow-hidden" x-data="{visible:false}">
                <input id="password" :type="visible?'text':'password'" name="password" class="border-none focus:border-none text-sm px-2.5 focus:outline-none flex-grow" autocomplete="current-password" required x-ref="input" />
                <button type="button" tabindex="-1" class="p-2 bg-neutral-100 border-l border-slate-300 text-slate-500 focus:outline-none" @click.stop.prevent="visible=!visible;$refs.input.focus()">
                    <x-heroicons.outline.eye class="w-5 h-5" x-cloak x-show="visible" />
                    <x-heroicons.outline.eye-slash class="w-5 h-5" x-show="!visible" />
                </button>
            </div>
            @error('password')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
    </div>

    @csrf
    @method('delete')

    <div class="flex justify-end pt-4">
        <button type="submit" class="px-3 py-2 bg-red-500 focus:outline-none text-sm text-white hover:bg-red-600 font-medium focus:ring-2 focus:ring-offset-1 focus:ring-red-200 rounded shadow">Delete</button>
    </div>

    {{--
    <div x-show="open" style="display:none" x-on:keydown.escape.prevent.stop="open=false" x-id="['modal-title']" class="fixed inset-0 z-10 overflow-y-auto">
        <div x-show="open" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-50"></div>
        <div x-show="open" x-transition x-on:click="open=false" class="relative flex min-h-screen items-center justify-center p-4">
            <x-neon.form action="{{ route('profile.delete-account') }}" method="delete" x-trap.noscroll.inert="open" class="relative w-full max-w-2xl overflow-y-auto rounded bg-gray-100 p-6 shadow-lg text-gray-700">
                <h2 class="text-3xl font-medium text-gray-600" :id="$id('modal-title')">Confirm</h2>
                <p class="mt-2 text-gray-600">Are you sure you want to delete your account ?</p>
                <footer class="mt-8 flex space-x-2">
                    <x-neon.button.cancel href="#" @click.prevent.stop="open=false" caption="No" />
                    <x-neon.button.submit caption="Yes" />
                </footer>
            </x-neon.form>
        </div>
    </div>
    --}}

</form>
