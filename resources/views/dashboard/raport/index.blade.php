@extends('layouts.app')

@section('content')
    <div class="relative overflow-x-auto max-w-5xl m-auto">


        <section class="bg-white dark:bg-gray-900 flex items-center pt-5">

            <img class="h-12" src="{{ asset('storage/logo/taco.png') }}" alt="image description">

            <div class="px-4 mx-auto text-center">
                <h1 class="mb-4 text-md font-bold tracking-tight leading-none text-gray-900 dark:text-white">
                    PT TACO ANUGRAH CORPORINDO</h1>
                <p class="mb-8 text-sm font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">
                    Modern Cikande Industrial Estate
                    Jl. Modern Industri XVII Blok BA No. 9
                    Cikande, Kabupaten Serang 42186
                </p>
            </div>
        </section>

        <hr class="h-px bg-black border-0 dark:bg-gray-700">

        <table class="w-full mt-10 text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Target Quantity
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Current Quantity
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Progress
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Deadline
                    </th>
                </tr>
            </thead>
            <tbody>

                @foreach ($tasks as $task)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{ $task->title }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $task->target_quantity }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $task->current_quantity }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $task->progress }}%
                        </td>
                        <td class="px-6 py-4">
                            {{ date('Y-m-d', strtotime($task->deadline)) }}
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        window.print()
    </script>
@endsection
