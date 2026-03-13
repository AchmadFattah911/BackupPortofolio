@extends('layouts.main')

@section('title', 'Portofolio')

@section('content')

<!-- HERO -->
<div class="hero reveal" id="home">
    <div class="hero-text">
        <h1 class="hero-title">
            Halo, Saya <span id="typing" class="typing-text"></span>
        </h1>

        <p class="hero-desc">
            Web Developer pemula yang sedang belajar membangun
            website modern menggunakan HTML, CSS, dan Laravel. Saya memiliki passion dalam mendesain antarmuka yang clean dan responsif.
        </p>

        <a href="#project" class="hero-btn">
            Lihat Project <i class="fa-solid fa-arrow-right" style="margin-left: 8px;"></i>
        </a>
    </div>

    <div class="hero-visual z-10">
        <img class="minimal-img" src="{{ asset('image/profile.png') }}" alt="Foto Fattah" onerror="this.src='https://i.pinimg.com/1200x/12/c7/26/12c726b26ed10283077c946882d64503.jpg'">
    </div>
    
    <!-- Floating Tech Icons (Global Hero Wrapper) -->
    <div class="floating-tech floating-global float-1"><i class="fa-brands fa-laravel"></i></div>
    <div class="floating-tech floating-global float-2"><i class="fa-brands fa-php"></i></div>
    <div class="floating-tech floating-global float-3"><i class="fa-brands fa-js"></i></div>
    <div class="floating-tech floating-global float-4"><i class="fa-brands fa-react"></i></div>
    <div class="floating-tech floating-global float-5"><i class="fa-brands fa-github"></i></div>
</div>

<style>
/* GLOBAL FLOATING ICONS CSS */
.floating-global {
    position: absolute;
    font-size: 2.5rem;
    color: rgba(34, 211, 238, 0.5); /* Cyber cyan default */
    z-index: 1; /* Di bawah foto dan text */
    pointer-events: none;
    filter: blur(1px);
    transition: all 0.3s ease;
}

.float-1 { top: 10%; left: 5vw; color: rgba(239, 68, 68, 0.4); animation: floatAnim1 15s ease-in-out infinite alternate; }
.float-2 { bottom: 10%; right: 5vw; color: rgba(124, 58, 237, 0.4); font-size: 3rem; animation: floatAnim2 18s ease-in-out infinite alternate-reverse; }
.float-3 { top: 20%; right: 10vw; color: rgba(245, 158, 11, 0.4); font-size: 2rem; animation: floatAnim3 12s ease-in-out infinite alternate; }
.float-4 { bottom: 15%; left: 10vw; color: rgba(34, 211, 238, 0.4); font-size: 3.5rem; animation: floatAnim4 20s ease-in-out infinite alternate-reverse; }
.float-5 { top: 80%; left: 30vw; color: rgba(148, 163, 184, 0.3); font-size: 1.5rem; animation: floatAnim5 10s ease-in-out infinite alternate; }

@keyframes floatAnim1 { 0% { transform: translate(0, 0) rotate(0deg); } 100% { transform: translate(100px, 80px) rotate(45deg); } }
@keyframes floatAnim2 { 0% { transform: translate(0, 0) rotate(0deg); } 100% { transform: translate(-120px, -60px) rotate(-45deg); } }
@keyframes floatAnim3 { 0% { transform: translate(0, 0) rotate(0deg); } 100% { transform: translate(-80px, 100px) rotate(90deg); } }
@keyframes floatAnim4 { 0% { transform: translate(0, 0) rotate(0deg); } 100% { transform: translate(150px, -40px) rotate(-90deg); } }
@keyframes floatAnim5 { 0% { transform: translate(0, 0) rotate(0deg); } 100% { transform: translate(-50px, -120px) rotate(180deg); } }
</style>

<!-- ABOUT -->
<section class="about" id="about">
    <h2 class="section-title reveal">About Me</h2>
    <div class="about-wrapper reveal">
        <div class="about-image-wide" data-tilt data-tilt-max="10" data-tilt-speed="400" data-tilt-perspective="1000" data-tilt-glare="true" data-tilt-max-glare="0.5" style="transform-style: preserve-3d;">
            <img class="wide-img animated-deep" src="{{ asset('image/akane_sakuramori.png') }}" alt="Akane Sakuramori">
            <div class="about-badges" style="transform: translateZ(40px); bottom: 20px; position: absolute;">
                <span class="badge"><i class="fa-solid fa-code" style="color: #3b82f6; margin-right: 5px;"></i> Clean Coder</span>
                <span class="badge"><i class="fa-brands fa-laravel" style="color: #ef4444; margin-right: 5px;"></i> Laravel Artisan</span>
            </div>
        </div>
        <div class="about-content">
            <p>
                Saya adalah Software Engineer yang berfokus pada pembuatan antarmuka modern,
                arsitektur yang terstruktur, dan performa tinggi menggunakan ekosistem Laravel modern.
            </p>
            <p style="margin-top: 15px;">
                Saya memiliki ketertarikan mendalam dalam memecahkan masalah kompleks 
                melalui proses optimasi *backend* dan menyusun *frontend* yang interaktif. 
                Jika sedang mencari mitra untuk berkolaborasi atau membangun proyek digital, 
                silakan hubungi saya melalui form di bawah ini!
            </p>
        </div>
    </div>
