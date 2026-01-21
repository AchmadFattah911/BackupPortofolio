<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Portofolio')</title>

    <link rel="stylesheet" href="{{ asset('css/hai.css') }}">
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="logo">Fattah</div>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="/project">Project</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>

    <!-- ISI HALAMAN -->
    @yield('content')

    <!-- FOOTER -->
    <footer class="footer">
        <p>© {{ date('Y') }} Fattah. All rights reserved.</p>
    </footer>

</body>
</html>
