<div class="w-full">
    <div class="border rounded-lg p-5 text-left">
        <h1 class="text-black font-semibold text-2xl">Category</h1>
        <ul class="mt-5 text-gray-500">
            @foreach ($data['category'] as $category )
            <li class="mt-3">
                <a href="{{ route('get.category.id', $category->id)}}">{{ $category->nama}}</a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