</section> 

<!-- SKILLS -->
<section class="skills reveal" id="skills">
    <h2 class="section-title reveal">Skills</h2>
    <div class="skills-bar-container reveal">
        @forelse($skills as $skill)
        <div class="skill-item">
            <div class="skill-info">
                <span class="skill-name"><i class="fa-solid fa-microchip" style="color: #22d3ee; margin-right: 8px;"></i>{{ $skill->name }}</span>
                <span class="skill-level">0%</span>
            </div>
            <div class="skill-bar-bg">
                <div class="skill-progress" data-level="{{ is_numeric($skill->level) ? $skill->level : 85 }}"></div>
            </div>
        </div>
        @empty
        <div class="skill-item">
            <div class="skill-info">
                <span class="skill-name"><i class="fa-brands fa-php" style="color: #7c3aed; margin-right: 8px;"></i>PHP</span>
                <span class="skill-level">0%</span>
            </div>
            <div class="skill-bar-bg">
                <div class="skill-progress" data-level="90"></div>
            </div>
        </div>
        <div class="skill-item">
            <div class="skill-info">
                <span class="skill-name"><i class="fa-brands fa-js" style="color: #fbbf24; margin-right: 8px;"></i>JavaScript</span>
                <span class="skill-level">0%</span>
            </div>
            <div class="skill-bar-bg">
                <div class="skill-progress" data-level="85"></div>
            </div>
        </div>
        <div class="skill-item">
            <div class="skill-info">
                <span class="skill-name"><i class="fa-brands fa-laravel" style="color: #ef4444; margin-right: 8px;"></i>Laravel</span>
                <span class="skill-level">0%</span>
            </div>
            <div class="skill-bar-bg">
                <div class="skill-progress" data-level="80"></div>
            </div>
        </div>
        <div class="skill-item">
            <div class="skill-info">
                <span class="skill-name"><i class="fa-solid fa-wind" style="color: #0ea5e9; margin-right: 8px;"></i>Tailwind CSS</span>
                <span class="skill-level">0%</span>
            </div>
            <div class="skill-bar-bg">
                <div class="skill-progress" data-level="95"></div>
            </div>
        </div>
        @endforelse
    </div>
</section>

<style>
/* CYBERPUNK PROGRESS BARS */
.skills-bar-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.skill-item {
    background: rgba(15, 23, 42, 0.4);
    padding: 20px;
    border-radius: 8px;
    border: 1px solid rgba(124, 58, 237, 0.2);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.skill-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(124, 58, 237, 0.2), inset 0 0 10px rgba(34, 211, 238, 0.1);
    border-color: rgba(34, 211, 238, 0.5);
}

.skill-info {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
    font-family: 'Courier New', Courier, monospace;
    font-weight: 700;
}

.skill-name {
    color: #e2e8f0;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.skill-level {
    color: #22d3ee;
    text-shadow: 0 0 10px rgba(34, 211, 238, 0.5);
}

.skill-bar-bg {
    width: 100%;
    height: 12px;
    background: rgba(0, 0, 0, 0.5);
    border-radius: 6px;
    overflow: hidden;
    position: relative;
    border: 1px solid rgba(255, 255, 255, 0.05);
}

