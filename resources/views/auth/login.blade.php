<x-guest-layout>
    <style>
        /* CSS Untuk Efek Flip 3D Keren */
        .perspective-1000 {
            perspective: 1500px;
        }

        @keyframes entranceAnim {
            0% { opacity: 0; transform: translateY(50px) scale(0.95); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
        }

        .auth-entrance {
            animation: entranceAnim 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .flip-container {
            width: 100%;
            min-height: 600px;
            position: relative;
            transition: transform 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transform-style: preserve-3d;
        }

        .flip-front, .flip-back {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
            border-radius: 1.5rem;
            display: flex;
            flex-direction: column;
        }

        .flip-front {
            z-index: 2;
            transform: rotateY(0deg);
        }

        .flip-back {
            transform: rotateY(180deg);
        }

        .is-flipped .flip-container {
            transform: rotateY(180deg);
        }

        /* Glassmorphism style untuk form */
        .glass-panel {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .gradient-text {
            background: linear-gradient(135deg, #7c3aed, #22d3ee);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .cool-input {
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #f8fafc;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
        }

        .cool-input:focus {
            outline: none;
            border-color: #7c3aed;
            box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.15);
            background: rgba(15, 23, 42, 0.9);
        }

        .cool-btn {
            background: linear-gradient(135deg, #7c3aed, #22d3ee);
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(124, 58, 237, 0.3);
        }

        .cool-btn:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 10px 25px rgba(124, 58, 237, 0.5);
        }

        /* Mobile Responsiveness */
        @media (max-width: 640px) {
            .flip-container {
                min-height: 680px;
            }
            .glass-panel {
                padding: 2rem 1.5rem;
            }
            h2.text-3xl {
                font-size: 1.75rem;
            }
        }
    </style>

    <div id="auth-wrapper" class="w-full sm:max-w-md mt-6 mb-6 px-4 perspective-1000 auth-entrance {{ request()->routeIs('register') ? 'is-flipped' : '' }}">
        <div class="flip-container rounded-2xl">
            
            <!-- ================= FRONT: LOGIN FORM ================= -->
            <div class="flip-front glass-panel p-8">
                <!-- Icon & Title -->
                <div class="flex flex-col items-center mb-8">
                    <div class="w-24 h-24 rounded-full flex items-center justify-center ring-4 ring-indigo-500/30 bg-gray-900/50 mb-4 shadow-[0_0_20px_rgba(124,58,237,0.3)]">
                        <i class="fa-solid fa-lock text-4xl text-indigo-400"></i>
                    </div>
                    <h2 class="text-3xl font-bold gradient-text tracking-wide">
                        Welcome Back
                    </h2>
                    <p class="text-sm text-gray-400 mt-2">Login ke akunmu untuk melanjutkan</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="flex-grow flex flex-col justify-center">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="login-email" class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                        <input id="login-email" type="email" name="email" value="{{ old('email') }}" required autofocus class="cool-input w-full px-4 py-3" placeholder="contoh@email.com">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-5">
                        <label for="login-password" class="block text-sm font-medium text-gray-300 mb-1">Password</label>
                        <input id="login-password" type="password" name="password" required class="cool-input w-full px-4 py-3" placeholder="••••••••">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="mt-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <label class="flex items-center text-gray-400 hover:text-gray-300 cursor-pointer transition-colors">
                            <input type="checkbox" name="remember" class="rounded border-gray-600 bg-gray-800 text-indigo-500 shadow-sm focus:ring-indigo-500 focus:ring-offset-gray-900">
                            <span class="ml-2 text-sm">Ingat Saya</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a class="text-sm text-indigo-400 hover:text-indigo-300 transition-colors" href="{{ route('password.request') }}">
                                Lupa Password?
                            </a>
                        @endif
                    </div>

                    <!-- Button Submit -->
                    <div class="mt-8 mb-4">
                        <button type="submit" class="cool-btn w-full py-3.5 rounded-xl font-bold tracking-wider text-sm flex justify-center items-center gap-2">
                            <span>MASUK SEKARANG</span>
                            <i class="fa-solid fa-arrow-right-to-bracket"></i>
                        </button>
                    </div>

                    <!-- Switch to Register -->
                    <div class="text-center mt-auto">
                        <p class="text-gray-400 text-sm">
                            Belum punya akun? 
                            <button type="button" onclick="toggleForm(event, '/register')" class="text-cyan-400 font-semibold hover:text-cyan-300 transition-colors underline-offset-4 hover:underline">
                                Buat Akun Baru
                            </button>
                        </p>
                    </div>
                </form>
            </div>

            <!-- ================= BACK: REGISTER FORM ================= -->
            <div class="flip-back glass-panel p-8">
                <!-- Icon & Title -->
                <div class="flex flex-col items-center mb-6">
                    <div class="w-20 h-20 rounded-full flex items-center justify-center ring-4 ring-cyan-500/30 bg-gray-900/50 mb-3 shadow-[0_0_20px_rgba(34,211,238,0.3)]">
                        <i class="fa-solid fa-user-plus text-3xl text-cyan-400"></i>
                    </div>
                    <h2 class="text-3xl font-bold gradient-text tracking-wide">
                        Join Us Now
                    </h2>
                    <p class="text-sm text-gray-400 mt-1">Daftarkan dirimu dan mulai eksplorasi</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="flex-grow flex flex-col justify-center">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Nama Lengkap</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required class="cool-input w-full px-4 py-2.5" placeholder="John Doe">
                        <x-input-error :messages="$errors->get('name')" class="mt-1" />
                    </div>

                    <!-- Email -->
                    <div class="mt-3">
                        <label for="register-email" class="block text-sm font-medium text-gray-300 mb-1">Email Aktif</label>
                        <input id="register-email" type="email" name="email" value="{{ old('email') }}" required class="cool-input w-full px-4 py-2.5" placeholder="contoh@email.com">
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    <!-- Password -->
                    <div class="mt-3">
                        <label for="register-password" class="block text-sm font-medium text-gray-300 mb-1">Password</label>
                        <input id="register-password" type="password" name="password" required class="cool-input w-full px-4 py-2.5" placeholder="Minimal 8 karakter">
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-3">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-1">Konfirmasi Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required class="cool-input w-full px-4 py-2.5" placeholder="Ulangi password di atas">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                    </div>

                    <!-- Button Submit -->
                    <div class="mt-6 mb-4">
                        <button type="submit" class="cool-btn w-full py-3.5 rounded-xl font-bold tracking-wider text-sm flex justify-center items-center gap-2">
                            <span>DAFTAR SEKARANG</span>
                            <i class="fa-solid fa-user-check"></i>
                        </button>
                    </div>

                    <!-- Switch to Login -->
                    <div class="text-center mt-auto">
                        <p class="text-gray-400 text-sm">
                            Sudah punya akun? 
                            <button type="button" onclick="toggleForm(event, '/login')" class="text-indigo-400 font-semibold hover:text-indigo-300 transition-colors underline-offset-4 hover:underline">
                                Masuk di Sini
                            </button>
                        </p>
                    </div>
                </form>
            </div>
            
        </div>
    </div>

    <!-- Script Pengendali Flip & History -->
    <script>
        // Set awal saat halaman dimuat (jika ada error di register agar langsung menampilkan form register)
        document.addEventListener('DOMContentLoaded', () => {
            const wrapper = document.getElementById('auth-wrapper');
            // Cek URL untuk menentukan class is-flipped
            if (window.location.pathname.includes('register')) {
                wrapper.classList.add('is-flipped');
            }
        });

        function toggleForm(e, url) {
            e.preventDefault();
            const wrapper = document.getElementById('auth-wrapper');
            
            // Animasi flip
            wrapper.classList.toggle('is-flipped');
            
            // Ubah URL browser tanpa refresh
            if (window.history.pushState) {
                window.history.pushState(null, '', url);
            }
        }
    </script>
</x-guest-layout>
