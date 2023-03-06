<x-layouts.app>

    <div class="flex flex-col flex-grow items-center justify-center space-y-2">
        <div class="bg-slate-100 px-8 py-6 rounded shadow max-w-sm w-full">
            <x-form>

                @if (session('status') == 'verification-link-sent')
                    <p class="text-sm text-green-600">A new verification link has been sent to the email address you provided during registration.</p>
                @endif

                <p class="test-sm">Could you verify your email address by clicking on the link we emailed you during registration ?</p>
                <p class="test-sm">If you didn't receive the email, we will gladly send you another.</p>

                <div class="flex justify-end pt-4">
                    <button type="submit" class="px-3 py-2 bg-blue-500 focus:outline-none text-sm text-white hover:bg-blue-600 font-medium focus:ring-2 focus:ring-offset-1 focus:ring-blue-200 rounded shadow">Send</button>
                </div>

            </x-form>
        </div>
    </div>

</x-layouts.app>