.skill-progress {
    height: 100%;
    width: 0;
    background: linear-gradient(90deg, #7c3aed, #22d3ee);
    border-radius: 6px;
    transition: width 1.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    box-shadow: 0 0 10px rgba(34, 211, 238, 0.5);
}

.skill-progress::after {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    animation: bar-shine 2s infinite;
}

@keyframes bar-shine {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}
</style>

<!-- E.E (EDUCATION & EXPERIENCE) -->
<section class="ee-section" id="ee" style="margin-top: 50px;">
    <h2 class="section-title reveal" style="text-transform: uppercase;">E.E (Education & Experience)</h2>
    <div class="resume-section reveal">
        <!-- Education -->
        <div>
            <h3 class="resume-header"><i class="fa-solid fa-graduation-cap" style="color: #fbbf24;"></i> Education Phase</h3>
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">2023 - Present</div>
                    <h4 class="timeline-title">Software Engineering Student</h4>
                    <p class="timeline-org">Vocational High School / IT Academy</p>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">2020 - 2023</div>
                    <h4 class="timeline-title">Junior High School</h4>
                    <p class="timeline-org">Science & Technology Club</p>
                </div>
            </div>
        </div>

        <!-- Experience -->
        <div>
            <h3 class="resume-header"><i class="fa-solid fa-briefcase" style="color: #ea580c;"></i> Working Experience</h3>
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">2025 - Present</div>
                    <h4 class="timeline-title">Freelance Web Developer</h4>
                    <p class="timeline-org">Self-Employed / Remote</p>
                    <p style="color: var(--text-muted); font-size: 0.85rem; margin-top: 10px;">Membangun berbagai landing page dan aplikasi web modern berbasis Laravel dan React.</p>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-date">2024</div>
                    <h4 class="timeline-title">Frontend Intern</h4>
                    <p class="timeline-org">Tech Startup Indonesia</p>
                    <p style="color: var(--text-muted); font-size: 0.85rem; margin-top: 10px;">Berpartisipasi dalam pengembangan antarmuka pengguna untuk dashboard admin klien.</p>
                </div>
            </div>
        </div>
    </div>
</section>


</section>

<!-- SERVICES -->
<section class="services" id="services">
    <h2 class="section-title reveal">Specialized Services</h2>
    <div class="services-grid reveal">
        @if(isset($services) && $services->isNotEmpty())
            @foreach($services as $svc)
                <div class="service-card" data-tilt data-tilt-max="10" data-tilt-speed="400" data-tilt-glare="true" data-tilt-max-glare="0.5">
                    <div class="service-icon-bg"></div>
                    <div class="service-icon"><i class="{{ $svc->icon }}"></i></div>
                    <h3 class="service-title">{{ $svc->title }}</h3>
                    <p class="service-desc">{{ $svc->description }}</p>
                </div>
            @endforeach
        @else
            <!-- Placeholder Services if DB is empty -->
            <div class="service-card" data-tilt data-tilt-max="10" data-tilt-speed="400" data-tilt-glare="true" data-tilt-max-glare="0.5">
                <div class="service-icon-bg"></div>
                <div class="service-icon"><i class="fa-solid fa-code"></i></div>
                <h3 class="service-title">Web Development</h3>
                <p class="service-desc">Membangun website modern yang responsif dan performa tinggi menggunakan Laravel & ekosistem terkini.</p>
            </div>
            <div class="service-card" data-tilt data-tilt-max="10" data-tilt-speed="400" data-tilt-glare="true" data-tilt-max-glare="0.5">
                <div class="service-icon-bg"></div>
                <div class="service-icon"><i class="fa-brands fa-js"></i></div>
                <h3 class="service-title">Frontend Engineering</h3>
                <p class="service-desc">Merancang antarmuka interaktif dan dinamis menggunakan Vanilla JS & Alpine.js dengan animasi 3D.</p>
            </div>
            <div class="service-card" data-tilt data-tilt-max="10" data-tilt-speed="400" data-tilt-glare="true" data-tilt-max-glare="0.5">
                <div class="service-icon-bg"></div>
                <div class="service-icon"><i class="fa-solid fa-server"></i></div>
                <h3 class="service-title">Backend Architecture</h3>
                <p class="service-desc">Menyusun arsitektur sistem backend, database schema, dan manajemen server Linux yang handal.</p>
            </div>
        @endif
    </div>
</section>

<style>
/* SERVICES GRID CSS */
.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-top: 50px;
    z-index: 2;
    position: relative;
}

.service-card {
    background: rgba(15, 23, 42, 0.6);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(124, 58, 237, 0.2);
    border-radius: 12px;
    padding: 40px 30px;
    text-align: center;
    position: relative;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5), inset 0 0 0 1px rgba(255,255,255,0.05);
}

.service-card:hover {
    transform: translateY(-15px);
    border-color: rgba(34, 211, 238, 0.5);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6), 0 0 20px rgba(34, 211, 238, 0.2), inset 0 0 20px rgba(124, 58, 237, 0.1);
}

/* Glowing Background in Icon */
.service-icon-bg {
    position: absolute;
    top: 30px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #7c3aed, #22d3ee);
    filter: blur(25px);
    border-radius: 50%;
    opacity: 0.5;
    transition: all 0.4s ease;
}

.service-card:hover .service-icon-bg {
    opacity: 1;
    transform: translateX(-50%) scale(1.5);
    filter: blur(30px);
}

.service-icon {
    font-size: 3rem;
    color: #e2e8f0;
    margin-bottom: 25px;
    position: relative;
    z-index: 2;
    transition: all 0.4s ease;
    text-shadow: 0 0 15px rgba(255, 255, 255, 0.2);
}

.service-card:hover .service-icon {
    color: #22d3ee;
    transform: scale(1.1) rotate(5deg);
    text-shadow: 0 0 25px rgba(34, 211, 238, 0.8);
}

.service-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #f8fafc;
    margin-bottom: 15px;
    position: relative;
    z-index: 2;
    font-family: 'Courier New', Courier, monospace;
    letter-spacing: 1px;
}

.service-card:hover .service-title {
    color: #f472b6;
}

.service-desc {
    font-size: 0.95rem;
    color: #94a3b8;
    line-height: 1.7;
    position: relative;
    z-index: 2;
}
</style>


