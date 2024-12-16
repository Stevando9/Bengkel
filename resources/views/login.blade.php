<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cahaya Gunung Licin - Login</title>
    @vite('resources/css/app.css')
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }

        .full-width {
            width: 100%;
        }

        .login-container {
            background-color: white;
            border-radius: 8px;
            display: flex;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 800px;
            overflow: hidden;
        }

        /* Left Section */
        .left-section {
            padding: 40px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        }

        h1 {
            font-size: 32px;
            text-align: center;
            width: 100%;
            margin-bottom: 10px;
        }

        .center-cahaya {
            text-align: center;
            width: 100%;
            color: black;
            font-size: 22px;
            margin-top: 0;
        }

        /* Input Styles */
        .login-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Button Styles */
        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: black;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .login-container button:hover {
            background-color: #333;
        }

        .login-container .google-login {
            background-color: white;
            color: black;
            border: 1px solid #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            box-sizing: border-box;
        }

        .login-container .google-login:hover {
            background-color: #eee7e7;
            transition: background-color 0.3s;
        }

        .login-container .google-login img {
            width: 20px;
            margin-right: 10px;
        }

        /* Remember Me Section */
        .login-container .remember-me {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 5px;
            margin-bottom: 15px;
            width: 100%;
            text-align: left;
        }

        .login-container .remember-me input {
            margin: 0;
            transform: translateY(1px);
        }

        .login-container .remember-me label {
            font-size: 12px;
            margin: 0;
            line-height: 1;
        }

        /* Links */
        .login-container a {
            text-decoration: none;
            color: orange;
            font-size: 11px;
        }

        /* Footer */
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            width: 100%;
        }

        /* Separator */
        .separator {
            display: flex;
            align-items: center;
            width: 100%;
            margin: 20px 0;
            color: grey;
        }

        .line {
            flex: 1;
            border: none;
            border-top: 1px solid grey;
            margin: 0 10px;
        }

        /* Right Section */
        .right-section {
            background-color: #fefefe;
            display: flex;
            justify-content: center;
            align-items: center;
            flex: 1;
        }

        .right-section img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="left-section">
            @if (session('success'))
                <div style="color: #28a745; font-weight: bold; background-color: #d4edda; padding: 10px; border: 1px solid #c3e6cb; border-radius: 5px;">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div style="color: #dc3545; font-weight: bold; background-color: #f8d7da; padding: 10px; border: 1px solid #c3e6cb; border-radius: 5px;">
                    {{ session('error') }}
                </div>
            @endif

            <h1>Selamat Datang</h1>
            <p class="center-cahaya">Cahaya Gunung Licin</p>

            <button class="google-login full-width">
                <img src="{{ asset('img/Google.png') }}" alt="Google">
                Lanjutkan dengan Google
            </button>

            <div class="separator">
                <hr class="line">
                <span>Atau</span>
                <hr class="line">
            </div>

            <form action="{{ route('login') }}" method="post">
                @csrf
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <div class="remember-me">
                    <input type="checkbox" id="remember">
                    <label for="remember">Ingat Password</label>
                </div>
                <button type="submit">Masuk</button>
            </form>

            <div class="footer">
                <p>Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
            </div>
        </div>
        <div class="right-section">
            <img src="{{ asset('img/Cahaya Gunung Licin 2.jpeg.jpg') }}" alt="Cahaya Gunung Licin">
        </div>
    </div>
</body>
</html>
