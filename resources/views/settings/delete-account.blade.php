<div class="bg-slate-100 px-8 py-6 rounded shadow">
    <div class="grid grid-cols-5">
        <div class="col-span-2">
            <h2 class="font-medium text-gray-600">Delete Account</h2>
        </div>
        <div class="col-span-3">
            <x-form action="{{ route('settings.delete') }}" method="delete">

                <x-field.password autocomplete="current-password" required />

                <div class="flex justify-end pt-4">
                    <button type="submit" class="px-3 py-2 bg-red-500 focus:outline-none text-sm text-white hover:bg-red-600 font-medium focus:ring-2 focus:ring-offset-1 focus:ring-red-200 rounded shadow">Delete</button>
                </div>

            </x-form>
        </div>
    </div>
</div>
