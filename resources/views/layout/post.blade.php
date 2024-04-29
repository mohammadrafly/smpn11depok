@extends('layout.home')

@section('content')

<div class="text-right text-yellow-500 block p-5 container mx-auto py-32">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg mt-5 grid lg:grid-cols-12 md:grid-cols-1 sm:grid-cols-1 gap-4">
        <div class="col-span-9">
            @yield('post')
        </div>
        <div class="col-span-3">
            @include('layout.partials.home.sidebar')
        </div>
    </div>    
</div>

@endsection