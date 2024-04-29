@extends('layout.post')

@section('post')

@if ($data['content'] !== null)
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
                <p class="flex items-center mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>  
                    {{ $kegiatan->waktu }}
                </p>
                <p class="flex items-center mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>                      
                    {{ $kegiatan->total_siswa }}
                </p>
                
            </div>
        </div>
    </div>
    @endforeach
@else
    <h1>Tidak ada pengumuman kegiatan</h1>
@endif

@endsection 

@section('script')
<script>

</script>
@endsection
