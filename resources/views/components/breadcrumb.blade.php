@unless ($breadcrumbs->isEmpty())
    <ol class="flex flex-wrap list-none text-xl">
        @foreach ($breadcrumbs as $breadcrumb)
            @if (!is_null($breadcrumb->url) && !$loop->last)
                <li>
                    <a href="{{ $breadcrumb->url }}" class="text-gray-300 hover:text-blue-600 transition duration-300">{{ $breadcrumb->title }}</a>
                </li>
                <li class="mx-1">/</li>
            @else
                <li class="text-white">{{ $breadcrumb->title }}</li>
            @endif
        @endforeach
    </ol>
@endunless
