<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Keranjang</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
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

        /* start modal edit account */
        /* Modal Background */
        #edit-account-modal {
            background-color: rgba(0, 0, 0, 0.8);
            /* Background overlay */
        }

        /* Modal Container */
        .modal-content {
            background-color: #1f1f1f;
            /* Dark background for modal */
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
            background-color: #28a745;
            /* Green color for submit button */
            color: #333333;
        }

        .action-buttons .submit:hover {
            background-color: #218838;
        }

        /* end modal edit account */
    </style>
</head>

<body class="bg-black">
    {{-- Header Start --}}
    <x-navbar></x-navbar>
    {{-- Header Stop --}}

    {{-- Konten Start --}}
    <section class="pt-36 pb-16">
        <div class="container mx-auto">
            <!-- Header -->
            <div class="grid grid-cols-4 bg-yellow-500 p-4 rounded-t-md w-auto">
                <h1 class="text-lg font-bold text-black col-span-2 text-center">Produk</h1>
                <div class="flex justify-between col-span-2">
                    <p class="text-lg font-bold text-black text-center w-1/2">Harga</p>
                    <p class="text-lg font-bold text-black text-center w-1/2">Jumlah</p>
                </div>
            </div>

            <!-- Keranjang -->
            <div class="bg-gray-900 text-white p-4 rounded-b-md">
                @foreach ($keranjang as $item)
                    <div class="flex items-center justify-center mb-4">
                        <!-- Checkbox -->
                        <div class="mr-4">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-yellow-500">
                        </div>
                        <!-- Gambar Produk -->
                        <div class="w-1/4">
                            <img src="{{ asset('img/produk/' . $item->produk->gambar) }}"
                                alt="{{ $item->produk->nama_produk }}" class="w-full rounded-lg">
                        </div>

                        <!-- Nama Produk -->
                        <div class="w-1/2 ml-4">
                            <h2 class="text-lg font-bold">{{ $item->produk->nama_produk }}</h2>
                        </div>

                        <!-- Harga Total Per Item -->
                        <div class="w-1/4 text-center">
                            <p id="hargaProduk-{{ $item->produk->kode_produk }}" class="text-lg font-bold">
                                Rp. {{ number_format($item->produk->harga * $item->jumlah) }}
                            </p>
                        </div>

                        <!-- Update Jumlah -->
                        <div class="w-1/3 flex justify-center pl-16">
                            <div class="flex items-center mt-1">
                                <button
                                    onclick="updateJumlah('{{ $item->produk->kode_produk }}', -1, {{ $item->produk->harga }})"
                                    class="bg-gray-600 hover:bg-gray-500 text-sm font-medium px-2 py-1 rounded-md">-</button>
                                <span id="jumlahProduk-{{ $item->produk->kode_produk }}"
                                    class="mx-2 text-sm">{{ $item->jumlah }}</span>
                                <button
                                    onclick="updateJumlah('{{ $item->produk->kode_produk }}', 1, {{ $item->produk->harga }})"
                                    class="bg-gray-600 hover:bg-gray-500 text-sm font-medium px-2 py-1 rounded-md">+</button>
                            </div>
                        </div>
                        <!-- Tombol Hapus -->
                        <div class="mr-6">
                            <button onclick="hapusProduk(1)" class="text-red-500 hover:text-red-700">
                                <i class="uil uil-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                @endforeach

                <!-- Total -->
                <div class="justify-end items-center bg-gray-700 text-yellow-500 p-4 rounded-b-md text-right flex">
                    <div class="p-5">
                        <p class="text-lg font-semibold">Total Jumlah Produk</p>
                        <p id="subtotalDisplay" class="text-lg font-bold text-white">Rp. {{ number_format($harga) }}
                        </p>
                    </div>
                    <a href="{{ route('pembayaran') }}">
                        <button class="bg-yellow-500 px-4 py-2 rounded-md text-gray-900 font-semibold">Checkout</button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Simpan jumlah produk dan subtotal
        const jumlahProduk = @json($keranjang->mapWithKeys(fn($item) => [$item->produk->kode_produk => $item->jumlah]));
        const hargaProdukList = @json($keranjang->mapWithKeys(fn($item) => [$item->produk->kode_produk => $item->produk->harga]));
        let subtotal = {{ $harga }};

        // Fungsi untuk memperbarui jumlah produk dan subtotal
        function updateJumlah(kodeProduk, delta, hargaProduk) {
            const jumlahSpan = document.getElementById(`jumlahProduk-${kodeProduk}`);
            const hargaSpan = document.getElementById(`hargaProduk-${kodeProduk}`);
            let jumlah = jumlahProduk[kodeProduk] || 0;

            // Update jumlah produk
            jumlah += delta;
            if (jumlah < 1) jumlah = 1; // Minimal 1 item

            // Update data dan DOM
            jumlahProduk[kodeProduk] = jumlah;
            jumlahSpan.innerText = jumlah;

            // Update harga per item
            const hargaTotalPerItem = jumlah * hargaProduk;
            hargaSpan.innerText = "Rp. " + hargaTotalPerItem.toLocaleString("id-ID");

            // Hitung subtotal
            subtotal = 0; // Reset subtotal

            // Totalkan semua harga dengan aturan khusus
            Object.keys(jumlahProduk).forEach((kode) => {
                const hargaProdukLain = hargaProdukList[kode];
                subtotal += jumlahProduk[kode] * hargaProdukLain;
            });

            // Tampilkan subtotal di layar
            const subtotalDisplay = document.getElementById("subtotalDisplay");
            subtotalDisplay.innerText = "Rp. " + subtotal.toLocaleString("id-ID");
        }

        function hapusProduk(productId) {
            // Logika untuk menghapus produk dari daftar keranjang
            alert("Produk " + productId + " telah dihapus.");
        }
    </script>
    {{-- Konten Stop --}}

    <!-- Footer Start -->
    <x-footer></x-footer>
    <!-- Footer Stop -->
</body>

</html>
