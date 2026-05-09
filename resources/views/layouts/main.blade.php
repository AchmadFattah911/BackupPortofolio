<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portofolio Premium')</title>

    <!-- Google Fonts: Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Shippori+Mincho:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/hai.css') }}">
    <style>
        /* CYBERPUNK LOADING SCREEN */
        #cyber-preloader {
            position: fixed;
            top: 0; left: 0;
            width: 100vw; height: 100vh;
            background-color: #050505;
            z-index: 999999;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            transition: opacity 1.5s ease-out, visibility 1.5s ease-out;
        }
        .cyber-preloader-bg {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: repeating-linear-gradient(
                transparent 0,
                rgba(0, 0, 0, 0.4) 2px,
                transparent 3px
            );
            z-index: 1;
            pointer-events: none;
        }
        #cyber-preloader::before {
            content: '';
            position: absolute;
            width: 200%; height: 200%;
            background-image: 
                linear-gradient(rgba(34, 211, 238, 0.2) 1px, transparent 1px),
                linear-gradient(90deg, rgba(34, 211, 238, 0.2) 1px, transparent 1px);
            background-size: 50px 50px;
            background-position: center center;
            transform: perspective(500px) rotateX(60deg) translateY(-100px) translateZ(-200px);
            animation: cyberGrid 5s linear infinite;
            z-index: 0;
            opacity: 0.4;
        }
        @keyframes cyberGrid {
            0% { transform: perspective(500px) rotateX(60deg) translateY(0) translateZ(-200px); }
            100% { transform: perspective(500px) rotateX(60deg) translateY(50px) translateZ(-200px); }
        }
        .cyber-text-wrapper {
            position: relative;
            z-index: 10;
        }
        .glitch-text {
            font-family: 'Courier New', Courier, monospace;
            font-size: 5rem;
            font-weight: bold;
            color: #ef4444; /* Cyberpunk Red */
            text-transform: uppercase;
            position: relative;
            letter-spacing: 10px;
            text-shadow: 0 0 10px rgba(239, 68, 68, 0.8), 0 0 20px rgba(239, 68, 68, 0.4);
            transition: opacity 0.5s ease-in-out;
        }
        @media (max-width: 768px) {
            .glitch-text {
                font-size: 2.5rem;
            }
        }
        .glitch-text::before,
        .glitch-text::after {
            content: attr(data-text);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #050505;
            color: #ef4444;
        }

        /* Sliced scatter glitch using clip-path with step-end to prevent vibrating */
        .glitch-text::before {
            left: 5px;
            text-shadow: -2px 0 #22d3ee;
            animation: glitch-slice-1 2s infinite step-end;
        }
        .glitch-text::after {
            left: -5px;
            text-shadow: -2px 0 #7c3aed;
            animation: glitch-slice-2 2.5s infinite step-end;
        }

        @keyframes glitch-slice-1 {
            0%, 100% { clip-path: polygon(0 15%, 100% 15%, 100% 30%, 0 30%); transform: translate(-5px, 0); }
            10% { clip-path: polygon(0 45%, 100% 45%, 100% 60%, 0 60%); transform: translate(5px, 0); }
            20% { clip-path: polygon(0 10%, 100% 10%, 100% 20%, 0 20%); transform: translate(-10px, 0); }
            30% { clip-path: polygon(0 60%, 100% 60%, 100% 80%, 0 80%); transform: translate(10px, 0); }
            40% { clip-path: polygon(0 80%, 100% 80%, 100% 100%, 0 100%); transform: translate(-5px, 0); }
            50% { clip-path: polygon(0 30%, 100% 30%, 100% 50%, 0 50%); transform: translate(5px, 0); }
            60% { clip-path: polygon(0 50%, 100% 50%, 100% 60%, 0 60%); transform: translate(-10px, 0); }
            70% { clip-path: polygon(0 20%, 100% 20%, 100% 40%, 0 40%); transform: translate(10px, 0); }
            80% { clip-path: polygon(0 70%, 100% 70%, 100% 90%, 0 90%); transform: translate(-5px, 0); }
            90% { clip-path: polygon(0 0, 100% 0, 100% 15%, 0 15%); transform: translate(5px, 0); }
        }

        @keyframes glitch-slice-2 {
            0%, 100% { clip-path: polygon(0 25%, 100% 25%, 100% 40%, 0 40%); transform: translate(10px, 0); }
            15% { clip-path: polygon(0 55%, 100% 55%, 100% 70%, 0 70%); transform: translate(-10px, 0); }
            30% { clip-path: polygon(0 15%, 100% 15%, 100% 35%, 0 35%); transform: translate(15px, 0); }
            45% { clip-path: polygon(0 80%, 100% 80%, 100% 95%, 0 95%); transform: translate(-5px, 0); }
            60% { clip-path: polygon(0 40%, 100% 40%, 100% 60%, 0 60%); transform: translate(10px, 0); }
            75% { clip-path: polygon(0 5%, 100% 5%, 100% 20%, 0 20%); transform: translate(-15px, 0); }
            90% { clip-path: polygon(0 65%, 100% 65%, 100% 80%, 0 80%); transform: translate(5px, 0); }
        }

        /* Intense state makes the shattered pieces scatter further, and look broken, without shaking */
        .glitch-intense {
            animation: glitch-scatter-main 0.3s infinite step-end;
            color: rgba(239, 68, 68, 0.4);
        }
        .glitch-intense::before {
            animation: glitch-scatter-1 0.3s infinite step-end;
            left: 0;
        }
        .glitch-intense::after {
            animation: glitch-scatter-2 0.3s infinite step-end;
            left: 0;
        }

        @keyframes glitch-scatter-main {
            0%, 100% { clip-path: polygon(0 0, 100% 0, 100% 20%, 0 20%); transform: translate(5px, -5px); }
            33% { clip-path: polygon(0 40%, 100% 40%, 100% 60%, 0 60%); transform: translate(-5px, 5px); }
            66% { clip-path: polygon(0 80%, 100% 80%, 100% 100%, 0 100%); transform: translate(5px, 0); }
        }

        @keyframes glitch-scatter-1 {
            0%, 100% { clip-path: polygon(0 20%, 100% 20%, 100% 40%, 0 40%); transform: translate(-15px, 5px) skewX(5deg); }
            33% { clip-path: polygon(0 60%, 100% 60%, 100% 80%, 0 80%); transform: translate(20px, -5px) skewX(-5deg); }
            66% { clip-path: polygon(0 10%, 100% 10%, 100% 30%, 0 30%); transform: translate(-10px, 10px) skewX(10deg); }
        }

        @keyframes glitch-scatter-2 {
            0%, 100% { clip-path: polygon(0 80%, 100% 80%, 100% 100%, 0 100%); transform: translate(15px, -10px) skewX(-10deg); }
            33% { clip-path: polygon(0 0, 100% 0, 100% 20%, 0 20%); transform: translate(-20px, 15px) skewX(15deg); }
            66% { clip-path: polygon(0 40%, 100% 40%, 100% 60%, 0 60%); transform: translate(10px, -15px) skewX(-5deg); }
        }

        .fade-out-glitch {
            opacity: 0 !important;
        }

        /* Glitch Done State - SUCCESS ACCESS */
        .glitch-text.done-state {
            color: #22d3ee;
            text-shadow: 0 0 20px #22d3ee, 0 0 40px rgba(34, 211, 238, 0.5);
            animation: none !important;
            letter-spacing: 10px;
            transition: opacity 0.8s ease-in, transform 0.8s ease-out;
            transform: scale(1.1);
            filter: none;
            opacity: 1;
        }
        .glitch-text.done-state::before, 
        .glitch-text.done-state::after {
            display: none;
        }
    </style>
