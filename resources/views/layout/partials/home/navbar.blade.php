<nav class="py-5 lg:px-32 md:px-32 sm:px-32 z-1 relative h-[600px] text-white p-5" style="background-image: url('{{ asset('assets/img/cover.png') }}'); background-position: center;">
    <div class="absolute inset-0 bg-gradient-to-b from-black to-transparent opacity-80"></div>

    <div class="relative z-10 flex justify-between items-center">
        <div class="uppercase font-semibold text-2xl text-[#f47d22]">
            {{ config('app.name') }} 
        </div>
        <div class="hidden md:flex md:items-center">
            <ul class="flex text-sm uppercase">
                <li class="px-5">
                    <a href="#">
                        Home
                    </a>
                </li>
                <li class="px-5">
                    <a href="#">
                        Profile
                    </a>
                </li>
                <li class="px-5">
                    <a href="#">
                        Pengumuman
                    </a>
                </li>
                <li class="px-5">
                    <a href="#">
                        Tentang Kami
                    </a>
                </li>
                <li class="px-5">
                    <a href="#">
                        Hubungi Kami
                    </a>
                </li>
            </ul>
        </div>
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>  
        </div>
    </div>
</nav>

<div class="w-full mt-[520px] justify-center flex absolute inset-0 lg:px-32 md:px-32 sm:px-32 p-5">
    <div class="rounded-lg p-10 w-fit h-fit bg-white justify-center shadow-lg items-center grid lg:grid-cols-3 gap-10">
        <div class="px-10 flex items-center">
            <div class="bg-[#f8f1eb] rounded-full p-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-[#f47d22]">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                </svg>
            </div>
            <p class="ml-3">Visit Us</p>
        </div>
        <div class="px-10 flex items-center">
            <div class="bg-[#f8f1eb] rounded-full p-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-[#f47d22]">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                </svg>
            </div>
            <p class="ml-3">Students</p>
        </div>
        <div class="px-10 flex items-center">
            <div class="bg-[#f8f1eb] rounded-full p-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-[#f47d22]">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                </svg>
            </div>
            <p class="ml-3">Teachers</p>
        </div>
    </div>
</div>