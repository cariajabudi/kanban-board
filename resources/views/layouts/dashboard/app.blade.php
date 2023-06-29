<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Home</title>
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>

    @include("layouts.dashboard.navbar")

    <div class="max-w-7xl m-auto min-h-screen">
        
        @include("layouts.dashboard.aside")

        @yield('content')

    </div>

    <!-- {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script> --}} -->
    @include('layouts.footer')

    <script>
      feather.replace()
    </script>
    
</body>

</html>