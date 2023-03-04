<header class="bg-white shadow">
    <nav class="container flex justify-between mx-auto">
        <section>
            <a href="{{ route('home') }}" class="font-medium h-14 inline-flex items-center px-5 text-slate-600 hover:bg-slate-100 focus:bg-slate-100 focus:outline-none">{{ config('app.name') }}</a>
        </section>
        <section class="flex">
            <div class="flex relative" x-data="{open:false}">
                <button type="button" class="h-14 flex space-x-1 items-center px-5 text-slate-600 hover:bg-slate-100 focus:bg-slate-100 focus:outline-none" @click.prevent.stop="open=!open">
                    <span>{{ Auth::user()->name }}</span>
                    <span class="opacity-75">
                        <x-heroicons.mini.chevron-down x-show="!open" class="w-5 h-5" />
                        <x-heroicons.mini.chevron-up x-cloak x-show="open" class="w-5 h-5" />
                    </span>
                </button>
                <div class="absolute right-0 top-0 mt-16 bg-white whitespace-nowrap flex flex-col py-2 rounded shadow" @click.prevent.away="open=false" x-show="open" x-cloak>
                    {{--
                    <a href="#" class="px-5 py-1 text-slate-600 hover:bg-slate-100 focus:bg-slate-100 focus:outline-none">Link</a>
                    <a href="#" class="px-5 py-1 text-slate-600 hover:bg-slate-100 focus:bg-slate-100 focus:outline-none">Long Link</a>
                    <a href="#" class="px-5 py-1 text-slate-600 hover:bg-slate-100 focus:bg-slate-100 focus:outline-none">Very Long Link</a>
                    <hr class="my-1.5">
                    --}}
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="px-5 py-1 hover:bg-slate-100 w-full text-slate-700 text-left focus:bg-slate-100 focus:outline-none">Logout</button>
                    </form>
                </div>
            </div>
        </section>
    </nav>
</header>
