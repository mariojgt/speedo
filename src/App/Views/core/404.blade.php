@extends('components.layout')

@section('content')
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content flex-col lg:flex-row-reverse">
            <img src="https://api.lorem.space/image/movie?w=260&h=400" class="max-w-sm rounded-lg shadow-2xl" />
            <div>
                <h1 class="text-5xl font-bold">404, page not found.</h1>
                <p class="py-6">Oh Dear!! 😭, enjoy this moment to watch this movie.</p>
                <a class="btn btn-primary" href="/speedo/index" >Home page</a>
            </div>
        </div>
    </div>
@endsection
