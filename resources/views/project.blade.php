<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Project | Portofolio Fattah</title>
    <link rel="stylesheet" href="/css/hais.css">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="logo">Fattah</div>
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/login">Login</a></li>
    </ul>
</nav>

<!-- HEADER PROJECT -->
<section class="project-header reveal">
    <h1>{{ $project }}</h1>
    <p>Kumpulan project yang pernah saya buat</p>
</section>

<!-- PROJECT LIST -->
<section class="project-wrapper reveal">

    <div class="project-list drag-scroll">

        @if(isset($message) && $message)
            <p class="reveal">{{ $message }}</p>
        @endif

        @if(isset($projects) && $projects->count())
            @foreach($projects as $projectItem)
                <div class="project-card reveal">
                    <h3>{{ $projectItem->title }}</h3>
                    <p>{{ $projectItem->description }}</p>
                    <a href="{{ $projectItem->link ?? '#' }}" class="btn">Lihat Project</a>
                </div>
            @endforeach
        @endif

    </div>

</section>


<footer class="footer reveal">
    <p>© 2026 Fattah. All rights reserved.</p>
</footer>

<!-- JS ANIMATION -->
<script>
/* =========================
   SCROLL REVEAL
========================= */
const reveals = document.querySelectorAll('.reveal');

const revealOnScroll = () => {
    reveals.forEach(el => {
        const windowHeight = window.innerHeight;
        const revealTop = el.getBoundingClientRect().top;
        const revealPoint = 120;

        if (revealTop < windowHeight - revealPoint) {
            el.classList.add('active');
        }
    });
};

window.addEventListener('scroll', revealOnScroll);
revealOnScroll();


/* =========================
   3D HOVER TILT (PROJECT CARD)
========================= */
document.querySelectorAll('.project-card').forEach(card => {
    card.addEventListener('mousemove', e => {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        const rotateX = ((y / rect.height) - 0.5) * 10;
        const rotateY = ((x / rect.width) - 0.5) * -10;

        card.style.transform = `
            rotateX(${rotateX}deg)
            rotateY(${rotateY}deg)
            translateY(-12px)
        `;
    });

    card.addEventListener('mouseleave', () => {
        card.style.transform = 'translateY(0)';
    });
});


/* =========================
   DRAG SCROLL HORIZONTAL
========================= */
const slider = document.querySelector('.drag-scroll');

if (slider) {
    let isDown = false;
    let startX;
    let scrollLeft;

    slider.addEventListener('mousedown', e => {
        isDown = true;
        startX = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
        slider.classList.add('dragging');
    });

    slider.addEventListener('mouseleave', () => {
        isDown = false;
        slider.classList.remove('dragging');
    });

    slider.addEventListener('mouseup', () => {
        isDown = false;
        slider.classList.remove('dragging');
    });

    slider.addEventListener('mousemove', e => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - slider.offsetLeft;
        const walk = (x - startX) * 1.8; // speed
        slider.scrollLeft = scrollLeft - walk;
    });
}
</script>

</body>
</html>