<!-- PROJECT -->
<section class="project" id="project">
    <h2 class="section-title reveal">Featured Projects</h2>

    <div class="project-grid">
        @if($projects->isEmpty())
            <p style="color: var(--text-muted); text-align: center; width: 100%;">Data projects masih kosong</p>
        @else
            @foreach ($projects as $project)
                <div class="project-card reveal" data-tilt data-tilt-max="15" data-tilt-speed="400" data-tilt-perspective="1000" data-tilt-glare="true" data-tilt-max-glare="0.5" style="transform-style: preserve-3d;">
                    <h3 class="project-title" style="transform: translateZ(40px);">{{ $project->title }}</h3>
                    <p class="project-desc" style="transform: translateZ(30px);">{{ $project->description }}</p>
                    <a href="#" style="color: var(--accent-1); text-decoration: none; font-weight: 500; font-size: 0.95rem; margin-top: auto; display: inline-block; transform: translateZ(50px);">
                        View Project <i class="fa-solid fa-arrow-right" style="margin-left: 5px; font-size: 0.8rem;"></i>
                    </a>
                </div>
            @endforeach
        @endif
    </div>
</section>

<!-- CONTACT -->
<section class="contact" id="contact">
    <h2 class="section-title reveal">Formulir Komplain</h2>

    <div class="contact-wrapper">
        <div class="contact-left reveal">
            <p style="color: var(--text-muted); margin-bottom: 25px; font-size: 1.1rem;">
                Jika mengalami kendala atau ingin bekerja sama, silakan isi form di bawah ini <i class="fa-solid fa-hand-point-down" style="color: #eab308"></i>
            </p>
            
            @if ($errors->any())
                <ul class="error-list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            @if (session('success'))
                <p class="success-msg"><i class="fa-solid fa-circle-check" style="margin-right: 8px;"></i> {{ session('success') }}</p>
            @endif

            <form action="{{ route('portofolio.send') }}" method="POST" class="contact-form">
                @csrf
                <div class="form-group">
                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="{{ old('nama') }}">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Alamat Email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <textarea name="deskripsi" class="form-control" placeholder="Tuliskan keluhan atau pesan kamu..." rows="5">{{ old('deskripsi') }}</textarea>
                </div>
                <button type="submit" class="submit-btn">Kirim Pesan Sekarang <i class="fa-solid fa-paper-plane" style="margin-left: 8px;"></i></button>
            </form>
        </div>

        <div class="contact-info reveal">
            <div class="wa-card" data-tilt data-tilt-max="10" data-tilt-speed="400" data-tilt-perspective="1000" data-tilt-glare="true" data-tilt-max-glare="0.4" style="transform-style: preserve-3d;">
                <i class="fa-brands fa-whatsapp wa-icon" style="transform: translateZ(40px);"></i>
                <p style="color: var(--text-muted); margin-bottom: 10px; transform: translateZ(20px);">Atau hubungi langsung melalui WhatsApp:</p>
                <div class="wa-number" style="transform: translateZ(30px);">+62 852-5282-9756</div>
                <a href="https://api.whatsapp.com/send?phone=6285252829756" target="_blank" class="wa-btn" style="transform: translateZ(50px);">
                    Chat via WhatsApp
                </a>
                
                <div class="social-floats mt-6" style="transform: translateZ(30px); display: flex; justify-content: center; gap: 15px; margin-top: 25px;">
                    <a href="https://instagram.com/fattah" target="_blank" class="social-icon-float ig-float" data-tilt data-tilt-scale="1.2">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://discord.com/users/fattah" target="_blank" class="social-icon-float dc-float" data-tilt data-tilt-scale="1.2">
                        <i class="fa-brands fa-discord"></i>
                    </a>
                    <a href="https://github.com/fattah" target="_blank" class="social-icon-float gh-float" data-tilt data-tilt-scale="1.2">
                        <i class="fa-brands fa-github"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* SOCIAL FLOATING ICONS CSS */
.social-icon-float {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    font-size: 1.5rem;
    color: white;
    text-decoration: none;
    transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    position: relative;
    overflow: hidden;
}

.social-icon-float::before {
    content: '';
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    background: rgba(255, 255, 255, 0.2);
    transform: translateY(100%);
    transition: transform 0.3s ease;
}

.social-icon-float:hover::before {
    transform: translateY(0);
}

.social-icon-float:hover {
    transform: translateY(-8px) scale(1.1);
}

.ig-float {
    background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
    box-shadow: 0 5px 15px rgba(220, 39, 67, 0.4);
    animation: floatAnimation 3s ease-in-out infinite;
}
.ig-float:hover { box-shadow: 0 10px 20px rgba(220, 39, 67, 0.6), 0 0 15px rgba(220, 39, 67, 0.8); }

.dc-float {
    background: #5865F2;
    box-shadow: 0 5px 15px rgba(88, 101, 242, 0.4);
    animation: floatAnimation 3.5s ease-in-out infinite 0.5s;
}
.dc-float:hover { box-shadow: 0 10px 20px rgba(88, 101, 242, 0.6), 0 0 15px rgba(88, 101, 242, 0.8); }

.gh-float {
    background: #333;
    box-shadow: 0 5px 15px rgba(51, 51, 51, 0.4);
    animation: floatAnimation 3.2s ease-in-out infinite 1s;
}
.gh-float:hover { box-shadow: 0 10px 20px rgba(51, 51, 51, 0.6), 0 0 15px rgba(255, 255, 255, 0.4); }

@keyframes floatAnimation {
    0% { transform: translateY(0); }
    50% { transform: translateY(-8px); }
    100% { transform: translateY(0); }
}
</style>

<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.0/vanilla-tilt.min.js"></script>

