<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pembayaran</title>
    @vite('resources/css/app.css')
    <link href="{{ asset('css/header-footer-dll.css') }}" rel="stylesheet">
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
    </style>
</head>

<body class="bg-black">

    @include('components.navbar')

    {{-- Konten Start --}}
    <section class="pt-36 pb-16">
        <div class="container mx-auto px-4">
            <div class="bg-white text-black p-6 rounded-lg shadow-md w-full lg:w-1/2 mx-auto">
                <!-- Header Section -->
                <div class="flex justify-between items-center border-b pb-4 mb-4">
                    <div class="flex items-center">
                        @if (isset($bank))
                            <img src="{{ asset('img/' . strtolower($bank) . '.png') }}" alt="Logo Bank"
                                class="w-12 h-12 mr-3 object-contain">
                            <div>
                                <h3 class="font-semibold text-lg">Bank {{ strtoupper($bank) }} (Dicek Otomatis)</h3>
                            </div>
                        @else
                            <h3 class="font-semibold text-lg text-red-500">Bank tidak ditemukan!</h3>
                        @endif
                    </div>
                    <div class="text-red-500 text-2xl font-bold">
                        05:00
                    </div>
                </div>

                <!-- Virtual Account Section -->
                <div class="mb-6">
                    <h4 class="text-sm font-medium text-gray-500 mb-1">No. Virtual Account :</h4>
                    <p class="text-xl font-bold">123 0000000xxx</p>
                </div>

                <!-- Transfer Instructions -->
                <div class="grid grid-cols-2 gap-6 text-sm">
                    <!-- Petunjuk Transfer M-Banking -->
                    <div>
                        <h4 class="font-bold text-gray-700 mb-2">Petunjuk Transfer M-Banking</h4>
                        <ol class="list-decimal list-inside text-gray-600">
                            @if (strtolower($bank) === 'bca')
                                <li>Login ke myBCA.</li>
                                <li>Pilih Transfer dan pilih Virtual Account.</li>
                                <li>Pilih Transfer ke tujuan baru.</li>
                                <li>Masukkan nomor Virtual Account dari e-commerce dan klik Lanjut.</li>
                                <li>Pilih rekening sumber dana, masukkan nominal dan klik Lanjut.</li>
                                <li>Cek detail transaksi, klik Lanjut.</li>
                                <li>Masukkan PIN dan transaksi berhasil.</li>
                            @elseif (strtolower($bank) === 'mandiri')
                                <li>Login ke aplikasi Livin' by Mandiri.</li>
                                <li>Pilih menu "Transfer".</li>
                                <li>Pilih "Transfer ke Rekening Baru" atau "Virtual Account".</li>
                                <li>Masukkan nomor Virtual Account atau rekening tujuan.</li>
                                <li>Masukkan jumlah nominal yang ingin ditransfer.</li>
                                <li>Konfirmasi detail transaksi, lalu klik "Lanjut".</li>
                                <li>Masukkan PIN Anda, dan transaksi selesai.</li>
                            @elseif (strtolower($bank) === 'bri')
                                <li>Login ke aplikasi BRImo.</li>
                                <li>Pilih menu "Transfer".</li>
                                <li>Pilih "Tambah Rekening Baru".</li>
                                <li>Masukkan nomor Virtual Account atau rekening tujuan.</li>
                                <li>Masukkan nominal yang ingin ditransfer.</li>
                                <li>Konfirmasi detail transaksi, lalu klik "Lanjut".</li>
                                <li>Masukkan PIN Anda, dan transaksi selesai.</li>
                            @else
                                <li>Bank tidak ditemukan! Silakan hubungi layanan pelanggan.</li>
                            @endif
                        </ol>
                    </div>

                    <!-- Petunjuk Transfer ATM -->
                    <div>
                        <h4 class="font-bold text-gray-700 mb-2">Petunjuk Transfer ATM</h4>
                        <ol class="list-decimal list-inside text-gray-600">
                            @if (strtolower($bank) === 'bca')
                                <li>Datang ke ATM terdekat.</li>
                                <li>Masukkan kartu Anda.</li>
                                <li>Masukkan PIN Anda.</li>
                                <li>Pilih Bahasa Indonesia.</li>
                                <li>Pilih transfer lainnya.</li>
                                <li>Masukkan kode Virtual Account.</li>
                                <li>Masukkan nominal yang ingin ditransfer.</li>
                                <li>Pilih Benar.</li>
                            @elseif (strtolower($bank) === 'mandiri')
                                <li>Datang ke ATM Mandiri terdekat.</li>
                                <li>Masukkan kartu ATM Anda.</li>
                                <li>Masukkan PIN Anda.</li>
                                <li>Pilih menu "Transfer".</li>
                                <li>Pilih "Ke Rekening Mandiri" atau "Bank Lain".</li>
                                <li>Masukkan nomor rekening atau kode Virtual Account.</li>
                                <li>Masukkan jumlah nominal yang ingin ditransfer.</li>
                                <li>Periksa kembali detail transaksi, lalu pilih "Ya".</li>
                                <li>Transaksi selesai.</li>
                            @elseif (strtolower($bank) === 'bri')
                                <li>Datang ke ATM BRI terdekat.</li>
                                <li>Masukkan kartu ATM Anda.</li>
                                <li>Masukkan PIN Anda.</li>
                                <li>Pilih menu "Transaksi Lainnya".</li>
                                <li>Pilih "Transfer".</li>
                                <li>Masukkan kode Virtual Account atau nomor rekening tujuan.</li>
                                <li>Masukkan jumlah nominal yang ingin ditransfer.</li>
                                <li>Periksa kembali detail transaksi, lalu pilih "Ya".</li>
                                <li>Transaksi selesai.</li>
                            @else
                                <li>Bank tidak ditemukan! Silakan hubungi layanan pelanggan.</li>
                            @endif
                        </ol>
                    </div>
                </div>

                <!-- Total Section -->
                <div class="flex justify-between items-center text-lg font-semibold border-t border-gray-300 pt-4 mt-4">
                    <span>Total:</span>
                    <span class="text-red-500">Rp 215.000,00</span>
                </div>

                <!-- Payment Confirmation Button -->
                <a href="{{ route('pembayaranberhasil') }}">
                    <button
                        class="mt-6 w-full py-3 bg-yellow-500 text-black font-semibold rounded-lg hover:bg-yellow-400">
                        SUDAH TRANSFER
                    </button>
                </a>
            </div>
        </div>
    </section>

    <script>
        // Timer setup
        let countdown = 300; // 5 minutes in seconds

        function startTimer() {
            const timerElement = document.querySelector('.text-red-500.text-2xl.font-bold');

            const interval = setInterval(() => {
                const minutes = Math.floor(countdown / 60);
                const seconds = countdown % 60;

                const formattedTime =
                    String(minutes).padStart(2, '0') + ":" +
                    String(seconds).padStart(2, '0');

                timerElement.textContent = formattedTime;

                if (countdown <= 0) {
                    clearInterval(interval);
                    timerElement.textContent = "00:00";
                    alert("Waktu pembayaran telah habis!");
                    window.location.href = "{{ route('pembayarangagal') }}";
                }
                countdown--;
            }, 1000);
        }
        // Start timer on page load
        window.onload = startTimer;
    </script>
    {{-- Konten Stop --}}

    <!-- Footer Start -->
    @include('footer')

    <!-- Footer Stop -->
</body>

</html>
