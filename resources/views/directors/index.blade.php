@extends ('layouts.master')

@section ('title', 'Cineflix | Directors')

@section ('content')
    <div class="flex flex-wrap mt-20 -mx-6">
        @foreach ($directors as $director)

            <a href="/directors/{{ $director->id }}" class="bg-gray-700 mx-6 my-6 text-gray-100 shadow-md rounded-lg w-40 h-40 flex justify-center items-center">
                <div>{{ $director->name }}</div>
            </a>
        @endforeach
    </div>
@endsection
