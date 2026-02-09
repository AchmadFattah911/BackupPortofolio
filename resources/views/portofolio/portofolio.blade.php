@extends('layouts.main')

@section('title', 'Portofolio')

@section('content')

<!-- HERO -->
<div class="hero" id="home">
    <div class="hero-text">
        <h1 class="hero-title">
            Halo, Saya <span>Fattah</span>
        </h1>

        <p class="hero-desc">
            Web Developer pemula yang sedang belajar membangun
            website modern menggunakan HTML, CSS, dan Laravel.
        </p>

        <a href="#project" class="btn hero-btn">
            Lihat Project
        </a>
    </div>

    <div class="hero-visual parallax">
        <img src="{{ asset('image/profile.png') }}" alt="Foto Fattah">
    </div>
</div>

<!-- ABOUT -->
<section class="about full-section reveal">
    <div class="content">
        <h2>About Me</h2>
        <p>
            Saya adalah web developer yang fokus pada pembuatan UI modern,
            interaktif, dan performa tinggi menggunakan Laravel.
            Hobi saya bermain game PC seperti Steam, Riot, Roblox,
            dan Mobile Legends di mobile.
            Jika ingin bertanya lebih lanjut, silakan hubungi saya
            melalui menu contact di atas.
        </p>
    </div>
</section>

<!-- SKILLS -->
<section class="skills full-section reveal">
    <div class="content">
        <h2>Skills</h2>

        <ul class="skills-list">
            <li>Laravel</li>
            <li>PHP</li>
            <li>HTML</li>
            <li>CSS</li>
            <li>JavaScript</li>
        </ul>
    </div>
</section>

<!-- PROJECT -->
<section class="project reveal" id="project">
    <h2>Project</h2>

    <div class="project-grid">
        @if($projects->isEmpty())
            <p>Data projects masih kosong</p>
        @else
            @foreach ($projects as $project)
                <div class="card reveal">
                    <h3>{{ $project->title }}</h3>
                    <p>{{ $project->description }}</p>
                </div>
            @endforeach
        @endif
    </div>
</section>

<!-- CONTACT -->
<section class="contact reveal" id="contact">
    <h2>Contact</h2>

    <p class="contact-text">
        WhatsApp: <strong>+62 852-5282-9756</strong>
    </p>

    <a href="https://api.whatsapp.com/send?phone=6285252829756"
       target="_blank"
       class="contact-btn">
        Hubungi Saya via WhatsApp
    </a>

    <hr style="margin:30px 0; opacity:0.3;">

    <p class="contact-text">
        Atau jika mengalami kendala pada website, silakan isi form di bawah 👇
    </p>

    @if ($errors->any())
        <ul style="color:red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @if (session('success'))
        <p style="color:green;">
            {{ session('success') }}
        </p>
    @endif

    <form action="{{ route('portofolio.send') }}"
          method="POST"
          class="contact-form">
        @csrf

        <input type="text"
               name="nama"
               placeholder="Nama"
               value="{{ old('nama') }}">

        <input type="email"
               name="email"
               placeholder="Email"
               value="{{ old('email') }}">

        <textarea name="deskripsi"
                  placeholder="Tuliskan keluhan atau pesan kamu..."
                  rows="5">{{ old('deskripsi') }}</textarea>

        <button type="submit" class="contact-btn">
            Kirim Pesan
        </button>
    </form>
</section>

<script>
/* =========================
   HERO ENTRANCE (CINEMATIC)
========================= */
window.addEventListener('load', () => {
    const heroItems = [
        document.querySelector('.hero-title'),
        document.querySelector('.hero-desc'),
        document.querySelector('.hero-btn')
    ];

    heroItems.forEach((el, i) => {
        if (!el) return;
        setTimeout(() => {
            el.style.opacity = '1';
            el.style.transform = 'translateY(0)';
            el.style.transition = '0.8s ease';
        }, i * 180);
    });
});


/* =========================
   SCROLL REVEAL (GLOBAL)
========================= */
const reveals = document.querySelectorAll('.reveal');

const revealOnScroll = () => {
    reveals.forEach(el => {
        const top = el.getBoundingClientRect().top;
        const trigger = window.innerHeight - 120;

        if (top < trigger) {
            el.classList.add('active');
        }
    });
};

window.addEventListener('scroll', revealOnScroll);
revealOnScroll();


/* =========================
   SKILLS STAGGER ANIMATION
========================= */
const skillItems = document.querySelectorAll('.skills-list li');

const revealSkills = () => {
    skillItems.forEach((item, i) => {
        const top = item.getBoundingClientRect().top;

        if (top < window.innerHeight - 100) {
            setTimeout(() => {
                item.style.opacity = '1';
                item.style.transform = 'translateY(0)';
                item.style.transition = '0.5s ease';
            }, i * 120);
        }
    });
};

window.addEventListener('scroll', revealSkills);


/* =========================
   HERO PARALLAX (SUBTLE)
========================= */
const parallax = document.querySelector('.parallax');

if (parallax) {
    document.addEventListener('mousemove', e => {
        const x = (e.clientX / window.innerWidth - 0.5) * 20;
        const y = (e.clientY / window.innerHeight - 0.5) * 20;

        parallax.style.transform = `translate(${x}px, ${y}px)`;
    });
}
</script>


@endsection
