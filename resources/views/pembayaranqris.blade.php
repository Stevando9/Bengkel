<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pembayaran</title>
    @vite('resources/css/app.css')
    <link href="{{ asset('css/header-footer-dll.css') }}" rel="stylesheet">
    {{-- <style>
        /* Header Style */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 100;
            background-color: rgba(31, 41, 55, 1);
            /* Default solid background */
            transition: background-color 0.3s ease;
        }

        /* Transparent header when scrolled */
        .header-scrolled {
            background-color: rgba(31, 41, 55, 0.8);
            /* Transparent background */
        }

        /* Footer Logo */
        .text-transition {
            opacity: 0;
            /* Menyembunyikan teks secara default */
            transform: translateX(-10px);
            /* Memindahkan teks sedikit ke kiri */
            transition: opacity 0.3s ease, transform 0.3s ease;
            /* Menambahkan transisi untuk efek halus */
        }

        a {
            position: relative;
            /* Mengatur posisi relatif agar teks dapat diposisikan dengan benar */
        }

        a:hover .text-transition {
            opacity: 1;
            /* Menampilkan teks saat hover */
            transform: translateX(0);
            /* Mengembalikan teks ke posisi semula */
        }

        /* img {
            transition: transform 0.2s;
            /* Transisi untuk efek zoom */
        /* } */
        /* img:hover { */
        /* transform: scale(1.2); */
        /* Mengubah ukuran ikon saat hover */
        /* } */

        .cs {
            transition: transform 0.2s;
            /* Transisi untuk efek zoom */
        }

        .cs:hover {
            transform: scale(1.2);
            /* Mengubah ukuran ikon saat hover */
        }
        .text-right {
            text-align: right;
        }
        /* CSS untuk mengatur hover pada ikon */
        .social-icon {
            position: relative;
            display: inline-block;
        }

        /* Ikon umum */
        .icon {
            transition: transform 0.3s ease;
        }

        .google-icon:hover .icon {
            transform: translateX(50px); /* Jarak untuk ikon Twitter */
        }
        .twitter-icon:hover .icon {
            transform: translateX(50px); /* Jarak untuk ikon Twitter */
        }
        .instagram-icon:hover .icon {
            transform: translateX(60px); /* Jarak untuk ikon Instagram */
        }
        .linkedin-icon:hover .icon {
            transform: translateX(50px); /* Jarak untuk ikon Instagram */
        }
        .google-icon:hover ~ .twitter-icon .icon,
        .google-icon:hover ~ .instagram-icon .icon,
        .google-icon:hover ~ .linkedin-icon .icon {
        transform: translateX(50px); /* Geser ikon lainnya ke kanan */
        }
        .twitter-icon:hover ~ .instagram-icon .icon,
        .twitter-icon:hover ~ .linkedin-icon .icon {
        transform: translateX(50px); /* Geser ikon lainnya ke kanan */
        }
        .instagram-icon:hover ~ .linkedin-icon .icon {
        transform: translateX(50px); /* Geser ikon lainnya ke kanan */
        }
        

        /* Teks yang muncul saat dihover */
        .icon-text {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
            transition: opacity 0.3s ease;
            white-space: nowrap;
        }

        /* Menampilkan teks saat dihover */
        .social-icon:hover .icon-text {
            opacity: 1;
        }
        
        /* start modal edit account */
        /* Modal Background */
        #edit-account-modal {
            background-color: rgba(0, 0, 0, 0.8); /* Background overlay */
        }

        /* Modal Container */
        .modal-content {
            background-color: #1f1f1f; /* Dark background for modal */
            color: #ffffff;
            padding: 2rem;
            border-radius: 0.5rem;
            max-width: 600px;
            width: 100%;
        }

        /* Header Style */
        .modal-content h2 {
            font-size: 1.75rem;
            font-weight: 700;
            letter-spacing: 0.1rem;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        /* Upload Photo Section */
        .upload-photo {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Form Input */
        .modal-content input[type="text"],
        .modal-content input[type="password"] {
            background-color: #2c2c2c;
            border: 1px solid #444444;
            color: #cccccc;
            padding: 0.75rem;
            border-radius: 0.375rem;
            width: 100%;
        }

        /* Action Buttons */
        .action-buttons button {
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            border-radius: 0.375rem;
            transition: background-color 0.2s ease-in-out;
        }

        .action-buttons .cancel {
            background-color: #333333;
            color: #ffffff;
            border: 1px solid #555555;
        }

        .action-buttons .cancel:hover {
            background-color: #444444;
        }

        .action-buttons .submit {
            background-color: #28a745; /* Green color for submit button */
            color: #333333;
        }

        .action-buttons .submit:hover {
            background-color: #218838;
        }
        /* end modal edit account */
    </style> --}}
