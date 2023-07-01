@extends('layouts.app')

@section('content')
    @include('layouts.navbar')

    <div class="max-w-10/12 m-auto">

        {{-- Jumbotron start --}}
        <section class="bg-white dark:bg-gray-900">
            <div class="py-4 px-2 mx-auto max-w-screen-xl text-center">
                <h1
                    class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                    TACO Kanban Board</h1>
            </div>
        </section>
        {{-- jumbotron end --}}

        {{-- tabs start --}}
        <div class="sm:hidden w-9/12 m-auto mb-4">
            {{-- <label for="tabs" class="sr-only">Select your country</label> --}}
            <select id="tabs"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option>All Tasks</option>
                <option>Todo</option>
                <option>Doing</option>
                <option>Done</option>
            </select>
        </div>
        <ul
            class="max-w-xl mx-auto hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg shadow sm:flex dark:divide-gray-700 dark:text-gray-400">
            <li class="w-full">
                <a href="{{ url('/') }}"
                    class="{{ request()->input('status') == '' ? 'font-bold bg-gray-100' : '' }} inline-block w-full p-4 text-gray-900  rounded-l-lg focus:ring-4 focus:ring-blue-300 focus:outline-none dark:bg-gray-700 dark:text-white"
                    aria-current="page">All Tasks</a>
            </li>
            <li class="w-full">
                <a href="{{ url('?status=1') }}"
                    class="font-bold bg-gray-100 inline-block w-full p-4 text-gray-900 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Todo</a>
            </li>
            <li class="w-full">
                <a href="#"
                    class="inline-block w-full p-4 hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Doing</a>
            </li>
            <li class="w-full">
                <a href="#"
                    class="inline-block w-full p-4 rounded-r-lg hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Done</a>
            </li>
        </ul>
        {{-- tabs end --}}

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

                    <button data-modal-target="main-modal" data-modal-toggle="main-modal" id="button-detail"
                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button" data-id="{{ $task->id }}">
                        Detail {{ $task->id }}
                    </button>
                </div>
            @empty
                <h1>Search not found</h1>
            @endforelse


        </div>
        {{-- cards end --}}


        <!-- Modal toggle -->
        {{-- <button data-modal-target="main-modal" data-modal-toggle="main-modal"
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            Toggle modal
        </button> --}}

        <!-- Main modal -->
        <div id="main-modal" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                        data-modal-hide="main-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8" id="modal-container">
                        <h3 id="task-title" class="mb-4 text-xl font-medium text-gray-900 dark:text-white"></h3>
                        <form class="space-y-6" action="/kanban/${data.id}" method="POST" id="form">
                            @csrf
                            <div>
                                <label for="target_quantity"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Target
                                    Quantity</label>
                                <input type="target_quantity" name="target_quantity" id="target-quantity"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    disabled>
                            </div>
                            <div>
                                <label for="update_quantity"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Update Current
                                    Quantity</label>
                                <input type="number" name="update_quantity" id="update_quantity"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required>
                                <p id="note-qty" class="mt-2 text-sm font-bold text-slate-600 dark:text-blue-500">
                                </p>
                            </div>
                            <button type="submit"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update
                                current quantity</button>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <script>
        const button_detail = document.querySelector("#button-detail");
        const task_title = document.querySelector("#task-title");
        const note_qty = document.querySelector("#note-qty");
        const target_quantity = document.querySelector("#target-quantity");

        button_detail.addEventListener('click', () => {
            // fetchData();
            console.log(button_detail.dataset.id)

        });

        function fetchData() {
            const id = button_detail.dataset.id;
            fetch('/kanban/' + id)
                .then(response => response.json())
                .then(data => {
                    task_title.innerText = data.title;
                    target_quantity.value = data.target_quantity;
                    note_qty.innerText = `current quantity is ${data.current_quantity}`;
                })
                .catch(error => console.error(error));
        }
    </script>
@endsection
