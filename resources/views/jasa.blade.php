    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Jasa</title>
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
        </style>
    </head>

    <body class="bg-black">

        {{-- Header Start --}}
        <x-navbar></x-navbar>
        {{-- Header Stop --}}

        {{-- Konten Start --}}
        <section class="pt-36 pb-16">
            <div class="container mx-auto items-center justify-center flex">
                <!-- Tombol untuk membuka modal -->
                <button id="open-modal"
                    class="absolute top-2/4 left-72 top-44 bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition">
                    Tambah Merek Motor
                </button>

                <!-- Modal -->
                <div id="modal"
                    class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                    <div class="bg-white rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-700 w-1/3">
                        <div class="p-4 sm:p-7">
                            <div class="text-center">
                                <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Tambah Merek Motor
                                </h1>
                            </div>

                            <div class="mt-5">
                                <form id="add-brand-form">
                                    <div class="grid gap-y-4">
                                        <div>
                                            <label for="new_motor_brand"
                                                class="block text-sm font-bold ml-1 mb-2 dark:text-white">Nama
                                                Merek</label>
                                            <div class="relative">
                                                <input type="text" id="new_motor_brand" name="new_motor_brand"
                                                    class="py-3 px-4 block w-full border-2 border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm"
                                                    required placeholder="Masukkan merek motor">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="new_motor_brand"
                                                class="block text-sm font-bold ml-1 mb-2 dark:text-white">Nomor
                                                Plat</label>
                                            <div class="relative">
                                                <input type="text" id="new_motor_brand" name="new_motor_brand"
                                                    class="py-3 px-4 block w-full border-2 border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm"
                                                    required placeholder="Masukkan nomor plat">
                                            </div>
                                        </div>
                                        <button type="submit"
                                            class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                            Tambah
                                        </button>
                                    </div>
                                </form>
                                <button id="close-modal"
                                    class="mt-4 py-2 px-4 bg-red-500 text-white rounded-md hover:bg-red-600">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-second text-white rounded-md w-1/3">
                    <div class="p-10">
                        <h1 class="text-2xl font-bold items-center justify-center flex">
                            LAYANAN
                        </h1>
                    </div>
                    <div class="p-5">
                        <div class="mb-4">
                            <label for="pilih_jasa" class="block mb-2 text-sm font-medium text-white">Pilih Jasa</label>
                            <select id="pilih_jasa"
                                class="bg-gray-700 border border-gray-600 text-gray-400 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach ($jasa as $jas)
                                    <option value="{{ $jas['kode_jasa'] }}">{{ $jas['nama_jasa'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="merk_motor" class="block mb-2 text-sm font-medium text-white">Pilih
                                Motor</label>
                            <select id="merk_motor"
                                class="bg-gray-700 border border-gray-600 text-gray-400 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach ($motor as $mtr)
                                    <option value="{{ $mtr['id_user'] }}">{{ $mtr['merk_motor'] }}</option>
                                @endforeach
                                {{-- <option value="Honda">Honda</option>
                                    <option value="Yamaha">Yamaha</option> --}}
                            </select>
                        </div>
                        {{-- <div class="mb-4">
                            <label for="nomor_plat" class="block mb-2 text-sm font-medium text-white">Nomor Plat</label>
                            <input type="text" id="nomor_plat" class="bg-gray-700 border border-gray-600 text-gray-400 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div> --}}
                        <div class="mb-4">
                            <label for="tanggal_booking" class="block mb-2 text-sm font-medium text-white">Tanggal
                                Booking</label>
                            <input type="date" id="tanggal_booking"
                                class="bg-gray-700 border border-gray-600 text-gray-400 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="mb-4">
                            <label for="pilih_jam" class="block mb-2 text-sm font-medium text-white">Pilih Jam
                                Booking</label>
                            <input type="time" id="pilih_jam"
                                class="bg-gray-700 border border-gray-600 text-gray-400 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="mb-4">
                            <label for="keluhan_pelanggan"
                                class="block mb-2 text-sm font-medium text-white">Keluhan</label>
                            <textarea id="keluhan_pelanggan"
                                class="bg-gray-700 border border-gray-600 text-gray-400 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                rows="5" cols="30"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="produk_tambahan" class="block mb-2 text-sm font-medium text-white">Tambah
                                Produk</label>
                            <select id="produk_tambahan"
                                class="bg-gray-700 border border-gray-600 text-gray-400 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach ($produk as $prod)
                                    <option value="{{ $prod['kode_produk'] }}">{{ $prod['nama_produk'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex justify-between">
                            <button type="reset"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md ml-2">Batal</button>
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">Pesan</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- Konten Stop --}}

        <!-- Footer Start -->
        <x-footer></x-footer>
        <!-- Footer Stop -->

        <script>
            const modal = document.getElementById('modal');
            const openModalButton = document.getElementById('open-modal');
            const closeModalButton = document.getElementById('close-modal');
            const addBrandForm = document.getElementById('add-brand-form');
            const newMotorBrandInput = document.getElementById('new_motor_brand');
            const merkMotorSelect = document.getElementById('merk_motor');

            // Buka modal
            openModalButton.addEventListener('click', () => {
                modal.classList.remove('hidden');
            });

            // Tutup modal
            closeModalButton.addEventListener('click', () => {
                modal.classList.add('hidden');
            });

            // Tambah merek motor baru
            addBrandForm.addEventListener('submit', (event) => {
                event.preventDefault();
                const newBrand = newMotorBrandInput.value.trim();
                if (newBrand) {
                    const option = document.createElement('option');
                    option.value = newBrand.toLowerCase();
                    option.textContent = newBrand;
                    merkMotorSelect.appendChild(option);
                    newMotorBrandInput.value = '';
                    alert(`Merek motor "${newBrand}" telah ditambahkan.`);
                } else {
                    alert('Masukkan merek motor yang valid!');
                }
            });
        </script>
    </body>

    </html>
