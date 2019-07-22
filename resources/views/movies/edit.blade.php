@extends ('layouts.master')

@section ('title', 'Edit movie')

@section ('content')
<div class="w-3/5 mx-auto">
    <div class="border-b-2 border-gray-700 ">
        <h1 class="text-3xl font-bold text-gray-700 uppercase">Edit Movie</h1>
    </div>

    <form action="/movies/{{ $movie->slug }}" method="POST" class="my-16">
        @csrf
        @method('PATCH')

        <div class="flex flex-col mt-8">
            <label for="title" class="text-sm font-semibold tracking-wide text-gray-500">Title</label>
            <input type="text" name="title" class="text-black px-4 py-2 mt-3 rounded-sm {{ $errors->has('title') ? 'border-red-400' : '' }}" value="{{ old('title') ?? $movie->title }}">

            @if($errors->has('title'))
                <p class="text-red-400 mt-2">{{ $errors->first('title') }}</p>
            @endif
        </div>

        <div class="flex flex-col mt-8">
            <label for="year" class="text-sm font-semibold tracking-wide text-gray-500">Year</label>
            <input type="text" name="year" class="text-black px-4 py-2 mt-3 rounded-sm {{ $errors->has('year') ? 'border-red-400' : '' }}" value="{{ old('year') ?? $movie->year }}">

            @if($errors->has('year'))
                <p class="text-red-400 mt-2">{{ $errors->first('year') }}</p>
            @endif
        </div>

        <div class="flex flex-col mt-8">
            <label for="description" class="text-sm font-semibold tracking-wide text-gray-500">Description</label>
            <textarea name="description" cols="30" rows="10" class="text-black px-4 py-4 mt-3 rounded-sm  resize-none{{ $errors->has('title') ? 'border-red-400' : '' }}">{{ old('description') ?? $movie->description}}</textarea>

            @if($errors->has('description'))
                <p class="text-red-400 mt-2">{{ $errors->first('description') }}</p>
            @endif
        </div>

        <div class="flex flex-col mt-8">
            <label for="description" class="text-sm font-semibold tracking-wide text-gray-500">Thumbnail</label>
            <input type="text" name="thumbnail" class="text-black px-4 py-2 mt-3 rounded-sm" value="{{ old('thumbnail') ?? $movie->thumbnail }}">
        </div>

        <div class="flex flex-col mt-8">
            <label for="description" class="text-sm font-semibold tracking-wide text-gray-500">Poster</label>
            <input type="text" name="poster" class="text-black px-4 py-2 mt-3 rounded-sm" value="{{ old('poster') ?? $movie->poster }}">
        </div>

        <div class="flex flex-col mt-8">
            <label for="description" class="text-sm font-semibold tracking-wide text-gray-500">Director</label>
            <input type="text" name="director" class="text-black px-4 py-2 mt-3 rounded-sm" value="{{ old('director') ?? $movie->director }}">
        </div>

        <div class=" mt-8">
            <button type="submit" class="border-2 py-2 px-4 rounded border-blue-300 text-blue-300">Update Movie</button>
        </div>
    </form>
</div>

@endsection
