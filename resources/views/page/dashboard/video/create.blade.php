@extends('layout.dashboard')

@section('content')

<form id="articleForm" class="space-y-4" enctype="multipart/form-data">
    <div class="block">
        <input type="text" id="id" name="id" hidden value="{{ $data['content']->id ?? '' }}">
        <div class="w-1/2 mt-5">
            <label for="url" class="block font-medium text-gray-700">Url</label>
            <input type="text" id="url" name="url" placeholder="Masukan Url" class="mt-1 p-2 border border-gray-300 rounded-lg w-full" value="{{ $data['content']->url ?? ''}}" required>
        </div>        
    </div>
    <div class="text-left">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-lg hover:bg-blue-600 transition-colors duration-300">Simpan</button>
    </div>
</form>

@endsection

@section('script')
<script>
    async function submitData(formData, url) {
        try {
            const response = await $.ajax({
                url: url,
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
                window.location.href = '{{ route('video')}}';
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

            let url;
            const id = $('#id').val();
            if (id) {
                url = '{{ route('video.update', ':id') }}'.replace(':id', id);
            } else {
                url = '{{ route('video.create') }}';
            }

            submitData(formData, url);
        });
    });
</script>
@endsection
