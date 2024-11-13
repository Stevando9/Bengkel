<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
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
    </style>
</head>

<body class="bg-black">
    <!-- Header Start -->
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
                <a href="{{ route ('home') }}" class="text-primary hover:text-white">HOME</a>
                <a href="{{ route ('produk') }}" class="text-white hover:text-primary">PRODUK</a>
                <a href="{{ route ('jasa') }}" class="text-white hover:text-primary">JASA</a>
                <a href="{{ route ('keranjang') }}" class="text-white hover:text-primary">KERANJANG</a>
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
            <a data-modal-target="edit-account-modal" class="flex items-center px-4 py-2 text-white hover:bg-gray-600">
                <img src="{{ asset("img/Vector Profile.png") }}" alt="Deskripsi Icon" class="h-6 w-6 mr-2" />
                Akun
            </a>

            <!-- Kontak Kami -->
            <a href="#" class="flex items-center px-4 py-2 text-white hover:bg-gray-600">
                <img src="{{ asset("img/Vector Kontak Kami.png") }}" alt="Deskripsi Icon" class="h-6 w-6 mr-2" />
                Kontak Kami
            </a>

            <!-- Ulasan -->
            <a data-modal-target="review-modal" class="flex items-center px-4 py-2 text-white hover:bg-gray-600 cursor-pointer">
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
    <!-- Header Stop -->

    <!-- Konten Start -->
    <section class="flex justify-center items-center relative bg-cover bg-center pb-12 bg-black" style="background-image: url('{{ asset("img/Bg CGL.jpg") }}')">
        <div class="h-screen mx-auto flex items-center justify-center px-4 md:pt-24 md:w-1/2">
            <div class="text-align z-10 mx-auto">
                <p class="text-white text-xl pt-10 pb-10">
                    Selamat Datang
                </p>
                <h1 class="text-4xl md:text-6xl font-bold text-yellow-400">
                    CAHAYA
                </h1>
                <h1 class="text-4xl md:text-6xl font-bold text-white">GUNUNG LICIN</h1>
                <p class="mt-4 text-lg max-w-xl text-white">
                    <!-- mx-auto -->
                    Kami adalah bengkel motor yang siap memberikan pelayanan terbaik untuk Anda. Dengan pengalaman yang
                    luas dalam industri ini, kami menyediakan layanan servis dan sparepart dengan kualitas terbaik.
                </p>
                <p class="mt-2 text-white py-12">Temukan pelayanan terbaik dan solusi yang tepat untuk motor Anda di
                    Cahaya Gunung Licin!</p>

                <!-- Booking Form -->
                <div class="bg-gray-800 bg-opacity-75 mt-8 p-6 rounded-lg shadow-lg w-full max-w-7xl mx-auto z-10 justify-center items-center">
                    <h2 class="text-yellow-400 text-2xl font-bold text-center mb-4">Pesan Sekarang</h2>
                    <!-- Teks Pesan Sekarang -->
                    <div
                        class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0 md:space-x-4">
                        <select class="p-3 rounded bg-gray-700 text-white w-full md:w-auto">
                            <option>Pilih Servis</option>
                            <option>Servis Berat</option>
                            <option>Servis Ringan</option>
                        </select>
                        <input type="date" class="p-3 rounded bg-gray-700 text-white w-full md:w-auto">
                        <input type="time" value="09:00" class="p-3 rounded bg-gray-700 text-white w-full md:w-auto">
                        <input type="text" placeholder="Produk (opsional)"
                            class="p-3 rounded bg-gray-700 text-white w-full md:w-auto">
                        <input type="text" placeholder="Kode Promo (opsional)"
                            class="p-3 rounded bg-gray-700 text-white w-full md:w-auto">
                        <button
                            class="bg-yellow-400 text-black font-bold py-3 px-6 rounded hover:bg-yellow-500 transition">Pesan</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="Servis" class="flex justify-center items-center pt-14 pb-16">
        <div class="container">
            <div class="flex flex-wrap justify-items-center">
                <div class="px-4 pl-5 lg:w-1/3 xl:w-1/5">
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg mb-10">
                        <img src="{{ asset("img/Servis Berat.png") }}" alt="Servis Berat" class="w-10/12">
                        <div class="py-8 px-6">
                            <h3 class="text-black hover:text-primary block font-semibold text-xl truncate">
                                Servis Berat
                            </h3>
                            <p class="text-black font-medium text-base mb-4">
                                Servis berat adalah perawatan menyeluruh untuk memastikan motor Anda tetap dalam kondisi
                                terbaik.
                                Layanan ini mencakup pemeriksaan menyeluruh, penggantian komponen utama, dan perbaikan
                                kerusakan pada motor Anda.
                            </p>
                            <a href="popup" data-bs-toggle="modal">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="px-4 lg:w-1/3 xl:w-1/5">
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg mb-10 justify-center">
                        <img src="{{ asset("img/Servis Ringan.png") }}" alt="Servis Ringan" class="w-10/12">
                        <div class="py-8 px-6">
                            <h3 class="text-black hover:text-primary block font-semibold text-xl truncate">
                                Servis Ringan
                            </h3>
                            <p class="text-black font-medium text-base mb-4">
                                Servis ringan di bengkel kami adalah perawatan rutin untuk memeriksa dan menyesuaikan komponen penting seperti oli mesin, 
                                filter udara, dan sistem kelistrikan motor Anda. 
                                Dengan servis ringan teratur,performa motor
                            </p>
                            <a href="#">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 lg:w-1/3 xl:w-1/3">
                    <div class="bg-black rounded-xl overflow-hidden shadow-lg mb-10">
                        <!-- <img src="#" alt="Servis Berat" class="w-10/12"> -->
                        <!-- <div class="py-8 px-6">
                            <h3 class="text-black block font-semibold text-xl truncate">
                                Servis Berat
                            </h3>
                            <p class="text-black font-medium text-base mb-4">
                                Servis berat adalah perawatan menyeluruh untuk memastikan motor Anda tetap dalam kondisi
                                terbaik.
                                Layanan ini mencakup pemeriksaan menyeluruh, penggantian komponen utama, dan perbaikan
                                kerusakan
                                pada motor Anda.
                            </p>
                            <a href="#">Baca Selengkapnya</a>
                        </div> -->
                    </div>
                </div>
                <div class="w-full lg:w-1/3 xl:w-1/5">
                    <h1 class="text-white text-4xl font-bold text-right py-6">
                        SERVIS
                    </h1>
                    <p class="text-lg max-w-xl text-white text-right">
                        Bengkel Kami  Menyediakan Beberapa Layanan Servis
                        Yang Bisa Disesuaikan Dengan Kebutuhan Anda
                    </p>
                    <div class="flex justify-end pr-0">
                        <img src="{{ asset('img/R1.png') }}" alt="R1" class="w-10/12">
                    </div>                    
                </div>
                <!-- <div class="relative w-full lg:w-1/2 xl:w-1/3 bg-cover bg-center" style="background-image: url('R1.png');">
                    <h1 class="text-white text-4xl font-bold text-right py-6">
                        SERVIS
                    </h1>
                    <p class="text-lg max-w-xl text-white text-right mt-5">
                        Bengkel Kami Menyediakan Beberapa Layanan Servis
                        Yang Bisa Disesuaikan Dengan Kebutuhan Anda
                    </p>
                </div> -->
            </div>
            <!-- <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
                <div class="mb-12 p-4 md:w-1/2">
                    <img src="Servis Ringan.png" alt="Servis Berat" class="w-full rounded-md">                
                </div>
                <h3 class="text-white font-semibold text-xl mt-5 mb-3 px-4">
                    Servis Ringan
                </h3>
                <p class="text-white font-medium text-base px-4">
                    Servis ringan di bengkel kami adalah perawatan rutin untuk memeriksa dan menyesuaikan komponen
                    penting seperti oli, filter udara, dan sistem kelistrikan motor Anda.
                </p>
            </div> -->
        </div>
    </section>
    <!-- Services Section -->

    <!-- Konten Stop -->

    <!-- Produk Start -->
    <section class="pt-8 pb-2">
    <div class="flex justify-center items-center">
        <button class="bg-yellow-400 text-black font-bold py-2 px-4 rounded">
            Produk
        </button>
    </div>
    </section>

    <section id="produk pt-8 pb-2">
        <div class="bg-black text-white p-5">
            <div class="bg-black text-white p-5 w-full max-w-3xl mx-auto">
                <!-- Bagian Header Kategori -->
                <div class="flex items-center justify-center mb-1 space-x-8">
                    <a href="#" class="text-xl font-bold text-yellow-400">Semua Produk</a>
                    <div class="space-x-5">
                        <a href="#" class="text-white hover:text-primary">Rantai</a>
                        <a href="#" class="text-white hover:text-primary">Ban</a>
                        <a href="#" class="text-white hover:text-primary">Oli Mesin</a>
                        <a href="#" class="text-white hover:text-primary">Oli Gardan</a>
                        <a href="#" class="text-white hover:text-primary">Kampas Rem</a>
                    </div>
                    <button class="text-black bg-yellow-400 px-4 py-2 rounded hover:bg-yellow-500 transition">Filter</button>
                </div>
            </div>
        </div>
    </section>

    <section id="Carousel Produk" class="pt-3 pb-36"> <!-- Decrease padding-top from pt-12 to pt-8 -->
        <div class="relative max-w-3xl mx-auto">
            <!-- Atur flex direction ke column agar produk berurutan ke bawah -->
            <div class="absolute inset-0 flex justify-between items-start">
                <!-- Panah Kiri -->
                <a class="p-4 cursor-pointer text-white bg-black bg-opacity-50 rounded-full text-2xl z-10"
                    style="top: 50%;" onclick="plusProductSlides(-1)">&#10094;</a> <!-- Add top: 50% for vertical centering -->

                <!-- Produk -->
                <div class="flex space-x-6 mx-auto overflow-hidden text-white">
                    <!-- Produk 1 -->
                    <div class="text-center product-slide px-4 py-6">
                        <img src="{{ asset('img/Oli Motul.png') }}" alt="Oli Mesin Motul" class="w-[200px] h-[200px] mx-auto mb-2 object-cover cs">
                        <h3 class="font-semibold text-lg">Motul</h3>
                        <p class="text-sm">Oli Mesin</p>
                        <p class="font-semibold">Rp150.000,00</p>
                    </div>

                    <!-- Produk 2 -->
                    <div class="text-center product-slide px-4 py-6">
                        <img src="{{ asset('img/Busi NGK.jpg') }}" alt="Busi NGK" class="w-[200px] h-[200px] mx-auto mb-2 object-cover cs">
                        <h3 class="font-semibold text-lg">NGK</h3>
                        <p class="text-sm">Busi</p>
                        <p class="font-semibold">Rp30.000,00</p>
                    </div>

                    <!-- Produk 3 -->
                    <div class="text-center product-slide px-4 py-6">
                        <img src="{{ asset('img/Ban Irc.jpeg') }}" alt="Ban Motor IRC" class="w-[200px] h-[200px] mx-auto mb-2 object-cover cs">
                        <h3 class="font-semibold text-lg">IRC Ring 14</h3>
                        <p class="text-sm">Ban Motor</p>
                        <p class="font-semibold">Rp200.000,00</p>
                    </div>

                    <!-- Produk 4 -->
                    <div class="text-center product-slide hidden px-4 py-6">
                        <img src="{{ asset('img/Oli Castrol.jpeg') }}" alt="Oli Mesin Castrol" class="w-[200px] h-[200px] mx-auto mb-2 object-cover cs">
                        <h3 class="font-semibold text-lg">Castrol</h3>
                        <p class="text-sm">Oli Mesin</p>
                        <p class="font-semibold">Rp120.000,00</p>
                    </div>

                    <!-- Produk 5 -->
                    <div class="text-center product-slide hidden px-4 py-6">
                        <img src="{{ asset('img/V-Belt Honda.jpeg') }}" alt="V-Belt Honda" class="w-[200px] h-[200px] mx-auto mb-2 object-cover cs">
                        <h3 class="font-semibold text-lg">V-Belt Honda</h3>
                        <p class="text-sm">Van Belt</p>
                        <p class="font-semibold">Rp150.000,00</p>
                    </div>
                </div>

                <!-- Panah Kanan -->
                <a class="p-4 cursor-pointer text-white bg-black bg-opacity-50 rounded-full text-2xl z-10"
                    style="top: 50%;" onclick="plusProductSlides(1)">&#10095;</a> <!-- Add top: 50% for vertical centering -->
            </div>
        </div>
    </section>
    <!-- Produk Stop -->

    <!-- Carousel Tetstimoni Start -->
    <section id="Carousel Testimoni pt-36 pb-36">
        <div class="container mx-auto">
            <div class="pt-60">
                <div class="flex items-center justify-center text-primary text-3xl">
                    <h1 class="font-semibold">
                        TESTIMONI
                    </h1>
                </div>
            </div>
            <div class="container flex items-center justify-center text-[#767676] text-sm text-center">
            <h1>
                Testimoni Anda sangat berharga bagi kami untuk terus meningkatkan layanan dan kualitas produk.<br>
                Berikan komentar dan rating terbaik Anda di website kami, atau tulis testimoni Anda di sini:
            </h1>
            </div>
            <div class="carousel-container relative w-full max-w-xl mx-auto p-5">
                <div class="testimonial active block text-center">
                <img src="{{ asset('img/mans.jpg') }}" alt="Profile Image" class="rounded-full w-[100px] h-[100px] mx-auto">
                    <h2 class="mt-3 text-white font-bold text-2xl">Arya Marty Mansbawar</h2>
                    <p class="mt-3 text-lg text-white max-w-xl mx-auto">Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Minus et deleniti nesciunt sint eligendi reprehenderit reiciendis.</p>
                    <div class="stars text-yellow-400 mt-3">★★★★☆</div>
                </div>

                <div class="testimonial hidden text-center">
                    <img src="{{ asset("img/jopan.jpg") }}" alt="Profile Image" class="rounded-full w-[100px] h-[100px] mx-auto">
                    <h2 class="mt-3 text-white font-bold text-2xl">JOPAN IMYUT</h2>
                    <p class="mt-3 text-lg text-white max-w-xl mx-auto">Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Quaerat voluptas veniam delectus ipsum libero dolorum!</p>
                    <div class="stars text-yellow-400 mt-3">★★★☆☆</div>
                </div>

                <!-- Letakkan kedua panah dalam satu div -->
                 <div class="absolute inset-0 flex justify-between items-center px-0">
                <a class="p-4 cursor-pointer text-white bg-black bg-opacity-50 rounded-full text-2xl z-10 left-[-40px]"
                    onclick="plusTestimonialSlides(-1)">&#10094;</a>
                <a class="p-4 cursor-pointer text-white bg-black bg-opacity-50 rounded-full text-2xl z-10 right-[-40px]"
                    onclick="plusTestimonialSlides(1)">&#10095;</a>
            </div>
            </div>
        </div>


        <script>
            let currentProductSlide = 0;
            const products = document.querySelectorAll('.product-slide');

            function showProductSlides(n) {
                currentProductSlide += n;

                // Batasi slide agar tidak melebihi jumlah produk
                if (currentProductSlide < 0) currentProductSlide = 0;
                if (currentProductSlide > products.length - 3) currentProductSlide = products.length - 3; // -3 karena 3 produk ditampilkan sekaligus

                products.forEach((product, index) => {
                    // Jika index produk saat ini berada dalam rentang slide yang aktif (3 produk yang ditampilkan)
                    if (index >= currentProductSlide && index < currentProductSlide + 3) {
                        product.classList.remove('hidden');
                    } else {
                        product.classList.add('hidden');
                    }
                });
            }

            // Tampilkan slide awal
            showProductSlides(0);

            function plusProductSlides(n) {
                showProductSlides(n);
}

            // Carousel Testimoni
            let testimonialIndex = 0;
            const testimonialSlides = document.querySelectorAll('.testimonial');

            function showTestimonialSlide(n) {
                if (n >= testimonialSlides.length) {
                    testimonialIndex = 0;
                }
                if (n < 0) {
                    testimonialIndex = testimonialSlides.length - 1;
                }
                testimonialSlides.forEach((slide, i) => {
                    slide.style.display = (i === testimonialIndex) ? 'block' : 'none';
                });
            }

            function plusTestimonialSlides(n) {
                showTestimonialSlide(testimonialIndex += n);
            }

            // Mulai dari slide pertama untuk testimoni
            showTestimonialSlide(testimonialIndex);
        </script>
        </div>
    </section>
    <!-- Carousel Tetstimoni Stop -->

    <section>
        <div class="text-black">
            asdasdsfaasd
            asdasdsfaasd
            asd
        </div>
    </section>

    <!-- Footer Start -->
    <footer class="bg-gray-800 text-white py-6">
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
    </footer>
    <!-- Footer Stop -->
    
    {{-- Modal Ulasan Start--}}
    <section>
        <div id="review-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-gray-900 text-white rounded-lg shadow-lg p-8 w-full max-w-md">
                <!-- Header Modal -->
                <h2 class="text-center text-2xl font-bold mb-6 tracking-wider">ULASAN</h2>

                <!-- User Info -->
                <div class="flex items-center mb-4">
                    <img src="https://via.placeholder.com/50" alt="User"
                        class="w-14 h-14 rounded-full mr-4 border-2 border-gray-700">
                    <div>
                        <p class="text-lg font-semibold">Arya Marty Mansbawar</p>
                    </div>
                </div>

                <!-- Kritik & Saran -->
                <div class="mb-6">
                    <label for="feedback" class="block text-sm font-medium mb-2">Kritik & Saran</label>
                    <textarea id="feedback" rows="4"
                        class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500"
                        placeholder="Masukkan kritik dan saran..."></textarea>
                </div>

                <!-- Rating Section -->
                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2">Berikan Rating</label>
                    <div class="flex items-center space-x-4">
                        <button id="decrement" class="bg-gray-700 px-3 py-1 rounded-lg text-xl font-semibold">-</button>
                        <span id="rating" class="text-2xl font-semibold">1</span>
                        <button id="increment" class="bg-gray-700 px-3 py-1 rounded-lg text-xl font-semibold">+</button>
                        <span id="star-container" class="text-yellow-500 text-2xl">★</span>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-between">
                    <button id="cancel-button"
                        class="bg-gray-800 px-4 py-2 rounded-lg font-semibold border border-gray-600 hover:bg-gray-700 transition duration-150">BATAL</button>
                    <button id="submit-button"
                        class="bg-yellow-500 px-4 py-2 rounded-lg font-semibold text-gray-900 hover:bg-yellow-600 transition duration-150">KIRIM</button>
                </div>
            </div>
        </div>
    </section>
    {{-- Modal Ulasan Stop --}}

    {{-- Modal Edit Akun Start --}}
    <section>
        <div id="edit-account-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="modal-content bg-gray-900 text-white rounded-lg shadow-lg p-8 w-full max-w-2xl">
                <!-- Header Modal -->
                <h2 class="text-center text-2xl font-bold mb-6 tracking-wider">EDIT AKUN</h2>
                
                <div class="flex gap-8">
                    <!-- Upload Foto -->
                    <div class="upload-photo flex flex-col items-center">
                        <div class="w-32 h-32 bg-gray-700 rounded-lg border border-gray-500 flex items-center justify-center mb-4">
                            <label for="upload-photo" class="cursor-pointer text-center">
                                <div class="text-sm text-gray-400">Upload your photo</div>
                                <input type="file" id="upload-photo" class="hidden">
                            </label>
                        </div>
                    </div>
        
                    <!-- Form Edit Akun -->
                    <form action="#" method="POST" class="w-full">
                        @csrf
                        <!-- Password -->
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium mb-1">Password</label>
                            <input type="password" id="password" name="password" class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="Masukkan Password Baru">
                        </div>
        
                        <!-- Konfirmasi Password -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-sm font-medium mb-1">Konfirmasi Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="Masukkan Password Baru">
                        </div>
        
                        <!-- Alamat -->
                        <div class="mb-4">
                            <label for="address" class="block text-sm font-medium mb-1">Alamat</label>
                            <input type="text" id="address" name="address" class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="Masukkan Alamat">
                        </div>
        
                        <!-- Nomor Telepon -->
                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium mb-1">Nomor Telepon</label>
                            <input type="text" id="phone" name="phone" class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="+62 Masukkan Nomor Telepon">
                        </div>
        
                        <!-- Action Buttons -->
                        <div class="flex justify-between mt-6">
                            <button type="button" id="cancel-button" class="cancel bg-gray-800 px-4 py-2 rounded-lg font-semibold border border-gray-600 hover:bg-gray-700 transition duration-150">BATAL</button>
                            <button type="submit" class="submit bg-green-500 px-4 py-2 rounded-lg font-semibold text-gray-900 hover:bg-green-600 transition duration-150">SIMPAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('review-modal');
            const cancelButton = document.getElementById('cancel-button');
            const submitButton = document.getElementById('submit-button');
            const decrementButton = document.getElementById('decrement');
            const incrementButton = document.getElementById('increment');
            const ratingDisplay = document.getElementById('rating');
            const starContainer = document.getElementById('star-container');
            let rating = 0; // Default rating

            // Fungsi untuk toggle modal
            function toggleModal() {
                modal.classList.toggle('hidden');
            }
            // Fungsi untuk update tampilan bintang
            function updateStars() {
                starContainer.innerHTML = '★'.repeat(rating);
            }

            // Event listener untuk membuka modal
            document.querySelectorAll('[data-modal-target="review-modal"]').forEach(button => {
                button.addEventListener('click', toggleModal);
            });

            // Event listener untuk menutup modal
            cancelButton.addEventListener('click', toggleModal);
            submitButton.addEventListener('click', function () {
                // Lakukan aksi submit, lalu tutup modal
                toggleModal();
            });

            // Event listener untuk tombol + dan - untuk rating
            decrementButton.addEventListener('click', function () {
                if (rating > 1) {
                    rating--;
                    ratingDisplay.textContent = rating;
                    updateStars();
                }
            });

            incrementButton.addEventListener('click', function () {
                if (rating < 5) {
                    rating++;
                    ratingDisplay.textContent = rating;
                    updateStars();
                }
            });
        });
    // edit-account-modal
        document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('edit-account-modal');
        const cancelButton = document.getElementById('cancel-button');

        // Fungsi untuk toggle modal
        function toggleModal() {
                modal.classList.toggle('hidden');
            }
        
        // Event listener untuk membuka dan menutup modal
        cancelButton.addEventListener('click', toggleModal);

        // Tambahkan event listener ke tombol lain yang membuka modal (jika ada)
        document.querySelectorAll('[data-modal-target="edit-account-modal"]').forEach(button => {
            button.addEventListener('click', toggleModal);
        });
    });
    </script>
    {{-- Modal Edit Akun Stop --}}
</body>

</html>