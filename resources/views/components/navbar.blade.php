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
            <a href="{{ asset('/') }}" class="flex items-center px-4 py-2 text-white hover:bg-gray-600">
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
            <a href="#kontakKami" class="flex items-center px-4 py-2 text-white hover:bg-gray-600">
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

        <section>
            @auth
                <div id="detail-account-modal"
                    class="modal hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                    <div class="bg-gray-800 text-white w-full max-w-3xl p-8 rounded-lg shadow-lg">
                        <h2 class="text-3xl font-bold mb-6 text-center">AKUN</h2>
                        <div class="flex items-start space-x-8">
                            <div class="flex-shrink-0">
                                @if (Auth::user()->foto)
                                    <img src="{{ asset('img/user/' . Auth::user()->foto) }}" alt="Profile Picture"
                                        class="w-40 h-40 rounded-full">
                                @else
                                    <img src="{{ asset('img/user/Vector Profile.png') }}" alt="Profile Picture"
                                        class="w-40 h-40 rounded-full">
                                @endif

                            </div>
                            <div class="flex-grow">
                                <div class="mb-4">
                                    <label class="block text-sm font-semibold">Nama</label>
                                    <p class="border-b border-gray-600 py-2">{{ Auth::user()->nama_lengkap }}</p>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-semibold">Email</label>
                                    <p class="border-b border-gray-600 py-2">{{ Auth::user()->email }}</p>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-semibold">Nomor Telepon</label>
                                    <p class="border-b border-gray-600 py-2">{{ Auth::user()->no_telpon }}</p>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-semibold">Alamat</label>
                                    <p class="border-b border-gray-600 py-2">
                                        {{ Auth::user()->alamat ?? 'Alamat belum diisi' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between mt-6">
                            <button id="edit-akun-button" data-nama="{{ Auth::user()->nama_lengkap }}"
                                data-email="{{ Auth::user()->email }}" data-telepon="{{ Auth::user()->no_telpon }}"
                                data-alamat="{{ Auth::user()->alamat ?? '' }}"
                                class="bg-yellow-500 px-8 py-2 rounded-lg font-semibold text-gray-900 hover:bg-yellow-600 transition duration-150">EDIT</button>
                            <button id="close-modal-akun"
                                class="bg-gray-900 px-6 py-2 rounded-lg font-semibold text-yellow-500 hover:bg-gray-700 transition duration-150">KEMBALI</button>
                        </div>
                    </div>
                </div>
            @endauth
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
            @auth
                <div id="edit-account-modal"
                    class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                    <div class="modal-content bg-gray-800 text-white rounded-lg shadow-lg p-8 w-full max-w-2xl">
                        <!-- Header Modal -->
                        <h2 class="text-center text-2xl font-bold mb-6 tracking-wider">EDIT AKUN</h2>

                        <div class="flex gap-8">
                            <!-- Form Edit Akun -->
                            {{-- <form action="{{ route('user.update') }}" method="POST" class="w-full"> --}}
                            <!-- Form untuk update user dan alamat -->
                            <form action="{{ route('user.update', Auth::user()->id) }}" method="POST"
                                enctype="multipart/form-data" class="w-full">
                                @csrf
                                <!-- Upload Foto -->
                                <div class="upload-photo flex flex-col items-center">
                                    <div
                                        class="w-32 h-32 bg-gray-700 rounded-lg border border-gray-500 flex items-center justify-center mb-4">
                                        <label for="upload-photo" class="cursor-pointer text-center">
                                            @if (Auth::user()->foto)
                                                <img src="{{ asset('img/user/' . Auth::user()->foto) }}"
                                                    alt="Profile Picture" class="w-40 h-40 rounded-full">
                                            @else
                                                <img src="{{ asset('img/user/Vector Profile.png') }}"
                                                    alt="Profile Picture" class="rounded-lg w-full h-full object-cover">
                                            @endif
                                            <div class="text-sm text-gray-400">Upload your photo</div>
                                        </label>
                                        <input type="file" id="upload-photo" name="photo" class="hidden">
                                    </div>
                                </div>

                                <!-- Input Password -->
                                <div class="mb-4">
                                    <label for="password" class="block text-sm font-medium mb-1">Password Baru</label>
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
                                        placeholder="Konfirmasi Password Baru">
                                </div>
                                <!-- Input Alamat -->
                                <div class="mb-4">
                                    <label for="address" class="block text-sm font-medium mb-1">Alamat</label>
                                    <input type="text" id="address" name="detail_alamat"
                                        value="{{ Auth::user()->alamat ?? '' }}"
                                        class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500"
                                        placeholder="Masukkan Alamat">
                                </div>
                                <!-- Input Nomor Telepon -->
                                <div class="mb-4">
                                    <label for="phone" class="block text-sm font-medium mb-1">Nomor Telepon</label>
                                    <input type="text" id="phone" name="phone"
                                        value="{{ Auth::user()->no_telpon }}"
                                        class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500"
                                        placeholder="+62 Masukkan Nomor Telepon">
                                </div>
                                <!-- Tombol Aksi -->
                                <div class="flex justify-between mt-6">
                                    <button
                                        class="cancel bg-gray-800 px-4 py-2 rounded-lg font-semibold border border-gray-600 hover:bg-gray-700 transition duration-150">BATAL
                                    </button>
                                    <button type="submit"
                                        class="submit bg-green-500 px-4 py-2 rounded-lg font-semibold text-gray-900 hover:bg-green-600 transition duration-150">SIMPAN
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            @endauth
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Modal edit akun
                    const editAccountModal = document.getElementById('edit-account-modal');
                    const cancelEditButton = document.getElementById('cancel-edit-button');
                    // Ambil data dari atribut data-*
                    const nama = editButton.getAttribute('data-nama');
                    const email = editButton.getAttribute('data-email');
                    const telepon = editButton.getAttribute('data-telepon');
                    const alamat = editButton.getAttribute('data-alamat');

                    // Isi formulir modal
                    document.getElementById('password').value = '';
                    document.getElementById('password_confirmation').value = '';
                    document.getElementById('address').value = alamat;
                    document.getElementById('phone').value = telepon;

                    modal.style.display = 'block'; // Tampilkan modal
                    // Buka modal
                    // Event listener untuk membuka modal edit akun
                    document.querySelectorAll('[data-modal-target="edit-account-modal"]').forEach(button => {
                        button.addEventListener('click', function() {
                            toggleModal(editAccountModal);
                        });
                    });
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

                function togglePasswordVisibility(input, show) {
                    input.type = show ? 'text' : 'password';
                }
            </script>
        </section>

        {{-- Modal Ulasan --}}
        <section>
            @auth
                <div id="review-modal"
                    class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                    <div class="bg-gray-900 text-white rounded-lg shadow-lg p-8 w-full max-w-md">
                        <!-- Header Modal -->
                        <h2 class="text-center text-2xl font-bold mb-6 tracking-wider">ULASAN</h2>

                        <!-- User Info -->
                        <div class="flex items-center mb-4">
                            <img src="{{ asset('img/user/' . Auth::user()->foto) }}" alt="User"
                                class="w-14 h-14 rounded-full mr-4 border-2 border-gray-700">
                            <div>
                                <p class="text-lg font-semibold">{{ Auth::user()->nama_lengkap }}</p>
                            </div>
                        </div>

                        {{-- <form action="{{ route('ulasan.update', Auth::ulasan()->id) }}" method="POST"> --}}
                        <!-- Kritik & Saran -->
                        <div class="mb-6">
                            <label for="feedback" class="block text-sm font-medium mb-2">Kritik & Saran</label>
                            <textarea id="feedback" rows="4" value="{{ Auth::user()->ulasan->isiPesan ?? '' }}"
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
                        {{-- </form> --}}
                    </div>
                </div>
            @endauth
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Modal Saran
                    const reviewModal = document.getElementById('review-modal');
                    const decrementButton = document.getElementById('decrement');
                    const incrementButton = document.getElementById('increment');
                    const ratingDisplay = document.getElementById('rating');
                    const starContainer = document.getElementById('star-container');
                    const cancelReviewButton = document.getElementById('cancel-review-button');
                    const submitReviewButton = document.getElementById('submit-review-button');
                    const feedbackReview = document.getElementById('feedback');
                    let rating = 1; // Default rating

                    // Fungsi untuk membuka dan menutup modal
                    function toggleModal(modal) {
                        if (modal.classList.contains('hidden')) {
                            modal.classList.remove('hidden');
                        } else {
                            modal.classList.add('hidden');
                        }
                    }

                    // Fungsi untuk memperbarui tampilan bintang
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

                    // Event listener untuk membuka modal review
                    document.querySelectorAll('[data-modal-target="review-modal"]').forEach(button => {
                        button.addEventListener('click', function() {
                            // Ambil data ulasan user jika sudah ada
                            const ulasan = @json(Auth::user()->ulasan ?? null);

                            if (ulasan) {
                                feedbackReview.value = ulasan.isiPesan; // Isi pesan
                                rating = ulasan.rating; // Rating
                                ratingDisplay.textContent = rating;
                                updateStars();
                            } else {
                                feedbackReview.value = ''; // Reset input
                                rating = 1; // Default rating
                                ratingDisplay.textContent = rating;
                                updateStars();
                            }

                            toggleModal(reviewModal);
                        });
                    });

                    // Event listener untuk tombol submit ulasan
                    submitReviewButton.addEventListener('click', async function() {
                        try {
                            const feedback = feedbackReview.value.trim();
                            if (feedback === '') {
                                alert('Kritik dan saran tidak boleh kosong.');
                                return;
                            }

                            const response = await fetch('/ulasan', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // Token CSRF dari Laravel
                                },
                                body: JSON.stringify({
                                    isiPesan: feedback,
                                    rating: rating,
                                }),
                            });

                            if (!response.ok) {
                                throw new Error(`HTTP error! status: ${response.status}`);
                            }

                            const result = await response.json();
                            alert(result.message); // Pesan sukses dari backend
                            toggleModal(reviewModal); // Tutup modal setelah berhasil
                        } catch (error) {
                            console.error('Error:', error);
                            alert('Terjadi kesalahan saat mengirim ulasan. Silakan coba lagi.');
                        }
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
