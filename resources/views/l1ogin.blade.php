<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            background: radial-gradient(circle at top, #0f172a, #020617 80%);
            color: #e5e7eb;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        form {
            background: rgba(30, 41, 59, 0.95);
            padding: 2.5rem 2rem;
            border-radius: 16px;
            width: 350px;
            max-width: 90%;
            text-align: center;
            box-shadow: 0 20px 60px rgba(124,58,237,0.3);
            animation: floatForm 2s ease-in-out infinite;
        }

        @keyframes floatForm {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-6px); }
        }

        h2 {
            font-size: 1.8rem;
            margin-bottom: 1.8rem;
            color: #cbd5f5;
        }

        input {
            width: 90%;
            margin-bottom: 1.2rem;
            padding: 0.75rem 1rem;
            border-radius: 12px;
            border: none;
            font-size: 1rem;
            background: rgba(15, 23, 42, 0.8);
            color: #e5e7eb;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        input:focus {
            outline: none;
            transform: scale(1.02);
            box-shadow: 0 0 12px rgba(124,58,237,0.5);
            background: rgba(15,23,42,0.95);
        }

        button {
            width: 100%;
            padding: 0.85rem;
            border-radius: 999px;
            border: none;
            background: linear-gradient(135deg, #7c3aed, #22d3ee);
            color: #020617;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
            animation: pulseButton 3s ease-in-out infinite;
        }

        button:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 12px 30px rgba(124,58,237,0.6), 0 20px 50px rgba(34,211,238,0.4);
        }

        @keyframes pulseButton {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.02); }
        }

        .error, .success {
            padding: 0.6rem 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            line-height: 1.4;
            text-align: left;
        }

        .error { background: #f87171; color: #fff; }
        .success { background: #4ade80; color: #065f46; }

        ul { padding-left: 20px; margin: 0; } 
    </style>
</head>
<body>
    <form action="{{ route('login.process') }}" method="POST">
        @csrf

        <h2>Login</h2>

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Login</button>
    </form>
</body>
</html>
