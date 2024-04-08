@extends('layout.auth')

@section('content')

<div class="bg-white w-[500px] h-fit shadow-lg rounded-lg p-10">
    <div class="flex justify-center items-center bg-gray-700 p-10 mb-10 rounded-lg">
        <h1 class="text-4xl font-bold text-white">{{ config('app.name') }}</h1>
    </div>
    <form id="formLogin" onsubmit="event.preventDefault(); login();">
        @csrf
        <div class="my-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter your email" class="w-full border border-black rounded-lg p-3">
        </div>
        <div class="my-3 relative">
            <label for="password" class="inline-block">Password</label>
            <input type="password" name="password" id="password" placeholder="*****************" class="w-full border border-black rounded-lg p-3">
            <button type="button" id="togglePassword" class="absolute bottom-1 right-3 transform -translate-y-1/2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" id="toggleIcon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                </svg>
            </button>
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
