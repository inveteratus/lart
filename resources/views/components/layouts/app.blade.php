<x-html>
    @guest
        @include("partials.navbar.guest")
    @endguest
    {{ $slot }}
</x-html>
