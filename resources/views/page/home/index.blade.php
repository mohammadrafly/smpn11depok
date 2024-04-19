@extends('layout.home')

@section('content')

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
                        @for ($i = 0; $i < 10; $i++)
                        <li class="splide__slide">
                            <div class="max-w-full rounded-lg overflow-hidden shadow-lg relative">
                                <img class="w-full" src="https://via.placeholder.com/200x300" alt="Post 3">
                                <div class="absolute left-5 right-5 bottom-5 flex justify-center">
                                    <p class="text-gray-700 text-base font-semibold text-left">et fermentum ipsum placerat.</p>
                                </div>
                            </div>                        
                        </li>
                        @endfor
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
        <div class="grid grid-cols-6 gap-5">
            <div class="col-span-2">
                <div class="mb-5">
                    <h1 class="text-4xl font-bold">
                        What Our </br>
                        <span class="text-[#f47d22] underline">Students</span> Say</br>
                        About Us
                    </h1>
                </div>
                <div class="mb-5">
                    <div class="flex items-center gap-10">
                        <button id="leftButton">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                            </svg>  
                        </button>
                        <button id="rightButton">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>                              
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-span-4">
                <div id="carousel" class="relative isolate overflow-hidden bg-white px-6 lg:flex grid grid-cols-4 gap-5">
                    <div class="mx-auto max-w-xl col-span-2">
                        <figure>
                            <figcaption class="flex items-center">
                                <img class="h-20 w-20 mr-5 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                <div class="items-center justify-center text-base">
                                    <div class="font-bold text-gray-900">Judith Black 1</div>
                                    <div class="text-[#f47d22] font-semibold">CEO of Workcation</div>
                                </div>
                            </figcaption>
                            <blockquote class="font-base leading-9 text-gray-900 text-base mt-5">
                                <p>“Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo expedita voluptas culpa sapiente alias molestiae. Numquam corrupti in laborum sed rerum et corporis.”</p>
                            </blockquote>
                        </figure>
                    </div>
                    <div class="mx-auto max-w-xl col-span-2">
                        <figure>
                            <figcaption class="flex items-center">
                                <img class="h-20 w-20 mr-5 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                <div class="items-center justify-center text-base">
                                    <div class="font-bold text-gray-900">Judith Black 2</div>
                                    <div class="text-[#f47d22] font-semibold">CEO of Workcation</div>
                                </div>
                            </figcaption>
                            <blockquote class="font-base leading-9 text-gray-900 text-base mt-5">
                                <p>“Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo expedita voluptas culpa sapiente alias molestiae. Numquam corrupti in laborum sed rerum et corporis.”</p>
                            </blockquote>
                        </figure>
                    </div>
                    <div class="mx-auto max-w-xl col-span-2">
                        <figure>
                            <figcaption class="flex items-center">
                                <img class="h-20 w-20 mr-5 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                <div class="items-center justify-center text-base">
                                    <div class="font-bold text-gray-900">Judith Black 3</div>
                                    <div class="text-[#f47d22] font-semibold">CEO of Workcation</div>
                                </div>
                            </figcaption>
                            <blockquote class="font-base leading-9 text-gray-900 text-base mt-5">
                                <p>“Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo expedita voluptas culpa sapiente alias molestiae. Numquam corrupti in laborum sed rerum et corporis.”</p>
                            </blockquote>
                        </figure>
                    </div>
                    <div class="mx-auto max-w-xl col-span-2">
                        <figure>
                            <figcaption class="flex items-center">
                                <img class="h-20 w-20 mr-5 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                <div class="items-center justify-center text-base">
                                    <div class="font-bold text-gray-900">Judith Black 4</div>
                                    <div class="text-[#f47d22] font-semibold">CEO of Workcation</div>
                                </div>
                            </figcaption>
                            <blockquote class="font-base leading-9 text-gray-900 text-base mt-5">
                                <p>“Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo expedita voluptas culpa sapiente alias molestiae. Numquam corrupti in laborum sed rerum et corporis.”</p>
                            </blockquote>
                        </figure>
                    </div>
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
            if (index >= currentIndex && index < currentIndex + 1) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }

    leftButton.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + items.length) % items.length;
        showItems();
    });

    rightButton.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % items.length;
        showItems();
    });

    showItems();
</script>
@endsection