@extends ('layouts.master')

@section ('title', 'Cineflix | Home')

@section ('content')

        <div class="ml-auto w-1/3 mt-10">
            <h1 class="font-black text-5xl">
                The best way to <span class="text-red-400">discover</span> new movies.
            </h1>

            <div class="mt-20">
                <modal-button 
                    route="register"
                    class="transition-color px-4 py-3 shadow-md inline-block w-1/2 text-center my-4 bg-blue-700 hover:bg-blue-500 cursor-pointer"
                ><span class="font-semibold">Register</span></modal-button>
                <modal-button 
                    route="login"
                    class="transition-color px-4 py-3 shadow-md inline-block w-1/2 text-center my-4 bg-green-700 hover:bg-green-500 cursor-pointer"
                ><span class="font-semibold">Login</span></modal-button>
            </div>
        </div>

@endsection

@section ('img')
    <div class="h-screen w-screen object-cover absolute top-0 flex items-center" style="z-index: -2;">
        <div class="container mx-auto flex">
            <img src="{{ asset('images/landing.png') }}">
        </div>
    </div>
@endsection

@section ('modals')
    <login-modal></login-modal>
    <register-modal></register-modal>
@endsection
