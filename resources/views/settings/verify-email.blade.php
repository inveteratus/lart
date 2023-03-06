@if (!Auth::user()->hasVerifiedEmail())
    <div class="bg-slate-100 px-8 py-6 rounded shadow">
        <div class="grid grid-cols-5">
            <div class="col-span-2">
                <h2 class="font-medium text-gray-600">Verify Email</h2>
                @if (session('status') == 'verification-sent')
                    <p class="text-sm mt-4 text-green-600" x-data="{show:true}" x-show="show" x-init="setTimeout(()=>show=false,2000)">Verification sent</p>
                @endif
            </div>
            <div class="col-span-3">
                <x-form action="{{ route('settings.verify') }}">

                    <p>In order to reset your password in case you forget it, your email address needs to be verified. We can send out a link to ensure your address is verified.</p>

                    <div class="flex justify-end pt-4">
                        <button type="submit" class="px-3 py-2 bg-blue-500 focus:outline-none text-sm text-white hover:bg-blue-600 font-medium focus:ring-2 focus:ring-offset-1 focus:ring-blue-200 rounded shadow">Send</button>
                    </div>

                </x-form>
            </div>
        </div>
    </div>
@endif
