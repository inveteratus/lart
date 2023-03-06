<div class="bg-slate-100 px-8 py-6 rounded shadow">
    <div class="grid grid-cols-5">
        <div class="col-span-2">
            <h2 class="font-medium text-gray-600">Change Password</h2>
            @if (session('status') == 'password-changed')
                <p class="text-sm mt-4 text-green-600" x-data="{show:true}" x-show="show" x-init="setTimeout(()=>show=false,2000)">Password changed</p>
            @endif
        </div>
        <div class="col-span-3">
            <x-form action="{{ route('settings.password') }}" method="patch">

                <x-field.password name="old" label="Current Password" autocomplete="current-password" required />
                <x-field.password name="new" label="New Password" autocomplete="new-password" required />

                <div class="flex justify-end pt-4">
                    <button type="submit" class="px-3 py-2 bg-blue-500 focus:outline-none text-sm text-white hover:bg-blue-600 font-medium focus:ring-2 focus:ring-offset-1 focus:ring-blue-200 rounded shadow">Update</button>
                </div>

            </x-form>
        </div>
    </div>
</div>
