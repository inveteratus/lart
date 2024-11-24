<x-layouts.app>

    <main class="auth-register">
        <x-form>
            <x-input.text name="name" :value="old('name')" autocomplete="name" autofocus required />
            <x-input.email name="email" :value="old('email')" autocomplete="email" required />
            <x-input.password name="password" autocomplete="current-password" required />
            <footer>
                <x-buttons.submit />
            </footer>
        </x-form>
    </main>

</x-layouts.app>
