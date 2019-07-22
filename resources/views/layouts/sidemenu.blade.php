<div class="bg-gray-900 absolute h-screen top-0 right-0 w-64 py-8">
    <div class="flex flex-col items-center justify-between h-full">
        <h2 class="bg-blue-600 inline-block h-20 w-20 text-3xl rounded-full flex items-center justify-center">{{ auth()->user()->avatar() }}</h2>

        <div class="flex-1 w-full pl-10 mt-20">
            <h3 class="tracking-wider uppercase text-gray-600 hover:text-gray-400 transition-color font-semibold">Browse</h3>

            <ul class="mt-8">
                <li class="my-4 transition-color {{ request()->is('movies') ? 'text-blue-400 font-bold border-r-4 border-blue-400' : 'text-gray-700 hover:text-gray-500' }}">
                    <a href="/movies">Movies</a>
                </li>
                <li class="my-4 transition-color {{ request()->is('directors') ? 'text-blue-400 font-bold border-r-4 border-blue-400' : 'text-gray-700 hover:text-gray-500' }}">
                    <a href="">Directors</a>
                </li>
                <li class="my-4 transition-color {{ request()->is('playlist') ? 'text-blue-400 font-bold border-r-4 border-blue-400' : 'text-gray-700 hover:text-gray-500' }}">
                    <a href="/playlist">Playlist</a>
                </li>
            </ul>
        </div>

        <ul class="w-full border-t border-gray-800 pt-8">
            <li class="flex items-center justify-center h-full">
                <form action="/logout" method="POST">
                @csrf
                    <button type="submit" class="tracking-wider text-sm text-gray-600 hover:text-gray-400 transition-color font-s">Logout</button>
                </form>
            </li>
        </ul>
    </div>
</div>
