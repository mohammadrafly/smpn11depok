@extends('layout.home')

@section('content')

<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold text-center mb-8">Selamat Datang di Nama Sekolah</h1>
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg">

        <h2 class="text-2xl font-bold mb-4">Visi Kami</h2>
        <p class="mb-6">Unggul dalam prestasi, berkarakter menguasai ilmu pengetahuan, teknologi berdasarkan Iman dan Taqwa serta Berbudaya Lingkungan.</p>

        <h2 class="text-2xl font-bold mb-4">Misi Kami</h2>
        <ul class="list-disc list-inside mb-6">
            <li>Meningkatkan Keunggulan sekolah dalam bidang akademik dan non akademik</li>
            <li>Meningkatkan prestasi melalui proses belajar mengajar yang aktif, kreatif, efektif dan menyenangkan, gembira, dan berbobot</li>
            <li>Meningkatkan prestasi di bidang olahraga</li>
            <li>Membudayakan karakter sikap dan sosial</li>
            <li>Mewujudkan sekolah sehat dan ramah anak</li>
            <li>Meningkatkan kedisiplinan warga sekolah</li>
            <li>Mewujudkan kerjasama yang harmonis antar warga sekolah dan masyarakat</li>
            <li>Mewujudkan Sekolah Berbudaya Lingkungan (SBL)</li>
            <li>Mewujudkan sekolah berbudaya protokol kesehatan</li>
            <li>Menciptakan sekolah yang peduli lingkungan melalui 3R, drainase, dan MCK sehat.</li>
        </ul>

        <h2 class="text-2xl font-bold mb-4">Sejarah</h2>
        <p class="mb-6">Sekolah ini diresmikan pada tanggal 16 Januari 1993 dengan nama SMP Negeri 3 Cimanggis, sebelumnya sekolah ini menginduk pada SMP Negeri 2 Cimanggis yang kemudian berubah nama menjadi UPTD SMP Negeri 8 Depok. Dan Pada tahun 2001 hingga sekarang, sekolah ini dikenal dengan nama UPTD SMP Negeri 11 Depok. Inilah Kepala Sekolah Kami :</p>
        <ul class="list-decimal list-inside mb-6">
            <li>Masa Bakti 1992 – 1993, H. Moch Yamin, BA</li>
            <li>Masa Bakti 1993 – 1994, Drs. H. Dimyati Supriatna</li>
            <li>Masa Bakti 1994 - 1998, Dra. Hj. Siti Rachmawati, MM</li>
            <li>Masa Bakti 1998 – 2001, Dra. Hj. Wiwik Wuryani, MM</li>
            <li>Masa Bakti 2001 – 2005, Turni Swastiati, M.Pd</li>
            <li>Masa Bakti 2005 – 2009, Drs. Mulyadi, MM</li>
            <li>Masa Bakti 2009 – 2014, Dermo Prihatno, M.Pd</li>
            <li>Masa Bakti 2014 – 2015, Iskandar Salech, MM</li>
            <li>Masa Bakti 2015 – 2017, Lia Nurlia, S.Pd., MM</li>
            <li>Masa Bakti 2017 – 2019, Drs. Salim Bangun, MM</li>
            <li>Masa Bakti 2019 - 2021, Gesit Inderbuana, S.Pd</li>
            <li>Masa Bakti 2021 - 2023, Drs. Hudaya, M.Pd.</li>
            <li>Masa Bakti 2023 - Sekarang, Drs. R. Purnomo Dono Ismawan, M.M.</li>
        </ul>

        <div class="bg-gray-50 rounded-2xl w-auto h-auto p-20 mt-10">
            <div class="grid grid-cols-12 gap-10">
                <div class="col-span-4">
                    <h1 class="font-semibold text-gray-600 mb-5">OUR HOTLINES SERVICE</h1>
                    <div class="text-gray-500">
                        <p>www.smpn11-depok.sch.id</p>
                        <a href="tel:0218740148" class="text-sky-400 font-medium">(021) 8740148</a>
                        <p>Senin - Jumat, 7:00 - 15:00</p>
                    </div>
                </div>
                <div class="col-span-4">
                    <h1 class="font-semibold text-gray-600 mb-5">TEMUKAN KAMI!</h1>
                    <p>
                        Depok, Jawa Barat </br>
                        Komplek Sukatani Permai, Jl. Murbai, Sukatani, Kec. Tapos, Kota Depok, Jawa Barat 16454
                    </p>
                </div>
                <div class="col-span-4">
                    <h1 class="font-semibold text-gray-600 mb-5">BEKERJA DENGAN KAMI</h1>
                    <p>
                        Send us your C.V to our email: </br>
                        <a href="mailto:sebelas@smpn11-depok.sch.id" class="text-sky-400 font-medium">sebelas@smpn11-depok.sch.id</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-10">
            <h1 class="text-4xl text-center py-10 font-semibold text-gray-600">Lokasi Kami</h1>
            <div class="flex justify-center items-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1667.0713720067292!2d106.8819593307637!3d-6.395769959191932!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69eb6bf443ec2f%3A0x82ee0aa5437a53a7!2sSMP%20Negeri%2011%20Depok!5e0!3m2!1sid!2sid!4v1714346932023!5m2!1sid!2sid" class="w-full h-[500px] rounded-lg" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>

@endsection 

@section('script')
<script>

</script>
@endsection