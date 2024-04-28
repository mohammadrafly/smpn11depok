@extends('layout.post')

@section('post')

    @foreach ($data['content'] as $kegiatan)
    <div class="block lg:flex mb-10">
        <a href="{{ route('activity.single', $kegiatan->id) }}" class="max-w-full rounded-lg overflow-hidden shadow-lg relative mr-5">
            <img class="min-w-[400px] h-[200px] object-cover"
                src="{{ $kegiatan->img ? asset('storage/foto_kegiatan/'.$kegiatan->img) : 'https://via.placeholder.com/400x300'}} "
                alt="{{ $kegiatan->nama ? $kegiatan->nama . ' - News Article' : 'Placeholder Image' }}">
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
                <a href="{{ route('activity.single', $kegiatan->id) }} }}" class="text-2xl">{{ $kegiatan->nama }}</a>
            </div>
        </div>
    </div>
    @endforeach

@endsection 

@section('script')
<script>

</script>
@endsection
