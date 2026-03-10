<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — SiMeRa</title>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&family=Lora:wght@600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Sora', sans-serif;
            background: #1C1A17;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .login-box {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.09);
            border-radius: 22px;
            padding: 52px 48px;
            width: 100%;
            max-width: 420px;
        }

        .login-logo {
            text-align: center;
            margin-bottom: 40px;
        }
        .login-logo__icon {
            font-size: 44px;
            display: block;
            margin-bottom: 14px;
        }
        .login-logo__title {
            font-family: 'Lora', serif;
            font-size: 28px;
            font-weight: 600;
            color: #fff;
            margin-bottom: 5px;
        }
        .login-logo__tagline {
            font-size: 12.5px;
            color: rgba(255,255,255,0.35);
        }

        .alert {
            background: rgba(220,38,38,0.15);
            border: 1px solid rgba(220,38,38,0.4);
            color: #FCA5A5;
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 13px;
            margin-bottom: 24px;
        }

        .form-group { margin-bottom: 20px; }

        .form-label {
            display: block;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: rgba(255,255,255,0.38);
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 14px 16px;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.10);
            border-radius: 10px;
            font-family: 'Sora', sans-serif;
            font-size: 14px;
            color: #fff;
            outline: none;
            transition: border-color 0.2s;
        }
        .form-input::placeholder { color: rgba(255,255,255,0.18); }
        .form-input:focus { border-color: #C94F2C; }

        .form-error {
            display: block;
            font-size: 12px;
            color: #FCA5A5;
            margin-top: 6px;
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            background: #C94F2C;
            border: none;
            border-radius: 10px;
            color: #fff;
            font-family: 'Sora', sans-serif;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 4px;
            transition: background 0.2s, transform 0.15s;
        }
        .btn-login:hover { background: #B8421F; transform: translateY(-1px); }
        .btn-login:active { transform: translateY(0); }
    </style>
</head>
<body>

<div class="login-box">

    <div class="login-logo">
        <span class="login-logo__icon">🍽️</span>
        <div class="login-logo__title">SiMeRa</div>
        <div class="login-logo__tagline">Sistem Manajemen Menu Restoran</div>
    </div>

    @if ($errors->any())
        <div class="alert">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="form-group">
            <label class="form-label" for="username">Username</label>
            <input
                class="form-input"
                type="text"
                id="username"
                name="username"
                value="{{ old('username') }}"
                placeholder="Masukkan username"
                autofocus
                required
            >
            @error('username')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="password">Password</label>
            <input
                class="form-input"
                type="password"
                id="password"
                name="password"
                placeholder="••••••••"
                required
            >
            @error('password')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn-login">Masuk</button>

    </form>

</div>

</body>
</html>