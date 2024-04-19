function toggleSidebar() {
    const sidebar = document.querySelector('.left-0');
    const sidebarContent = document.querySelector('.text-white');

    sidebar.classList.toggle('w-0');
    sidebar.classList.toggle('p-[0px]');
    sidebarContent.classList.toggle('hidden');
}

document.getElementById('minimizeSidebarBtn').addEventListener('click', toggleSidebar);

let currentPage = 1;
let totalPages = 1;
const itemsPerPage = 10;

function previousPage() {
    if (currentPage > 1) {
        currentPage--;
        fetchData();
    }
}

function nextPage() {
    if (currentPage < totalPages) {
        currentPage++;
        fetchData();
    }
}

function updatePagination(data) {
    currentPage = data.current_page;
    totalPages = data.last_page;
    totalItems = data.total;
    let paginationHTML = '';
    paginationHTML += `<li><a href="#" onclick="previousPage()" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight bg-white text-gray-600 border border-gray-300 rounded-s-lg">Previous</a></li>`;

    for (let i = 1; i <= totalPages; i++) {
        console.log(currentPage === i);
        paginationHTML += `<li><a href="#" onclick="changePage(${i})" class="flex items-center justify-center px-3 h-8 leading-tight border border-gray-300 ${currentPage !== i ? 'text-red-600' : 'text-white bg-blue-500'}">${i}</a></li>`;
    }

    paginationHTML += `<li><a href="#" onclick="nextPage()" class="flex items-center justify-center px-3 h-8 leading-tight bg-white text-gray-600 border border-gray-300 rounded-e-lg">Next</a></li>`;

    $('#pagination').html(paginationHTML);
    updatePaginationInfo();
}

function updatePaginationInfo() {
    $('#pagination-info').html(`Showing <span class="font-semibold text-gray-900">${(currentPage - 1) * itemsPerPage + 1}-${Math.min(currentPage * itemsPerPage, totalItems)}</span> of <span class="font-semibold text-gray-900">${totalItems}</span>`);
}

function changePage(page) {
    currentPage = page;
    fetchData();
}

document.getElementById('search').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const tableRows = document.querySelectorAll('#table tbody tr');

    tableRows.forEach(row => {
        const nama = row.cells[1].textContent.toLowerCase();
        if (nama.includes(searchTerm)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});

function togglePasswordVisibility(inputId, icon) {
    var input = document.getElementById(inputId);
    var eyeIcon = `
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                `;

    var eyeSlashIcon = `
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                </svg>
                `;
    
    if (input.type === "password") {
        input.type = "text";
        icon.innerHTML = eyeSlashIcon;
    } else {
        input.type = "password";
        icon.innerHTML = eyeIcon;
    }
}

function handleError() {
    alert('An error occurred while processing your request. Please try again later.');
    console.error(error);
}