<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cahaya Gunung Licin - Register</title>
    <style>
        /* Reset dan Pengaturan Dasar */
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

        /* Kontainer Utama */
        .login-container {
            background-color: white;
            border-radius: 8px;
            display: flex;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 800px;
            overflow: hidden;
        }

        /* Section Kiri */
        .left-section {
            padding: 40px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        }

        /* Section Kanan */
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

        /* Heading dan Paragraf */
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

        /* Input dan Tombol */
        .login-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

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

        /* Tombol Login Google */
        .google-login {
            background-color: white;
            color: black;
            border: 1px solid #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        .google-login:hover {
            background-color: #eee7e7;
            transition: background-color 0.3s;
        }

        .google-login img {
            width: 20px;
            margin-right: 10px;
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

        /* Checkbox Ingat Akun */
        .remember-me {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 5px;
            margin-bottom: 14px;
        }

        .remember-me input {
            margin: 0;
        }

        .remember-me label {
            font-size: 12px;
            margin: 0;
            line-height: normal;
        }

        /* Link */
        a {
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

        /* Pesan Sukses dan Error */
        .success-message {
            color: #28a745;
            font-weight: bold;
            background-color: #d4edda;
            padding: 10px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .error-message {
            color: #dc3545;
            font-weight: bold;
            background-color: #f8d7da;
            padding: 10px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Bagian Kiri -->
        <div class="left-section">
            <h1>Selamat Datang</h1>
            <p class="center-cahaya">Cahaya Gunung Licin</p>
            <button class="google-login">
                <img src="{{ asset('img/Google.png') }}" alt="Google">
                Lanjutkan dengan Google
            </button>
            <div class="separator">
                <hr class="line">
                <span>Atau</span>
                <hr class="line">
            </div>
            <!-- Form Registrasi -->
            <form action="{{ route('register') }}" method="post">
                @if (session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
                @endif
                @if ($errors->any())
                <div class="error-message">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @csrf
                <input type="text" placeholder="Nama" name="nama_lengkap">
                <input type="email" placeholder="Email" name="email">
                <input type="text" placeholder="No Telp" name="nomor_telp">
                <input type="password" placeholder="Password" name="password">
                <input type="password" placeholder="Konfirmasi Password" name="password_confirmation">
                <div class="remember-me">
                    <input type="checkbox" id="remember">
                    <label for="remember">Ingat Akun Saya!</label>
                </div>
                <button type="submit">Daftar</button>
            </form>
            <!-- Footer -->
            <div class="footer">
                <p>Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
            </div>
        </div>
        <!-- Bagian Kanan -->
        <div class="right-section">
            <img src="{{ asset('img/Cahaya Gunung Licin 2.jpeg.jpg') }}" alt="Cahaya Gunung Licin">
        </div>
    </div>
</body>
</html>
