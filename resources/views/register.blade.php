<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cahaya Gunung Licin - Register</title>
    <style>
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
        .left-section {
            padding: 40px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        }
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
        h1 {
            font-size: 32px;
            text-align: center;
            width: 100%;
            margin-bottom:10px;
        }
        .center-text {
            text-align: center;
            width: 100%;
            color: grey; 
        }
        .center-cahaya {
            text-align: center;
            width: 100%;
            color: black;
            font-size: 22px;
            margin-top:0;
        }
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
            background-color: #eee7e7; /* Warna latar belakang saat hover */
            transition: background-color 0.3s; /* Animasi transisi */
        }       
        .login-container .google-login img {
            width: 20px;
            margin-right: 10px;
        }
        .login-container .remember-me {
            display: flex;
            align-items: center; /* Pastikan konten berada di tengah secara vertikal */
            justify-content: flex-start; /* Menyelaraskan secara horizontal */
            white-space: nowrap; /* Mencegah pembungkus teks */
        }

        .login-container .remember-me input {
            margin-right: 5px; /* Jarak antara checkbox dan label */
            transform: translateY(1px); /* Penyesuaian vertikal kecil untuk menyelaraskan */
        }

        .login-container .remember-me label {
            font-size: 10px; /* Ukuran font yang lebih kecil */
            margin: 0; /* Menghapus margin default untuk menyelaraskan */
            margin-bottom: 14px;
            padding: 0; /* Menghapus padding default untuk menyelaraskan */
            line-height: 1.2; /* Menjaga tinggi garis label */
        }

        .login-container a {
            text-decoration: none;
            color: orange;
            font-size: 11px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            width : 100%;
        }
        .separator {
            display: flex;
            align-items: center;
            width: 100%;
            margin: 20px 0; /* Jarak atas dan bawah */
            color: grey; 
        }

        .line {
            flex: 1; /* Membuat garis mengisi ruang yang tersedia */
            border: none; /* Menghapus border default */
            border-top: 1px solid grey; /* Mengatur warna dan ketebalan garis */
            margin: 0 10px; /* Jarak horizontal antara garis dan teks */
        }

    </style>
</head>
<body>
    <div class="login-container">
        <div class="left-section">
            <h1>Selamat Datang</h1>
            <p class="center-cahaya">Cahaya Gunung Licin</p>
            <button class="google-login full-width">
                <img src="{{ asset("img/Google.png") }}" alt="Google">
                Lanjutkan dengan Google
            </button>
            </button>
            <div class="separator">
                <hr class="line">
                <span>Atau</span>
                <hr class="line">
            </div>
            <form action="{{ route('register') }}" method="post">
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
            <div class="footer">
                <p>Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
            </div>
        </div>
        <div class="right-section">
            <img src="{{ asset("img/Cahaya Gunung Licin 2.jpeg.jpg") }}" alt="Cahaya Gunung Licin">
        </div>
    </div>
</body>
</html>
