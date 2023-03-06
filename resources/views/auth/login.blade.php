<x-layouts.app>

    <div class="flex flex-col flex-grow items-center justify-center space-y-2">
        <div class="bg-slate-100 px-8 py-6 rounded shadow max-w-sm w-full">
            <x-form class="flex flex-col space-y-3">

                @if (session('status'))
                    <p class="text-sm text-green-600">{{ session('status') }}</p>
                @endif

                <x-field.email value="{{ old('email') }}" autocomplete="email" required autofocus />
                <x-field.password autocomplete="current-password" required />

                <div class="flex pt-4 justify-between items-center">
                    <button type="submit" class="px-3 py-2 bg-blue-500 focus:outline-none text-sm text-white hover:bg-blue-600 font-medium focus:ring-2 focus:ring-offset-1 focus:ring-blue-200 rounded shadow">Login</button>
                    <a href="{{ route('password.recovery') }}" class="text-sm focus:outline-none focus:underline hover:underline">Forgot your password ?</a>
                </div>

            </x-form>
        </div>
        <p class="text-sm"><a href="{{ route('register') }}" class="focus:outline-none focus:underline hover:underline">Don't have an account yet ?</a></p>
    </div>

</x-layouts.app>
