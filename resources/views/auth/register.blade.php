<x-layouts.app>

    <div class="flex flex-col flex-grow items-center justify-center space-y-2">
        <div class="bg-slate-100 px-8 py-6 rounded shadow max-w-sm w-full">
            <x-form>

                <x-field.text name="name" value="{{ old('name') }}" autocomplete="name" required autofocus />
                <x-field.email value="{{ old('email') }}" autocomplete="email" required />
                <x-field.password autocomplete="new-password" required />

                <div class="flex pt-4">
                    <button type="submit" class="px-3 py-2 bg-blue-500 focus:outline-none text-sm text-white hover:bg-blue-600 font-medium focus:ring-2 focus:ring-offset-1 focus:ring-blue-200 rounded shadow">Register</button>
                </div>

            </x-form>
        </div>
        <p class="text-sm"><a href="{{ route('login') }}" class="focus:outline-none focus:underline hover:underline">Already have an account ?</a></p>
    </div>

</x-layouts.app>
