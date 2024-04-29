@extends('layout.home')

@section('content')

<div class="container mx-auto py-8">
    <div class="lg:flex md:flex block max-w-6xl mx-auto bg-white p-6 rounded-lg">
        <div class="flex justify-center items-center lg:block md:block">
            <img class="min-w-[250px] h-[250px] rounded-lg shadow-lg" src="{{ asset('assets/img/kepsek.jpeg')}}" alt="">
        </div>        
        <div class="px-10">
            <div class="max-w-2xl mx-auto">
                <div class="bg-white p-8 rounded-lg">
                    <p class="text-lg font-semibold text-center mb-4">Kata Sambutan</p>
                    <p class="text-sm text-gray-600 mb-4">Assalamu’alaikum, Wr.Wb.</p>
                    <p class="mb-6">Puji dan syukur kami panjatkan kehadirat Allah SWT yang masih melimpahkan berbagai rahmat
                        dan nikmat-Nya, terutama nikmat umur, kesehatan serta nikmat kesempatan sehingga kita dapat menjalankan
                        aktifitas kita sehari-hari, khususnya bagi UPTD SMPN 11 Depok yang masih dapat beraktifitas memajukan
                        peserta didik untuk mencapai tujuan yang diinginkan.</p>
                    <p class="mb-6">Dunia pendidikan mempunyai tanggung jawab yang besar, terutama dalam menyiapkan sumber daya
                        manusia yang tangguh sehingga mampu hidup selaras didalam Kehidupan ini. Pendidikan merupakan investasi
                        jangka panjang yang hasilnya tidak dapat dilihat dan dirasakan secara instan, sehingga sekolah sebagai
                        ujung tombak dilapangan harus memiliki arah pengembangan jangka panjang dengan tahapan pencapaiannya
                        yang jelas dan tetap mengakomodir tuntutan permasalahan faktual yang ada di masyarakat.</p>
                    <p class="mb-6">UPTD SMPN 11 Depok terus berupaya untuk meningkatkan pelayanan informasi terhadap seluruh
                        komponen sekolah baik itu pendidik, siswa, maupun masyarakat. Salah satu upaya yang dilakukan sekolah
                        yaitu memilikinya jaringan Internet dan Website dengan tujuan:</p>
                    <ul class="list-disc pl-8 mb-6">
                        <li>Terjadinya interaktif eksternal sekolah dengan dunia luar.</li>
                        <li>Pemanfaatan teknologi dan informasi yang semakin cepat untuk peningkatan pembelajaran.</li>
                        <li>Mempercepat penyampaian informasi, saran, masukan tanpa harus bertatap muka diantara warga sekolah
                            dan dunia luar.</li>
                    </ul>
                    <p class="mb-6">Akhirnya kami berharap dengan adanya website ini diharapkan agar warga sekolah dapat
                        mengambil manfaat sebesar-besarnya demi memajukan sekolah dan peningkatan mutu pendidikan.</p>
                    <p class="mb-6">Selamat bergabung di Website UPTD SMPN 11 Depok, kritik dan saran yang membangun sangat
                        kami harapkan.</p>
                    <p class="text-sm text-gray-600 text-right">Wassalamu’alaikum, Wr.Wb.</p>
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