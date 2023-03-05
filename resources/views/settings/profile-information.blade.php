<form action="{{ route('settings.profile') }}" method="post" class="flex flex-col space-y-2">

    <div class="flex flex-col space-y-1">
        <label for="name" class="font-medium text-sm text-slate-600">Name</label>
        <div class="flex flex-col space-y-0.5 w-full">
            <input id="name" type="text" name="name" value="{{ old('name', Auth::user()->name) }}" class="border border-slate-300 text-sm rounded px-2.5 focus:outline-none focus:border-blue-300 focus:ring-1 focus:ring-blue-300" autocomplete="name" required autofocus />
            @error('name')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="flex flex-col space-y-1">
        <label for="email" class="font-medium text-sm text-slate-600">Email</label>
        <div class="flex flex-col space-y-0.5 w-full">
            <input id="email" type="email" name="email" value="{{ old('email', Auth::user()->email) }}" class="border border-slate-300 text-sm rounded px-2.5 focus:outline-none focus:border-blue-300 focus:ring-1 focus:ring-blue-300" autocomplete="email" required />
            @error('email')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
    </div>

    @csrf
    @method('patch')

    <div class="flex justify-end pt-4">
        <button type="submit" class="px-3 py-2 bg-blue-500 focus:outline-none text-sm text-white hover:bg-blue-600 font-medium focus:ring-2 focus:ring-offset-1 focus:ring-blue-200 rounded shadow">Update</button>
    </div>

</form>
