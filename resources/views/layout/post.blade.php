@extends('layout.home')

@section('content')

<div class="text-right text-yellow-500 block p-5">
    <div class="container mx-auto mt-5 grid lg:grid-cols-12 md:grid-cols-1 sm:grid-cols-1 gap-4">
        <div class="col-span-8">
            @yield('post')
        </div>
        <div class="col-span-4">
            @include('layout.partials.home.sidebar')
        </div>
    </div>    
</div>

@endsection