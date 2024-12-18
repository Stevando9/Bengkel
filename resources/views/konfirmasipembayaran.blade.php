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
                        <span class="font-semibold">{{ $trans->kode_pembayaran }}</span>                    
                    </div>
                    <div class="flex justify-between">
                        <span>Waktu Transaksi</span>
                        <span class="font-semibold">{{ $trans->tanggal_transaksi }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Metode Transaksi</span>
                        <span class="font-semibold">{{ $trans->metode_pembayaran }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Nama Pengirim</span>
                        <span class="font-semibold">{{ Auth::user()->nama_lengkap }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Jumlah Transaksi</span>
                        <span class="font-semibold">Rp {{number_format($trans->totalHarga) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Countdown Start
        let countdown = 300; // 5 menit dalam detik
    
        function startTimer() {
            const timerElement = document.querySelector('.text-red-500.text-3xl.text-center.font-bold.mb-5');
            const transactionId = "{{ $trans->kode_pembayaran }}";
            const dataArray = @json($data)

            // Generate a random threshold for failure and success
            const randomThreshold = Math.floor(Math.random() * 10); 
            const batasGagal = countdown % randomThreshold;

            const interval = setInterval(() => {
                const minutes = Math.floor(countdown / 60);
                const seconds = countdown % 60;
    
                const formattedTime =
                    String(minutes).padStart(2, '0') + ":" +
                    String(seconds).padStart(2, '0');
    
                timerElement.textContent = formattedTime;
    
                if (countdown <= 0) {
                    // When the countdown reaches 0
                    clearInterval(interval);
                    timerElement.textContent = "00:00";
                    alert("Waktu pembayaran telah habis! Pembayaran gagal.");
                    const params = new URLSearchParams({
                        trans: transactionId,
                        data: JSON.stringify(dataArray)
                    });
                    window.location.href = `/pembayaran/pembayarangagal?${params.toString()}`;
                } else if (countdown === batasGagal) {
                    // Fail condition based on random threshold
                    clearInterval(interval);
                    alert("Pembayaran gagal! Anda tidak memenuhi syarat.");
                    const params = new URLSearchParams({
                        trans: transactionId,
                        data: JSON.stringify(dataArray)
                    });
                    window.location.href = `/pembayaran/pembayarangagal?${params.toString()}`;
                } else if (countdown === randomThreshold) {
                    // Success condition based on random threshold
                    clearInterval(interval);
                    alert("Pembayaran berhasil! Terima kasih.");
                    const params = new URLSearchParams({
                        trans: transactionId,
                        data: JSON.stringify(dataArray)
                    });
                    window.location.href = `/pembayaran/pembayaranberhasil?${params.toString()}`;
                }
    
                countdown--;
            }, 1000);
        }
        // Countdown Stop
    
        // Real Time Start
        // Fungsi untuk mendapatkan waktu saat ini dalam format DD-MM-YYYY, HH:MM:SS
        function getCurrentTime() {
            const now = new Date();
    
            const day = String(now.getDate()).padStart(2, '0');
            const month = String(now.getMonth() + 1).padStart(2, '0'); // Bulan dimulai dari 0
            const year = now.getFullYear();
    
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
    
            return `${day}-${month}-${year}, ${hours}:${minutes}:${seconds}`;
        }
    
        // Menampilkan waktu transaksi real-time di halaman
        function displayTransactionTime() {
            const transactionTimeElement = document.querySelector('#transaction-time');
            transactionTimeElement.textContent = getCurrentTime();
        }
        // Real Time Stop
    
        // Nomor Transaksi Start
        // Fungsi untuk membuat nomor transaksi random 12 digit
        function generateTransactionNumber() {
            let transactionNumber = '';
            for (let i = 0; i < 12; i++) {
                transactionNumber += Math.floor(Math.random() * 10); // Angka acak 0-9
            }
            return transactionNumber;
        }
    
        // Menampilkan nomor transaksi di halaman
        function displayTransactionNumber() {
            let transactionNumber = localStorage.getItem('transactionNumber');
    
            // Jika nomor transaksi belum ada di localStorage, buat nomor baru
            if (!transactionNumber) {
                transactionNumber = generateTransactionNumber();
                localStorage.setItem('transactionNumber', transactionNumber);
            }
    
            const transactionNumberElement = document.querySelector('#transaction-number');
            transactionNumberElement.textContent = transactionNumber;
        }
        // Nomor Transaksi Stop
    
        // Jalankan semua fungsi saat halaman dimuat
        window.onload = function () {
            startTimer();               // Timer countdown
            displayTransactionTime();   // Waktu transaksi real-time
            displayTransactionNumber(); // Nomor transaksi konsisten
        }
    </script>
    {{-- Konten Stop --}}

    <!-- Footer Start -->
    @include('footer')
    <!-- Footer Stop -->
</body>

</html>
