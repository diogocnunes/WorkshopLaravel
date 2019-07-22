@extends ('layouts.master')

@section ('title', 'Cineflix | New Director')

@section ('content')
<div class="w-3/5 mx-auto">
    <div class="border-b-2 border-gray-700 ">
        <h1 class="text-3xl font-bold text-gray-700 uppercase">New Director</h1>
    </div>

    <form action="/directors" method="POST">
        @csrf

        <div class="flex flex-col mt-8">
            <label for="name" class="text-sm font-semibold tracking-wide text-gray-500">Name</label>
            <input type="text" name="name" class="text-black px-4 py-2 mt-3 rounded-sm {{ $errors->has('name') ? 'border-red-400' : '' }}" value="{{ old('name')}}">

            @if($errors->has('name'))
                <p class="text-red-400 mt-2">{{ $errors->first('name') }}</p>
            @endif
        </div>

        <div class="flex flex-col mt-8">
            <label for="birthdate" class="text-sm font-semibold tracking-wide text-gray-500">Name</label>
            <input type="date" name="birthdate" class="text-black px-4 py-2 mt-3 rounded-sm {{ $errors->has('birthdate') ? 'border-red-400' : '' }}" value="{{ old('birthdate')}}">

            @if($errors->has('birthdate'))
                <p class="text-red-400 mt-2">{{ $errors->first('birthdate') }}</p>
            @endif
        </div>

        <div class=" mt-8">
            <button type="submit" class="border-2 py-2 px-4 rounded border-blue-300 text-blue-300">Create Director</button>
        </div>
    </form>
</div>
@endsection 
