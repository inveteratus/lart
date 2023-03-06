@props(['method' => 'post'])

<form {{ $attributes->merge(['method' => strcasecmp($method, 'get') ? 'post' : 'get', 'class' => 'flex flex-col space-y-3']) }}>
    {{ $slot }}
    @csrf
    @if (!preg_match('`^(get|post)$`i', $method))
        @method($method)
    @endif
</form>
