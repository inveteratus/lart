@props(['action' => "", 'method' => "post"])
<form action="{{ $action }}" method="{{ strcasecmp($method, 'get') ? 'POST' : 'GET' }}" {{ $attributes }}>
    {{ $slot }}
    @if (preg_match('/^(delete|patch|put)$/i', $method))
        @method(strtoupper($method))
    @endif
    @csrf
</form>
