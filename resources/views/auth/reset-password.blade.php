<x-layouts.app>
    <main class="auth-reset-password">
        <x-form :action="route('password.reset.store')">
            <x-input.email :value="old('email', request()->email)" autocomplete="email" required />
            <x-input.password autocomplete="new-password" required autofocus />
            <input type="hidden" name="token" value="{{ request()->route()->parameter('token') }}" />
            <footer>
                <x-button.submit label="Reset password" />
            </footer>
        </x-form>
    </main>
</x-layouts.app>
