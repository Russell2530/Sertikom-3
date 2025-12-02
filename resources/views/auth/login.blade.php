<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Pendataan Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');

        /* Updated color palette to black and dark gray to match app.blade.php */
        :root {
            --primary: #0a0a0a;
            --secondary: #1a1a1a;
            --tertiary: #2d2d2d;
            --quaternary: #3a3a3a;
            --accent: #ffffff;
            --accent-hover: #f5f5f5;
            --text-primary: #ffffff;
            --text-secondary: #e0e0e0;
            --text-tertiary: #b0b0b0;
            --border: #404040;
            --success: #22c55e;
            --danger: #ef4444;
        }

        body {
            font-family: 'Poppins', 'Inter', sans-serif;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        .login-container {
            background: linear-gradient(135deg, var(--secondary) 0%, var(--tertiary) 50%);
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            border: 1px solid var(--border);
            animation: slideUp 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header-bg {
            background: linear-gradient(135deg, var(--tertiary) 0%, var(--quaternary) 100%);
            padding: 2.5rem 1.5rem;
            border-bottom: 2px solid var(--border);
        }

        .header-bg i {
            animation: float 3s ease-in-out infinite;
            color: var(--accent);
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .header-bg h1 {
            color: var(--text-primary);
            font-weight: 700;
            margin: 0;
            font-size: 1.75rem;
        }

        .header-bg p {
            color: var(--text-secondary);
            margin: 0;
            font-size: 0.875rem;
        }

        .input-field {
            background: var(--quaternary) !important;
            border: 1px solid var(--border) !important;
            border-radius: 8px;
            color: var(--text-primary);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
        }

        .input-field::placeholder {
            color: var(--text-tertiary);
        }

        .input-field:focus {
            background: var(--quaternary) !important;
            border-color: var(--accent) !important;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.1) !important;
            color: var(--text-primary) !important;
            outline: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--tertiary) 0%, var(--quaternary) 100%);
            color: var(--text-primary);
            border-radius: 8px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 600;
            border: 2px solid var(--accent);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.95rem;
            padding: 0.75rem 1.5rem;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 255, 255, 0.2);
            background: linear-gradient(135deg, var(--quaternary) 0%, var(--quinary) 100%);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .info-box {
            background: var(--quaternary) !important;
            border: 1px solid var(--border) !important;
            border-radius: 8px !important;
            color: var(--text-secondary) !important;
            animation: fadeIn 0.8s ease-in-out 0.3s both;
            padding: 1rem;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .label-custom {
            color: var(--text-primary);
            font-weight: 600;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .label-custom i {
            margin-right: 0.5rem;
        }

        .checkbox-custom {
            accent-color: var(--accent);
        }

        .link-custom {
            color: var(--accent);
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .link-custom:hover {
            color: var(--accent-hover);
            text-decoration: underline;
        }

        .error-text {
            color: var(--danger);
            font-size: 0.8rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .success-box {
            background: rgba(34, 197, 94, 0.1);
            border: 1px solid var(--success);
            border-radius: 8px;
            color: var(--success);
            padding: 0.75rem 1rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
        }

        .footer-box {
            border-top: 1px solid var(--border);
            padding: 1rem;
            text-align: center;
            font-size: 0.8rem;
            color: var(--text-tertiary);
            background: linear-gradient(135deg, transparent 0%, rgba(255, 255, 255, 0.03) 100%);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            gap: 1rem;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            color: var(--text-secondary);
            cursor: pointer;
            font-size: 0.875rem;
            transition: color 0.3s ease;
            margin: 0;
        }

        .checkbox-label:hover {
            color: var(--text-primary);
        }

        .checkbox-label input {
            margin-right: 0.5rem;
            cursor: pointer;
            width: 1rem;
            height: 1rem;
        }

        @media (max-width: 576px) {
            .login-container {
                border-radius: 12px;
            }

            .header-bg {
                padding: 1.5rem;
            }

            .header-bg h1 {
                font-size: 1.5rem;
            }

            .form-wrapper {
                padding: 1.5rem;
            }

            .checkbox-group {
                flex-direction: column;
                align-items: flex-start;
            }

            .info-box {
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">
    <div class="login-container w-full max-w-md">
        <!-- Header -->
        <div class="header-bg">
            <div class="flex items-start space-x-3">
                <i class="fas fa-graduation-cap text-2xl mt-2"></i>
                <div>
                    <h1>Sistem Pendataan Siswa</h1>
                    <p>Login ke Akun Anda</p>
                </div>
            </div>
        </div>

        <!-- Login Form -->
        <div class="form-wrapper p-8">
            <!-- Session Status -->
            @if (session('status'))
            <div class="success-box">
                <i class="fas fa-check-circle"></i>
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="label-custom">
                        <i class="fas fa-envelope"></i>Email
                    </label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="username"
                        class="input-field w-full"
                        placeholder="Masukkan email Anda"
                    />
                    @if ($errors->has('email'))
                    <p class="error-text">
                        <i class="fas fa-times-circle"></i>{{ $errors->first('email') }}
                    </p>
                    @endif
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="label-custom">
                        <i class="fas fa-lock"></i>Password
                    </label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        class="input-field w-full"
                        placeholder="Masukkan password Anda"
                    />
                    @if ($errors->has('password'))
                    <p class="error-text">
                        <i class="fas fa-times-circle"></i>{{ $errors->first('password') }}
                    </p>
                    @endif
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="checkbox-group">
                    <label class="checkbox-label">
                        <input
                            id="remember_me"
                            type="checkbox"
                            name="remember"
                            class="checkbox-custom"
                        />
                        Ingat saya
                    </label>

                    @if (Route::has('password.request'))
                    <a
                        href="{{ route('password.request') }}"
                        class="link-custom text-sm"
                    >
                        Lupa password?
                    </a>
                    @endif
                </div>

                <!-- Login Button -->
                <button type="submit" class="btn-primary w-full py-3 px-4 font-medium flex items-center justify-center gap-2">
                    <i class="fas fa-sign-in-alt"></i>
                    Login
                </button>
            </form>

            <!-- Demo Info -->
            <div class="info-box mt-6">
                <p class="font-semibold mb-3 flex items-center gap-2">
                    <i class="fas fa-info-circle"></i>Demo Login
                </p>
                <p class="flex items-center gap-2 mb-2 text-sm">
                    <i class="fas fa-envelope w-4"></i>Email: admin@example.com
                </p>
                <p class="flex items-center gap-2 text-sm">
                    <i class="fas fa-key w-4"></i>Password: password
                </p>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer-box">
            &copy; {{ date('Y') }} Sistem Pendataan Siswa. All rights reserved.
        </div>
    </div>
</body>
</html>
