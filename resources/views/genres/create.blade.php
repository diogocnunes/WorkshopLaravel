@extends ('layouts.master')

@section ('title', 'Genres')

@section ('content')
<div class="w-3/5 mx-auto">
    <div class="border-b-2 border-gray-700 ">
        <h1 class="text-3xl font-bold text-gray-700 uppercase">New Genre</h1>
    </div>

    <form action="/genres" method="POST" class="my-16">
        @csrf

        <div class="flex flex-col mt-8">
            <label for="name" class="text-sm font-semibold tracking-wide text-gray-500">Name</label>
            <input type="text" name="name" class="text-black px-4 py-2 mt-3 rounded-sm {{ $errors->has('name') ? 'border-red-400' : '' }}" value="{{ old('name')}}">

            @if($errors->has('name'))
                <p class="text-red-400 mt-2">{{ $errors->first('name') }}</p>
            @endif
        </div>

        <div class=" mt-8">
            <button type="submit" class="border-2 py-2 px-4 rounded border-blue-300 text-blue-300">Create Genre</button>
        </div>
    </form>
</div>
@endsection
