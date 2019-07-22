@extends ('layouts.master')

@section ('title', 'Cineflix | Home')

@section ('content')
    <ul class="flex flex-col w-40">
        <li class="text-center">
            <a href="/movies/create" class="border rounded px-4 py-2 my-4 block border-blue-300 text-blue-300 hover:text-blue-700 hover:bg-blue-300 transition-color">Add Movie</a>
        </li>
        <li class="text-center">
            <a href="/movies/directors/create" class="border rounded px-4 py-2 my-4 block border-blue-300 text-blue-300 hover:text-blue-700 hover:bg-blue-300 transition-color">Add Director</a>
        </li>
        <li class="text-center">
            <a href="/genres/create" class="border rounded px-4 py-2 my-4 block border-blue-300 text-blue-300 hover:text-blue-700 hover:bg-blue-300 transition-color">Add Genre</a>
        </li>
        <li class="text-center">
            <a href="/playlist" class="border rounded px-4 py-2 my-4 block border-blue-300 text-blue-300 hover:text-blue-700 hover:bg-blue-300 transition-color">My Playlist</a>
        </li>
    </ul>
@endsection
