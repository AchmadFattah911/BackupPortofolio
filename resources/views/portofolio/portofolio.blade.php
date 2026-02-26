@extends('layouts.main')

@section('title', 'Portofolio')

@section('content')

<!-- HERO -->
<div class="hero" id="home">
    <div class="hero-text">
        <h1 class="hero-title">
            Halo, Saya <span id="typing" class="typing-text"></span>
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
        <h2 style="font-size: 2.5rem; margin-bottom: 40px;">About Me</h2>
        
        <!-- FOTO DI KIRI, TEXT DI KANAN - V2 -->
        <div style="display: flex; align-items: center; gap: 60px; flex-wrap: wrap;">
            
            <!-- FOTO UKURAN BIG SIZE -->
            <div style="flex: 0 0 auto;">
                <img src="https://i.pinimg.com/1200x/12/c7/26/12c726b26ed10283077c946882d64503.jpg" 
                     alt="Foto Profil" 
                     style="width: 500px; 
                            height: 280px; 
                            border-radius: 12px; 
                            object-fit: cover; 
                            display: block;
                            border: 4px solid #2c3e50;
                            box-shadow: 0 15px 30px rgba(0,0,0,0.4);">
                
                <!-- Badge di bawah foto -->
                <div style="margin-top: 15px; display: flex; gap: 15px;">
                    <span style="background: #2c3e50; color: white; padding: 6px 18px; border-radius: 6px; font-size: 0.9rem; font-weight: 600;">Cantik Nda?</span>
                    <span style="background: #34495e; color: white; padding: 6px 18px; border-radius: 6px; font-size: 0.9rem; font-weight: 600;">My Bini</span>
                </div>
            </div>
            
            <!-- TEXT BIASA DI KANAN - TANPA BUNGKUS -->
            <div style="flex: 1; min-width: 300px;">
                <p style="font-size: 1.3rem; line-height: 1.8; color: #ecf0f1; margin: 0;">
                    Saya adalah web developer yang fokus pada pembuatan UI modern,
                    interaktif, dan performa tinggi menggunakan Laravel.
                    Hobi saya bermain game PC seperti Steam, Riot, Roblox,
                    dan Mobile Legends di mobile.
                    Jika ingin bertanya lebih lanjut, silakan hubungi saya
                    melalui menu contact di bawah.
                </p>
            </div>
        </div>
    </div>
</section> 

<!-- SKILLS -->
<section class="skills full-section reveal">
    <div class="content">
        <h2>Skills</h2>

        @if ($skills->isEmpty())
            <p class="text-center">Data skills masih kosong</p>
        @else
            <ul class="skills-list">
                @foreach ($skills as $skill)
                    <li class="skill-item">
                        <div class="skill-header">
                            <span class="skill-name">{{ $skill->name }}</span>
                            <span class="skill-level">{{ $skill->level }}%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" data-level="{{ $skill->level }}"></div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
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

    <div class="contact-grid-container">
        <div class="contact-left">
            <p class="contact-subtitle">Jika mengalami kendala, silakan isi form di bawah 👇</p>
            
            @if ($errors->any())
                <ul class="error-list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            @if (session('success'))
                <p class="success-msg">{{ session('success') }}</p>
            @endif

            <form action="{{ route('portofolio.send') }}" method="POST" class="contact-form">
                @csrf
                <input type="text" name="nama" placeholder="Nama" value="{{ old('nama') }}">
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                <textarea name="deskripsi" placeholder="Tuliskan keluhan atau pesan kamu..." rows="5">{{ old('deskripsi') }}</textarea>
                <button type="submit" class="contact-btn">Kirim Pesan</button>
            </form>
        </div>

        <div class="contact-right">
            <div class="wa-card">
                <p>Atau hubungi langsung melalui WhatsApp:</p>
                <h3 style="margin: 10px 0; color: #22d3ee;">+62 852-5282-9756</h3>
                <a href="https://api.whatsapp.com/send?phone=6285252829756" target="_blank" class="contact-btn">
                    Chat via WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1"></script>

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
        const level = bar.getAttribute('data-level');
        if (level && !bar.style.width) {
            bar.style.width = level + '%';
            
            const parent = bar.closest('.skill-item');
            const levelSpan = parent?.querySelector('.skill-level');
            if (levelSpan) {
                const target = parseInt(level);
                let current = 0;
                const increment = target / 50;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        levelSpan.textContent = target + '%';
                        clearInterval(timer);
                    } else {
                        levelSpan.textContent = Math.floor(current) + '%';
                    }
                }, 20);
            }
        }
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
   3D TILT EFFECT
