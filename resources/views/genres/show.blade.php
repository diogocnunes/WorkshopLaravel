@extends ('layouts.master')

@section ('img')
    <img src="https://coverfiles.alphacoders.com/517/51794.jpg" class="w-screen object-cover absolute top-0" style="z-index: -2; height: 320px;">
    <div class="h-screen w-screen absolute top-0 bg-black opacity-50" style="z-index: -1;"></div>
@endsection

@section ('content')
    <ul class="flex mt-64">
        @foreach ($genres as $genre)
            <li class="hover:text-blue-400 transition-color mx-4 {{ $genre->path() == request()->getRequestUri() ? 'text-white-400' : 'text-gray-800' }}">
                <a href="{{ $genre->path() }}">{{ $genre->name }}</a>
            </li>
        @endforeach
    </ul>

    <div class="mt-6">
        <div class="flex">
            @foreach ($movies as $movie)
                <div class="my-4 mx-2">
                    <a href="{{ $movie->path() }}">
                        <img src="{{ $movie->thumbnail }}" alt="" style="width: 260px; height: 150px; object-fit: cover;" class="rounded-sm shadow">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
