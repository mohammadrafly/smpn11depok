@extends('layout.home')

@section('content')

<div class="lg:px-32 md:px-32 sm:px-32 py-32">
    <div class="flex justify-center items-center mt-20">
        <h1 class="text-3xl font-semibold">Our Teacher</h1>
    </div>
    
    <div class="text-right text-white block p-5">
        <div class="container mx-auto mt-5">
            <div class="splide">
                <div class="splide__track">
                    <ul class="splide__list gap-4">
                        @foreach ($data['content'] as $content)
                        <li class="splide__slide hover:text-yellow-500">
                            <div class="rounded-lg overflow-hidden shadow-lg transition-all duration-200">
                                <img class="min-w-[250px] h-[400px] hover:opacity-50 transition-all duration-200"
                                    src="{{ $content->img ? asset('storage/foto_guru/'.$content->img) : 'https://via.placeholder.com/200x300'}} "
                                    alt="{{ $content->nama ? $content->nama . '' : 'Placeholder Image' }}">
                                <div class="left-5 right-5 bottom-5 flex justify-center bg-gray-700 p-5">
                                    <div class="block text-center">
                                        <p class="text-2xl font-semibold">{{ $content->nama }}</p>
                                        <p class="text-1xl font-base">{{ $content->mata_pelajaran }}</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>    
    </div>
</div>

@endsection 

@section('script')
<script>

</script>
@endsection