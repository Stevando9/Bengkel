{{-- perbaikan qris --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KonfirmasiPembayaranQris</title>
    @vite('resources/css/app.css')
    <link href="{{ asset('css/header-footer-dll.css') }}" rel="stylesheet">
    <style>
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
            <div class="bg-white text-black p-6 rounded-lg shadow-md w-full lg:w-1/3 mx-auto">
                <!-- Icon & Title -->
                <div class="text-center mb-6">
                    <div class="w-12 h-12 mx-auto mb-4">
                        <img src="{{ asset('img/wait.jpg') }}" alt="Konfirmasi" class="object-contain">
                    </div>
                    <h2 class="text-2xl font-bold text-black">MENUNGGU KONFIRMASI</h2>
                    <h2 class="text-2xl font-bold text-black">PEMBAYARAN</h2>
                </div>
                <div class="text-red-500 text-3xl text-center font-bold mb-5">
                    05:00
                </div>

                <!-- Transaction Details -->
                <div class="text-sm text-gray-700 mb-6 space-y-2">
                    <div class="flex justify-between">
                        <span>Nomor Transaksi</span>
                        <span class="font-semibold">000085752257</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Waktu Transaksi</span>
                        <span class="font-semibold">25-02-2023, 13:22:16</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Metode Transaksi</span>
                        <span class="font-semibold">QRIS</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Nama Pengirim</span>
                        <span class="font-semibold">Yopan</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Jumlah Transaksi</span>
                        <span class="font-semibold">IDR 215,000</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Timer setup
        let countdown = 300; // 5 minutes in seconds

        function startTimer() {
            const timerElement = document.querySelector('.text-red-500.text-3xl.text-center.font-bold.mb-5');

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
