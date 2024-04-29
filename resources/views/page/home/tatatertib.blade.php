@extends('layout.home')

@section('content')

<div class="container mx-auto py-8">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg">
        <div class="bg-gray-100 rounded-lg p-5 my-10 shadow-2xl">
            <h2 class="text-2xl font-bold mb-4">I. Waktu Masuk Kelas</h2>
            <ul class="list-decimal ml-10">
                <li>
                    Kegiatan belajar mengajar dilaksanakan 5 hari. </br>
                    <span>Senin - Kamis	: Pukul 07:00 s.d. 14:10</span> </br>
                    <span>Jumat	        : Pukul 07:00 s.d. 11:30</span> 
                </li>
                <li>
                    Petugas piket kebersihan kelas, di laksanakan setelah selesai KBM.
                </li>
            </ul>
        </div>
        <div class="bg-gray-100 rounded-lg p-5 my-10 shadow-2xl">
            <h2 class="text-2xl font-bold mb-4">II. Waktu Belajar</h2>
            <ul class="list-decimal ml-10">
                <li>
                    Sebelum pelajaran dimulai dan pada akhir pelajaran, peserta didik berdoa sesuai dengan agamanya masing - masing
                </li>
                <li>
                    Siswa wajib mengikuti pelajaran dengan tertib
                </li>
                <li>
                    Jika pelajaran sudah berlangsung selama 5 ( lima ) menit guru yang bersangkutan belum hadir, maka ketua kelas wajib menghubungi guru piket.
                </li>
                <li>
                    Selama pelajaran berlangsung siswa dilarang makan di ruang kelas.
                </li>
                <li>
                    Bila akan keluar kelas wajib ijin sama guru / guru piket
                </li>
            </ul>
        </div>
        <div class="bg-gray-100 rounded-lg p-5 my-10 shadow-2xl">
            <h2 class="text-2xl font-bold mb-4">III. Waktu Istirahat</h2>
            <ul class="list-decimal ml-10">
                <li>
                    Siswa dilarang berada didalam kelas selama istirahat 
                </li>
                <li>
                    Dilarang keluar dari lingkungan sekolah tanpa izin dari guru piket
                </li>
                <li>
                    Siswa dilarang membuang /menyimpan sampah dilaci meja
                </li>
                <li>
                    Siswa membuang sampah/bungkus makanan ditempat sampah yang disediakan
                </li>
                <li>
                    Siswa dilarang main bola didalam dan diteras kelas
                </li>
            </ul>
        </div>
        <div class="bg-gray-100 rounded-lg p-5 my-10 shadow-2xl">
            <h2 class="text-2xl text-center font-bold mb-4">IV. Edukatif</h2>
            <h2 class="text-2xl font-bold mb-4 mt-5">Disekolah:</h2>
            <ul class="list-decimal ml-10">
                <li>
                    Siswa wajib mengikuti pelajaran dari awal sampai akhir jam pelajaran
                </li>
                <li>
                    Siswa harus memperhatikan, memahami dan mempraktekkan hasil pendidikan yang diberikan oleh guru
                </li>
                <li>
                    Siswa harus membuat catatan yang benar, rapi dan bersih
                </li>
            </ul>
            <h2 class="text-2xl font-bold mb-4 mt-5">Dirumah:</h2>
            <ul class="list-decimal ml-10">
                <li>
                    Siswa harus membiasakan diri mengerjakan tugas / pekerjaan rumah di rumah. ( Tidak boleh mengerjakan PR di sekolah ).
                </li>
                <li>
                    Siswa harus selalu mengulang pelajaran yang telah diterima sebelumnya di rumah
                </li>
                <li>
                    Siswa harus selalu mempelajari lebih dahulu pelajaran yang akan diberikan pada esok harinya
                </li>
            </ul>
        </div>
        <div class="bg-gray-100 rounded-lg p-5 my-10 shadow-2xl">
            <h2 class="text-2xl font-bold mb-4">V. Siswa yang terlambat, absen dan meninggalkan sekolah</h2>
            <ul class="list-decimal ml-10">
                <li>
                    Siswa yang terlambat datang, diperbolehkan mengikuti pelajaran setelah mendapat izin dari guru piket dan guru yang mengajar di kelas
                </li>
                <li>
                    Siswa yang berhalangan masuk sekolah, orang tua / wali murid wajib mengirimkan surat dan apabila sakit lebih dari 2 (dua) hari berturut – turut, wajib mengirimkan surat keterangan dokter ke sekolah
                </li>
                <li>
                    Siswa yang akan meninggalkan sekolah sebelum pelajaran selesai harus seizin guru Piket / Wali kelas
                </li>
            </ul>
        </div>
        <div class="bg-gray-100 rounded-lg p-5 my-10 shadow-2xl">
            <h2 class="text-2xl font-bold mb-4">VI. Perlengkapan, kebersihan dan keindahan sekolah</h2>
            <ul class="list-decimal ml-10">
                <li>
                    Siswa harus membawa / melengkapi perlengkapan belajar / sekolah (wajib membawa tas sekolah)
                </li>
                <li>
                    Siswa dilarang meninggalkan buku paket , buku pelajaran dan peralatan pribadi di dalam kelas
                </li>
                <li>
                    Setiap siswa harus merasa memiliki, menjaga perlengkapan sekolah maupun kelasnya masing – masing
                </li>
                <li>
                    Setiap siswa wajib memelihara dan menjaga kebersihan, ketertiban, keindahan, keamanan serta kekeluargaan
                </li>
                <li>
                    Siswa dilarang membuang sampah sembarangan dan dilarang memetik / mematahkan tanaman.
                </li>
                <li>
                    Siswa dilarang corat-coret fasilitas sekolah dan lingkungan sekolah
                </li>
            </ul>
        </div>
        <div class="bg-gray-100 rounded-lg p-5 my-10 shadow-2xl">
            <h2 class="text-2xl font-bold mb-4">VII. Pakaian, sepatu, rambut dan perhiasan</h2>
            <ul class="list-decimal ml-10">
                <li>
                    Siswa wajib berpakaian seragam sekolah sesuai dengan Surat Keputusan Ditjen Dikdasmen Nomor : 100 / C / Kep / D / 1991 dan ketentuan yang berlaku di SMP Negeri 11 Depok: </br>
                    Senin dan Selasa	: Putih - Biru, kaos kaki putih polos, sepatu ( sebentuk warrior )</br>
                    Rabu	: Pramuka - kaos kaki hitam tunas kelapa, sepatu ( sebentuk warrior )</br>
                    Kamis	: Batik - biru, kaos kaki putih polos, sepatu ( sebentuk warrior )</br>
                    Jumat	: Seragam hari jumat, kaos kaki putih polos, sepatu ( sebentuk warrior ).</br>
                    *Catatan : Model celana untuk siswa laki-laki tidak boleh diubah (harus sesuai dengan standar sekolah)</br>
                    *Siswi yang berhijab menggunakan bergo dan dalaman kerudung dengan nama yang dijahit sebelah kanan, warna kerudung putih (senin,selasa,kamis,jumat) dan warna coklat (rabu)</br>
                </li>
                <li>
                    Tidak dibenarkan memakai sandal ke sekolah tanpa alasan yang kuat.
                </li>
                <li>
                    Apabila ada mata pelajaran Olahraga,memakai seragam Olah raga setelah di Sekolah dan hanya dibenarkan berseragam pakaian Olah raga UPTD SMP Negeri 11 Depok dan bersepatu warior. ( Tidak diperkenankan memakai seragam Olah raga dari rumah ).
                </li>
                <li>
                    Setiap siswa yang mengikuti Ekstrakurikuler atau pelajaran tambahan harus berpakaian seragam sekolah atau seragam ekstrakurikuler dan bersepatu
                </li>
                <li>
                    Model rambut siswa putra harus model 2-1, tidak boleh dicat, gundul plontos, atau dimodel, berkumis, bercambang, berjenggot ( brewok ) dan siswa putri yang rambutnya melebihi bahu harus diikat dan dijalin rapi
                </li>
                <li>
                    Siswa dilarang berkuku panjang, bersolek dan memakai perhiasan yang berlebihan
                </li>
                <li>
                    Siswa dilarang memakai atribut selain SMPN 11 Depok
                </li>
            </ul>
        </div>
        <div class="bg-gray-100 rounded-lg p-5 my-10 shadow-2xl">
            <h2 class="text-2xl font-bold mb-4">VIII. Ketertiban, keamanan dan Siswa dilarang:</h2>
            <ul class="list-decimal ml-10">
                <li>
                    Membawa/mengajak orang lain ke dalam kelas atau lingkungan sekolah
                </li>
                <li>
                    Menerima tamu tanpa seizin guru piket atau Kepala Sekolah
                </li>
                <li>
                    Membawa rokok / merokok, membawa / meminum minuman keras / membawa / menggunakan NARKOBA
                </li>
                <li>
                    Membawa senjata api, senjata tajam, buku / gambar porno dan benda-benda lain yang mengganggu konsentrasi belajar
                </li>
                <li>
                    Tidak Boleh membentuk Komunitas yang tidak sesuai dengan peraturan sekolah (genk)
                </li>
                <li>
                    Membawa barang berharga apapun seperti : Handphone dan lain – lain. </br>
                    *Catatan : Bila terbukti membawa akan diberikan sanksi oleh Sekolah (ditahan selama 3 bulan)
                </li>
                <li>
                    Membawa Motor ke Sekolah </br>
                    *Catatan : Bila terbukti, motor ditahan di Sekolah
                </li>
            </ul>
        </div>
        <div class="bg-gray-100 rounded-lg p-5 my-10 shadow-2xl">
            <h2 class="text-2xl font-bold mb-4">IX. Upacara, sopan santun dan lain – lain</h2>
            <ul class="list-decimal ml-10">
                <li>
                    Siswa wajib mengikuti upacara sekolah, maupun upacara-upacara hari besar Nasional dengan tertib dan hikmat
                </li>
                <li>
                    Siswa wajib bersikap sopan, hormat dan jujur kepada orang tua, guru, staf Tata Usaha dan seluruh pegawai, juga kepada tamu dan teman
                </li>
                <li>
                    Siswa wajib menjaga nama baik diri sendiri, keluarga dan sekolah
                </li>
                <li>
                    Dilarang membawa kendaraan bermotor sendiri, ke sekolah atau naik mobil bak, untuk menjaga keselamatan
                </li>
                <li>
                    Dilarang minta Les (kursus) khusus dari guru UPTD SMPN 11 Depok tanpa izin Kepala Sekolah
                </li>
                <li>
                    Siswa dilarang menikah
                </li>
                <li>
                    Dilarang melakukan ancaman terhadap guru dan seluruh pegawai
                </li>
                <li>
                    Siswa hanya dibenarkan jajan/membeli makanan di warung/kantin sekolah
                </li>
            </ul>
        </div>
        <div class="bg-gray-100 rounded-lg p-5 my-10 shadow-2xl">
            <h2 class="text-2xl font-bold mb-4">X. Sanksi bagi siswa yang melanggar Tata Tertib</h2>
            <ul class="list-decimal ml-10">
                <li>
                    Peringatan secara lisan
                </li>
                <li>
                    Peringatan secara tertulis kepada siswa dan tembusan kepada orang tua / wali siswa
                </li>
                <li>
                    Pemanggilan Orang Tua untuk membuat surat pernyataan
                </li>
                <li>
                    Apabila melanggar nomor : VIII.3, VIII.4, VIII.5, IX.7, akan dikembalikan kepada orang tua siswa
                </li>
                <li>
                    Dikeluarkan dari sekolah
                </li>
            </ul>
        </div>
    </div>
</div>

@endsection 

@section('script')
<script>

</script>
@endsection
