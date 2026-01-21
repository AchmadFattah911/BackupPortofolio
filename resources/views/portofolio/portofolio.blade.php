<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Portofolio Fattah</title>
    <link rel="stylesheet" href="/css/hai.css">
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
    @extends('layouts.main') <!-- Memanggil layout utama -->
    <!-- HERO / HOME -->
     @section('content')
    <div class="hero reveal" id="home">
        <div class="hero-text">
            <h1>Halo, Saya <span>Fattah</span></h1>
            <p>
                Web Developer pemula yang sedang belajar membangun
                website modern menggunakan HTML, CSS, dan Laravel.
            </p>
            <a href="#project" class="btn">Lihat Project</a>
        </div>

        <div class="hero-visual">
            <img src="/image/profile.png" alt="Foto Fattah">
        </div>
    </div>

    <!-- ABOUT -->
    <section class="about full-section">
    <div class="content">
        <h2>About Me</h2>
        <p>
            Saya adalah web developer yang fokus pada pembuatan UI modern,
            interaktif, dan performa tinggi menggunakan Laravel dan teknologi web modern.
        </p>
    </div>
</section>


    <!-- SKILLS -->
    <section class="skills full-section">
    <div class="content">
        <h2>Skills</h2>

        <ul>
            <li>Laravel</li>
            <li>PHP</li>
            <li>HTML</li>
            <li>CSS</li>
            <li>JavaScript</li>
        </ul>
    </div>
</section>


    <!-- PROJECT -->
    <section class="project" id="project">
    <h2>Project</h2>

    <div class="project-grid">
        <div class="card">
            <h3>Website Portofolio</h3>
            <p>Portofolio sederhana menggunakan HTML dan CSS</p>
        </div>

        <div class="card">
            <h3>Website CRUD Parkir</h3>
            <p>Website backend menggunakan HTML, CSS, PHP, dan Database</p>
        </div>

        <div class="card">
            <h3>Website Landing Page</h3>
            <p>Website Landing page yang responsive serta tampilan terlihat modern</p>
        </div>
    </div>
</section>


    <!-- CONTACT -->
    <section class="contact" id="contact">
    <h2>Contact</h2>

    <p class="contact-text">
        WhatsApp: <strong>+62 852-5282-9756</strong>
    </p>

    <a href="https://api.whatsapp.com/send?phone=6285252829756"
       target="_blank"
       class="contact-btn">
        Hubungi Saya
    </a>
</section>
@endsection



    <!-- FOOTER -->
    <footer class="footer">
        <p>© 2026 Fattah. All rights reserved.</p>
    </footer>

</body>
</html>
