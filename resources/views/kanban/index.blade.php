@extends('layouts.app')

@section('content')
    @include('layouts.navbar')

    <div class="max-w-10/12 m-auto">

        {{-- Jumbotron start --}}
        <section class="dark:bg-gray-900">
            <div class="py-4 px-2 mx-auto max-w-screen-xl text-center">
                <h1
                    class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                    TACO Kanban Board</h1>
            </div>
        </section>
        {{-- jumbotron end --}}

        {{-- tabs start --}}
        <div class="sm:hidden w-9/12 m-auto mb-4">

            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                class="w-full justify-between hover:bg-slate-100 ring-2 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">Filter by Status <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg></button>
            <!-- Dropdown menu -->
            <div id="dropdown"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow ring-2 w-9/12 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a href="{{ url('kanban') }}"
                            class="block px-4 py-2 {{ request()->input('status') == '' ? 'bg-blue-300' : '' }} hover:bg-blue-400 dark:hover:bg-blue-600 dark:hover:text-white">All
                            Tasks</a>
                    </li>
                    <li>
                        <a href="{{ url('kanban?status=1') }}"
                            class="block px-4 py-2 {{ request()->input('status') == 1 ? 'bg-blue-300' : '' }} hover:bg-blue-400 dark:hover:bg-blue-600 dark:hover:text-white">Todo</a>
                    </li>
                    <li>
                        <a href="{{ url('kanban?status=2') }}"
                            class="block px-4 py-2 {{ request()->input('status') == 2 ? 'bg-blue-300' : '' }} hover:bg-blue-400 dark:hover:bg-blue-600 dark:hover:text-white">Doing</a>
                    </li>
                    <li>
                        <a href="{{ url('kanban?status=3') }}"
                            class="block px-4 py-2 {{ request()->input('status') == 3 ? 'bg-blue-300' : '' }} hover:bg-blue-400 dark:hover:bg-blue-600 dark:hover:text-white">Done</a>
                    </li>
                </ul>
            </div>

        </div>
        <ul
            class="max-w-xl mx-auto hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg shadow sm:flex dark:divide-gray-700 dark:text-gray-400">
            <li class="w-full">
                <a href="{{ url('/') }}"
                    class="{{ request()->input('status') == '' ? 'font-bold bg-gray-100 text-gray-900' : '' }} inline-block w-full p-4 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                    aria-current="page">All Tasks</a>
            </li>
            <li class="w-full">
                <a href="{{ url('kanban?status=1') }}"
                    class="{{ request()->input('status') == '1' ? 'font-bold bg-gray-100 text-gray-900' : '' }} inline-block w-full p-4 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Todo</a>
            </li>
            <li class="w-full">
                <a href="{{ url('kanban?status=2') }}"
                    class="{{ request()->input('status') == '2' ? 'font-bold bg-gray-100 text-gray-900' : '' }} inline-block w-full p-4 hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Doing</a>
            </li>
            <li class="w-full">
                <a href="{{ url('kanban?status=3') }}"
                    class="{{ request()->input('status') == '3' ? 'font-bold bg-gray-100 text-gray-900' : '' }} inline-block w-full p-4 rounded-r-lg hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Done</a>
            </li>
        </ul>
        {{-- tabs end --}}

        <div class="max-w-xl mx-auto">
            @if (session()->has('update_task_success'))
                <div id="alert-3"
                    class="flex p-4 my-4 border border-green-400 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-medium">
                        {{ session('update_task_success') }}
                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-3" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            @endif
        </div>

        {{-- cards start --}}
        <div class="container max-w-7xl mt-6 m-auto flex flex-wrap justify-center align-center">
            @forelse ($tasks as $task)
                <div
                    class="lg:w-96 md:w-9/12 w-full m-1 p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">{{ $task->title }}</h5>
                    </div>

                    <div class="flow-root">
                        <div class="relative z-0 w-full mb-6 group">
                            <input type="test" name="assigned" id="assigned" value="{{ $task->assigned }}"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required disabled />
                            <label for="assigned"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Assigned
                                to</label>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            <input type="text" name="target_quantity" id="target_quantity"
                                value="{{ $task->target_quantity }}"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required disabled />
                            <label for="target_quantity"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Target
                                Quantity</label>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <input type="text" name="current_quantity" id="current_quantity"
                                value="{{ $task->current_quantity }}"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required disabled />
                            <label for="current_quantity"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Current
                                Quantity</label>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            <input type="text" name="progress" id="progress" value="{{ $task->progress }}%"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required disabled />
                            <label for="progress"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Progress</label>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <input type="date" name="deadline" id="deadline"
                                value="{{ date('Y-m-d', strtotime($task->deadline)) }}"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required disabled />
                            <label for="deadline"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Deadline</label>
                        </div>
                    </div>
                    <div class="flow-root">
                        <div class="relative z-0 w-full mb-6 group">
                            <textarea rows="4" type="test" name="description" id="description"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required disabled>{{ $task->description }}</textarea>
                            <label for="description"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Description</label>
                        </div>
                    </div>
                    @if (auth()->check())
                        <button data-modal-target="modal-{{ $task->id }}"
                            data-modal-toggle="modal-{{ $task->id }}"
                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            Update
                        </button>
                    @endif
                </div>
            @empty
                <div class="min-h-screen">
                    <p class="mt-2 text-sm font-bold text-red-600 dark:text-red-500">
                        {{ request()->input('search') }} not found</p>
                </div>
            @endforelse


        </div>
        {{-- cards end --}}

        <!-- Main modal -->
        @foreach ($tasks as $task)
            <div id="modal-{{ $task->id }}" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                            data-modal-hide="modal-{{ $task->id }}">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8" id="modal-container">
                            <h3 id="task-title" class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                                {{ $task->title }}</h3>
                            <form class="space-y-6" action="/kanban/{{ $task->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="title" value="{{ $task->title }}">
                                <div>
                                    <label for="target_quantity"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Target
                                        Quantity</label>
                                    <input type="target_quantity" name="target_quantity" id="target-quantity"
                                        value="{{ $task->target_quantity }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        disabled>
                                </div>
                                <div>
                                    <label for="current_quantity"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Update Current
                                        Quantity</label>
                                    <input type="number" name="current_quantity" id="current_quantity"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        required>
                                    <p id="note-qty" class="mt-2 text-sm font-bold text-slate-600 dark:text-blue-500">
                                        Current Quantity = {{ $task->current_quantity }}
                                    </p>
                                </div>
                                <button type="submit"
                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        @endforeach
    </div>

    <div class="paginate mt-4 flex justify-center">
        {{ $tasks->links() }}
    </div>

    @include('layouts.footer')
@endsection
