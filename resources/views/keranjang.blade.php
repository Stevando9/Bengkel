<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Keranjang</title>
    @vite('resources/css/app.css')
    <style>
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

    </style>
</head>
<body class="bg-black">
    {{-- Header Start --}}
    <header class="bg-gray-800 text-white">
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
    </header>

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
                header.classList.add('header-scrolled');
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
    <section class="pt-36 pb-16">
        <div class="container mx-auto">
            <!-- Header -->
            <div class="grid grid-cols-3 bg-yellow-500 p-4 rounded-t-md w-auto">
                <h1 class="text-lg font-bold text-black col-span-2">Produk</h1>
                <div class="flex justify-between">
                    <p class="text-lg font-bold text-black justify-between">Harga</p>
                    <p class="text-lg font-bold text-black ml-8">Jumlah</p>
                </div>
            </div>
    
            <!-- Produk List -->
            <div class="bg-gray-900 text-white p-4 rounded-b-md">
                <!-- Item Produk 1 -->
                <div class="flex items-center justify-center mb-4">
                    <!-- Gambar Produk -->
                    <div class="w-1/4">
                        <img src="https://via.placeholder.com/50" alt="Motul Engine Oil" class="w-full rounded-lg">
                    </div>
                    <!-- Detail Produk -->
                    <div class="w-1/2 ml-4">
                        <h2 class="text-lg font-bold">Oli Mesin Motul</h2>
                    </div>
                    <!-- Harga Produk -->
                    <div class="w-1/4 text-center">
                        <p class="text-lg font-bold">Rp 150.000</p>
                    </div>
                    <!-- Jumlah Produk -->
                    <div class="w-1/4 flex justify-center pl-56">
                        <button class="bg-yellow-500 px-4 py-1 rounded-md flex items-center">
                            <span class="text-lg font-bold">1</span>
                            <!-- Icon Arrow -->
                            {{-- <span class="ml-2 text-lg font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8 7a1 1 0 012-0V5H8v2z" clip-rule="evenodd" />
                                </svg>
                            </span> --}}
                        </button>
                    </div>
                </div>
    
                <!-- Item Produk 2 (Example for Additional Product) -->
                <div class="flex items-center mb-4">
                    <!-- Gambar Produk -->
                    <div class="w-1/4">
                        <img src="https://via.placeholder.com/50" alt="Busi NGK" class="w-full rounded-lg">
                    </div>
                    <!-- Detail Produk -->
                    <div class="w-1/2 ml-4">
                        <h2 class="text-lg font-bold">Busi NGK</h2>
                    </div>
                    <!-- Harga Produk -->
                    <div class="w-1/4 text-center">
                        <p class="text-lg font-bold">Rp 30.000</p>
                    </div>
                    <!-- Jumlah Produk -->
                    <div class="w-1/4 flex justify-center pl-56">
                        <button class="bg-yellow-500 px-4 py-1 rounded-md flex items-center">
                            <span class="text-lg font-bold">1</span>
                            {{-- <span class="ml-2 text-lg font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8 7a1 1 0 012-0V5H8v2z" clip-rule="evenodd" />
                                </svg>
                            </span> --}}
                        </button>
                    </div>
                </div>
            </div>
    
            <!-- Subtotal dan Checkout -->
            <div class="justify-end items-center bg-gray-700 text-yellow-500 p-4 rounded-b-md text-right flex">
                <div class="p-5">
                    <p class="text-lg font-semibold">Subtotal Untuk Produk (2 Produk)</p>
                    <p class="text-lg font-bold text-white">Rp 180.000</p>
                </div>
                <div class="">
                    <button class="bg-yellow-500 px-4 py-2 rounded-md text-gray-900 font-semibold">Checkout</button>
                </div>
            </div>
        </div>
    </section>    
    {{-- Konten Stop --}}

    {{-- Footer Start --}}
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto text-center">
            <!-- Social Media Icons -->
            <div class="flex justify-center space-x-6 mb-4">
                <a href="https://www.google.com" class="text-gray-500 hover:text-yellow-400 flex items-center">
                    <!-- Google Icon -->
                    <img src="{{ asset("img/Logo Google.png") }}" alt="Google Icon"
                        class="h-8 w-8 transition-transform duration-200 hover:scale-110" />
                    <span class="ml-2 text-transition">Google</span>
                    <!-- Menambahkan teks di samping ikon -->
                </a>
                <a href="https://www.twitter.com" class="text-gray-500 hover:text-yellow-400 flex items-center">
                    <!-- Google Icon -->
                    <img src="{{ asset("img/Logo Twitter.png") }}" alt="Twitter Icon"
                        class="h-8 w-8 transition-transform duration-200 hover:scale-110" />
                    <span class="ml-2 text-transition">Twitter</span>
                    <!-- Menambahkan teks di samping ikon -->
                </a>
                <a href="https://www.instagram.com" class="text-gray-500 hover:text-yellow-400 flex items-center">
                    <!-- Google Icon -->
                    <img src="{{ asset("img/Logo Instagram.png") }}" alt="Instagram Icon"
                        class="h-8 w-8 transition-transform duration-200 hover:scale-110" />
                    <span class="ml-2 text-transition">Instagram</span>
                    <!-- Menambahkan teks di samping ikon -->
                </a>
                <a href="https://www.linkedin.com" class="text-gray-500 hover:text-yellow-400 flex items-center">
                    <!-- Google Icon -->
                    <img src="{{ asset("img/Logo Linkedln.png") }}" alt="Linkedln Icon"
                        class="h-8 w-8 transition-transform duration-200 hover:scale-110" />
                    <span class="ml-2 text-transition">Linkedln</span>
                    <!-- Menambahkan teks di samping ikon -->
                </a>
            </div>

            <div class="flex items-center justify-center">
                <img src="{{ asset("img/Cahaya Gunung Licin 2.jpeg") }}" alt="Logo" class="h-10 w-10 rounded-full mr-2">
                <h1 class="text-xl font-bold text-primary">CAHAYA <span class="text-white">GUNUNG
                        LICIN</span></h1>
            </div>
        </div>
    </footer>
    {{-- Footer Stop --}}
</body>
</html>