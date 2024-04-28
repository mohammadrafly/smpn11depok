@extends('layout.dashboard')

@section('content')

<form id="articleForm" class="space-y-4" enctype="multipart/form-data">
    <div class="block">
        <input type="text" id="id" name="id" hidden value="{{ $data['content']->id ?? '' }}">
        <div class="w-1/2 mt-5">
            <label for="title" class="block font-medium text-gray-700">Judul</label>
            <input type="text" id="title" name="title" placeholder="Masukan Judul" class="mt-1 p-2 border border-gray-300 rounded-lg w-full" value="{{ $data['content']->title ?? ''}}" required>
        </div> 
        <div class="w-full">
            <label for="content" class="block font-medium text-gray-700 mb-1">Content</label>
            <textarea id="content" name="content" rows="10" class="p-2 border border-gray-300 rounded-lg w-full h-screen">{{ $data['content']->content ?? ''}}</textarea>
        </div>       
    </div>
    <div class="text-left">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-lg hover:bg-blue-600 transition-colors duration-300">Simpan</button>
    </div>
</form>

@endsection

@section('script')
<script>
    async function submitData(formData, title) {
        try {
            const response = await $.ajax({
                title: title,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            if (response && response.code === 201) {
                alert(response.message);
                window.location.href = '{{ route('page')}}';
            } else {
                alert(response.message);
            }
        } catch (error) {
            console.error(error);
            alert('An error occurred while submitting the form.');
        }
    }

    $(document).ready(function() {
        const id = $('#id').val();

        $('#articleForm').submit(function(event) {
            event.preventDefault();

            const formData = new FormData(this);

            let title;
            const id = $('#id').val();
            if (id) {
                title = '{{ route('page.update', ':id') }}'.replace(':id', id);
            } else {
                title = '{{ route('page.create') }}';
            }

            submitData(formData, title);
        });
    });
</script>
@endsection