<script>
/* ============================================ */
/*         JAVASCRIPT INDUSTRY LEVEL 2026       */
/*              SUPER PREMIUM EDITION           */
/*         FORM BERGERAK + EFEK KEREN           */
/* ============================================ */

/* =========================
   PREMIUM LOADER + ENTRANCE
========================= */
window.addEventListener('load', () => {
    // Hero Entrance
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
            el.style.transition = '0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
        }, i * 180);
    });
    
    // Create Scroll Progress Bar (if not exists)
    if (!document.querySelector('.scroll-progress')) {
        const progressBar = document.createElement('div');
        progressBar.className = 'scroll-progress';
        document.body.appendChild(progressBar);
    }
    
    // Preloader fade out after 2 seconds
    setTimeout(() => {
        const preloader = document.getElementById('preloader');
        if (preloader) {
            preloader.classList.add('fade-out');
            // Confetti setelah preloader hilang
            if (typeof confetti === 'function') {
                confetti({
                    particleCount: 150,
                    spread: 70,
                    origin: { y: 0.6 },
                    colors: ['#7c3aed', '#22d3ee', '#ffffff']
                });
            }
        }
    }, 2000);
});

/* =========================
   SCROLL PROGRESS BAR
========================= */
window.addEventListener('scroll', () => {
    const winScroll = document.documentElement.scrollTop;
    const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrolled = (winScroll / height) * 100;
    
    const progressBar = document.querySelector('.scroll-progress');
    if (progressBar) {
        progressBar.style.width = scrolled + '%';
    }
});

/* =========================
   SCROLL REVEAL ENHANCED
========================= */
const reveals = document.querySelectorAll('.reveal');

const revealOnScroll = () => {
    reveals.forEach(el => {
        const top = el.getBoundingClientRect().top;
        const trigger = window.innerHeight - 120;

        if (top < trigger) {
            el.classList.add('active');
            
            if (el.classList.contains('skills')) {
                animateSkillBars();
            }
            if (el.classList.contains('contact')) {
                animateFormFields();
            }
        }
    });
};

window.addEventListener('scroll', revealOnScroll);
window.addEventListener('load', revealOnScroll);

/* =========================
   SKILL BARS ANIMATION
========================= */
function animateSkillBars() {

    document.querySelectorAll('.skill-progress').forEach(bar => {

        if (bar.classList.contains('animated')) return;

        const level = bar.getAttribute('data-level');

        bar.style.width = level + '%';
        bar.classList.add('animated');

        const parent = bar.closest('.skill-item');
        const levelSpan = parent.querySelector('.skill-level');

        let current = 0;
        const target = parseInt(level);

        const counter = setInterval(() => {

            current++;

            levelSpan.textContent = current + '%';

            if (current >= target) {
                clearInterval(counter);
            }

        }, 20);

    });

}

/* =========================
   FORM BERGERAK - PREMIUM EDITION
========================= */
function animateFormFields() {
    const form = document.querySelector('.contact-form');
    if (!form) return;
    
    // Floating Labels Effect
    document.querySelectorAll('.contact-form input, .contact-form textarea').forEach((field, index) => {
        // Create floating label if not exists
        if (!field.parentElement.classList.contains('form-field-wrapper')) {
            const wrapper = document.createElement('div');
            wrapper.className = 'form-field-wrapper';
            wrapper.style.position = 'relative';
            wrapper.style.marginBottom = '20px';
            wrapper.style.transition = 'all 0.3s ease';
            wrapper.style.animation = `slideInRight 0.5s ease ${index * 0.1}s both`;
            
            field.parentNode.insertBefore(wrapper, field);
            wrapper.appendChild(field);
            
            // Add floating label
            const label = document.createElement('label');
            label.textContent = field.placeholder || (field.name === 'nama' ? 'Nama' : field.name === 'email' ? 'Email' : 'Pesan');
            label.style.position = 'absolute';
            label.style.left = '20px';
            label.style.top = '16px';
            label.style.color = '#94a3b8';
            label.style.fontSize = '0.95rem';
            label.style.transition = 'all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
            label.style.pointerEvents = 'none';
            label.style.background = 'rgba(15,23,42,0.9)';
            label.style.padding = '0 8px';
            label.style.borderRadius = '4px';
            label.style.zIndex = '2';
            
            field.parentNode.insertBefore(label, field);
            field.placeholder = '';
            
            // Check if field has value
            if (field.value) {
                label.style.top = '-10px';
                label.style.left = '12px';
                label.style.fontSize = '0.75rem';
                label.style.color = '#22d3ee';
            }
            
            // Focus events
            field.addEventListener('focus', function() {
                label.style.top = '-10px';
                label.style.left = '12px';
                label.style.fontSize = '0.75rem';
                label.style.color = '#22d3ee';
                this.style.borderColor = '#22d3ee';
                this.style.boxShadow = '0 0 0 3px rgba(34,211,238,0.1), 0 10px 20px -10px rgba(34,211,238,0.3)';
                this.style.transform = 'translateY(-2px)';
                
                // Wrapper animation
                this.parentElement.style.transform = 'translateX(5px)';
            });
            
            field.addEventListener('blur', function() {
                if (!this.value) {
                    label.style.top = '16px';
                    label.style.left = '20px';
                    label.style.fontSize = '0.95rem';
                    label.style.color = '#94a3b8';
                }
                this.style.borderColor = 'rgba(124,58,237,0.3)';
                this.style.boxShadow = 'none';
                this.style.transform = 'translateY(0)';
                this.parentElement.style.transform = 'translateX(0)';
            });
            
            field.addEventListener('input', function() {
                if (this.value) {
                    label.style.top = '-10px';
                    label.style.left = '12px';
                    label.style.fontSize = '0.75rem';
                    label.style.color = '#22d3ee';
                }
            });
        }
    });
}

