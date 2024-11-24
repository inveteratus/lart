<x-layouts.app>

    <main class="auth-login">
        <x-form>
            <x-input.email name="email" :value="old('email')" autocomplete="email" autofocus required />
            <x-input.password name="password" autocomplete="current-password" required />
            <footer>
                <x-buttons.submit />
            </footer>
        </x-form>
    </main>

</x-layouts.app>
