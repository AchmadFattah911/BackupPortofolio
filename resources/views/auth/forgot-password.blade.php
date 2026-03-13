<x-guest-layout>
    <style>
        @keyframes entranceAnim {
            0% { opacity: 0; transform: translateY(50px) scale(0.95); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
        }

        .auth-entrance {
            animation: entranceAnim 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        /* Glassmorphism style untuk form */
        .glass-panel {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            border-radius: 1.5rem;
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
    </style>

    <div class="w-full sm:max-w-md mt-6 mb-6 px-4 auth-entrance">
        <div class="glass-panel p-8">
            
            <!-- Icon & Title -->
            <div class="flex flex-col items-center mb-6 text-center">
                <div class="w-20 h-20 rounded-full flex items-center justify-center ring-4 ring-pink-500/30 bg-gray-900/50 mb-4 shadow-[0_0_20px_rgba(236,72,153,0.3)]">
                    <i class="fa-solid fa-key text-3xl text-pink-400"></i>
                </div>
                <h2 class="text-3xl font-bold gradient-text tracking-wide pb-1">
                    Reset Password
                </h2>
                <p class="text-sm text-gray-400 mt-2 leading-relaxed">
                    Lupa password? Tidak masalah. Masukkan email Anda dan kami akan mengirimkan tautan reset password.
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-5 text-green-400 text-sm text-center font-medium bg-green-500/10 border border-green-500/20 p-3 rounded-lg flex items-center justify-center" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email Terdaftar</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="cool-input w-full px-4 py-3" placeholder="contoh@email.com">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400 text-sm bg-red-500/10 border border-red-500/20 p-2 rounded-lg" />
                </div>

                <div class="mt-8 mb-2">
                    <button type="submit" class="cool-btn w-full py-3.5 rounded-xl font-bold tracking-wider text-sm flex justify-center items-center gap-2">
                        <span>KIRIM TAUTAN RESET</span>
                        <i class="fa-solid fa-paper-plane"></i>
                    </button>
                </div>
                
                <div class="text-center mt-6">
                    <a href="{{ route('login') }}" class="text-sm text-gray-400 hover:text-indigo-400 transition-colors underline-offset-4 hover:underline">
                        <i class="fa-solid fa-arrow-left mr-1"></i> Kembali ke Halaman Login
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