/* =========================
   FORM SHAKE ERROR ANIMATION
========================= */
function shakeForm() {
    const form = document.querySelector('.contact-form');
    form.style.animation = 'shake 0.5s cubic-bezier(0.36, 0.07, 0.19, 0.97) both';
    setTimeout(() => {
        form.style.animation = '';
    }, 500);
    
    // Highlight error fields
    document.querySelectorAll('.contact-form input, .contact-form textarea').forEach(field => {
        if (!field.value) {
            field.style.borderColor = '#ef4444';
            field.style.boxShadow = '0 0 0 3px rgba(239,68,68,0.1)';
            
            setTimeout(() => {
                field.style.borderColor = 'rgba(124,58,237,0.3)';
                field.style.boxShadow = 'none';
            }, 3000);
        }
    });
}

/* =========================
   FORM SUCCESS ANIMATION
========================= */
function successForm() {
    const form = document.querySelector('.contact-form');
    form.style.animation = 'pulseSuccess 0.8s ease';
    
    // Confetti on success
    if (typeof confetti === 'function') {
        confetti({
            particleCount: 150,
            spread: 60,
            origin: { y: 0.6 },
            colors: ['#7c3aed', '#22d3ee', '#10b981']
        });
    }
    
    // Show success floating message
    const successMsg = document.createElement('div');
    successMsg.className = 'floating-success';
    successMsg.innerHTML = '✓ Pesan Terkirim!';
    successMsg.style.position = 'fixed';
    successMsg.style.top = '50%';
    successMsg.style.left = '50%';
    successMsg.style.transform = 'translate(-50%, -50%)';
    successMsg.style.background = 'linear-gradient(135deg, #10b981, #059669)';
    successMsg.style.color = 'white';
    successMsg.style.padding = '16px 32px';
    successMsg.style.borderRadius = '50px';
    successMsg.style.fontWeight = 'bold';
    successMsg.style.boxShadow = '0 20px 40px rgba(16,185,129,0.3)';
    successMsg.style.zIndex = '99999';
    successMsg.style.animation = 'slideInUp 0.3s ease';
    
    document.body.appendChild(successMsg);
    
    setTimeout(() => {
        successMsg.style.animation = 'slideOutDown 0.3s ease';
        setTimeout(() => successMsg.remove(), 300);
    }, 3000);
}

/* =========================
   FORM TYPING ANIMATION
========================= */
document.querySelectorAll('.contact-form input, .contact-form textarea').forEach(field => {
    field.addEventListener('keydown', function(e) {
        // Ripple effect on key press
        const ripple = document.createElement('span');
        ripple.className = 'key-ripple';
        ripple.style.position = 'absolute';
        ripple.style.width = '5px';
        ripple.style.height = '5px';
        ripple.style.background = '#22d3ee';
        ripple.style.borderRadius = '50%';
        ripple.style.left = e.offsetX + 'px';
        ripple.style.top = e.offsetY + 'px';
        ripple.style.animation = 'rippleExpand 0.6s ease-out';
        
        this.parentElement.style.position = 'relative';
        this.parentElement.appendChild(ripple);
        
        setTimeout(() => ripple.remove(), 600);
    });
});

/* =========================
   LIVE FORM VALIDATION
========================= */
document.querySelectorAll('.contact-form input, .contact-form textarea').forEach(field => {
    field.addEventListener('input', function() {
        // Email validation
        if (this.type === 'email' && this.value) {
            const isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.value);
            if (isValid) {
                this.style.borderColor = '#10b981';
                this.style.boxShadow = '0 0 0 3px rgba(16,185,129,0.1)';
            } else {
                this.style.borderColor = '#f59e0b';
                this.style.boxShadow = '0 0 0 3px rgba(245,158,11,0.1)';
            }
        }
        
        // Character counter for textarea
        if (this.tagName === 'TEXTAREA') {
            const maxLength = 500;
            const currentLength = this.value.length;
            const remaining = maxLength - currentLength;
            
            let counter = this.parentElement.querySelector('.char-counter');
            if (!counter) {
                counter = document.createElement('small');
                counter.className = 'char-counter';
                counter.style.position = 'absolute';
                counter.style.bottom = '10px';
                counter.style.right = '20px';
                counter.style.fontSize = '0.75rem';
                counter.style.color = '#94a3b8';
                this.parentElement.appendChild(counter);
            }
            
            counter.textContent = `${currentLength}/${maxLength}`;
            
            if (remaining < 50) {
                counter.style.color = '#f59e0b';
            }
            if (remaining < 20) {
                counter.style.color = '#ef4444';
            }
        }
    });
});

