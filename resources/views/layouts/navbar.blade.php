<nav class="flex justify-between items-center py-8 container mx-auto">

    <a href="/" class="flex items-baseline">
        <h1 class="font-logo text-4xl tracking-wider ml-2">
            Cine<span class="text-red-600">flix</span>
        </h1>
    </a>

    <ul class="flex -mr-4 items-center">
        @auth
            <li class="mx-4">
                <menu-button></menu-button>
            </li>
        @endauth
    </ul>

</nav>
