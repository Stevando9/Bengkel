<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    @vite('resources/css/app.css')
    <style>
        html {
            scroll-behavior: smooth;
        }

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
            transform: translateX(50px);
            /* Jarak untuk ikon Twitter */
        }

        .twitter-icon:hover .icon {
            transform: translateX(50px);
            /* Jarak untuk ikon Twitter */
        }

        .instagram-icon:hover .icon {
            transform: translateX(60px);
            /* Jarak untuk ikon Instagram */
        }

        .linkedin-icon:hover .icon {
            transform: translateX(50px);
            /* Jarak untuk ikon Instagram */
        }

        .google-icon:hover~.twitter-icon .icon,
        .google-icon:hover~.instagram-icon .icon,
        .google-icon:hover~.linkedin-icon .icon {
            transform: translateX(50px);
            /* Geser ikon lainnya ke kanan */
        }

        .twitter-icon:hover~.instagram-icon .icon,
        .twitter-icon:hover~.linkedin-icon .icon {
            transform: translateX(50px);
            /* Geser ikon lainnya ke kanan */
        }

        .instagram-icon:hover~.linkedin-icon .icon {
            transform: translateX(50px);
            /* Geser ikon lainnya ke kanan */
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

        /* end modal edit account */
        .modal {
            position: fixed;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 50;
        }

        .modal.hidden {
            display: none;
        }


        .modal.show {
            display: flex;
        }
    </style>
</head>

<body class="bg-black">
    <x-navbar></x-navbar>

    {{-- <script>
        // Toggle mobile menu
        document.getElementById('hamburger').addEventListener('click', function() {
            const menu = document.getElementById('hamburgerMenu');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
            }
        });

        // Scroll event to change header background
        window.onscroll = function() {
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
    </script> --}}
    <!-- Header Stop -->

    <!-- Konten Start -->
    <section class="flex justify-center items-center relative bg-cover bg-center pb-12 bg-black"
        style="background-image: url('{{ asset('img/Bg CGL.jpg') }}')">
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
                <div
                    class="bg-gray-800 bg-opacity-75 mt-8 p-6 rounded-lg shadow-lg w-full max-w-7xl mx-auto z-10 justify-center items-center">
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
                        <input type="time" value="09:00"
                            class="p-3 rounded bg-gray-700 text-white w-full md:w-auto">
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
                        <img src="{{ asset('img/Servis Berat.png') }}" alt="Servis Berat" class="w-10/12">
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
                        <img src="{{ asset('img/Servis Ringan.png') }}" alt="Servis Ringan" class="w-10/12">
                        <div class="py-8 px-6">
                            <h3 class="text-black hover:text-primary block font-semibold text-xl truncate">
                                Servis Ringan
                            </h3>
                            <p class="text-black font-medium text-base mb-4">
                                Servis ringan di bengkel kami adalah perawatan rutin untuk memeriksa dan menyesuaikan
                                komponen penting seperti oli mesin,
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
                        Bengkel Kami Menyediakan Beberapa Layanan Servis
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
                    <button
                        class="text-black bg-yellow-400 px-4 py-2 rounded hover:bg-yellow-500 transition">Filter</button>
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
                    style="top: 50%;" onclick="plusProductSlides(-1)">&#10094;</a>
                <!-- Add top: 50% for vertical centering -->

                <!-- Produk -->
                <div class="flex space-x-6 mx-auto overflow-hidden text-white">
                    @foreach ($produk as $prod)
                        <!-- Produk 1 -->
                        <div class="text-center product-slide px-4 py-6">
                            <img src="{{ asset('img/produk/' . $prod['gambar']) }}" alt="{{ $prod['nama_produk'] }}"
                                class="w-[200px] h-[200px] mx-auto mb-2 object-cover cs">
                            <h3 class="font-semibold text-lg">{{ $prod['nama_produk'] }}</h3>
                            <p class="text-sm">{{ $prod->kategori->nama_kategori ?? 'Kategori tidak ditemukan' }}</p>
                            <p class="font-semibold">Rp. {{ number_format($prod['harga']) }}</p>
                        </div>
                    @endforeach
                </div>

                <!-- Panah Kanan -->
                <a class="p-4 cursor-pointer text-white bg-black bg-opacity-50 rounded-full text-2xl z-10"
                    style="top: 50%;" onclick="plusProductSlides(1)">&#10095;</a>
                <!-- Add top: 50% for vertical centering -->
            </div>
        </div>
    </section>
    <!-- Produk Stop -->

    <!-- Carousel Testimoni Start -->
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
            <!-- Testimonial container diisi melalui Blade -->
            <div id="testimonial-container">
                @foreach ($ulasan as $index => $item)
                <div class="testimonial {{ $index !== 0 ? 'hidden' : '' }} text-center">
                    <img src="{{ asset('img/user/'.$item->user->foto) }}" alt="Profile Image"
                        class="rounded-full w-[100px] h-[100px] mx-auto">
                    <h2 class="mt-3 text-white font-bold text-2xl">{{ $item->user->nama_lengkap ?? 'Anonymous' }}</h2>
                    <p class="mt-3 text-lg text-white max-w-xl mx-auto">{{ $item->isiPesan }}</p>
                    <div class="stars text-yellow-400 mt-3">
                        @for ($i = 1; $i <= 5; $i++)
                            {!! $i <= $item->rating ? '&#9733;' : '&#9734;' !!}
                        @endfor
                    </div>
                </div>
                @endforeach
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
                if (currentProductSlide > products.length - 3) currentProductSlide = products.length -
                    3; // -3 karena 3 produk ditampilkan sekaligus

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
            testimonialSlides.forEach((slide, i) => {
                slide.style.display = (i === testimonialIndex) ? 'block' : 'none';
            });
        }

        function plusTestimonialSlides(n) {
            testimonialIndex += n;
            if (testimonialIndex >= testimonialSlides.length) testimonialIndex = 0;
            if (testimonialIndex < 0) testimonialIndex = testimonialSlides.length - 1;
            showTestimonialSlide(testimonialIndex);
        }

        // Mulai dari slide pertama untuk testimoni
        showTestimonialSlide(testimonialIndex);
    </script>
</section>
<!-- Carousel Testimoni Stop -->


    <section>
        <div class="text-black">
            asdasdsfaasd
            asdasdsfaasd
            asd
        </div>
    </section>
    <script>
        document.querySelector('a[href="#kontakKami"]').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('kontakKami').scrollIntoView({
                behavior: 'smooth'
            });
        });
    </script>
    <x-footer id="kontakKami"></x-footer>
</body>

</html>
