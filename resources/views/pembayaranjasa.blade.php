<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pembayaran</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('resources/css/header-footer-dll.css') }}">
    <style>
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

    <section class="pt-16 pb-16">
        <div class="container mx-auto px-4">
            <div class="text-white">
                <div class="container mx-auto p-4 rounded-lg shadow-md bg-gray-800 w-1/2">
                    <h2 class="text-center text-2xl font-bold mb-4">PEMBAYARAN</h2>

                    <!-- Detail Pembayaran -->
                    <div class="bg-gray-700 rounded-lg p-4 mb-4">
                        <h3 class="text-center text-lg font-bold mb-4">Detail Pembayaran</h3>
                        <div class="flex justify-between mb-2">
                            <p class="text-sm font-medium">Produk</p>
                            <p class="text-sm font-medium">Harga</p>
                        </div>
                        @php
                            $subtotal = 0;
                        @endphp
                        @foreach ($data as $item)
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <img src="{{ asset('img/produk/' . $item['gambar']) }}"
                                        alt="{{ $item['nama_produk'] }}" class="rounded-md-2"
                                        style="width: 50px; height: auto;">
                                    <div class="ml-4">
                                        <p class="text-sm font-medium">{{ $item['nama_produk'] }}
                                            ({{ $item['jumlah'] }})
                                        </p>
                                        {{-- <div class="flex items-center mt-1">
                                        <button onclick="kurangiJumlah()" class="bg-gray-600 hover:bg-gray-500 text-sm font-medium px-2 py-1 rounded-md">-</button>
                                        <span id="jumlahProduk" class="mx-2 text-sm">1</span>
                                        <button onclick="tambahJumlah()" class="bg-gray-600 hover:bg-gray-500 text-sm font-medium px-2 py-1 rounded-md">+</button>
                                    </div> --}}
                                    </div>
                                </div>
                                <p class="text-sm font-medium">Rp {{ number_format($item['harga']) }}</p>
                            </div>
                            @php
                                $subtotal += $item['subtotal'];
                            @endphp
                        @endforeach
                        <hr class="border-gray-600 mb-2">
                        <div class="flex justify-between text-sm font-medium">
                            <p>Sub Total :</p>
                            <p>Rp {{ number_format($subtotal) }}</p>
                        </div>
                        <div class="flex justify-between text-sm font-medium">
                            @if ($deliveryMethod === 'radioKirim')
                                <p>Biaya Pengiriman:</p>
                            @else
                                <p>Biaya Pemasangan:</p>
                            @endif
                            <p>Rp {{ number_format($additionalCost) }}</p>
                        </div>
                        <hr class="border-gray-600 mt-2 mb-2">
                        <div class="flex justify-between text-sm font-medium mt-2">
                            <p>Total :</p>
                            <p id="total">Rp {{ number_format($total) }}</p>
                        </div>
                    </div>

                    <div class="flex justify-between">
                        <!-- Alamat -->
                        <div class="bg-gray-700 rounded-lg p-4 mb-4 relative w-1/3">
                            <h3 class="text-lg font-bold mb-2 text-center">Alamat</h3>
                            <button onclick="toggleEdit()"
                                class="absolute top-2 right-2 bg-gray-600 hover:bg-gray-500 text-white font-bold py-1 px-2 rounded-md">
                                Edit
                            </button>

                            <!-- Tampilan alamat -->
                            <div id="alamatDisplay">
                                <p class="text-sm"><span class="font-medium">Nama :</span> <span
                                        id="namaDisplay">{{ Auth::user()->nama_lengkap }}</span></p>
                                <p class="text-sm"><span class="font-medium">No Telp :</span> <span
                                        id="telpDisplay">{{ Auth::user()->no_telpon }}</span></p>
                                <p class="text-sm"><span class="font-medium">Alamat :</span> <span
                                        id="alamatText">{{ Auth::user()->alamat }}</span></p>
                            </div>

                            <!-- Form edit alamat -->
                            <div id="alamatEdit" class="hidden">
                                <input type="text" id="namaInput" value="{{ Auth::user()->nama_lengkap }}"
                                    placeholder="Masukkan Nama" class="w-full mb-2 p-2 rounded bg-gray-800 text-white">
                                <input type="text" id="telpInput" value="{{ Auth::user()->no_telpon }}"
                                    placeholder="Masukkan No Telp"
                                    class="w-full mb-2 p-2 rounded bg-gray-800 text-white">
                                <input type="text" id="alamatInput" value="{{ Auth::user()->alamat }}"
                                    placeholder="Masukkan Alamat"
                                    class="w-full mb-2 p-2 rounded bg-gray-800 text-white">
                                <button onclick="saveAlamat()"
                                    class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-1 px-2 rounded-md mt-2">
                                    Simpan
                                </button>
                            </div>
                        </div>

                        <!-- Metode Pembayaran -->
                        <div class="bg-gray-700 rounded-lg p-4 mb-4 w-1/2">
                            <h3 class="text-lg font-bold mb-2 text-center">Metode Pembayaran</h3>
                            <div class="flex flex-col gap-2">
                                <label class="flex items-center text-sm">
                                    <input type="radio" name="payment-method" class="form-radio text-blue-500 mr-2">
                                    <span>QRIS</span>
                                </label>
                                <label class="flex items-center text-sm">
                                    <input type="radio" name="payment-method" class="form-radio text-blue-500 mr-2">
                                    <span>BCA</span>
                                </label>
                                <label class="flex items-center text-sm">
                                    <input type="radio" name="payment-method" class="form-radio text-blue-500 mr-2">
                                    <span>Mandiri</span>
                                </label>
                                <label class="flex items-center text-sm">
                                    <input type="radio" name="payment-method" class="form-radio text-blue-500 mr-2">
                                    <span>BRI</span>
                                </label>
                                <label class="flex items-center text-sm">
                                    <input type="radio" name="payment-method" class="form-radio text-blue-500 mr-2">
                                    <span>COD</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Tombol Kembali dan Bayar -->
                    <div class="flex justify-between mt-4">
                        <a href="{{ route('keranjang') }}">
                            <button
                                class="bg-gray-600 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded-md">Kembali</button>
                        </a>
                        <button onclick="prosesPembayaran()"
                            class="bg-yellow-500 hover:bg-yellow-400 text-black font-bold py-2 px-4 rounded-md">
                            Bayar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function toggleEdit() {
            // Tampilkan atau sembunyikan tampilan dan form edit
            document.getElementById("alamatDisplay").classList.toggle("hidden");
            document.getElementById("alamatEdit").classList.toggle("hidden");
        }

        function saveAlamat() {
            // Ambil nilai input dari form
            const namaInput = document.getElementById("namaInput").value.trim();
            const telpInput = document.getElementById("telpInput").value.trim();
            const alamatInput = document.getElementById("alamatInput").value.trim();

            // Ambil elemen untuk menampilkan data
            const namaDisplay = document.getElementById("namaDisplay");
            const telpDisplay = document.getElementById("telpDisplay");
            const alamatText = document.getElementById("alamatText");

            // Validasi: Jika input kosong, tetap gunakan nilai lama
            const nama = namaInput || namaDisplay.innerText;
            const telp = telpInput || telpDisplay.innerText;
            const alamat = alamatInput || alamatText.innerText;

            // Update data tampilan
            namaDisplay.innerText = nama;
            telpDisplay.innerText = telp;
            alamatText.innerText = alamat;

            // Kembali ke mode tampilan
            toggleEdit();
        }

        function prosesPembayaran() {
            // Ambil nilai input dari form
            const namaInput = document.getElementById("namaInput").value.trim();
            const telpInput = document.getElementById("telpInput").value.trim();
            const alamatInput = document.getElementById("alamatInput").value.trim();
            // Ambil elemen untuk menampilkan data
            const namaDisplay = document.getElementById("namaDisplay");
            const telpDisplay = document.getElementById("telpDisplay");
            const alamatText = document.getElementById("alamatText");

            // Validasi: Jika input kosong, tetap gunakan nilai lama
            const nama = namaInput || namaDisplay.innerText;
            const telp = telpInput || telpDisplay.innerText;
            const alamat = alamatInput || alamatText.innerText;
            
            // Ambil elemen input radio
            const metodePembayaran = document.querySelector('input[name="payment-method"]:checked');
            const deliveryMethod = @json($deliveryMethod); // Ambil nilai deliveryMethod dari server-side
            const alamatTeks = document.getElementById("alamatText").innerText.trim();


            // Validasi: Jika metode pembayaran belum dipilih
            if (!metodePembayaran) {
                alert("Pilih metode pembayaran terlebih dahulu!");
                return;
            }
            // Validasi: Jika deliveryMethod adalah radioKirim dan alamat kosong
            if (deliveryMethod === 'radioKirim' && (!alamatTeks || alamatTeks === "")) {
                alert("Alamat wajib diisi untuk metode pengiriman!");
                return;
            }

            // Ambil nilai dari metode pembayaran yang dipilih
            const metode = metodePembayaran.nextElementSibling.innerText.toLowerCase(); // Ambil label (misalnya: "BCA")

            const total = @json($total);
            const method = @json($deliveryMethod);
            const data = @json($data);
            const dataCust = [nama,telp,alamat];

            // Encode data ke format JSON
            const encodedData = encodeURIComponent(JSON.stringify(data));
            const encodedTotal = encodeURIComponent(JSON.stringify(total));
            const encodedMethod = encodeURIComponent(JSON.stringify(method));

            // Redirect ke route berdasarkan metode pembayaran
            let routeUrl = "";
            if (metode === "bca" || metode === "mandiri" || metode === "bri") {
                routeUrl = "{{ route('pembayaranbank') }}";
            } else if (metode === "qris") {
                routeUrl = "{{ route('pembayaranqris') }}";
            } else if (metode === "cod") {
                routeUrl = "{{ route('pembayaranberhasilcod') }}";
            } else {
                alert("Metode pembayaran tidak valid!");
                return;
            }

            // Redirect ke route dengan query string
            window.location.href = `${routeUrl}?data=${encodedData}&metode=${metode}&total=${encodedTotal}&method=${encodedMethod}&dataCust=${dataCust}`;
        }
    </script>

    @include('footer')
</body>


</html>