<header class="bg-gray-800 text-white">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">
        <!-- Logo and Brand Name -->
        <div class="flex items-center">
            <img src="{{ asset("img/Cahaya Gunung Licin 2.jpeg.jpg") }}" alt="Logo" class="w-12 h-12 rounded-full mr-2">
            <h1 class="text-xl font-bold text-primary">CAHAYA <span class="text-white">GUNUNG LICIN</span>
            </h1>
        </div>

        <!-- Navigation Links for Desktop -->
        <nav class="hidden md:flex space-x-8 ml-auto pr-10">
            <a href="{{ route ('home') }}" class="text-white hover:text-primary">HOME</a>
            <a href="{{ route ('produk') }}" class="text-white hover:text-primary">PRODUK</a>
            <a href="{{ route ('jasa') }}" class="text-white hover:text-primary">JASA</a>
            <a href="{{ route ('keranjang') }}" class="text-primary hover:text-white">KERANJANG</a>
        </nav>

        <!-- Always Visible Hamburger Menu -->
        <div>
            <button id="hamburger" class="focus:outline-none pr-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
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
            <img src="{{ asset("img/Vector Bengkel.png") }}" alt="Deskripsi Icon" class="h-6 w-6 mr-2" />
            BERANDA
        </a>

        <!-- Akun -->
        <a href="#" class="flex items-center px-4 py-2 text-white hover:bg-gray-600">
            <img src="{{ asset("img/Vector Profile.png") }}" alt="Deskripsi Icon" class="h-6 w-6 mr-2" />
            Akun
        </a>

        <!-- Kontak Kami -->
        <a href="#" class="flex items-center px-4 py-2 text-white hover:bg-gray-600">
            <img src="{{ asset("img/Vector Kontak Kami.png") }}" alt="Deskripsi Icon" class="h-6 w-6 mr-2" />
            Kontak Kami
        </a>

        <!-- Ulasan -->
        <a href="#" class="flex items-center px-4 py-2 text-white hover:bg-gray-600">
            <img src="{{ asset("img/Vector Ulasan.png") }}" alt="Deskripsi Icon" class="h-6 w-6 mr-2" />
            Ulasan
        </a>

        <!-- Login -->
        <a href="{{ route('login') }}" class="flex items-center px-4 py-2 text-white hover:bg-gray-600">
            <img src="{{ asset("img/Vector Login.png") }}" alt="Deskripsi Icon" class="h-6 w-6 mr-2" />
            Login
        </a>
    </div>
</header>