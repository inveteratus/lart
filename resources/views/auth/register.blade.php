<x-layouts.app>

    <div class="flex flex-col flex-grow items-center justify-center space-y-2">
        <div class="bg-slate-100 px-8 py-6 rounded shadow max-w-sm w-full">
            <form method="post" class="flex flex-col space-y-2">
                <div class="flex flex-col space-y-1">
                    <label for="name" class="font-medium text-sm text-slate-600">Name</label>
                    <div class="flex flex-col space-y-0.5 w-full">
                        <input id="name" type="text" name="name" value="{{ old('name') }}" class="border border-slate-300 text-sm rounded px-2.5 focus:outline-none focus:border-blue-300 focus:ring-1 focus:ring-blue-300" autocomplete="name" required autofocus />
                        @error('name')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="email" class="font-medium text-sm text-slate-600">Email</label>
                    <div class="flex flex-col space-y-0.5 w-full">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" class="border border-slate-300 text-sm rounded px-2.5 focus:outline-none focus:border-blue-300 focus:ring-1 focus:ring-blue-300" autocomplete="email" required />
                        @error('email')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="password" class="font-medium text-sm text-slate-600">Password</label>
                    <div class="flex flex-col space-y-0.5 w-full">
                        <div class="flex border border-slate-300 rounded focus-within:border-blue-300 focus-within:ring-1 focus-within:ring-blue-300 overflow-hidden" x-data="{visible:false}">
                            <input id="password" :type="visible?'text':'password'" name="password" class="border-none focus:border-none text-sm px-2.5 focus:outline-none flex-grow" autocomplete="new-password" required x-ref="input" />
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

                <div class="flex pt-4">
                    <button type="submit" class="px-3 py-2 bg-blue-500 focus:outline-none text-sm text-white hover:bg-blue-600 font-medium focus:ring-2 focus:ring-offset-1 focus:ring-blue-200 rounded shadow">Register</button>
                </div>
            </form>
        </div>
        <p class="text-sm"><a href="{{ route('login') }}" class="focus:outline-none focus:underline hover:underline">Already have an account ?</a></p>
    </div>

</x-layouts.app>
