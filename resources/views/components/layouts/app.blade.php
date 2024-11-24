@props(['title' => config('app.name')])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>{{ $title }}</title>
    <script>
        if (localStorage.theme==='dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        <nav>
            <div>
                <h1>
                    <a href="{{ route('index') }}">{{ config('app.name') }}</a>
                </h1>
            </div>
            <div>
                <x-theme-selector />
                @auth
                    <x-user-menu>
                        @if (Route::has('profile'))
                            <a href="{{ route('profile') }}">Profile&hellip;</a>
                        @endif
                    </x-user-menu>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endif
            </div>
        </nav>
    </header>

    {{ $slot }}
    @livewireScriptConfig
</body>
</html>
