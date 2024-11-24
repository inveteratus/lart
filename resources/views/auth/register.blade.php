<x-layouts.app>

    <main class="auth-register">
        <x-form>
            <x-input.text name="name" :value="old('name')" autocomplete="name" autofocus required />
            <x-input.email name="email" :value="old('email')" autocomplete="email" required />
            <x-input.password name="password" autocomplete="current-password" required />
            <footer>
                <x-button.submit />
            </footer>
        </x-form>
        <p><a href="{{ route('login') }}">Already have an account ?</a></p>
    </main>

</x-layouts.app>
