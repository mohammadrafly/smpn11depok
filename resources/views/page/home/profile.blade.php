@extends('layout.home')

@section('content')

<div class="lg:px-32 py-20">
    <div class="lg:flex md:flex block">
        <div class="flex justify-center items-center lg:block md:block">
            <img class="min-w-[250px] h-[250px] rounded-lg shadow-lg" src="{{ asset('assets/img/kepsek.jpeg')}}" alt="">
        </div>        
        <div class="px-10">
            {!! $data['content']->content !!}
        </div>
    </div>
</div>

@endsection 

@section('script')
<script>

</script>
@endsection