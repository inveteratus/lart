<header class="bg-white shadow">
    <nav class="container flex justify-between mx-auto">
        <section>
            <a href="{{ route('index') }}" class="font-medium h-14 inline-flex items-center px-5 text-slate-600 hover:bg-slate-100 focus:bg-slate-100 focus:outline-none">{{ config('app.name') }}</a>
        </section>
        <section class="flex">
            <a href="{{ route('login') }}" class="h-14 inline-flex items-center px-5 hover:bg-slate-100 focus:bg-slate-100 focus:outline-none">Login</a>
            <a href="{{ route('register') }}" class="h-14 inline-flex items-center px-5 hover:bg-slate-100 focus:bg-slate-100 focus:outline-none">Register</a>
        </section>
    </nav>
</header>