</head>
<body>

    <!-- CYBERPUNK LOADING SCREEN -->
    <div id="cyber-preloader">
        <div class="cyber-preloader-bg"></div>
        <div class="cyber-text-wrapper" id="cyber-wrapper">
            <h1 class="glitch-text" id="cyber-text" data-text="ERROR">ERROR</h1>
        </div>
    </div>

    <!-- NAVBAR -->
    @include('partials.navbar')

    <!-- ISI HALAMAN -->
    <main>
    @yield('content')
    </main>

    <!-- FOOTER -->
    @include('partials.footer')

    <!-- CYBERPUNK SCRIPT -->
    <script>
        window.addEventListener('load', () => {
            const preloader = document.getElementById('cyber-preloader');
            const wrapper = document.getElementById('cyber-wrapper');
            const textElement = document.getElementById('cyber-text');
            
            if(preloader) {
                // Step 1: After a short initial load, intensify the scatter
                setTimeout(() => {
                    textElement.classList.add('glitch-intense');
                }, 1000); // 1 second of normal glitch, then intense scatter

                // Step 2: Fade out the glitch text perfectly
                setTimeout(() => {
                    textElement.classList.add('fade-out-glitch');
                }, 2500); 

                // Step 3: Change text to SUCCESS ACCESS and fade it back in
                setTimeout(() => {
                    textElement.classList.remove('glitch-intense');
                    textElement.classList.remove('fade-out-glitch');
                    
                    textElement.textContent = 'SUCCESS ACCESS';
                    textElement.setAttribute('data-text', 'SUCCESS ACCESS');
                    textElement.classList.add('done-state');
                }, 3100); // After fade out completes

                // Step 4: Fade out the preloader slowly
                setTimeout(() => {
                    preloader.style.opacity = '0';
                    preloader.style.visibility = 'hidden';
                }, 4800); // Wait for the success access to be read
            }
        });
    </script>
</body>
</html>
