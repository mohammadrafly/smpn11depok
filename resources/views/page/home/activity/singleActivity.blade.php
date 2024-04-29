@extends('layout.post')

@section('post')

<div class="text-left">
    <img class="w-full h-[500px] rounded-lg" src="{{ isset($data['content']->img) ? asset('storage/foto_kegiatan/'.$data['content']->img) : 'https://via.placeholder.com/750x500' }}" alt="">
    <h1 class="text-5xl font-bold py-5">{{ $data['content']->title }}</h1>
    <p class="flex items-center text-gray-400 py-5">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 mr-1 font-bold">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
        </svg>  
        <span class="uppercase mr-5">{{ $data['content']->created_at->format('d M') }}</span>
    </p>
    
    <p>{!! $data['content']->content !!}</p>
</div>

@endsection 

@section('script')
<script>

</script>
@endsection