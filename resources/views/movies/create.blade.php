@extends('layouts.master')

@section ('title', 'Create Movie')
    
@section ('content')
<div class="w-3/5 mx-auto">
    <div class="border-b-2 border-gray-700 ">
        <h1 class="text-3xl font-bold text-gray-700 uppercase">New Movie</h1>
    </div>

    <form action="/movies" method="POST" class="my-16">
        @csrf

        <div class="flex flex-col mt-8">
            <label for="title" class="text-sm font-semibold tracking-wide text-gray-500">Title</label>
            <input type="text" name="title" class="text-black px-4 py-2 mt-3 rounded-sm {{ $errors->has('title') ? 'border-red-400' : '' }}" value="{{ old('title')}}">

            @if($errors->has('title'))
                <p class="text-red-400 mt-2">{{ $errors->first('title') }}</p>
            @endif
        </div>

        <div class="flex flex-col mt-8">
            <label for="year" class="text-sm font-semibold tracking-wide text-gray-500">Year</label>
            <input type="text" name="year" class="text-black px-4 py-2 mt-3 rounded-sm {{ $errors->has('year') ? 'border-red-400' : '' }}" value="{{ old('year') }}">

            @if($errors->has('year'))
                <p class="text-red-400 mt-2">{{ $errors->first('year') }}</p>
            @endif
        </div>

        <div class="flex flex-col mt-8">
            <label for="description" class="text-sm font-semibold tracking-wide text-gray-500">Description</label>
            <textarea name="description" cols="30" rows="10" class="text-black px-4 py-2 mt-3 rounded-sm {{ $errors->has('title') ? 'border-red-400' : '' }}">{{ old('description') }}</textarea>

            @if($errors->has('description'))
                <p class="text-red-400 mt-2">{{ $errors->first('description') }}</p>
            @endif
        </div>

        <div class="flex flex-col mt-8">
            <label for="description" class="text-sm font-semibold tracking-wide text-gray-500">Thumbnail</label>
            <input type="text" name="thumbnail" class="text-black px-4 py-2 mt-3 rounded-sm">
        </div>

        <div class="flex flex-col mt-8">
            <label for="description" class="text-sm font-semibold tracking-wide text-gray-500">Poster</label>
            <input type="text" name="poster" class="text-black px-4 py-2 mt-3 rounded-sm">
        </div>

        <div class="flex flex-col mt-8">
            <label for="description" class="text-sm font-semibold tracking-wide text-gray-500">Director</label>
            <input type="text" name="director" class="text-black px-4 py-2 mt-3 rounded-sm">
        </div>

        <div class=" mt-8">
            <button type="submit" class="border-2 py-2 px-4 rounded border-blue-300 text-blue-300">Create Movie</button>
        </div>
    </form>
</div>
@endsection
