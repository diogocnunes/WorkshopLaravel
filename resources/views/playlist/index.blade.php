@extends ('layouts.master')

@section ('title', 'Cineflix | Playlist')

@section ('content')
<div class="mt-20">
    <h1 class="uppercase font-bold tracking-wider mx-2">Latest Movies</h1>

    <div class="flex flex-wrap">
        @foreach ($movies as $movie)
            <div class="my-4 mx-2 rounded">
                <a href="{{ $movie->path() }}">
                    <img src="{{ $movie->thumbnail }}" alt="" style="width: 260px; height: 150px; object-fit: cover;" class="rounded-sm shadow">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
