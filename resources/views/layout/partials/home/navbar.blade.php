<nav class="py-5 lg:px-32 md:px-32 sm:px-32 z-1 relative h-[600px] text-white p-5" style="background-image: url('{{ isset($data['content']) ? asset('storage/foto_artikel/'.$data['content']->img) : asset('assets/img/cover.png') }}'); background-position: center;">
    <div class="absolute inset-0 bg-gradient-to-b from-black to-transparent opacity-100">
        <div class="flex justify-center items-center h-full">
            @if ($data['title'] === 'Berita')
            @elseif ($data['title'] !== 'Home')
            <div class="block">
                <p class="text-4xl text-white font-bold">{{ $data['title'] }}</p>
                <div class="flex justify-center">
                    {{ Breadcrumbs::render() }}
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="relative z-10 items-center grid grid-cols-12 gap-10">
        <div class="uppercase font-semibold text-2xl text-[#f47d22] col-span-6 lg:col-span-2">
            {{ config('app.name') }} 
        </div>
        <div class="hidden md:flex md:items-center md:col-span-8 md:justify-center">
            <ul class="flex text-sm uppercase">
                <li class="px-5">
                    <a href="{{ route('home')}}">
                        Home
                    </a>
                </li>
                <li class="px-5">
                    <a href="{{ route('home.profile')}}">
                        Profile
                    </a>
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
                    <a href="{{ route('home.hubungikami')}}">
                        Hubungi Kami
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-span-6 lg:col-span-2 flex justify-end">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>  
        </div>
    </div>
</nav>