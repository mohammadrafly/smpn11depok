@if(session('error'))
    <div id="flash-message" class="flash-message bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative transition-opacity duration-500 ease-in-out" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
        <span id="close-flash-message" class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 5.652a.5.5 0 1 1 .707.707L10.707 10l4.348 4.348a.5.5 0 0 1-.708.708L10 10.707l-4.348 4.348a.5.5 0 1 1-.707-.708L9.293 10 4.945 5.652a.5.5 0 1 1 .707-.708L10 9.293l4.348-4.348z"/></svg>
        </span>
    </div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var closeBtn = document.getElementById('close-flash-message');
        var flashMessage = document.getElementById('flash-message');

        if (closeBtn && flashMessage) {
            closeBtn.addEventListener('click', function() {
                flashMessage.classList.add('hidden');
            });

            flashMessage.classList.remove('hidden');
        } else {
            console.error('Close button or flash message element not found.');
        }
    });
</script>