========================= */
document.querySelectorAll('.card, .skill-item, .wa-card, .about img').forEach(card => {
    card.addEventListener('mousemove', (e) => {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        
        const centerX = rect.width / 2;
        const centerY = rect.height / 2;
        
        const rotateY = ((x - centerX) / centerX) * 10;
        const rotateX = ((centerY - y) / centerY) * 10;
        
        card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-8px) scale(1.02)`;
    });
    
    card.addEventListener('mouseleave', () => {
        card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateY(0) scale(1)';
    });
});

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
const phrases = ["Fattah", "Web Developer", "UI Enthusiast", "Gamer", "Problem Solver"]; 
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
        navbar.style.background = 'rgba(2,6,23,0.98)';
        navbar.style.backdropFilter = 'blur(12px)';
        navbar.style.borderBottom = '1px solid rgba(124,58,237,0.4)';
        navbar.style.boxShadow = '0 10px 30px -10px rgba(0,0,0,0.5)';
    } else {
        navbar.style.background = 'rgba(2,6,23,0.8)';
        navbar.style.borderBottom = '1px solid rgba(124,58,237,0.2)';
        navbar.style.boxShadow = 'none';
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
   CURSOR EFFECT
========================= */
function createCustomCursor() {
    if (document.querySelector('.premium-cursor') || window.innerWidth <= 768) return;
    
    const cursor = document.createElement('div');
    cursor.className = 'premium-cursor';
    cursor.style.cssText = `
        width: 8px;
        height: 8px;
        background: #22d3ee;
        border-radius: 50%;
        position: fixed;
        pointer-events: none;
        z-index: 99999;
        mix-blend-mode: difference;
        transition: transform 0.1s ease;
        box-shadow: 0 0 20px #7c3aed;
    `;
    
    const cursorFollower = document.createElement('div');
    cursorFollower.className = 'premium-cursor-follower';
    cursorFollower.style.cssText = `
        width: 40px;
        height: 40px;
        border: 2px solid rgba(124, 58, 237, 0.5);
        border-radius: 50%;
        position: fixed;
        pointer-events: none;
        z-index: 99998;
        transition: all 0.2s cubic-bezier(0.25, 1, 0.5, 1);
        backdrop-filter: blur(4px);
    `;
    
    document.body.appendChild(cursor);
    document.body.appendChild(cursorFollower);
    
    document.addEventListener('mousemove', (e) => {
        cursor.style.left = e.clientX + 'px';
        cursor.style.top = e.clientY + 'px';
        
        setTimeout(() => {
            cursorFollower.style.left = e.clientX + 'px';
            cursorFollower.style.top = e.clientY + 'px';
        }, 50);
    });
    
    // Hover effect
    document.querySelectorAll('a, button, .btn, .card, img').forEach(el => {
        el.addEventListener('mouseenter', () => {
            cursor.style.transform = 'scale(2)';
            cursorFollower.style.transform = 'scale(1.5)';
            cursorFollower.style.borderColor = '#22d3ee';
        });
        
        el.addEventListener('mouseleave', () => {
            cursor.style.transform = 'scale(1)';
            cursorFollower.style.transform = 'scale(1)';
            cursorFollower.style.borderColor = 'rgba(124, 58, 237, 0.5)';
        });
    });
}

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
    
    // Create custom cursor (non-touch)
    if (!isTouchDevice()) {
        createCustomCursor();
    }
    
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