/* =========================
   FORM AUTO-TYPE PLACEHOLDER
========================= */
const formPhrases = [
    "Masukkan nama lengkap...",
    "Email aktif kamu...",
    "Tulis pesan atau pertanyaan..."
];

let formPhraseIdx = 0;
let formCharIdx = 0;
let isRemovingForm = false;
let currentField = 0;

function typeFormPlaceholders() {
    const fields = document.querySelectorAll('.contact-form input, .contact-form textarea');
    if (fields.length === 0) return;
    
    const field = fields[currentField];
    const placeholder = field.placeholder;
    const phrases = formPhrases[currentField];
    
    if (!phrases) {
        currentField = (currentField + 1) % fields.length;
        formPhraseIdx = 0;
        formCharIdx = 0;
        setTimeout(typeFormPlaceholders, 2000);
        return;
    }
    
    if (isRemovingForm) {
        field.placeholder = phrases.substring(0, formCharIdx - 1);
        formCharIdx--;
    } else {
        field.placeholder = phrases.substring(0, formCharIdx + 1);
        formCharIdx++;
    }
    
    let speed = isRemovingForm ? 30 : 80;
    
    if (!isRemovingForm && formCharIdx === phrases.length) {
        isRemovingForm = true;
        speed = 2000;
    } else if (isRemovingForm && formCharIdx === 0) {
        isRemovingForm = false;
        currentField = (currentField + 1) % fields.length;
        speed = 500;
    }
    
    setTimeout(typeFormPlaceholders, speed);
}

/* =========================
   MAGNETIC BUTTONS
========================= */
document.querySelectorAll('.btn, .contact-btn, .hero-btn').forEach(btn => {
    btn.addEventListener('mousemove', (e) => {
        const rect = btn.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        
        const centerX = rect.width / 2;
        const centerY = rect.height / 2;
        
        const moveX = (x - centerX) * 0.15;
        const moveY = (y - centerY) * 0.15;
        
        btn.style.transform = `translate(${moveX}px, ${moveY}px) scale(1.03)`;
    });
    
    btn.addEventListener('mouseleave', () => {
        btn.style.transform = 'translate(0, 0) scale(1)';
    });
    
    // Ripple effect on click
    btn.addEventListener('click', function(e) {
        const ripple = document.createElement('span');
        ripple.className = 'btn-ripple';
        ripple.style.position = 'absolute';
        ripple.style.width = '0';
        ripple.style.height = '0';
        ripple.style.borderRadius = '50%';
        ripple.style.background = 'rgba(255,255,255,0.4)';
        ripple.style.left = e.offsetX + 'px';
        ripple.style.top = e.offsetY + 'px';
        ripple.style.transform = 'translate(-50%, -50%)';
        ripple.style.animation = 'btnRipple 0.6s ease-out';
        
        this.style.position = 'relative';
        this.style.overflow = 'hidden';
        this.appendChild(ripple);
        
        setTimeout(() => ripple.remove(), 600);
    });
});

/* =========================
   3D TILT EFFECT (REMOVED, NOW USING VANILLA TILT)
========================= */

/* =========================
   HERO PARALLAX ENHANCED
========================= */
const parallax = document.querySelector('.parallax');
const heroVisual = document.querySelector('.hero-visual');

if (parallax) {
    document.addEventListener('mousemove', e => {
        const x = (e.clientX / window.innerWidth - 0.5) * 40;
        const y = (e.clientY / window.innerHeight - 0.5) * 40;
        
        parallax.style.transform = `translate(${x}px, ${y}px)`;
        
        // Move background text
        if (heroVisual) {
            const bgX = (e.clientX / window.innerWidth - 0.5) * 20;
            const bgY = (e.clientY / window.innerHeight - 0.5) * 20;
            heroVisual.style.setProperty('--pseudo-x', bgX + 'px');
            heroVisual.style.setProperty('--pseudo-y', bgY + 'px');
        }
    });
}

/* =========================
   TYPEWRITER EFFECT PREMIUM
========================= */
const typingElement = document.getElementById('typing');
const phrases = ["Fattah", "Software Engineer", "Fullstack Developer", "Problem Solver"]; 
let phraseIdx = 0;
let charIdx = 0;
let isRemoving = false;

function playTyping() {
    if (!typingElement) return;
    
    const currentText = phrases[phraseIdx];
    if (isRemoving) {
        typingElement.textContent = currentText.substring(0, charIdx - 1);
        charIdx--;
    } else {
        typingElement.textContent = currentText.substring(0, charIdx + 1);
        charIdx++;
    }

    let speed = isRemoving ? 60 : 120;

    if (!isRemoving && charIdx === currentText.length) {
        isRemoving = true;
        speed = 2000; 
    } else if (isRemoving && charIdx === 0) {
        isRemoving = false;
        phraseIdx = (phraseIdx + 1) % phrases.length;
        speed = 500;
    }
    setTimeout(playTyping, speed);
}

