<footer class="py-32 bg-black bottom-0 lg:px-32 md:px-32 sm:px-32 p-5 text-white text-sm">
    <div class="block md:grid grid-cols-6 gap-10">
        <div class="col-span-4">
            <div class="mb-5">
                <h1 class="text-[#f47d22] text-2xl font-bold">{{ config('app.name')}}</h1>
            </div>
            <div class="mb-5">
                <p class="mb-5">
                    SMPN 11 Depok merupakan Sekolah Menengah Pertama Negeri yang terletak di Sukatani, Depok, Jawa Barat. </br>
                    Kami berusaha memberikan yang terbaik untuk seluruh anak didik kami supaya mereka bisa memberikan kontribusi untuk kemajuan bangsa dan negara ini.
                </p>
                <p>
                    © {{date('Y')}} {{ config('app.name') }}. All rights reserved.
                </p>
            </div>
            <div class="social-media-icons"></div>
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
                <p class="mt-2">
                    <a href="{{ route('home.tentangkami') }}" class="mt-2">Tentang Kami</a>
                </p>
                <p class="mt-2">
                    <a href="{{ route('home.hubungikami') }}" class="mt-2">Hubungi Kami</a>
                </p>
                <p class="mt-2">
                    <a href="{{ route('login') }}" class="mt-2">Login</a>
                </p>
            </div> 
        </div>
    </div>
</footer>