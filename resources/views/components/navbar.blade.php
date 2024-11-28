    <!-- Header Start -->
    <header class="bg-gray-800 text-white">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <!-- Logo and Brand Name -->
            <div class="flex items-center">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('img/Cahaya Gunung Licin 2.jpeg.jpg') }}" alt="Logo"
                        class="w-12 h-12 rounded-full mr-2">
                    <h1 class="text-xl font-bold text-primary">CAHAYA <span class="text-white">GUNUNG LICIN</span>
                </a>
                </h1>
            </div>

            <!-- Navigation Links for Desktop -->
            {{-- <nav class="hidden md:flex space-x-8 ml-auto pr-10">
                <a href="{{ route('home') }}" class="text-primary hover:text-white">HOME</a>
                <a href="{{ route('produk') }}" class="text-white hover:text-primary">PRODUK</a>
                <a href="{{ route('jasa') }}" class="text-white hover:text-primary">JASA</a>
                <a href="{{ route('keranjang') }}" class="text-white hover:text-primary">KERANJANG</a>
            </nav> --}}
            <nav class="hidden md:flex space-x-8 ml-auto pr-10">
                <x-nav-link route="home" label="HOME" />
                <x-nav-link route="produk" label="PRODUK" />
                <x-nav-link route="jasa" label="JASA" />
                <x-nav-link route="keranjang" label="KERANJANG" />
            </nav>


            <!-- Always Visible Hamburger Menu -->
            <div>
                <button id="hamburger" class="focus:outline-none pr-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                            d="M4 6h16M4 12h16m-7 6h7" />
                        <!-- <div class="h-8 w-8 flex flex-col justify-center items-center">
                                <div class="bg-gray-700 h-1 w-6 mb-1"></div>
                                <div class="bg-gray-700 h-1 w-6 mb-1"></div>
                                <div class="bg-gray-700 h-1 w-6"></div>
                            </div> -->
                    </svg>
                </button>
            </div>
        </div>

        <!-- Hamburger Menu (Always Visible) -->
        <div id="hamburgerMenu" class="hidden absolute top-16 right-6 bg-gray-700 rounded-lg shadow-lg py-2 w-48 z-50">
            <!-- Beranda -->
            <a href="#" class="flex items-center px-4 py-2 text-white hover:bg-gray-600">
                <img src="{{ asset('img/Vector Bengkel.png') }}" alt="Deskripsi Icon" class="h-6 w-6 mr-2" />
                BERANDA
            </a>

            <!-- Akun -->
            <a data-modal-target="detail-account-modal"
                class="flex items-center px-4 py-2 text-white hover:bg-gray-600">
                <img src="{{ asset('img/Vector Profile.png') }}" alt="Deskripsi Icon" class="h-6 w-6 mr-2" />
                Akun
            </a>

            <!-- Kontak Kami -->
            <a data-modal-target="" class="flex items-center px-4 py-2 text-white hover:bg-gray-600">
                <img src="{{ asset('img/Vector Kontak Kami.png') }}" alt="Deskripsi Icon" class="h-6 w-6 mr-2" />
                Kontak Kami
            </a>

            <!-- Ulasan -->
            <a data-modal-target="review-modal"
                class="flex items-center px-4 py-2 text-white hover:bg-gray-600 cursor-pointer">
                <img src="{{ asset('img/Vector Ulasan.png') }}" alt="Deskripsi Icon" class="h-6 w-6 mr-2" />
                Ulasan
            </a>

            <!-- Login Logout-->
            @if (Auth::check())
                <a href="{{ route('logout') }}" class="flex items-center px-4 py-2 text-white hover:bg-gray-600">
                    <img src="{{ asset('img/Vector Login.png') }}" alt="Deskripsi Icon" class="h-6 w-6 mr-2" />
                    Logout
                </a>
            @else
                <a href="{{ route('login') }}" class="flex items-center px-4 py-2 text-white hover:bg-gray-600">
                    <img src="{{ asset('img/Vector Login.png') }}" alt="Deskripsi Icon" class="h-6 w-6 mr-2" />
                    Login
                </a>
            @endif
            <script>
                // Toggle mobile menu
                document.getElementById('hamburger').addEventListener('click', function() {
                    const menu = document.getElementById('hamburgerMenu');
                    if (menu.classList.contains('hidden')) {
                        menu.classList.remove('hidden');
                    } else {
                        menu.classList.add('hidden');
                    }
                });

                // Scroll event to change header background
                window.onscroll = function() {
                    const header = document.getElementById('header');
                    if (window.scrollY > 50) {
                        header.classList.add('header-scrolled');
                    } else {
                        header.classList.remove('header-scrolled');
                    }
                };

                // Ambil elemen hamburger dan menu
                const hamburger = document.getElementById('hamburger');
                const hamburgerMenu = document.getElementById('hamburgerMenu');

                // Tutup menu saat mengklik di luar menu dan hamburger
                document.addEventListener('click', (event) => {
                    if (!hamburger.contains(event.target) && !hamburgerMenu.contains(event.target)) {
                        hamburgerMenu.classList.add('hidden');
                    }
                });
            </script>
        </div>



        {{-- modal Akun --}}
        <section>
            <div id="detail-account-modal"
                class="modal hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                <div class="bg-gray-800 text-white w-full max-w-3xl p-8 rounded-lg shadow-lg">
                    <h2 class="text-3xl font-bold mb-6 text-center">AKUN</h2>
                    <div class="flex items-start space-x-8">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('img/mans.jpg') }}" alt="Profile Picture"
                                class="w-40 h-40 rounded-full">
                        </div>
                        <div class="flex-grow">
                            <div class="mb-4">
                                <label class="block text-sm font-semibold">Nama</label>
                                <p class="border-b border-gray-600 py-2">Arya Marty Mansbawar</p>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-semibold">Email</label>
                                <p class="border-b border-gray-600 py-2">hiphopmansbaw@gmail.com</p>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-semibold">Nomor Telepon</label>
                                <p class="border-b border-gray-600 py-2">082322741251</p>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-semibold">Alamat</label>
                                <p class="border-b border-gray-600 py-2">Maguwoharjo</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between mt-6">
                        <button id="edit-akun-button"class="bg-gray-700 px-6 py-2 rounded-lg">EDIT</button>
                        <button id="close-modal-akun" class="bg-gray-700 px-6 py-2 rounded-lg">KEMBALI</button>
                    </div>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Modal akun
                    const modalAkunDetail = document.getElementById('detail-account-modal');
                    const modalEditAkun = document.getElementById('edit-account-modal');

                    // Tombol untuk membuka dan menutup modal
                    const editAkunButton = document.getElementById('edit-akun-button');
                    const closeDetailModalButton = document.getElementById('close-modal-akun');
                    // Buka modal
                    // Event listener untuk membuka modal edit akun {coba}
                    document.querySelectorAll('[data-modal-target="detail-account-modal"]').forEach(button => {
                        button.addEventListener('click', function() {
                            toggleModal(modalAkunDetail);
                        });
                    });

                    // Event listener untuk tombol EDIT
                    editAkunButton.addEventListener('click', function() {
                        toggleModal(modalAkunDetail); // Tutup modal detail
                        toggleModal(modalEditAkun); // Buka modal edit
                    });

                    // Event listener untuk tombol KEMBALI pada modal detail
                    closeDetailModalButton.addEventListener('click', function() {
                        toggleModal(modalAkunDetail);
                    });
                });
            </script>
        </section>

        {{-- Modal Edit Akun --}}
        <section>
            <div id="edit-account-modal"
                class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                <div class="modal-content bg-gray-900 text-white rounded-lg shadow-lg p-8 w-full max-w-2xl">
                    <!-- Header Modal -->
                    <h2 class="text-center text-2xl font-bold mb-6 tracking-wider">EDIT AKUN</h2>

                    <div class="flex gap-8">
                        <!-- Upload Foto -->
                        <div class="upload-photo flex flex-col items-center">
                            <div
                                class="w-32 h-32 bg-gray-700 rounded-lg border border-gray-500 flex items-center justify-center mb-4">
                                <label for="upload-photo" class="cursor-pointer text-center">
                                    <div class="text-sm text-gray-400">Upload your photo</div>
                                    <input type="file" id="upload-photo" class="hidden">
                                </label>
                            </div>
                        </div>

                        <!-- Form Edit Akun -->
                        <form action="#" method="POST" class="w-full">
                            @csrf
                            <!-- Password -->
                            <div class="mb-4">
                                <label for="password" class="block text-sm font-medium mb-1">Password</label>
                                <input type="password" id="password" name="password"
                                    class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500"
                                    placeholder="Masukkan Password Baru">
                            </div>

                            <!-- Konfirmasi Password -->
                            <div class="mb-4">
                                <label for="password_confirmation" class="block text-sm font-medium mb-1">Konfirmasi
                                    Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500"
                                    placeholder="Masukkan Password Baru">
                            </div>

                            <!-- Alamat -->
                            <div class="mb-4">
                                <label for="address" class="block text-sm font-medium mb-1">Alamat</label>
                                <input type="text" id="address" name="address"
                                    class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500"
                                    placeholder="Masukkan Alamat">
                            </div>

                            <!-- Nomor Telepon -->
                            <div class="mb-4">
                                <label for="phone" class="block text-sm font-medium mb-1">Nomor Telepon</label>
                                <input type="text" id="phone" name="phone"
                                    class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500"
                                    placeholder="+62 Masukkan Nomor Telepon">
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex justify-between mt-6">
                                <button type="button" id="cancel-edit-button"
                                    class="cancel bg-gray-800 px-4 py-2 rounded-lg font-semibold border border-gray-600 hover:bg-gray-700 transition duration-150">BATAL</button>
                                <button type="submit-edit-button"
                                    class="submit bg-green-500 px-4 py-2 rounded-lg font-semibold text-gray-900 hover:bg-green-600 transition duration-150">SIMPAN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Modal edit akun
                    const editAccountModal = document.getElementById('edit-account-modal');
                    const cancelEditButton = document.getElementById('cancel-edit-button');
                    // Buka modal
                    // Event listener untuk membuka modal edit akun
                    document.querySelectorAll('[data-modal-target="edit-account-modal"]').forEach(button => {
                        button.addEventListener('click', function() {
                            toggleModal(editAccountModal);
                        });
                    });
                    // //  Fungsi untuk membuka/menutup modal
                    // function toggleModal(modal) {
                    //     modal.classList.toggle('hidden');
                    // }
                    // ----------EDIT AKUN--------------
                    // Event listener tombol "BATAL" di modal edit akun
                    cancelEditButton.addEventListener('click', function() {
                        toggleModal(editAccountModal);
                    });

                    submitButton.addEventListener('click', function() {
                        // Lakukan aksi submit, lalu tutup modal
                        toggleModal();
                    });

                    // edit-account-modal
                    function toggleEditModal() {
                        editAccountModal.classList.toggle('hidden');
                    }

                });
            </script>
        </section>

        {{-- Modal Ulasan --}}
        <section>
            <div id="review-modal"
                class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                <div class="bg-gray-900 text-white rounded-lg shadow-lg p-8 w-full max-w-md">
                    <!-- Header Modal -->
                    <h2 class="text-center text-2xl font-bold mb-6 tracking-wider">ULASAN</h2>

                    <!-- User Info -->
                    <div class="flex items-center mb-4">
                        <img src="https://via.placeholder.com/50" alt="User"
                            class="w-14 h-14 rounded-full mr-4 border-2 border-gray-700">
                        <div>
                            <p class="text-lg font-semibold">Arya Marty Mansbawar</p>
                        </div>
                    </div>

                    <!-- Kritik & Saran -->
                    <div class="mb-6">
                        <label for="feedback" class="block text-sm font-medium mb-2">Kritik & Saran</label>
                        <textarea id="feedback" rows="4"
                            class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500"
                            placeholder="Masukkan kritik dan saran..."></textarea>
                    </div>

                    <!-- Rating Section -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2">Berikan Rating</label>
                        <div class="flex items-center space-x-4">
                            <button id="decrement"
                                class="bg-gray-700 px-3 py-1 rounded-lg text-xl font-semibold">-</button>
                            <span id="rating" class="text-2xl font-semibold">1</span>
                            <button id="increment"
                                class="bg-gray-700 px-3 py-1 rounded-lg text-xl font-semibold">+</button>
                            <span id="star-container" class="text-yellow-500 text-2xl">★☆☆☆☆</span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-between">
                        <button id="cancel-review-button"
                            class="bg-gray-800 px-4 py-2 rounded-lg font-semibold border border-gray-600 hover:bg-gray-700 transition duration-150">BATAL</button>
                        <button id="submit-review-button"
                            class="bg-yellow-500 px-4 py-2 rounded-lg font-semibold text-gray-900 hover:bg-yellow-600 transition duration-150">KIRIM</button>
                    </div>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Modal Saran
                    const reviewModal = document.getElementById('review-modal');
                    const decrementButton = document.getElementById('decrement');
                    const incrementButton = document.getElementById('increment');
                    const ratingDisplay = document.getElementById('rating');
                    const starContainer = document.getElementById('star-container');
                    let rating = 1; // Default rating
                    const cancelReviewButton = document.getElementById('cancel-review-button');;
                    const submitReviewButton = document.getElementById('submit-review-button');

                    // Buka modal
                    // Event listener untuk membuka modal review
                    document.querySelectorAll('[data-modal-target="review-modal"]').forEach(button => {
                        button.addEventListener('click', function() {
                            toggleModal(reviewModal);
                        });
                    });

                    // ----------ULASAN--------------
                    // Fungsi untuk update tampilan bintang
                    function updateStars() {
                        starContainer.innerHTML = '★'.repeat(rating) + '☆'.repeat(5 - rating);
                    }
                    // Set awal tampilan rating dan bintang
                    ratingDisplay.textContent = rating;
                    updateStars();

                    // Event listener untuk tombol + dan - untuk rating
                    decrementButton.addEventListener('click', function() {
                        if (rating > 1) {
                            rating--;
                            ratingDisplay.textContent = rating;
                            updateStars();
                        }
                    });
                    incrementButton.addEventListener('click', function() {
                        if (rating < 5) {
                            rating++;
                            ratingDisplay.textContent = rating;
                            updateStars();
                        }
                    });

                    // Event listener tombol "BATAL" di modal ulasan
                    cancelReviewButton.addEventListener('click', function() {
                        toggleModal(reviewModal);
                    });
                });
            </script>
        </section>

        <script>
            //  Fungsi untuk membuka/menutup modal
            function toggleModal(modal) {
                modal.classList.toggle('hidden');
            }
        </script>
    </header>
