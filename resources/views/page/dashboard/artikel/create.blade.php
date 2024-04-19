@extends('layout.dashboard')

@section('content')

<form id="articleForm" class="space-y-4" enctype="multipart/form-data">
    <div class="flex flex-row gap-4">
        <input type="text" id="id" name="id" hidden value="{{ $data['content']->id ?? '' }}">
        <div class="w-full">
            <label for="content" class="block font-medium text-gray-700 mb-1">Content</label>
            <textarea id="content" name="content" rows="10" class="p-2 border border-gray-300 rounded-lg w-full h-screen">{{ $data['content']->content ?? ''}}</textarea>
        </div>
        <div class="basis-1/2">
            <div class="w-full">
                <label for="title" class="block font-medium text-gray-700">Title</label>
                <input type="text" id="title" name="title" placeholder="Masukan Judul" class="mt-1 p-2 border border-gray-300 rounded-lg w-full" value="{{ $data['content']->title ?? ''}}" required>
            </div>
            <div class="w-full mt-5">
                <label for="category" class="block font-medium text-gray-700">Category</label>
                <select id="kategori" name="kategori" class="mt-1 p-2 border border-gray-300 rounded-lg w-full bg-white focus:outline-none focus:ring focus:ring-blue-500 focus:ring-opacity-50 shadow-sm js-example-basic-single js-states" required>
                    <option value="{{ $data['content']->kategori ?? 'berita' }}" selected>{{ $data['content']->kategori ?? 'Berita' }}</option>
                    <option value="kegiatan">Kegiatan</option>
                    <option value="video">Video</option>
                    <option value="profile">Profile</option>
                    <option value="pengumuman">Pengumuman</option>
                    <option value="tentang_kami">Tentang Kami</option>
                    <option value="hubungi_kami">Hubungi Kami</option>
                    <option value="kepala_sekolah">Kepala Sekolah</option>
                    <option value="tata_tertib">Tata Tertib</option>
                    <option value="fasilitas">Fasilitas</option>
                    <option value="gallery">Gallery</option>
                </select>
            </div>
            <div class="mt-5">
                <label for="image" class="block font-medium text-gray-700">Image Header</label>
                <div class="relative w-full h-[250px] bg-white p-3 rounded-lg overflow-hidden">
                    <input value="{{ $data['content']->img ?? ''}}" type="file" id="image" name="image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" onchange="previewImage(this)">
                    <label for="image" id="image-label" class="absolute inset-0 flex items-center justify-center w-full h-full bg-[rgba(0,0,0,0.5)] text-white cursor-pointer hover:bg-[rgba(0,0,0,0.7)] transition duration-300 ease-in-out hover:opacity-75" style="background-size: cover; background-position: center;">
                        <span id="remove-image" class="absolute p-2 top-0 right-0 mt-2 mr-2 bg-gray-800 rounded-lg text-white cursor-pointer hidden">&times;</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                        </svg>
                    </label>
                </div>
            </div>             
        </div>
    </div>
    <div class="text-left">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-lg hover:bg-blue-600 transition-colors duration-300">Simpan</button>
    </div>
</form>

@endsection

@section('script')
<script>
    function previewImage(input) {
        const label = document.getElementById('image-label');
        const removeButton = document.getElementById('remove-image');
        const file = input.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            label.style.backgroundImage = `url(${e.target.result})`;
            removeButton.style.display = 'block';
        };

        reader.readAsDataURL(file);
    }

    document.getElementById('remove-image').addEventListener('click', function() {
        const label = document.getElementById('image-label');
        const removeButton = document.getElementById('remove-image');
        const fileInput = document.getElementById('image');

        label.style.backgroundImage = '';
        fileInput.value = '';
        removeButton.style.display = 'none';
    });

    async function submitArticle(formData, url) {
        try {
            const response = await $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            if (response && response.code === 201) {
                alert(response.message);
                window.location.href = '{{ route('artikel')}}';
            } else {
                alert(response.message);
            }
        } catch (error) {
            console.error(error);
            alert('An error occurred while submitting the form.');
        }
    }

    $(document).ready(function() {
        function displayExistingImage(imageUrl) {
            const label = document.getElementById('image-label');
            label.style.backgroundImage = `url(${imageUrl})`;

            const removeButton = document.getElementById('remove-image');
            removeButton.style.display = 'block';
        }

        const articleId = $('#id').val();
        if (articleId) {
            @if (!empty($data['content']->img))
                const imageUrl = '{{ route('foto_artikel', $data['content']->img) }}';
                displayExistingImage(imageUrl);
            @else 
                //nothing
            @endif 
        }

        $('#articleForm').submit(function(event) {
            event.preventDefault();

            const formData = new FormData(this);

            let url;
            const articleId = $('#id').val();
            if (articleId) {
                url = '{{ route('artikel.update', ':id') }}'.replace(':id', articleId);
            } else {
                url = '{{ route('artikel.create') }}';
            }

            const imageInput = $('#image')[0];
            if (imageInput.files && imageInput.files[0]) {
                formData.append('image', imageInput.files[0]);
            }

            submitArticle(formData, url);
        });
    });
</script>
@endsection
