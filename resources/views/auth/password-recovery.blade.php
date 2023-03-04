<x-layouts.app>

    <div class="flex flex-col flex-grow items-center justify-center space-y-2">
        <div class="bg-slate-100 px-8 py-6 rounded shadow max-w-sm w-full">
            <form method="post" class="flex flex-col space-y-2">

                @if (session('status'))
                    <p class="text-sm text-green-600">{{ session('status') }}</p>
                @endif

                <p class="text-sm">Enter your email address, and we'll send out a password reset email.</p>

                <div class="flex flex-col space-y-1">
                    <label for="email" class="font-medium text-sm text-slate-600">Email</label>
                    <div class="flex flex-col space-y-0.5 w-full">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" class="border border-slate-300 text-sm rounded px-2.5 focus:outline-none focus:border-blue-300 focus:ring-1 focus:ring-blue-300" autocomplete="email" required autofocus />
                        @error('email')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                @csrf

                <div class="flex pt-4 space-x-1.5">
                    <button type="submit" class="px-3 py-2 bg-blue-500 focus:outline-none text-sm text-white hover:bg-blue-600 font-medium focus:ring-2 focus:ring-offset-1 focus:ring-blue-200 rounded shadow">Send reset link</button>
                    <a href="{{ route('login') }}" class="px-3 py-2 bg-slate-400 focus:outline-none text-sm text-white hover:bg-slate-500 font-medium focus:ring-2 focus:ring-offset-1 focus:ring-slate-200 rounded shadow">Cancel</a>
                </div>

            </form>
        </div>
    </div>

</x-layouts.app>
