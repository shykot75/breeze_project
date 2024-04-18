<!-- component -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{--    <link rel="preconnect" href="https://fonts.bunny.net">--}}
    {{--    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />--}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.4/css/dataTables.dataTables.min.css">


    <title>Admin Panel</title>

    <link rel="stylesheet" href="{{ asset('admin_assets/css/admin.css') }}">
</head>
<body class="text-gray-800 font-inter">
<!-- Sidebar Starts -->
@include('admin.layouts.sidebar')
<!-- Sidebar Ends -->

<main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
    <!-- Navbar Starts -->
    @include('admin.layouts.navbar')
    <!-- Navbar Ends -->

    <!-- Content Starts -->
    @yield('content')
    <!-- Content Ends -->
</main>

<script src="https://unpkg.com/@popperjs/core@2"></script>
{{--<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>--}}
<script src="{{ asset('admin_assets/js/admin.js') }}"></script>

{{-- Datatable --}}
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.0.4/js/dataTables.min.js"></script>


@stack('after-scripts')

</body>
</html>
