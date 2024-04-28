@extends('layout.post')

@section('post')

@foreach ($data['content'] as $berita)
<div class="block lg:flex mb-10">
    <a href="{{ route('artikel.single', $berita->id) }}" class="max-w-full rounded-lg overflow-hidden shadow-lg relative mr-5">
        <img class="min-w-[400px] h-[200px] object-cover"
            src="{{ $berita->img ? asset('storage/foto_artikel/'.$berita->img) : 'https://via.placeholder.com/400x300'}} "
            alt="{{ $berita->title ? $berita->title . ' - News Article' : 'Placeholder Image' }}">
        <div class="absolute left-0 right-0 bottom-0 h-16"
            style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.7) 100%);">
        </div>
        <style scoped>
            img {
                background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.7) 100%);
            }
        </style>
    </a>
    <div class="flex-grow">
        <div class="text-left">
            <a href="{{ route('artikel.single', $berita->id) }} }}" class="text-2xl">{{ $berita->title }}</a>
            {!! Str::limit($berita->content, 200) !!}
        </div>
    </div>
</div>
@endforeach

@endsection 

@section('script')
<script>

</script>
@endsection
