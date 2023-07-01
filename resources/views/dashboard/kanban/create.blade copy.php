@extends('layouts.dashboard.app')

@section('content')
    <h3 class="text-3xl font-bold dark:text-white mb-6">Create Task</h3>

    <form method="POST" action="{{ url('dashboard/kanban') }}">
        @csrf
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input type="text" id="title"
                    class="shadow-sm bg-gray-50 border @error('title') ring-red-300 border-red-300 @enderror text-gray-900 text-sm rounded-lg @error('title') focus:ring-red-500 focus:border-red-500 @enderror block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white @error('title') dark:focus:ring-red-500 dark:focus:border-red-500 @enderror dark:shadow-sm-light"
                    placeholder="Title" name="title" autocomplete="off" value="{{ old('title') }}">
                @error('title')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</span>
                    </p>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <label for="assigned" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Assigned</label>
                <input type="text" id="assigned"
                    class="shadow-sm bg-gray-50 border @error('assigned') ring-red-300 border-red-300 @enderror text-gray-900 text-sm rounded-lg @error('assigned') focus:ring-red-500 focus:border-red-500 @enderror block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white @error('assigned') dark:focus:ring-red-500 dark:focus:border-red-500 @enderror dark:shadow-sm-light"
                    placeholder="Assigned to" name="assigned" autocomplete="off" value="{{ old('assigned') }}">
                @error('assigned')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</span>
                    </p>
                @enderror
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <label for="target_quantity"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                <input type="text" id="target_quantity"
                    class="shadow-sm bg-gray-50 border @error('target_quantity') ring-red-300 border-red-300 @enderror text-gray-900 text-sm rounded-lg @error('target_quantity') focus:ring-red-500 focus:border-red-500 @enderror block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white @error('target_quantity') dark:focus:ring-red-500 dark:focus:border-red-500 @enderror dark:shadow-sm-light"
                    placeholder="Target quantity" name="target_quantity" autocomplete="off"
                    value="{{ old('target_quantity') }}">
                @error('target_quantity')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</span>
                    </p>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <label for="deadline" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deadline</label>
                <input type="date" id="deadline"
                    class="shadow-sm bg-gray-50 border @error('deadline') ring-red-300 border-red-300 @enderror text-gray-900 text-sm rounded-lg @error('deadline') focus:ring-red-500 focus:border-red-500 @enderror block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white @error('deadline') dark:focus:ring-red-500 dark:focus:border-red-500 @enderror dark:shadow-sm-light"
                    name="deadline" autocomplete="off" value="{{ old('deadline') }}">
                @error('deadline')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</span>
                    </p>
                @enderror
            </div>
        </div>

        <div class="textarea mb-6">
            <label for="description"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea id="description" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border @error('description') border-red-300 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500 @enderror"
                placeholder="Description..." name="description">{{ old('description') }}</textarea>
            @error('description')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</span>
                </p>
            @enderror
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
@endsection
