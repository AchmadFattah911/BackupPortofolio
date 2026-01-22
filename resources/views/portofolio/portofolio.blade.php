@extends('layouts.main')

@section('title', 'Portofolio')

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
        <img src="{{ asset('image/profile.png') }}" alt="Foto Fattah">
    </div>
</div>

<section class="about full-section">
    <div class="content">
        <h2>About Me</h2>
        <p>
            Saya adalah web developer yang fokus pada pembuatan UI modern,
            interaktif, dan performa tinggi menggunakan Laravel, Hobi saya yang hanya bermain/makan/tidur. kurang lebih seperti itu
            gemar bermain di platform steam dan riot sebagai game pc oiya dan tambahan roblox. di mobile hanya bermain mobile legend saja jika ingin
            bertanya lebih mungkin kalian bisa pencet contact di sebelah kanan atas itu.
        </p>
    </div>
</section>

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
        @foreach ($projects as $project)
            <div class="card">
                <h3>{{ $project['title'] }}</h3>
                <p>{{ $project['description'] }}</p>
            </div>
        @endforeach
    </div>
</section>


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
