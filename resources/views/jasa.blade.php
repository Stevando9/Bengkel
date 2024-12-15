    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Jasa</title>
        @vite('resources/css/app.css')
        <style>
            /* Sidebar styles */
            .sidebar {
                position: fixed;
                left: 0;
                top: 0;
                height: 100%;
                width: 250px;
                background-color: rgba(31, 41, 55, 1);
                color: white;
                padding: 20px;
                box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
                transform: translateX(-100%);
                transition: transform 0.3s ease-in-out;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .sidebar-toggle {
                position: fixed;
                top: 20px;
                left: 20px;
                background-color: #4a5568;
                color: white;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
            }

            .sidebar-toggle:hover {
                background-color: #2d3748;
            }

            .sidebar input,
            .sidebar button {
                width: 100%;
                margin-bottom: 10px;
                padding: 10px;
                border: 1px solid #4a5568;
                border-radius: 5px;
                background-color: #2d3748;
                color: white;
            }

            .sidebar button:hover {
                background-color: #4a5568;
            }
        </style>
    </head>

    <body class="bg-black">

        {{-- Header Start --}}
        <x-navbar></x-navbar>
        {{-- Header Stop --}}

        {{-- Konten Start --}}
        <section class="pt-[4.5rem] pb-16">
            <div class="container mx-auto items-center justify-center flex">
                <!-- Tombol untuk membuka modal -->
                <button id="open-modal" class="absolute top-1/2 left-72 top-44 bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition">
                    Tambah Merek Motor
                </button>

                <!-- Modal -->
                <div id="modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                    <div class="bg-white rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-700 w-1/3">
                        <div class="p-4 sm:p-7">
                            <div class="text-center">
                                <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Tambah Merek Motor</h1>
                            </div>

                            <div class="mt-5">
                                <form id="add-brand-form">
                                    <div class="grid gap-y-4">
                                        <div>
                                            <label for="new_motor_brand" class="block text-sm font-bold ml-1 mb-2 dark:text-white">Nama Merek</label>
                                            <div class="relative">
                                                <input type="text" id="new_motor_brand" name="new_motor_brand" class="py-3 px-4 block w-full border-2 border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm" required placeholder="Masukkan merek motor">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="new_motor_brand" class="block text-sm font-bold ml-1 mb-2 dark:text-white">Nomor Plat</label>
                                            <div class="relative">
                                                <input type="text" id="new_motor_brand" name="new_motor_brand" class="py-3 px-4 block w-full border-2 border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm" required placeholder="Masukkan nomor plat">
                                            </div>
                                        </div>
                                        <button type="submit" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                            Tambah
                                        </button>
                                    </div>
                                </form>
                                <button id="close-modal" class="mt-4 py-2 px-4 bg-red-500 text-white rounded-md hover:bg-red-600">Tutup</button>
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
                            <select id="pilih_jasa" class="bg-gray-700 border border-gray-600 text-gray-400 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach ($jasa as $jas)
                                    <option value="{{ $jas['kode_jasa'] }}">{{ $jas['nama_jasa'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="merk_motor" class="block mb-2 text-sm font-medium text-white">Merek Motor</label>
                            <select id="merk_motor" class="bg-gray-700 border border-gray-600 text-gray-400 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="honda">Honda</option>
                                <option value="yamaha">Yamaha</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="nomor_plat" class="block mb-2 text-sm font-medium text-white">Nomor Plat</label>
                            <input type="text" id="nomor_plat" class="bg-gray-700 border border-gray-600 text-gray-400 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="mb-4">
                            <label for="tanggal_booking" class="block mb-2 text-sm font-medium text-white">Tanggal Booking</label>
                            <input type="date" id="tanggal_booking" class="bg-gray-700 border border-gray-600 text-gray-400 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="mb-4">
                            <label for="pilih_jam" class="block mb-2 text-sm font-medium text-white">Pilih Jam Booking</label>
                            <input type="time" id="pilih_jam" class="bg-gray-700 border border-gray-600 text-gray-400 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="mb-4">
                            <label for="keluhan_pelanggan" class="block mb-2 text-sm font-medium text-white">Keluhan</label>
                            <textarea id="keluhan_pelanggan" class="bg-gray-700 border border-gray-600 text-gray-400 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" rows="5" cols="30"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="produk_tambahan" class="block mb-2 text-sm font-medium text-white">Tambah Produk</label>
                            <select id="produk_tambahan" class="bg-gray-700 border border-gray-600 text-gray-400 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach ($produk as $prod)
                                    <option value="{{ $prod['kode_produk'] }}">{{ $prod['nama_produk'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex justify-between">
                            <button type="reset" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md ml-2">Batal</button>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">Pesan</button>
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
