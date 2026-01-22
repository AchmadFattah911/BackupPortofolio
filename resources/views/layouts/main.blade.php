<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Portofolio')</title>

    <link rel="stylesheet" href="{{ asset('css/hai.css') }}">
</head>
<body>

    <!-- NAVBAR -->
    @include('partials.navbar')

    <!-- ISI HALAMAN -->
    <main>
    @yield('content')
    </main>
    <!-- FOOTER -->
    @include('partials.footer')

</body>
</html>
