<div class="theme-selector" x-data="themeSelector()">
    <button type="button" @click="open=!open">
        <x-heroicon-o-sun x-cloak x-show="!dark" />
        <x-heroicon-o-moon x-cloak x-show="dark" />
    </button>
    <div x-cloak x-show="open" @click.away="open=false">
        <button type="button" @click="state='light'">
            <x-heroicon-o-sun />
            <span>Light</span>
        </button>
        <button type="button" @click="state='dark'">
            <x-heroicon-o-moon />
            <span>Dark</span>
        </button>
        <button type="button" @click="state='system'">
            <x-heroicon-o-computer-desktop />
            <span>System</span>
        </button>
    </div>
</div>
