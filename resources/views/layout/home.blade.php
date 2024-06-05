<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} | {{ $data['title'] }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .animate-slide {
            @apply transition-transform duration-500 ease-in-out;
        }
    </style>
</head>
<body>
    <div class="bg-white w-full min-h-screen">
        <div class="top-0 right-0">
            @include('layout.partials.home.navbar')
        </div>
        @yield('content')
        @include('layout.partials.home.footer')
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="https://kit.fontawesome.com/8ef7ea110e.js" crossorigin="anonymous"></script>
    @yield('script')
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('get.socialmedia')}}",
                type: 'GET',
                success: function(response) {
                    if (response.code === 200) {
                        var socialMedia = response.data;
                        $.each(socialMedia, function(index, item) {
                            var icon = $('<i>').addClass('w-5 h-5 fab fa-' + item.icon);
                            var link = $('<a>').attr('href', item.url).addClass('text-white hover:text-gray-400 mr-3').append(icon);
                            $('div.social-media-icons').append(link);
                        });
                    } else {
                        console.error('No social media data found.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching social media data:', error);
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            new Splide('.splide', {
                type: 'loop',
                autoplay: true,
                perPage: 4,
                perMove: 3,
                pagination: false,
                breakpoints: {
                    640: {
                        perPage: 1,
                    },
                    768: {
                        perPage: 2,
                    },
                    1024: {
                        perPage: 3,
                    },
                },

            }).mount();
        });
    </script>
</body>
</html>
