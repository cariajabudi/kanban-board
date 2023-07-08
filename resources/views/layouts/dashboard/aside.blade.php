<aside id="logo-sidebar"
    class="absolute top-0 left-auto z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ url('dashboard/kanban') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <i data-feather="grid"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap">Kanban</span>
                </a>
            </li>
            <a href="{{ url('dashboard/user') }}"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <i data-feather="users"></i>
                <span class="flex-1 ml-3 whitespace-nowrap">Users</span>
            </a>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <i data-feather="plus"></i>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Add</span>
                    <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ url('dashboard/kanban/create') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"><i
                                data-feather="file-plus"></i> Task</a>
                    </li>
                    <li>
                        <a href="{{ url('dashboard/user/create') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"><i
                                data-feather="user"></i> User</a>
                    </li>
                </ul>
            </li>
            <li>
                <form action="{{ url('user/logout') }}" method="post" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                    @csrf
                    <button type="submit"><i data-feather="log-out" class="inline-block"></i> Logout</button>
                </form>
            </li>
        </ul>
    </div>
</aside>
