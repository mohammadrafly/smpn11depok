@extends('layout.auth')

@section('content')

<div class="bg-white w-[500px] h-fit shadow-lg rounded-lg p-10">
    <div class="flex justify-center items-center bg-gray-700 p-10 mb-10 rounded-lg">
        <h1 class="text-4xl font-bold text-white">{{ config('app.name') }}</h1>
    </div>
    @include('components.flash')
    <form id="formLogin" onsubmit="event.preventDefault(); login();">
        @csrf
        <div class="my-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter your email" class="bg-white mt-1 p-2 border border-gray-300 rounded-lg w-full">
        </div>
        <div class="my-3 relative">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Masukan Password" class="bg-white mt-1 p-2 border border-gray-300 rounded-lg w-full" required>
            <span class="absolute top-0 bottom-0 mt-6 right-0 flex items-center pr-3" onclick="togglePasswordVisibility('password', this)">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </span>
        </div>
        <button id="loginButton" class="mt-5 w-full bg-gray-700 p-2 rounded-lg text-white">Login</button>
    </form>
</div>

@endsection

@section('script')
<script>
    async function login() {
        const formData = $('#formLogin').serialize();
        try {
            $('#loginButton').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');

            const response = await $.ajax({
                url: "{{ route('login') }}",
                method: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            if (response.code === 200) {
                window.location.href = response.redirect;
            } else {
                alert(response.message);
            }
        } catch (error) {
            handleError();
        } finally {
            $('#loginButton').html('Login');
        }
    }
</script>
@endsection
