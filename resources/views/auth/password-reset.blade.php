<x-layouts.app>

    <div class="flex flex-col flex-grow items-center justify-center space-y-2">
        <div class="bg-slate-100 px-8 py-6 rounded shadow max-w-sm w-full">
            <x-form action="{{ route('password.reset.store') }}">

                @if (session('status'))
                    <p class="text-sm text-green-600">{{ session('status') }}</p>
                @endif

                <x-field.email value="{{ old('email', $email) }}" autocomplete="email" required autofocus />
                <x-field.password autocomplete="new-password" required />

                <div class="flex pt-4">
                    <button type="submit" class="px-3 py-2 bg-blue-500 focus:outline-none text-sm text-white hover:bg-blue-600 font-medium focus:ring-2 focus:ring-offset-1 focus:ring-blue-200 rounded shadow">Reset Password</button>
                    <input type="hidden" name="token" value="{{ $token }}" />
                </div>

            </x-form>
        </div>
    </div>

</x-layouts.app>
