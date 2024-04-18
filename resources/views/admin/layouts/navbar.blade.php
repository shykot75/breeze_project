<div class="py-2 px-6 bg-[#f8f4f3] flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
    <button type="button" class="text-lg text-gray-900 font-semibold sidebar-toggle">
        <i class="ri-menu-line"></i>
    </button>

    <ul class="ml-auto flex items-center">

        <li class="dropdown">
            <div class="dropdown-menu shadow-md shadow-black/5 z-30 hidden max-w-xs w-full bg-white rounded-md border border-gray-100"></div>
        </li>

        <li class="dropdown ml-3">
            <button type="button" class="dropdown-toggle flex items-center">
                <div class="flex-shrink-0 w-10 h-10 relative">
                    <div class="p-1 bg-white rounded-full focus:outline-none focus:ring">
                        <img class="w-8 h-8 rounded-full" src="https://laravelui.spruko.com/tailwind/ynex/build/assets/images/faces/9.jpg" alt=""/>
                        <div class="top-0 left-7 absolute w-3 h-3 bg-lime-400 border-2 border-white rounded-full animate-ping"></div>
                        <div class="top-0 left-7 absolute w-3 h-3 bg-lime-500 border-2 border-white rounded-full"></div>
                    </div>
                </div>
                <div class="p-2 md:block text-left">
                    <h2 class="text-sm font-semibold text-gray-800">{{ auth()->user()->name }}</h2>
                    <p class="text-xs text-gray-500">{{ auth()->user()->role }}</p>
                </div>
            </button>
            <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                <li>
                    <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50">Profile</a>
                </li>
                <li>
                    <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50">Settings</a>
                </li>
                <li>
                    <a role="menuitem"
                       href=""
                       class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50 cursor-pointer"
                       onclick="event.preventDefault();
                           document.getElementById('admin-logout').submit();">
                        Log Out
                    </a>
                    <form id="admin-logout" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
                </li>
            </ul>
        </li>
    </ul>
</div>
