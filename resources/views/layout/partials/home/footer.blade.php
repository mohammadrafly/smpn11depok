<footer class="bg-black bottom-0 lg:px-32 md:px-32 sm:px-32 p-5 py-20 text-white text-sm">
    <div class="block md:grid grid-cols-6 gap-10">
        <div class="col-span-4">
            <div class="mb-5">
                <h1 class="text-[#f47d22] text-2xl font-bold">{{ config('app.name')}}</h1>
            </div>
            <div class="mb-5">
                <p>
                    © {{date('Y')}} {{ config('app.name') }}. All rights reserved.
                </p>
            </div>
            <div>
                <a href="#" class="text-white hover:text-gray-400">
                    <i class="w-5 h-5 fab fa-facebook-square"></i>
                </a>
                <a href="#" class="text-white hover:text-gray-400 ml-3">
                    <i class="w-5 h-5 fab fa-twitter-square"></i>
                </a>
                <a href="#" class="text-white hover:text-gray-400 ml-3">
                    <i class="w-5 h-5 fab fa-instagram-square"></i>
                </a>
                <a href="#" class="text-white hover:text-gray-400 ml-3">
                    <i class="w-5 h-5 fab fa-linkedin"></i>
                </a>
            </div>
        </div>
        <div class="col-span-1">
            <div>
                <h1 class="font-bold">Address:</h1>
                <p>
                    Jl. Murbai, Sukatani, Kec. Tapos, Kota Depok, Jawa Barat 16454
                </p>
            </div>
            <div class="mt-5">
                <h1 class="font-bold">Phone:</h1>
                <p>
                    (021) 8740148
                </p>
            </div>
            <div class="mt-5">
                <h1 class="font-bold">Email:</h1>
                <p>
                    sebelas@smpn11-depok.sch.id
                </p>
            </div>
        </div>
        <div class="col-span-1">
            <div>
                <h1 class="font-bold">Lainnya</h1>
                <p class="mt-5">Profil</p>
                <p class="mt-2">Tentang Kami</p>
                <p class="mt-2">Hubungi Kami</p>
            </div>
        </div>
    </div>
</footer>
