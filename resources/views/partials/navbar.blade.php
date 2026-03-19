<nav class="navbar" id="navbar">
    <div style="display: flex; justify-content: space-between; width: 100%; align-items: center;">
        <div class="logo">Fattah</div>
        <!-- Hamburger Icon for Mobile -->
        <div class="hamburger" id="hamburger" style="display: none; cursor: pointer; color: white;">
            <i class="fa-solid fa-bars" style="font-size: 1.5rem;"></i>
        </div>
    </div>
    
    <ul id="nav-links">
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#skills">Skills</a></li>
        <li><a href="#ee">E.E</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#project">Project</a></li>
        <li><a href="#contact">Contact</a></li>
        @auth
            @if(Auth::user()->is_admin)
                <li><a href="{{ route('dashboard') }}" style="color: #22d3ee; font-weight: bold;">Dashboard</a></li>
            @else
                <li>
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" style="color: #ef4444;">Logout</a>
                    </form>
                </li>
            @endif
        @else
            <li><a href="/login" style="color: #7c3aed; font-weight: bold;">Login</a></li>
        @endauth
    </ul>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const hamburger = document.getElementById('hamburger');
        const navLinks = document.getElementById('nav-links');
        
        if (hamburger) {
            hamburger.addEventListener('click', function() {
                navLinks.classList.toggle('active');
            });
        }
    });
</script>