</head>
<body class="bg-black">
    {{-- Header Start --}}
    {{-- <header class="bg-gray-800 text-white">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <!-- Logo and Brand Name -->
            <div class="flex items-center">
                <img src="{{ asset("img/Cahaya Gunung Licin 2.jpeg.jpg") }}" alt="Logo" class="w-12 h-12 rounded-full mr-2">
                <h1 class="text-xl font-bold text-primary">CAHAYA <span class="text-white">GUNUNG LICIN</span>
                </h1>
            </div>

            <!-- Navigation Links for Desktop -->
            <nav class="hidden md:flex space-x-8 ml-auto pr-10">
                <a href="{{ route ('home') }}" class="text-white hover:text-primary">HOME</a>
                <a href="{{ route ('produk') }}" class="text-white hover:text-primary">PRODUK</a>
                <a href="{{ route ('jasa') }}" class="text-white hover:text-primary">JASA</a>
                <a href="{{ route ('keranjang') }}" class="text-primary hover:text-white">KERANJANG</a>
            </nav>

            <!-- Always Visible Hamburger Menu -->
            <div>
                <button id="hamburger" class="focus:outline-none pr-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                            d="M4 6h16M4 12h16m-7 6h7" />
                        <!-- <div class="h-8 w-8 flex flex-col justify-center items-center">
                                <div class="bg-gray-700 h-1 w-6 mb-1"></div>
                                <div class="bg-gray-700 h-1 w-6 mb-1"></div>
                                <div class="bg-gray-700 h-1 w-6"></div>
                            </div> -->
                    </svg>
                </button>
            </div>
        </div>

        <!-- Hamburger Menu (Always Visible) -->
        <div id="hamburgerMenu" class="hidden absolute top-16 right-6 bg-gray-700 rounded-lg shadow-lg py-2 w-48 z-50">
            <!-- Beranda -->
            <a href="#" class="flex items-center px-4 py-2 text-white hover:bg-gray-600">
                <img src="{{ asset("img/Vector Bengkel.png") }}" alt="Deskripsi Icon" class="h-6 w-6 mr-2" />
                BERANDA
            </a>

            <!-- Akun -->
            <a href="#" class="flex items-center px-4 py-2 text-white hover:bg-gray-600">
                <img src="{{ asset("img/Vector Profile.png") }}" alt="Deskripsi Icon" class="h-6 w-6 mr-2" />
                Akun
            </a>

            <!-- Kontak Kami -->
            <a href="#" class="flex items-center px-4 py-2 text-white hover:bg-gray-600">
                <img src="{{ asset("img/Vector Kontak Kami.png") }}" alt="Deskripsi Icon" class="h-6 w-6 mr-2" />
                Kontak Kami
            </a>

            <!-- Ulasan -->
            <a href="#" class="flex items-center px-4 py-2 text-white hover:bg-gray-600">
                <img src="{{ asset("img/Vector Ulasan.png") }}" alt="Deskripsi Icon" class="h-6 w-6 mr-2" />
                Ulasan
            </a>

            <!-- Login -->
            <a href="{{ route('login') }}" class="flex items-center px-4 py-2 text-white hover:bg-gray-600">
                <img src="{{ asset("img/Vector Login.png") }}" alt="Deskripsi Icon" class="h-6 w-6 mr-2" />
                Login
            </a>
        </div>
    </header> --}}

    @include('header')

    <script>
        // Toggle mobile menu
        document.getElementById('hamburger').addEventListener('click', function () {
            const menu = document.getElementById('hamburgerMenu');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
            }
        });

        // Scroll event to change header background
        window.onscroll = function () {
            const header = document.getElementById('header');
            if (window.scrollY > 50) {
                header.classList.add('header-scroll');
            } else {
                header.classList.remove('header-scrolled');
            }
        };

        // Ambil elemen hamburger dan menu
        const hamburger = document.getElementById('hamburger');
        const hamburgerMenu = document.getElementById('hamburgerMenu');

        // Tutup menu saat mengklik di luar menu dan hamburger
        document.addEventListener('click', (event) => {
            if (!hamburger.contains(event.target) && !hamburgerMenu.contains(event.target)) {
                hamburgerMenu.classList.add('hidden');
            }
        });
    </script>
    {{-- Header Stop --}}

    {{-- Konten Start --}}
    <section class="pt-20 pb-16">
        <div class="container mx-auto px-4">
            <div class="bg-white text-black p-6 rounded-lg shadow-md w-full max-w-md mx-auto">
                <!-- Title -->
                <h2 class="text-center text-2xl font-bold mb-6">Scan QR Code</h2>
                
                <!-- QR Code Image -->
                <img src="{{ asset('img/qr.png') }}" alt="QR Code"
                    class="w-[200px] h-[200px] mx-auto mb-6 object-cover cs">
                
                <!-- Centered QRIS Text -->
                <p class="text-center text-gray-500 font-medium mb-6">
                    Scan QRIS untuk melakukan pembayaran
                </p>

                <!-- Timer -->
                <div id="timer" class="text-center text-red-500 text-xl font-bold mb-4">
                    05:00
                </div>

                <!-- Total Payment -->
                <div class="flex justify-between items-center text-lg font-semibold border-t border-gray-600 pt-4">
                    <span>Total:</span>
                    <span class="text-red-500">Rp 215.000,00</span>
                </div>

                <!-- Payment Confirmation Button -->
                <button class="mt-6 w-full py-3 bg-yellow-500 text-black font-semibold rounded-lg hover:bg-yellow-400">
                    SUDAH TRANSFER
                </button>
            </div>
        </div>
    </section>

    <script>
        // Set initial time in seconds (5 minutes)
        let timeRemaining = 5 * 60;

        // Update the timer every second
        const timerElement = document.getElementById('timer');
        const timerInterval = setInterval(() => {
            // Calculate minutes and seconds
            const minutes = Math.floor(timeRemaining / 60);
            const seconds = timeRemaining % 60;

            // Display the timer
            timerElement.textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;

            // Decrement time remaining
            timeRemaining--;

            // Stop the timer when it reaches 0
            if (timeRemaining < 0) {
                clearInterval(timerInterval);
                timerElement.textContent = "Waktu Habis"; // Display message
                // Optional: Add your action here, like disabling the button or redirecting
            }
        }, 1000);
    </script>


    
    {{-- Konten Stop --}}

    <!-- Footer Start -->
    {{-- <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto text-center">
            <!-- Social Media Icons -->
            <div class="flex justify-center space-x-6 mb-4">
                <!-- Google Icon -->
                <a href="https://www.google.com" class="social-icon text-gray-500 hover:text-yellow-400 relative google-icon">
                    <img src="{{ asset('img/Logo Google.png') }}" alt="Google Icon"
                        class="icon h-8 w-8 transition-transform duration-200" />
                    <span class="icon-text">Google</span>
                </a>

                <!-- Twitter Icon -->
                <a href="https://www.twitter.com" class="social-icon text-gray-500 hover:text-yellow-400 relative twitter-icon">
                    <img src="{{ asset('img/Logo Twitter.png') }}" alt="Twitter Icon"
                        class="icon h-8 w-8 transition-transform duration-200" />
                    <span class="icon-text">Twitter</span>
                </a>
                
                <!-- Instagram Icon -->
                <a href="https://www.instagram.com" class="social-icon text-gray-500 hover:text-yellow-400 relative instagram-icon">
                    <img src="{{ asset('img/Logo Instagram.png') }}" alt="Instagram Icon"
                        class="icon h-8 w-8 transition-transform duration-200" />
                    <span class="icon-text">Instagram</span>
                </a>
                
                <!-- LinkedIn Icon -->
                <a href="https://www.linkedin.com" class="social-icon text-gray-500 hover:text-yellow-400 relative linkedin-icon">
                    <img src="{{ asset('img/Logo Linkedln.png') }}" alt="LinkedIn Icon"
                        class="icon h-8 w-8 transition-transform duration-200" />
                    <span class="icon-text">LinkedIn</span>
                </a>
            </div>

            <div class="flex items-center justify-center">
                <img src="{{ asset('img/Cahaya Gunung Licin 2.jpeg') }}" alt="Logo" class="h-10 w-10 rounded-full mr-2">
                <h1 class="text-xl font-bold text-primary">CAHAYA <span class="text-white">GUNUNG LICIN</span></h1>
            </div>
        </div>
    </footer> --}}

    @include('footer')

    <!-- Footer Stop -->
    

    
</body>
</html>