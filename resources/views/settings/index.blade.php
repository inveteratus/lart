<x-layouts.app>

    <div class="container mx-auto mt-4 flex flex-col space-y-4">

        <div class="bg-slate-100 px-8 py-6 rounded shadow">
            <div class="grid grid-cols-5">
                <div class="col-span-2">
                    <h2 class="font-medium text-gray-600">Profile Information</h2>
                    @if (session('status') == 'profile-updated')
                        <p class="text-sm mt-4 text-green-600" x-data="{show:true}" x-show="show" x-init="setTimeout(()=>show=false,2000)">Profile updated</p>
                    @endif
                </div>
                <div class="col-span-3">
                    @include("settings.profile-information")
                </div>
            </div>
        </div>

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
                        @include("settings.verify-email")
                    </div>
                </div>
            </div>
        @endif

        <div class="bg-slate-100 px-8 py-6 rounded shadow">
            <div class="grid grid-cols-5">
                <div class="col-span-2">
                    <h2 class="font-medium text-gray-600">Change Password</h2>
                    @if (session('status') == 'password-changed')
                        <p class="text-sm mt-4 text-green-600" x-data="{show:true}" x-show="show" x-init="setTimeout(()=>show=false,2000)">Password changed</p>
                    @endif
                </div>
                <div class="col-span-3">
                    @include("settings.change-password")
                </div>
            </div>
        </div>

        <div class="bg-slate-100 px-8 py-6 rounded shadow">
            <div class="grid grid-cols-5">
                <div class="col-span-2">
                    <h2 class="font-medium text-gray-600">Delete Account</h2>
                </div>
                <div class="col-span-3">
                    @include("settings.delete-account")
                </div>
            </div>
        </div>
    </div>

</x-layouts.app>
