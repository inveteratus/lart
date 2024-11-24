<x-layouts.app>
    <main class="auth-forgot-password">
        <x-form>
            @if (session('status'))
                <p class="status">{{ session('status') }}</p>
            @endif

            <p>Let us know your email address and we will email you a password reset link that will allow you to choose a new password.</p>

            <x-input.email :value="old('email')" autocomplete="email" required autofocus />

            <footer>
                <x-button.submit label="Send link" />
                <x-button.cancel label="Cancel" :href="route('login')" />
            </footer>
        </x-form>
    </main>
</x-layouts.app>
