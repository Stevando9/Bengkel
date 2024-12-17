<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
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

    {{-- produk Start --}}
    <section id="produk" class="pb-16">
        <div class="container mx-auto p-4">
            <h1 class="text-2xl font-bold mb-4">Filter</h1>
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
                <!-- Kategori dan Batas Harga -->
                <div class="col-span-1 flex flex-col space-y-4 pt-12">
                    {{-- <h2 class="text-lg font-bold text-white">FILTER</h2> --}}
                    <div class="bg-white rounded-md shadow-md p-4">
                        <a href="{{ route('produk') }}"><h2 class="text-lg font-bold mb-2 cursor-pointer hover:text-blue-500" >
                            Kategori
                        </h2></a>                  
                        <ul>
                            @foreach($kategori as $kat)
                            <a href="{{ route('produkByKat', [$kat->kategori_id]) }}"><li class="cursor-pointer hover:bg-gray-200 p-2 rounded-md mb-1">{{$kat['nama_kategori']}}</li> </a>                           
                            @endforeach
                        </ul>
                    </div>
                    <div class="bg-white rounded-md shadow-md p-4">
                        <h2 class="text-lg font-bold mb-2">Batas Harga</h2>
                        <div class="flex items-center space-x-2 mb-2">
                            <input type="text" placeholder="Rp MIN"
                                class="border border-gray-300 rounded-md p-2 w-1/2 text-center">
                            <span class="text-gray-600">—</span>
                            <input type="text" placeholder="Rp MAKS"
                                class="border border-gray-300 rounded-md p-2 w-1/2 text-center">
                        </div>
                        <button
                            class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-2 px-4 rounded-md w-full">Terapkan</button>
                    </div>
                </div>
                <!-- Produk -->
                <div class="col-span-3">
                    <h1 class="text-2xl font-bold mb-4">Produk</h1>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($produk as $prod)                        
                            <div class="bg-white rounded-md shadow-md p-4">  
                                <a href="/produk/detail_produk/{{$prod['kode_produk']}}">                          
                                <img src="{{ asset('img/produk/'.$prod['gambar']) }}" alt="{{$prod['nama_produk']}}" class="w-full h-48 mb-2 object-contain">
                                <h2 class="text-lg font-bold mb-2">{{ $prod['nama_produk'] }}</h2>
                                <p class="text-sm text-gray-600">Rp. {{ number_format($prod['harga'])}}</p>
                                </a>
                                <a href="{{ route('pembayaran.single', ['kode_produk'=>$prod['kode_produk'],'jumlah'=>1]) }}"><button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded-md">Beli</button></a>
                            </div>                        
                        @endforeach
                        <!-- Tambahkan produk lainnya di sini -->
                    </div>
                    {{-- <div class="flex justify-between mb-4 mt-10">
                        <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded-md">Sebelumnya</button>
                        <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded-md">Berikutnya</button>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const applyButton = document.querySelector("button.bg-yellow-400");
            const minPriceInput = document.querySelector('input[placeholder="Rp MIN"]');
            const maxPriceInput = document.querySelector('input[placeholder="Rp MAKS"]');
            const productsContainer = document.querySelector(".col-span-3 .grid"); // Container produk
            const products = Array.from(document.querySelectorAll(".col-span-3 .bg-white"));
    
            // Fungsi untuk menyaring produk berdasarkan harga
            function filterProducts(minPrice, maxPrice) {
                products.forEach(product => {
                    const priceText = product.querySelector("p.text-sm").textContent;
                    const price = parseInt(priceText.replace(/\D/g, ""));
    
                    if (price >= minPrice && price <= maxPrice) {
                        product.style.display = "block"; // Tampilkan produk
                    } else {
                        product.style.display = "none"; // Sembunyikan produk
                    }
                });
            }
    
            // Fungsi untuk mengurutkan produk berdasarkan harga
            function sortProductsAscending() {
                const sortedProducts = products.sort((a, b) => {
                    const priceA = parseInt(a.querySelector("p.text-sm").textContent.replace(/\D/g, ""));
                    const priceB = parseInt(b.querySelector("p.text-sm").textContent.replace(/\D/g, ""));
                    return priceA - priceB; // Urutkan harga ascending
                });
    
                // Hapus produk lama dan tambahkan produk yang sudah diurutkan
                productsContainer.innerHTML = "";
                sortedProducts.forEach(product => productsContainer.appendChild(product));
            }
    
            // Event listener saat tombol "Terapkan" diklik
            applyButton.addEventListener("click", function () {
                const minPrice = parseInt(minPriceInput.value.replace(/\D/g, "")) || 0;
                const maxPrice = parseInt(maxPriceInput.value.replace(/\D/g, "")) || Infinity;
    
                filterProducts(minPrice, maxPrice); // Filter produk
                sortProductsAscending(); // Urutkan produk
            });
    
            // Urutkan produk saat halaman dimuat pertama kali
            sortProductsAscending();
        });
    </script>
    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const resetKategori = document.getElementById("reset-kategori"); // Ambil elemen h2
            const products = Array.from(document.querySelectorAll(".col-span-3 .bg-white")); // Semua produk
    
            // Fungsi untuk mereset produk ke tampilan semula
            function resetProducts() {
                products.forEach(product => {
                    product.style.display = "block"; // Tampilkan semua produk
                });
            }
    
            // Tambahkan event listener ke elemen h2
            resetKategori.addEventListener("click", function () {
                resetProducts(); // Panggil fungsi reset
            });
        });
    </script>
        
    {{-- produk Start --}}

    <!-- Footer Start -->
    <x-footer></x-footer>
    <!-- Footer Stop -->
</body>

</html>
