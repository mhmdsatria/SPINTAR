<!-- Navbar -->
<header class="w-full" style="background-color: #1E40AF;">
    <nav>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between py-3">
                <!-- Logo + Text -->
                <a href="{{ route('konsultasi.show') }}" class="flex items-center space-x-2 sm:space-x-3">
                    <img src="{{ asset('storage/logo-bps.webp') }}" alt="Logo BPS" class="h-8 w-8 sm:h-10 sm:w-10 object-contain" />
                    <span class="text-white font-semibold text-sm sm:text-lg lg:text-xl leading-tight">
                        <span class="block">SPINTAR BPS</span>
                        <span class="block text-xs sm:text-sm lg:text-base">KOTA SUKABUMI</span>
                    </span>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex space-x-8">
                    <a href="/" class="text-white hover:text-blue-200 transition-colors duration-200">Beranda</a>
                    <a href="/" class="text-white hover:text-blue-200 transition-colors duration-200">Tentang</a>
                    <a href="https://sukabumikota.bps.go.id/id" target="_blank"
                        class="text-white hover:text-blue-200 transition-colors duration-200">Website Utama</a>
                </div>

                <!-- Mobile Menu Button -->
                <button class="lg:hidden text-white p-2" id="mobile-menu-button" aria-label="Toggle menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div class="lg:hidden hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1 border-t border-blue-600">
                    <a href="/" class="block px-3 py-2 text-white hover:bg-blue-600 rounded-md transition-colors duration-200">Beranda</a>
                    <a href="/" class="block px-3 py-2 text-white hover:bg-blue-600 rounded-md transition-colors duration-200">Tentang</a>
                    <a href="https://sukabumikota.bps.go.id/id" target="_blank"
                        class="block px-3 py-2 text-white hover:bg-blue-600 rounded-md transition-colors duration-200">Website Utama</a>
                </div>
            </div>
        </div>
    </nav>
</header>