/* =========================
   SMOOTH SCROLL
========================= */
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const targetId = this.getAttribute('href');
        const targetElement = document.querySelector(targetId);
        
        if (targetElement) {
            targetElement.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

/* =========================
   NAVBAR SCROLL EFFECT
========================= */
const navbar = document.querySelector('.navbar');
window.addEventListener('scroll', () => {
    if (window.scrollY > 100) {
        navbar.style.background = 'rgba(15, 23, 42, 0.8)';
        navbar.style.backdropFilter = 'blur(20px)';
        navbar.style.boxShadow = '0 15px 40px rgba(0,0,0,0.6)';
        navbar.style.padding = '0 45px';
        navbar.style.top = '10px';
    } else {
        navbar.style.background = 'rgba(15, 23, 42, 0.4)';
        navbar.style.boxShadow = '0 10px 30px rgba(0, 0, 0, 0.4)';
        navbar.style.padding = '0 35px';
        navbar.style.top = '20px';
    }
});

/* =========================
   PARTICLE BACKGROUND
========================= */
function createParticles() {
    if (document.querySelector('.particle-bg')) return;
    
    const particleContainer = document.createElement('div');
    particleContainer.className = 'particle-bg';
    particleContainer.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: -1;
    `;
    document.body.appendChild(particleContainer);
    
    for (let i = 0; i < 50; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        
        const size = Math.random() * 6 + 2;
        const posX = Math.random() * 100;
        const duration = Math.random() * 20 + 15;
        const delay = Math.random() * 10;
        
        particle.style.cssText = `
            position: absolute;
            width: ${size}px;
            height: ${size}px;
            background: ${Math.random() > 0.5 ? '#7c3aed' : '#22d3ee'};
            border-radius: 50%;
            left: ${posX}%;
            opacity: ${Math.random() * 0.2 + 0.1};
            animation: floatParticle ${duration}s ${delay}s infinite linear;
            box-shadow: 0 0 ${size * 2}px ${Math.random() > 0.5 ? '#7c3aed' : '#22d3ee'};
        `;
        
        particleContainer.appendChild(particle);
    }
}

/* =========================
   CURSOR EFFECT DELETED AS PER REQUEST
========================= */

/* =========================
   INTERSECTION OBSERVER
========================= */
const sectionObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('section-visible');
            
            if (entry.target.classList.contains('skills')) {
                animateSkillBars();
            }
            if (entry.target.classList.contains('contact')) {
                animateFormFields();
            }
        }
    });
}, { threshold: 0.2, rootMargin: '0px' });

document.querySelectorAll('section').forEach(section => {
    sectionObserver.observe(section);
});

/* =========================
   TOUCH DEVICE DETECTION
========================= */
function isTouchDevice() {
    return ('ontouchstart' in window) || 
           (navigator.maxTouchPoints > 0) || 
           (navigator.msMaxTouchPoints > 0);
}

if (isTouchDevice()) {
    document.body.classList.add('touch-device');
}

/* =========================
   DEBOUNCE SCROLL
========================= */
function debounce(func, wait = 100) {
    let timeout;
    return function(...args) {
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(this, args), wait);
    };
}

const optimizedReveal = debounce(revealOnScroll, 50);
window.addEventListener('scroll', optimizedReveal);

/* =========================
   FORM SUBMIT HANDLER
========================= */
document.querySelector('.contact-form')?.addEventListener('submit', function(e) {
    // Check if form is empty
    let isValid = true;
    this.querySelectorAll('input, textarea').forEach(field => {
        if (!field.value) {
            isValid = false;
        }
    });
    
    if (!isValid) {
        e.preventDefault();
        shakeForm();
    } else {
        // Success animation will be triggered after submit
        setTimeout(successForm, 100);
    }
});

/* =========================
   INITIALIZE EVERYTHING
========================= */
document.addEventListener('DOMContentLoaded', () => {
    console.log('%c🚀 PORTFOLIO FATTAH - INDUSTRY LEVEL', 'font-size: 24px; color: #7c3aed; font-weight: bold; text-shadow: 0 0 20px #7c3aed;');
    console.log('%c🔥 Form Bergerak | 3D Tilt | Magnetic | Particles | Cursor', 'font-size: 16px; color: #22d3ee;');
    console.log('%c✨ Ready to impress!', 'font-size: 14px; color: #ffffff;');
    
    // Reset skill bars
    document.querySelectorAll('.skill-progress').forEach(bar => {
        bar.style.width = '0';
    });
    
    // Start typing
    setTimeout(playTyping, 1000);
    
    // Start form placeholder typing
    setTimeout(typeFormPlaceholders, 2000);
    
    // Create particles
    createParticles();
    
    
    // Initial reveal
    revealOnScroll();
    
    // Add scroll-progress (if not exists)
    if (!document.querySelector('.scroll-progress')) {
        const progressBar = document.createElement('div');
        progressBar.className = 'scroll-progress';
        document.body.appendChild(progressBar);
    }
});
</script>

<!-- TAMBAHKAN META TAG UNTUK OPTIMASI -->
<meta name="theme-color" content="#020617">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">


@endsection
