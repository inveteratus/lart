<x-html>
    @auth
        @include("partials.navbar.auth")
    @else
        @include("partials.navbar.guest")
    @endauth

    {{ $slot }}
</x-html>
