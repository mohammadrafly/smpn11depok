@extends('layout.home')

@section('content')

<div class="container mx-auto py-8">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg">
        <h1 class="text-3xl font-bold mb-4">Hubungi Sekolah Kami</h1>
        <p class="mb-4">Kami di Sekolah XYZ senang mendengar dari Anda! Jika Anda memiliki pertanyaan, permintaan informasi, atau ingin berhubungan dengan kami, kami siap membantu.</p>
        <!-- Formulir Kontak -->
        <form class="mb-8">
            <div class="mb-4">
                <label for="nama" class="block text-gray-700 font-bold mb-2">Nama</label>
                <input type="text" id="nama" name="nama" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" placeholder="Masukkan nama Anda" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" placeholder="Masukkan email Anda" required>
            </div>
            <div class="mb-4">
                <label for="pesan" class="block text-gray-700 font-bold mb-2">Pesan</label>
                <textarea id="pesan" name="pesan" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" rows="4" placeholder="Tulis pesan Anda di sini" required></textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Kirim Pesan</button>
        </form>

        <!-- Informasi Kontak -->
        <div class="mb-8">
            <h2 class="text-xl font-bold mb-2">Informasi Kontak</h2>
            <p class="mb-2"><strong>Alamat:</strong> Jl. Contoh No. 123, Kota Anda, Kode Pos 12345</p>
            <p class="mb-2"><strong>Telepon:</strong> (123) 456-7890</p>
            <p class="mb-2"><strong>Email:</strong> <a href="mailto:info@sekolahxyz.com">info@sekolahxyz.com</a></p>
        </div>

        <!-- Media Sosial -->
        <div>
            <h2 class="text-xl font-bold mb-2">Ikuti Kami</h2>
            <ul class="flex space-x-4">
                <li><a href="#" class="text-blue-500 hover:text-blue-700">Facebook</a></li>
                <li><a href="#" class="text-blue-500 hover:text-blue-700">Twitter</a></li>
                <li><a href="#" class="text-blue-500 hover:text-blue-700">Instagram</a></li>
            </ul>
        </div>
    </div>
</div>

@endsection 

@section('script')
<script>

</script>
@endsection