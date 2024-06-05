<div class="flex justify-between">
    <div class="flex">
        <button id="minimizeSidebarBtn" class="p-2 mr-5 bg-white rounded-full shadow-md text-gray-700 hover:text-gray-900 focus:outline-none transition-transform duration-300 ease-in-out transform hover:rotate-90">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"/>
            </svg>
        </button>
        <h1 class="text-gray-400 font-bold text-xl text-center flex items-center justify-center"">{{ strtoupper($data['title']) }}</h1>
    </div>
    <div class="flex">
        <a href="{{ route('profile') }}" class="flex">
            <div class="mr-4 flex items-center justify-center">
                <h1>{{ Auth::user()->name }}</h1>
            </div>
            <div class="top-0 mr-4">
                @if(Auth::user()->img)
                    <img src="{{ asset('storage/foto_user/' . Auth::user()->img) }}" alt="Profile Image" class="w-10 h-10 rounded-full object-cover">
                @else
                    <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
                        <span class="text-gray-600 font-bold text-lg">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}{{ strtoupper(substr(strstr(Auth::user()->name, ' '), 1, 1)) }}
                        </span>
                    </div>
                @endif
            </div>
        </a>
    </div>
</div>
