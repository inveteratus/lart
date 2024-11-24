<div x-data="{open:false}" class="user-menu">
    <button type="button" @click="open=!open">
        <span>{{ auth()->user()->name }}</span>
        <x-heroicon-m-chevron-down x-cloak x-show="!open" />
        <x-heroicon-m-chevron-up x-cloak x-show="open" />
    </button>
    <div x-cloak x-show="open" @click.away="open=false">
        {{ $slot }}
        @if (strlen($slot))
            <hr />
        @endif
        <x-form :action="route('logout')">
            <button type="submit">Logout</button>
        </x-form>
    </div>
</div>
