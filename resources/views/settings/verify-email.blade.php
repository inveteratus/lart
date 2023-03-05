<form action="{{ route('settings.verify') }}" method="post" class="flex flex-col space-y-2">

    <p>In order to reset your password in case you forget it, your email address needs to be verified. We can send out a link to ensure your address is verified.</p>

    @csrf

    <div class="flex justify-end pt-4">
        <button type="submit" class="px-3 py-2 bg-blue-500 focus:outline-none text-sm text-white hover:bg-blue-600 font-medium focus:ring-2 focus:ring-offset-1 focus:ring-blue-200 rounded shadow">Send</button>
    </div>

</form>
