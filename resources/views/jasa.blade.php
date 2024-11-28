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
        +
    </style>
</head>

<body class="bg-black">
    {{-- Header Start --}}
    <x-navbar></x-navbar>
    {{-- Header Stop --}}

    {{-- Konten Start --}}
    <section class="pt-36 pb-16">
        <div class="container mx-auto items-center justify-center flex">
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
                            <option value="service_ringan">Service Ringan</option>
                            <option value="service_berat">Service Berat</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="merk_motor" class="block mb-2 text-sm font-medium text-white">Merek Motor</label>
                        <input type="text" id="merek_motor"
                            class="bg-gray-700 border border-gray-600 text-gray-400 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        {{-- <select id="merk_motor"
                            class="bg-gray-700 border border-gray-600 text-gray-400 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="honda">Honda</option>
                            <option value="yamaha">Yamaha</option>
                        </select> --}}
                    </div>
                    <div class="mb-4">
                        <label for="nomor_plat" class="block mb-2 text-sm font-medium text-white">Nomor Plat</label>
                        <input type="text" id="nomor_plat"
                            class="bg-gray-700 border border-gray-600 text-gray-400 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
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
                        <label for="keluhan_pelanggan" class="block mb-2 text-sm font-medium text-white">Keluhan</label>
                        <textarea id="keluhan_pelanggan"
                            class="bg-gray-700 border border-gray-600 text-gray-400 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            rows="5" cols="30"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="produk_tambahan" class="block mb-2 text-sm font-medium text-white">Tambah
                            Produk</label>
                        <select id="produk_tambahan"
                            class="bg-gray-700 border border-gray-600 text-gray-400 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="oli">Oli</option>
                            <option value="filter_udara">Filter Udara</option>
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
</body>

</html>
