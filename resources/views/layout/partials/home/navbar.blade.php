<nav class="lg:px-32 md:px-32 sm:px-32 z-1 relative h-[300px] md:h-[600px] text-white p-5 bg-center bg-cover" style="background-image: url('{{ asset('storage/header/header.png') }}');">
    <div class="absolute inset-0 bg-gradient-to-b from-black to-transparent opacity-100">
        <div class="flex justify-center items-center h-full">
            @if ($data['title'] === 'Berita' or $data['title'] === 'Activity')
            @elseif ($data['title'] !== 'Home')
            <div class="block">
                <p class="text-5xl text-white font-bold mb-5">{{ $data['title'] }}</p>
                <div class="flex justify-center">
                    {{ Breadcrumbs::render() }}
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="relative z-10 items-center flex justify-between lg:grid lg:grid-cols-12 lg:gap-10">
        <div class="uppercase font-bold text-2xl text-[#f47d22] col-span-6 lg:col-span-2">
            <a href="{{ route('home') }}">
                {{ config('app.name') }} 
            </a>
        </div>
        <div class="col-span-6 lg:hidden" x-data="{ open: false }">
            <a href="#" x-on:click="open = ! open">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                </svg>  
            </a>
            <div class="absolute inset-0 md:px-32 " x-show="open" x-transition>
                <ul class="block text-sm mt-20 p-5 shadow-2xl bg-gray-700 rounded-2xl uppercase min-w-screen">
                    <li class="flex cursor-pointer justify-center items-center text-red-500 hover:bg-red-700 hover:text-white rounded-lg" x-on:click="open = ! open">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>  
                        </a>
                    </li>
                    <li class="py-5">
                        <a href="{{ route('home')}}">
                            Home
                        </a>
                    </li>
                    <li class="py-5" x-data="{ open: false }">
                        <a href="#" class="flex items-center" x-on:click="open = ! open">
                            Profile
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </a>
                        <ul x-show="open" x-transition class="text-sm bg-gray-500 shadow-md rounded-2xl mt-2 w-40">
                            <li>
                                <a href="{{ route('home.kepalasekolah')}}" class="block px-3 py-3 text-white hover:text-orange-500 hover:bg-white m-2 rounded-lg transition duration-300">
                                    Kepala Sekolah
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('home.guru')}}" class="block px-3 py-3 text-white hover:text-orange-500 hover:bg-white m-2 rounded-lg transition duration-300">
                                    Guru
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('home.tatatertib')}}" class="block px-3 py-3 text-white hover:text-orange-500 hover:bg-white m-2 rounded-lg transition duration-300">
                                    Tata Tertib
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('home.fasilitas')}}" class="block px-3 py-3 text-white hover:text-orange-500 hover:bg-white m-2 rounded-lg transition duration-300">
                                    Fasilitas
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('home.gallery')}}" class="block px-3 py-3 text-white hover:text-orange-500 hover:bg-white m-2 rounded-lg transition duration-300">
                                    Gallery
                                </a>
                            </li>
                        </ul>
                    </li>                                        
                    <li class="py-5">
                        <a href="{{ route('home.pengumuman')}}">
                            Pengumuman
                        </a>
                    </li>
                    <li class="py-5">
                        <a href="{{ route('home.tentangkami')}}">
                            Tentang Kami
                        </a>
                    </li>
                    <li class="py-5">
                        <a href="{{ route('home.hubungikami')}}" class="bg-orange-500 hover:bg-white hover:text-orange-500 font-semibold transition-colors duration-300 rounded-lg p-2">
                            Hubungi Kami
                        </a>
                    </li>
                </ul>
            </div>
        </div>        
        <div class="hidden lg:flex lg:items-center lg:col-span-8 lg:justify-center">
            <ul class="flex text-sm uppercase">
                <li class="px-5">
                    <a href="{{ route('home')}}">
                        Home
                    </a>
                </li>
                <li class="px-5 relative" x-data="{ open: false }">
                    <a href="#" class="flex items-center" @click="open = !open">
                        Profile
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                    <ul x-show="open" @click.away="open = false" class="absolute text-sm bg-[#9e9e9eaf] shadow-md rounded mt-2 w-40">
                        <li>
                            <a href="{{ route('home.kepalasekolah')}}" class="block px-3 py-3 text-white hover:text-[#f47d22] hover:bg-white m-2 rounded-lg transition duration-300">
                                Kepala Sekolah
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('home.guru')}}" class="block px-3 py-3 text-white hover:text-[#f47d22] hover:bg-white m-2 rounded-lg transition duration-300">
                                Guru
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('home.tatatertib')}}" class="block px-3 py-3 text-white hover:text-[#f47d22] hover:bg-white m-2 rounded-lg transition duration-300">
                                Tata Tertib
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('home.fasilitas')}}" class="block px-3 py-3 text-white hover:text-[#f47d22] hover:bg-white m-2 rounded-lg transition duration-300">
                                Fasilitas
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('home.gallery')}}" class="block px-3 py-3 text-white hover:text-[#f47d22] hover:bg-white m-2 rounded-lg transition duration-300">
                                Gallery
                            </a>
                        </li>
                    </ul>
                </li>                                        
                <li class="px-5">
                    <a href="{{ route('home.pengumuman')}}">
                        Pengumuman
                    </a>
                </li>
                <li class="px-5">
                    <a href="{{ route('home.tentangkami')}}">
                        Tentang Kami
                    </a>
                </li>
                <li class="px-5">
                    <a href="{{ route('home.hubungikami')}}" class="bg-[#f47d22] hover:bg-white hover:text-[#f47d22] font-semibold transition-colors duration-300 rounded-lg p-2">
                        Hubungi Kami
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-span-6 lg:col-span-2 lg:flex justify-end hidden">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>  
        </div>
    </div>
</nav>
