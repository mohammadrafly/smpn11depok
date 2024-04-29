@extends('layout.home')

@section('content')

<div class="lg:px-32 md:px-32 sm:px-32 py-32">
    <div class="flex justify-center items-center mt-20">
        <h1 class="text-3xl font-semibold">{{$data['title']}}</h1>
    </div>
    
    <div class="text-right block p-5">
        <div class="container mx-auto mt-5">
                @if (isset($data['content']))
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
                    @foreach ($data['content'] as $gallery)
                    <img 
                        class="w-full h-full hover:opacity-80 transition duration-300 rounded-2xl shadow-2xl" 
                        src="{{ asset('storage/gallery/'. $gallery->img)}}" 
                        alt="{{ $gallery->img }}"
                        onclick="enlargeImage('{{ asset('storage/gallery/'. $gallery->img)}}')">
                    @endforeach
                </div>
                @else
                    <div class="flex justify-center items-center">
                        <h1 class="text-center font-thin text-yellow-500 text-3xl">Tidak ada data!</h1>
                    </div>
                @endif
        </div>    
    </div>
</div>

@endsection 

@section('script')
<script>
function enlargeImage(imageUrl) {
    // Create a modal container
    var modal = document.createElement('div');
    modal.classList.add('fixed', 'top-0', 'left-0', 'w-full', 'h-full', 'bg-black', 'bg-opacity-75', 'flex', 'justify-center', 'items-center', 'z-50');
    
    // Create the enlarged image element
    var enlargedImg = document.createElement('img');
    enlargedImg.src = imageUrl;
    enlargedImg.classList.add('max-w-full', 'max-h-full');
    
    // Append the enlarged image to the modal container
    modal.appendChild(enlargedImg);
    
    // Append the modal container to the body
    document.body.appendChild(modal);
    
    // Close the modal when clicked outside the image
    modal.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.remove();
        }
    });
}
</script>
@endsection