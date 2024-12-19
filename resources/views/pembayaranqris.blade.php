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
                    <span class="text-red-500">Rp {{ number_format($total) }}</span>
                </div>

                <!-- Payment Confirmation Button -->
                <a href="{{ route('konfirmasipembayaran', ['data'=>json_encode($data),'total'=>$total, 'metode'=>$bank,'method'=>$method,'cust'=>json_encode($customer)]) }}">
                    <button
                        class="mt-6 w-full py-3 bg-yellow-500 text-black font-semibold rounded-lg hover:bg-yellow-400">
                        SUDAH TRANSFER
                    </button>
                </a>
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
    @include('footer')
    <!-- Footer Stop -->
</body>

</html>
