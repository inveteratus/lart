<header class="bg-white shadow">
    <nav class="container flex justify-between mx-auto">
        <section>
            <a href="{{ route('home') }}" class="font-medium h-14 inline-flex items-center px-5 text-slate-600 hover:bg-slate-100">{{ config('app.name') }}</a>
        </section>
        <section class="flex">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="h-14 inline-flex items-center px-5 hover:bg-slate-100">Logout</button>
            </form>
        </section>
    </nav>
</header>
