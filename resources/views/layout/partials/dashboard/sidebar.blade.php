<div class="text-white">
    <div class="flex justify-center items-center py-5">
        <div class="text-center">
            <h1 class="text-2xl font-bold">{{ strtoupper(config('app.name')) }}</h1>
        </div>
    </div>    
    <div class="py-5">
        <div class="flex justify-center items-center">
            <div class="bg-white w-20 h-20 rounded-full">
            
            </div>
        </div>
        <div class="flex justify-center items-center mt-2">
            <h1 class="font-thin">{{Auth::user()->name}}</h1>
        </div>
    </div>

    <ul class="space-y-2 mt-10 font-semibold">
        <li>
            <a href="{{ route('dashboard') }}" class="hover:bg-white hover:text-gray-700 flex items-center p-2 rounded-lg group @if (Route::currentRouteName() == 'dashboard') bg-white text-gray-700 hover:text-gray-800 @endif">
                <svg class="w-6 h-6 transition duration-75" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>  
                <span class="ms-3">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('artikel') }}" class="hover:bg-white hover:text-gray-700 flex items-center p-2 rounded-lg group @if (Route::currentRouteName() == 'artikel') bg-white text-gray-700 hover:text-gray-800 @endif">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 transition duration-75">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                </svg>
                <span class="ms-3">Artikel</span>
            </a>
        </li>
        <li>
            <a href="{{ route('guru') }}" class="hover:bg-white hover:text-gray-700 flex items-center p-2 rounded-lg group @if (Route::currentRouteName() == 'guru') bg-white text-gray-700 hover:text-gray-800 @endif">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 transition duration-75">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                </svg>
                <span class="ms-3">Guru</span>
            </a>
        </li>
        <li>
            <a href="{{ route('user') }}" class="hover:bg-white hover:text-gray-700 flex items-center p-2 rounded-lg group @if (Route::currentRouteName() == 'user') bg-white text-gray-700 hover:text-gray-800 @endif">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 transition duration-75">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                </svg>
                <span class="ms-3">User</span>
            </a>
        </li>
        <li>
            <a href="#" class="hover:bg-white hover:text-gray-700 flex items-center p-2 rounded-lg group" onclick="event.preventDefault(); logout();">
                <svg class="w-6 h-6 transition duration-75" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1 0 12.728 0M12 3v9" />
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
            </a>
        </li>
    </ul>

</div>