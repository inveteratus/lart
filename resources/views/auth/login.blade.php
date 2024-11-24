<x-layouts.app>

    <main class="auth-login">
        <x-form>
            @if (session('status'))
                <p class="status">{{ session('status') }}</p>
            @endif
            <x-input.email name="email" :value="old('email')" autocomplete="email" autofocus required />
            <x-input.password name="password" autocomplete="current-password" required />
            <footer>
                <x-button.submit />
                @if (Route::has('forgot-password'))
                    <a href="{{ route('forgot-password') }}">Forgot your password ?</a>
                @endif
            </footer>
        </x-form>
        @if (Route::has('register'))
            <p><a href="{{ route('register') }}">Not got an account yet ?</a></p>
        @endif
    </main>

</x-layouts.app>
