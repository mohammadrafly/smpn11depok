@extends('layout.home')

@section('content')

<div class="w-full mt-[520px] justify-center flex absolute inset-0 lg:px-32 md:px-32 sm:px-32 p-5">
    <div class="rounded-lg p-10 w-fit h-fit bg-white justify-center shadow-lg items-center grid lg:grid-cols-3 gap-10">
        <a href="#" class="px-10 flex items-center">
            <div class="bg-[#f8f1eb] rounded-full p-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-[#f47d22]">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                </svg>
            </div>
            <p class="ml-3">Visit Us</p>
        </a>
        <a href="#" class="px-10 flex items-center">
            <div class="bg-[#f8f1eb] rounded-full p-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-[#f47d22]">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                </svg>
            </div>
            <p class="ml-3">Students</p>
        </a>
        <a href="#" class="px-10 flex items-center">
            <div class="bg-[#f8f1eb] rounded-full p-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-[#f47d22]">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                </svg>
            </div>
            <p class="ml-3">Teachers</p>
        </a>
    </div>
</div>

<div class="lg:px-32 md:px-32 sm:px-32 mt-[300px]">
    <div class="flex justify-center items-center mt-20">
        <h1 class="text-2xl font-semibold">Berita Terbaru</h1>
    </div>
    
    <div class="text-right text-yellow-500 block p-5">
        <a href="#">See all</a>
        <div class="container mx-auto mt-5">
            <div class="splide">
                <div class="splide__track">
                    <ul class="splide__list gap-4">
                        @foreach ($data['berita'] as $berita)
                        <li class="splide__slide">
                            <a href="{{ route('artikel.single', $berita->id) }}">
                                <div class="max-w-full rounded-lg overflow-hidden shadow-lg relative">
                                    <img class="w-[4000px] h-[300px] object-cover"
                                        src="{{ $berita->img ? asset('storage/foto_artikel/'.$berita->img) : 'https://via.placeholder.com/200x300'}} "
                                        alt="{{ $berita->title ? $berita->title . ' - News Article' : 'Placeholder Image' }}">
                                    <div class="absolute left-0 right-0 bottom-0 h-16"
                                        style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.7) 100%);">
                                    </div>
                                    <div class="absolute left-5 right-5 bottom-5 flex justify-center">
                                        <p class="text-white text-base font-semibold text-left">{{ $berita->title }}</p>
                                    </div>
                                    <style scoped>
                                        .splide__slide img {
                                            background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.7) 100%);
                                        }
                                    </style>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>    
    </div>
    
    <div class="flex justify-center items-center mt-10">
        <h1 class="text-2xl font-semibold">Kegiatan</h1>
    </div>
    
    <div class="text-right text-yellow-500 block p-5">
        <a href="#">See all</a>
        <div class="container mx-auto mt-5">
            <div class="grid lg:grid-cols-3 md:grid-cols-1 sm:grid-cols-1 gap-4">
                @for ($j = 0; $j < 6; $j++)
                <div class="max-w-full rounded-lg overflow-hidden shadow-lg relative">
                    <img class="w-full" src="https://via.placeholder.com/250x250" alt="Post {{$j + 1}}">
                    <div class="absolute left-5 right-5 bottom-5 flex flex-col justify-center">
                        <p class="text-gray-700 text-base font-semibold text-left">Title: Lorem Ipsum</p>
                        <p class="text-gray-700 text-base font-semibold text-left">Time: {{$j}}:00 PM</p>
                        <p class="text-gray-700 text-base font-semibold text-left">Students: {{$j * 10}}</p>
                    </div>
                </div>                        
                @endfor
            </div>
        </div>    
    </div>
</div>

<div class="bg-gradient-to-r from-gray-100 to-[#f1bd95] mb-[200px] lg:px-32 md:px-32 sm:px-32 mt-20">
    <div class="block w-full h-fit py-10">
        <div class="flex justify-center items-center">
            <h1 class="text-2xl text-white font-semibold">Video</h1>
        </div>
        <div class="iframe-container mt-5">
            @if ($data['video'])
            <iframe class="w-full h-[500px] rounded-lg" src="{{$data['video']->title}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            @else
            <img class="w-full h-[500px] rounded-lg" src="https://via.placeholder.com/750x500" alt="Post 3">
            @endif
        </div>
    </div>
</div>

<div class="lg:px-32 md:px-32 sm:px-32 mt-10 mb-32 p-5">
    <div class="block w-full h-fit">
        <div class="flex justify-center items-center mb-10">
            <h1 class="text-2xl text-black font-semibold">Review</h1>
        </div>
        <div class="block md:grid grid-cols-6 gap-5">
            <div class="col-span-2">
                <div class="mb-5">
                    <h1 class="text-4xl font-bold">
                        What Our </br>
                        <span class="text-[#f47d22] underline">Students</span> Say</br>
                        About Us
                    </h1>
                </div>
                <div class="mb-5">
                    <div class="flex items-center gap-10 text-[#f47d22]">
                        <button id="leftButton" class="rounded-full border p-3 border-[#f47d22]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                            </svg>  
                        </button>
                        <button id="rightButton" class="rounded-full border p-3 border-[#f47d22]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>                              
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-span-4">
                <div id="carousel" class="relative isolate overflow-hidden bg-white px-6 lg:flex grid grid-cols-4 gap-5">
                    @foreach ($data['review'] as $review)
                    <div class="mx-auto max-w-xl col-span-2">
                        <figure>
                            <figcaption class="flex items-center">
                                <img class="h-20 w-20 mr-5 object-cover rounded-full" src="{{ $review->foto ? asset('storage/foto_reviewer/'.$review->foto) : 'https://via.placeholder.com/50x50'}}" alt="">
                                <div class="items-center justify-center text-base">
                                    <div class="font-bold text-gray-900">{{ $review->nama }}</div>
                                    <div class="text-[#f47d22] font-semibold">{{ $review->angkatan}}</div>
                                </div>
                            </figcaption>
                            <blockquote class="font-base leading-9 text-gray-900 text-base mt-5">
                                <p>{!! $review->reviews !!}</p>
                            </blockquote>
                        </figure>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection 

@section('script')
<script>
const leftButton = document.getElementById('leftButton');
const rightButton = document.getElementById('rightButton');
const carousel = document.getElementById('carousel');
const items = carousel.querySelectorAll('.col-span-2');

let currentIndex = 0;

function showItems() {
    items.forEach((item, index) => {
        if (index >= currentIndex && index < currentIndex + 2) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });

    // Add animation class to the carousel
    carousel.classList.add('animate-slide');
    // Remove animation class after a short delay to prevent animation on next slide
    setTimeout(() => {
        carousel.classList.remove('animate-slide');
    }, 500); // Adjust according to the transition duration
}

leftButton.addEventListener('click', () => {
    currentIndex = (currentIndex - 2 + items.length) % items.length;
    showItems();
});

rightButton.addEventListener('click', () => {
    currentIndex = (currentIndex + 2) % items.length;
    showItems();
});

showItems();

</script>
@endsection