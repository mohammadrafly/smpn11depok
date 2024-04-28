@extends('layout.dashboard')

@section('content')

<div class="bg-white rounded-lg shadow-lg w-full p-5">
    <div class="flex justify-between items-center mb-5">
        <div class="relative mt-1">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="text" id="search" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari data">
        </div>
        <a href="{{ route('activity.create') }}" class="bg-blue-500 text-white px-4 py-2 ml-3 rounded-lg shadow-lg hover:bg-blue-600 transition-colors duration-300">Tambah</a>
    </div>

    <table id="table" class="w-full border-collapse border border-gray-200">
        <thead class="bg-gray-200">
            <tr class="text-left">
                <th class="p-3">#</th>
                <th class="p-3">Nama</th>
                <th class="p-3">Waktu</th>
                <th class="p-3">Total Siswa</th>
                <th class="p-3">Foto</th>
                <th class="p-3"></th>
            </tr>
        </thead>
        <tbody >
        </tbody>
    </table>
    <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4" aria-label="Table navigation">
        <span id="pagination-info" class="text-sm font-normal text-gray-500 mb-4 md:mb-0 block w-full md:inline md:w-auto"></span>
        <ul id="pagination" class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
            <li>
                <a href="#" onclick="previousPage()" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg">Previous</a>
            </li>
            <li>
                <a href="#" onclick="nextPage()" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg">Next</a>
            </li>
        </ul>
    </nav>
</div>
@endsection

@section('script')
<script>
    window.addEventListener('DOMContentLoaded', function() {
        fetchData();
    });

    function fetchData() {
        const searchQuery = $('#search').val();
        $.ajax({
            url: '{{ route('activity')}}',
            type: 'GET',
            dataType: 'json',
            data: {
                page: currentPage,
                per_page: itemsPerPage,
                search: searchQuery
            },
            success: function(response) {
                console.log(response)
                renderData(response.data.data);
                updatePagination(response.data);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });
    }

    function truncateText(text, maxLength) {
        return text.length > maxLength ? text.slice(0, maxLength) + '...' : text;
    }

    function renderData(data) {
        const tableBody = document.querySelector('#table tbody');
        tableBody.innerHTML = '';

        const startIndex = (currentPage - 1) * itemsPerPage;

        data.forEach((item, index) => {
            const row = `
                        <tr>
                            <td class="p-3">${startIndex + index + 1}</td>
                            <td class="p-3">${item.nama}</td>
                            <td class="p-3">${item.waktu}</td>
                            <td class="p-3">${item.total_siswa}</td>
                            <td class="p-3">${item.img}</td>
                            <td class="p-3">
                                <button onclick="editData(${item.id})" class="bg-blue-500 rounded-lg p-2 text-white font-semibold">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </button>
                                <button onclick="deleteData(${item.id})" class="bg-red-500 rounded-lg p-2 text-white font-semibold">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
            `;
            tableBody.insertAdjacentHTML('beforeend', row);
        });
    }

    function editData(id) {
        const baseUrl = "{{ route('activity.update', ['id' => '__ID__']) }}";
        window.location.href = baseUrl.replace('__ID__', id);
    }

    function deleteData(id) {
        const baseUrl = "{{ route('activity.delete', ['id' => '__ID__']) }}";
        if (confirm("Are you sure you want to delete this data?")) {
            $.ajax({
                url: baseUrl.replace('__ID__', id),
                type: 'GET',
                success: function(response) {
                    alert(response.message)
                    fetchData();
                },
                error: function(xhr, status, error) {
                    console.error(error); 
                }
            });
        }
    }
</script>
@endsection

