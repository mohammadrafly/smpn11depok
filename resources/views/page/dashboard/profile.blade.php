@extends('layout.dashboard')

@section('content')

<form id="form" class="space-y-4" enctype="multipart/form-data">
    <div class="flex">
        <div class="w-1/4">
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
        <div class="w-full ml-5">
            <input type="text" id="id" name="id" hidden value="{{ $data['content']->id ?? '' }}">
            <div class="w-1/2">
                <label for="name" class="block font-medium text-gray-700">Nama</label>
                <input type="text" id="name" name="name" placeholder="Masukan Nama" class="mt-1 p-2 border border-gray-300 rounded-lg w-full" value="{{ $data['content']->name ?? ''}}" required>
            </div>
            <div class="w-1/2 mt-4">
                <label for="email" class="block font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukan Email" class="mt-1 p-2 border border-gray-300 rounded-lg w-full" value="{{ $data['content']->email ?? ''}}" required>
            </div>   
        </div>      
    </div>
    <div class="text-left">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-lg hover:bg-blue-600 transition-colors duration-300">Simpan</button>
    </div>
</form>

<h1 class="mt-10 font-semibold text-2xl">Ganti Password</h1>
<form id="formPassword" class="space-y-4 mt-2" enctype="multipart/form-data">
    <div class="w-1/2 relative">
        <label for="old_password" class="block font-medium text-gray-700">Password Lama</label>
        <input type="password" id="old_password" name="old_password" placeholder="Masukan Password" class="mt-1 p-2 border border-gray-300 rounded-lg w-full" required>
        <span class="absolute top-0 bottom-0 mt-5 -mb-2 right-0 flex items-center pr-3" onclick="togglePasswordVisibility('old_password', this)">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer text-gray-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
        </span>
    </div>
    <div class="w-1/2 relative">
        <label for="password" class="block font-medium text-gray-700">Password Baru</label>
        <input type="password" id="password" name="password" placeholder="Masukan Password" class="mt-1 p-2 border border-gray-300 rounded-lg w-full" required>
        <span class="absolute top-0 bottom-0 mt-5 -mb-2 right-0 flex items-center pr-3" onclick="togglePasswordVisibility('password', this)">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer text-gray-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
        </span>
    </div>
    <div class="w-1/2 relative">
        <label for="password_confirmation" class="block font-medium text-gray-700">Konfirmasi Password Baru</label>
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Masukan Konfirmasi Password" class="mt-1 p-2 border border-gray-300 rounded-lg w-full" required>
        <span class="absolute top-0 bottom-0 mt-5 -mb-2 right-0 flex items-center pr-3" onclick="togglePasswordVisibility('password_confirmation', this)">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer text-gray-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
        </span>
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

    async function submit(formData) {
        try {
            const response = await $.ajax({
                url: '{{ route('profile') }}',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            if (response && response.code === 200) {
                alert(response.message);
                window.location.href = '{{ route('profile')}}';
            } else {
                alert(response.message);
            }
        } catch (error) {
            console.error(error);
            alert('An error occurred while submitting the form.');
        }
    }

    async function submitPassword(formData) {
        try {
            const response = await $.ajax({
                url: '{{ route('password.update') }}',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            if (response && response.code === 200) {
                alert(response.message);
                window.location.href = '{{ route('profile')}}';
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

        const id = $('#id').val();
        if (id) {
            @if (!empty($data['content']->img))
                const imageUrl = '{{ route('foto_user', $data['content']->img) }}';
                displayExistingImage(imageUrl);
            @else 
                //nothing
            @endif 
        }

        $('#form').submit(function(event) {
            event.preventDefault();

            const formData = new FormData(this);

            const imageInput = $('#image')[0];
            if (imageInput.files && imageInput.files[0]) {
                formData.append('image', imageInput.files[0]);
            }

            submit(formData);
        });

        $('#formPassword').submit(function(event) {
            event.preventDefault();

            const formData = new FormData(this);

            submitPassword(formData);
        });
    });
</script>
@endsection
