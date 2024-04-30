@extends('layout.home')

@section('content')

<div class="container mx-auto py-8">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg">
        <h1 class="text-3xl font-bold mb-4">Kami menunggu pertanyaan anda!</h1>
        <p class="mb-4">Kami di Sekolah SMPN 11 Depok senang mendengar dari Anda! Jika Anda memiliki pertanyaan, permintaan informasi, atau ingin berhubungan dengan kami, kami siap membantu.</p>
        <form id="contactForm" class="mb-8 transition-colors duration-300">
            <div class="mb-4">
                <label for="pesan" class="block text-gray-700 font-bold mb-2">Pesan</label>
                <textarea id="pesan" name="pesan" class="w-full px-3 py-2 bg-gray-100 rounded-lg focus:border-yellow-500 border-transparent" rows="4" placeholder="Tulis pesan Anda di sini" required></textarea>
            </div>            
            <button type="submit" onclick="composeEmail(event)" class="bg-yellow-500 text-white py-2 px-4 rounded-md hover:bg-gray-100 hover:text-gray-600 focus:outline-none focus:bg-yellow-600">Kirim Pesan</button>
        </form>
    </div>
</div>

@endsection 

@section('script')
<script>
function composeEmail(event) {
    event.preventDefault();
    var pesan = document.getElementById('pesan').value;
    var mailtoLink = "mailto:sebelas@smpn11-depok.sch.id?subject=New Message from Website&body=" + encodeURIComponent(pesan);
    window.location.href = mailtoLink;
}
</script>
@endsection
