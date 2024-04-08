<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} | {{ $data['title'] }}</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="bg-gray-300 w-full min-h-screen">
        <div class="flex">
            <div class="left-0 bottom-0 w-[300px] p-5 h-screen bg-gray-700 transition-width duration-300">
                @include('layout.partials.dashboard.sidebar')
            </div>                        
            <div class="p-5 w-full">
                <div class="top-0 right-0">
                    @include('layout.partials.dashboard.navbar')
                </div>
            
                <div class="py-10">
                    @yield('content')

                    @include('layout.partials.dashboard.footer')
                </div>
            </div>
        </div>
    </div> 

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    @vite('resources/js/app.js')
    @yield('script')
    <script>
        async function logout() {
            try {
                const response = await $.ajax({
                    type: 'GET',
                    url: '{{ route('logout') }}',
                    dataType: 'json'
                });

                if (response.code === 200) {
                    alert(response.message);
                    window.location.href = response.redirect;
                } else {
                    alert(response.message);
                }
            } catch (error) {
                console.error(error);
            }
        }
    </script>
</body>
</html>