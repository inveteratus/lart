@props(['method' => 'post'])

<form {{ $attributes->merge([
    'method' => strcasecmp($method, 'get') ? 'post' : 'get'
]) }}>
    {{ $slot }}
    @csrf
    @if (!preg_match('`^(get|post)$`i', $method))
        @method($method)
    @endif
</form>
