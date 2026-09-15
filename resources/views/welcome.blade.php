@extends('layouts.public')

@section('content')
        <!-- Hero Section -->
        <section class="relative bg-gradient-to-br from-primary-900 via-primary-800 to-primary-700 text-white overflow-hidden min-h-screen flex items-center">
            <!-- Enhanced background with better overlay and positioning -->
            <div class="absolute inset-0 bg-gradient-to-br from-black/50 via-black/30 to-black/40"></div>
            <div class="absolute inset-0 bg-cover bg-center opacity-30" 
                 style="background-image: url('/placeholder.svg?height=800&width=1200');"></div>
            
            <!-- Content -->
            <div class="container mx-auto px-4 sm:px-6 py-12 sm:py-24 relative z-10">
                <div class="grid lg:grid-cols-2 gap-8 lg:gap-20 items-center max-w-7xl mx-auto">
                    <!-- Left Column: Main Content -->
                    <div class="space-y-6 sm:space-y-10 animate-fade-in-up text-center lg:text-left">
                        <div class="space-y-4 sm:space-y-8">
                            <h1 class="text-4xl sm:text-5xl lg:text-6xl xl:text-8xl font-black leading-tight">
                                <span class="block text-white drop-shadow-2xl tracking-tight">SPINTAR</span>
                                <span class="block text-accent-400 text-xl sm:text-2xl lg:text-3xl xl:text-4xl font-bold mt-2 tracking-wide">BPS Kota Sukabumi</span>
                            </h1>
                            <p class="text-base sm:text-lg lg:text-xl xl:text-2xl text-gray-100 leading-relaxed max-w-2xl font-light mx-auto lg:mx-0">
                                <strong class="font-semibold text-white">SPINTAR</strong> (Satu Pintu Informasi dan Konsultasi) adalah layanan resmi Badan Pusat Statistik 
                                yang memudahkan akses informasi dan konsultasi data statistik secara cepat dan profesional.
                            </p>
                        </div>
                        
                        <!-- CTA Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 justify-center lg:justify-start">
                            <a href="{{ route('konsultasi.show') }}"
                               class="group inline-flex items-center justify-center px-6 sm:px-10 py-4 sm:py-5 bg-accent-500 hover:bg-accent-400 text-white font-bold rounded-2xl shadow-2xl hover:shadow-accent-500/25 transition-all duration-300 text-base sm:text-lg transform hover:scale-105">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 mr-2 sm:mr-3 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                                Ajukan Konsultasi
                            </a>
                            <a href="#layanan"
                               class="inline-flex items-center justify-center px-6 sm:px-10 py-4 sm:py-5 border-2 border-white/80 text-white font-bold rounded-2xl hover:bg-white hover:text-primary-900 transition-all duration-300 text-base sm:text-lg backdrop-blur-sm">
                                Pelajari Layanan
                            </a>
                        </div>
                    </div>

                    <!-- Right Column: Enhanced Features Card -->
                    <div class="lg:pl-8 animate-fade-in mt-8 lg:mt-0">
                        <div class="glass-effect rounded-3xl p-6 sm:p-10 shadow-2xl">
                            <h2 class="text-2xl sm:text-3xl font-bold mb-6 sm:mb-10 text-center">Mengapa Pilih SPINTAR?</h2>
                            <div class="space-y-6 sm:space-y-8">
                                <div class="flex items-start space-x-4 sm:space-x-6 group">
                                    <div class="flex-shrink-0 w-12 h-12 sm:w-14 sm:h-14 bg-accent-500 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-lg sm:text-xl mb-2">Respons Cepat</h3>
                                        <p class="text-gray-200 leading-relaxed text-sm sm:text-base">Teknologi terkini untuk layanan yang efisien dan responsif</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start space-x-4 sm:space-x-6 group">
                                    <div class="flex-shrink-0 w-12 h-12 sm:w-14 sm:h-14 bg-green-500 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-lg sm:text-xl mb-2">Keamanan Terjamin</h3>
                                        <p class="text-gray-200 leading-relaxed text-sm sm:text-base">Privasi data dengan standar keamanan tinggi dan terpercaya</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start space-x-4 sm:space-x-6 group">
                                    <div class="flex-shrink-0 w-12 h-12 sm:w-14 sm:h-14 bg-purple-500 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-lg sm:text-xl mb-2">Wawasan Profesional</h3>
                                        <p class="text-gray-200 leading-relaxed text-sm sm:text-base">Rekomendasi berbasis data untuk hasil yang optimal</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Enhanced Wave Separator -->
            <div class="absolute bottom-0 left-0 right-0">
                <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto">
                    <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="white" />
                </svg>
            </div>
        </section>

        <!-- Prosedur Section -->
        <section id="prosedur" class="py-12 sm:py-16 lg:py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <div class="text-center mb-12 sm:mb-16 lg:mb-20">
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-bold text-gray-900 mb-4 sm:mb-6 tracking-tight">Prosedur Konsultasi</h2>
                    <div class="w-16 sm:w-24 h-1 bg-primary-500 rounded-full mx-auto mb-4 sm:mb-6"></div>
                    <p class="text-lg sm:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed px-4">Tiga langkah mudah untuk mendapatkan konsultasi statistik profesional</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 sm:gap-12 max-w-6xl mx-auto">
                    <!-- Enhanced procedure cards with better spacing and animations -->
                    <div class="text-center group animate-fade-in-up" style="animation-delay: 0.1s">
                        <div class="relative mb-6 sm:mb-10">
                            <div class="w-20 h-20 sm:w-24 sm:h-24 bg-gradient-to-br from-primary-500 to-primary-600 rounded-3xl flex items-center justify-center mx-auto group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 shadow-xl">
                                <svg class="w-10 h-10 sm:w-12 sm:h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </div>
                            <div class="absolute -top-2 -right-2 sm:-top-3 sm:-right-3 w-8 h-8 sm:w-10 sm:h-10 bg-accent-500 text-white rounded-full flex items-center justify-center font-bold text-sm sm:text-lg shadow-lg">1</div>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-bold mb-4 sm:mb-6 text-gray-900">Isi Formulir</h3>
                        <p class="text-gray-600 leading-relaxed text-base sm:text-lg px-2">Lengkapi data dan kebutuhan konsultasi melalui formulir online yang mudah digunakan</p>
                    </div>
                    
                    <div class="text-center group animate-fade-in-up" style="animation-delay: 0.2s">
                        <div class="relative mb-6 sm:mb-10">
                            <div class="w-20 h-20 sm:w-24 sm:h-24 bg-gradient-to-br from-green-500 to-green-600 rounded-3xl flex items-center justify-center mx-auto group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 shadow-xl">
                                <svg class="w-10 h-10 sm:w-12 sm:h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="absolute -top-2 -right-2 sm:-top-3 sm:-right-3 w-8 h-8 sm:w-10 sm:h-10 bg-accent-500 text-white rounded-full flex items-center justify-center font-bold text-sm sm:text-lg shadow-lg">2</div>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-bold mb-4 sm:mb-6 text-gray-900">Konfirmasi Admin</h3>
                        <p class="text-gray-600 leading-relaxed text-base sm:text-lg px-2">Tim admin akan memeriksa dan mengonfirmasi permintaan konsultasi dalam 1x24 jam</p>
                    </div>
                    
                    <div class="text-center group animate-fade-in-up" style="animation-delay: 0.3s">
                        <div class="relative mb-6 sm:mb-10">
                            <div class="w-20 h-20 sm:w-24 sm:h-24 bg-gradient-to-br from-purple-500 to-purple-600 rounded-3xl flex items-center justify-center mx-auto group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 shadow-xl">
                                <svg class="w-10 h-10 sm:w-12 sm:h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 4v10m6-10v10m-6-4h6" />
                                </svg>
                            </div>
                            <div class="absolute -top-2 -right-2 sm:-top-3 sm:-right-3 w-8 h-8 sm:w-10 sm:h-10 bg-accent-500 text-white rounded-full flex items-center justify-center font-bold text-sm sm:text-lg shadow-lg">3</div>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-bold mb-4 sm:mb-6 text-gray-900">Konsultasi</h3>
                        <p class="text-gray-600 leading-relaxed text-base sm:text-lg px-2">Hadiri sesi konsultasi sesuai jadwal yang telah disepakati bersama</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Layanan Utama -->
        <section id="layanan" class="py-12 sm:py-16 lg:py-24 bg-gradient-to-br from-gray-50 to-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <div class="text-center mb-12 sm:mb-16 lg:mb-20">
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-bold text-gray-900 mb-4 sm:mb-6 tracking-tight">Layanan Utama</h2>
                    <div class="w-16 sm:w-24 h-1 bg-primary-500 rounded-full mx-auto mb-4 sm:mb-6"></div>
                    <p class="text-lg sm:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed px-4">Berbagai layanan statistik untuk mendukung kebutuhan penelitian dan bisnis Anda</p>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
                    <!-- Enhanced service cards with better shadows and hover effects -->
                    <!-- Perpustakaan -->
                    <div class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 p-6 sm:p-8 relative group transform hover:-translate-y-2">
                        <div class="absolute top-4 sm:top-6 right-4 sm:right-6">
                            <span class="bg-green-100 text-green-800 text-xs font-bold px-3 sm:px-4 py-1 sm:py-2 rounded-full">GRATIS</span>
                        </div>
                        <div class="w-16 h-16 sm:w-18 sm:h-18 bg-gradient-to-br from-primary-500 to-primary-600 rounded-2xl flex items-center justify-center mb-6 sm:mb-8 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-3">Perpustakaan</h3>
                        <p class="text-xs sm:text-sm font-semibold text-primary-600 mb-4 uppercase tracking-wide">Layanan Umum</p>
                        <p class="text-gray-600 mb-6 sm:mb-8 leading-relaxed text-sm sm:text-base">Publikasi statistik terbitan BPS dari berbagai kategori: kependudukan, sosial, ekonomi, dan pertanian.</p>
                        <a href="https://pst.bps.go.id/layanan/perpustakaan" class="inline-flex items-center text-primary-600 font-bold hover:text-primary-700 transition-colors duration-300 group-hover:translate-x-1 text-sm sm:text-base">
                            Cari Pustaka
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>

                    <!-- Produk Berbayar -->
                    <div class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 p-6 sm:p-8 relative group transform hover:-translate-y-2">
                        <div class="absolute top-4 sm:top-6 right-4 sm:right-6">
                            <span class="bg-red-100 text-red-800 text-xs font-bold px-3 sm:px-4 py-1 sm:py-2 rounded-full">BERBAYAR</span>
                        </div>
                        <div class="w-16 h-16 sm:w-18 sm:h-18 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center mb-6 sm:mb-8 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-3">Produk Statistik</h3>
                        <p class="text-xs sm:text-sm font-semibold text-primary-600 mb-4 uppercase tracking-wide">Layanan Umum</p>
                        <p class="text-gray-600 mb-6 sm:mb-8 leading-relaxed text-sm sm:text-base">Layanan penjualan data mikro, publikasi elektronik, dan peta digital wilayah statistik.</p>
                        <a href="https://pst.bps.go.id/layanan/pembelian" class="inline-flex items-center text-primary-600 font-bold hover:text-primary-700 transition-colors duration-300 group-hover:translate-x-1 text-sm sm:text-base">
                            Beli Data & Publikasi
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>

                    <!-- Konsultasi -->
                    <div class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 p-6 sm:p-8 relative group transform hover:-translate-y-2">
                        <div class="absolute top-4 sm:top-6 right-4 sm:right-6">
                            <span class="bg-accent-100 text-accent-800 text-xs font-bold px-3 sm:px-4 py-1 sm:py-2 rounded-full">UNGGULAN</span>
                        </div>
                        <div class="w-16 h-16 sm:w-18 sm:h-18 bg-gradient-to-br from-accent-500 to-accent-600 rounded-2xl flex items-center justify-center mb-6 sm:mb-8 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-3">Konsultasi</h3>
                        <p class="text-xs sm:text-sm font-semibold text-primary-600 mb-4 uppercase tracking-wide">Layanan Umum</p>
                        <p class="text-gray-600 mb-6 sm:mb-8 leading-relaxed text-sm sm:text-base">Konsultasi terkait data, metadata, klasifikasi, dan produk statistik BPS lainnya.</p>
                        <a href="{{ route('konsultasi.show') }}" class="inline-flex items-center text-primary-600 font-bold hover:text-primary-700 transition-colors duration-300 group-hover:translate-x-1 text-sm sm:text-base">
                            Ajukan Konsultasi
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                        {{-- <a href="{{ route('konsultasi.show') }}" class="inline-flex items-center text-accent-600 font-bold hover:text-accent-700 transition-colors duration-300 group-hover:translate-x-1 text-sm sm:text-base">
                            Ajukan Konsultasi
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a> --}}
                    </div>

                    <!-- Rekomendasi -->
                    <div class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 p-6 sm:p-8 relative group transform hover:-translate-y-2">
                        <div class="absolute top-4 sm:top-6 right-4 sm:right-6">
                            <span class="bg-green-100 text-green-800 text-xs font-bold px-3 sm:px-4 py-1 sm:py-2 rounded-full">GRATIS</span>
                        </div>
                        <div class="w-16 h-16 sm:w-18 sm:h-18 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-6 sm:mb-8 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-3">Rekomendasi</h3>
                        <p class="text-xs sm:text-sm font-semibold text-primary-600 mb-4 uppercase tracking-wide">Layanan Instansi</p>
                        <p class="text-gray-600 mb-6 sm:mb-8 leading-relaxed text-sm sm:text-base">Layanan bagi instansi pemerintah untuk survei dan rekomendasi kegiatan statistik.</p>
                        <a href="https://pst.bps.go.id/layanan/romantik" class="inline-flex items-center text-primary-600 font-bold hover:text-primary-700 transition-colors duration-300 group-hover:translate-x-1 text-sm sm:text-base">
                            Minta Rekomendasi
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Layanan Pendukung -->
        <section class="py-12 sm:py-16 lg:py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <div class="text-center mb-12 sm:mb-16 lg:mb-20">
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-bold text-gray-900 mb-4 sm:mb-6 tracking-tight">Layanan Pendukung</h2>
                    <div class="w-16 sm:w-24 h-1 bg-primary-500 rounded-full mx-auto mb-4 sm:mb-6"></div>
                    <p class="text-lg sm:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed px-4">Layanan tambahan untuk mendukung kebutuhan data dan teknologi</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-10">
                    <!-- Enhanced supporting service cards -->
                    <!-- WebAPI -->
                    <div class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 p-6 sm:p-10 border border-gray-100 group transform hover:-translate-y-2">
                        <div class="flex items-center justify-between mb-6 sm:mb-8">
                            <div class="w-16 h-16 sm:w-18 sm:h-18 bg-gradient-to-br from-primary-500 to-primary-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                                <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                </svg>
                            </div>
                            <span class="bg-green-100 text-green-800 text-xs font-bold px-3 sm:px-4 py-1 sm:py-2 rounded-full">GRATIS</span>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-3">WebAPI</h3>
                        <p class="text-xs sm:text-sm font-semibold text-primary-600 mb-4 uppercase tracking-wide">Layanan Developer</p>
                        <p class="text-gray-600 mb-6 sm:mb-8 leading-relaxed text-sm sm:text-base">API data statistik BPS untuk integrasi dengan aplikasi dan sistem lain.</p>
                        <a href="https://webapi.bps.go.id/developer" class="inline-flex items-center text-primary-600 font-bold hover:text-primary-700 transition-colors duration-300 group-hover:translate-x-1 text-sm sm:text-base">
                            Kunjungi WebAPI
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                    </div>

                    <!-- StatInaLab -->
                    <div class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 p-6 sm:p-10 border border-gray-100 group transform hover:-translate-y-2">
                        <div class="flex items-center justify-between mb-6 sm:mb-8">
                            <div class="w-16 h-16 sm:w-18 sm:h-18 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                                <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                                </svg>
                            </div>
                            <span class="bg-blue-100 text-blue-800 text-xs font-bold px-3 sm:px-4 py-1 sm:py-2 rounded-full">INTERNAL</span>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-3">StatInaLab</h3>
                        <p class="text-xs sm:text-sm font-semibold text-primary-600 mb-4 uppercase tracking-wide">Layanan Internal BPS</p>
                        <p class="text-gray-600 mb-6 sm:mb-8 leading-relaxed text-sm sm:text-base">Statistics Indonesia Data Lab untuk pengalaman real time pemrosesan data mikro.</p>
                        <a href="https://statinalab.bps.go.id/" class="inline-flex items-center text-primary-600 font-bold hover:text-primary-700 transition-colors duration-300 group-hover:translate-x-1 text-sm sm:text-base">
                            Kunjungi StatInaLab
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                    </div>

                    <!-- Transdata -->
                    <div class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 p-6 sm:p-10 border border-gray-100 group transform hover:-translate-y-2 md:col-span-2 lg:col-span-1">
                        <div class="flex items-center justify-between mb-6 sm:mb-8">
                            <div class="w-16 h-16 sm:w-18 sm:h-18 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                                <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <span class="bg-purple-100 text-purple-800 text-xs font-bold px-3 sm:px-4 py-1 sm:py-2 rounded-full">INSTANSI</span>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-3">Transdata</h3>
                        <p class="text-xs sm:text-sm font-semibold text-primary-600 mb-4 uppercase tracking-wide">Layanan Instansi</p>
                        <p class="text-gray-600 mb-6 sm:mb-8 leading-relaxed text-sm sm:text-base">Sistem pertukaran data antara BPS dan Kementerian/Lembaga dengan kerja sama.</p>
                        <a href="https://pst.bps.go.id/layanan/transdata" class="inline-flex items-center text-primary-600 font-bold hover:text-primary-700 transition-colors duration-300 group-hover:translate-x-1 text-sm sm:text-base">
                            Kunjungi Transdata
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Artikel Terbaru -->
        <section class="py-12 sm:py-16 lg:py-24 bg-gradient-to-br from-gray-50 to-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <div class="text-center mb-12 sm:mb-16 lg:mb-20">
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-bold text-gray-900 mb-4 sm:mb-6 tracking-tight">Artikel Terbaru</h2>
                    <div class="w-16 sm:w-24 h-1 bg-primary-500 rounded-full mx-auto mb-4 sm:mb-6"></div>
                    <p class="text-lg sm:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed px-4">Informasi dan tips terkini seputar layanan statistik</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-10 max-w-6xl mx-auto">
                    <!-- Enhanced article cards with better gradients and hover effects -->
                    <article class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 overflow-hidden group transform hover:-translate-y-2">
                        <div class="h-48 sm:h-56 bg-gradient-to-br from-primary-400 via-primary-500 to-primary-600 relative overflow-hidden">
                            <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors duration-300"></div>
                            <div class="absolute bottom-4 left-4 right-4">
                                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="p-6 sm:p-8">
                            <h3 class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-900 mb-3 sm:mb-4 group-hover:text-primary-600 transition-colors duration-300 leading-tight">Tips Memahami Data Statistik dengan Mudah</h3>
                            <p class="text-gray-600 mb-6 sm:mb-8 leading-relaxed text-sm sm:text-base">Pelajari cara cepat memahami data statistik untuk kebutuhan riset dan bisnis Anda.</p>
                            <a href="#" class="inline-flex items-center text-primary-600 font-bold hover:text-primary-700 transition-colors duration-300 group-hover:translate-x-1 text-sm sm:text-base">
                                Baca Selengkapnya
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </article>
                    
                    <article class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 overflow-hidden group transform hover:-translate-y-2">
                        <div class="h-48 sm:h-56 bg-gradient-to-br from-green-400 via-green-500 to-green-600 relative overflow-hidden">
                            <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors duration-300"></div>
                            <div class="absolute bottom-4 left-4 right-4">
                                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="p-6 sm:p-8">
                            <h3 class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-900 mb-3 sm:mb-4 group-hover:text-primary-600 transition-colors duration-300 leading-tight">Panduan Ajukan Konsultasi di SPINTAR</h3>
                            <p class="text-gray-600 mb-6 sm:mb-8 leading-relaxed text-sm sm:text-base">Langkah-langkah mudah mengajukan janji temu konsultasi melalui platform kami.</p>
                            <a href="#" class="inline-flex items-center text-primary-600 font-bold hover:text-primary-700 transition-colors duration-300 group-hover:translate-x-1 text-sm sm:text-base">
                                Baca Selengkapnya
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </article>
                    
                    <article class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 overflow-hidden group transform hover:-translate-y-2 md:col-span-2 lg:col-span-1">
                        <div class="h-48 sm:h-56 bg-gradient-to-br from-purple-400 via-purple-500 to-purple-600 relative overflow-hidden">
                            <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors duration-300"></div>
                            <div class="absolute bottom-4 left-4 right-4">
                                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="p-6 sm:p-8">
                            <h3 class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-900 mb-3 sm:mb-4 group-hover:text-primary-600 transition-colors duration-300 leading-tight">Keamanan Data dalam Layanan SPINTAR</h3>
                            <p class="text-gray-600 mb-6 sm:mb-8 leading-relaxed text-sm sm:text-base">Cara kami menjaga privasi dan keamanan data pengguna selama proses konsultasi.</p>
                            <a href="#" class="inline-flex items-center text-primary-600 font-bold hover:text-primary-700 transition-colors duration-300 group-hover:translate-x-1 text-sm sm:text-base">
                                Baca Selengkapnya
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section id="konsultasi" class="py-12 sm:py-16 lg:py-24 bg-gradient-to-r from-primary-900 via-primary-800 to-primary-700 text-white relative overflow-hidden">
            <!-- Enhanced CTA section with better background and spacing -->
            <div class="absolute inset-0 bg-gradient-to-br from-black/20 to-black/40"></div>
            <div class="max-w-5xl mx-auto px-4 sm:px-6 text-center relative z-10">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-bold mb-6 sm:mb-8 tracking-tight">Siap untuk Konsultasi?</h2>
                <div class="w-16 sm:w-24 h-1 bg-accent-500 rounded-full mx-auto mb-6 sm:mb-8"></div>
                <p class="text-lg sm:text-xl lg:text-2xl mb-8 sm:mb-12 text-gray-100 leading-relaxed font-light max-w-3xl mx-auto px-4">Dapatkan wawasan statistik profesional untuk mendukung keputusan bisnis dan penelitian Anda</p>
                <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 justify-center">
                    <a href="{{ route('konsultasi.show') }}"
                       class="group inline-flex items-center justify-center px-8 sm:px-12 py-4 sm:py-5 bg-accent-500 hover:bg-accent-400 text-white font-bold rounded-2xl shadow-2xl hover:shadow-accent-500/25 transition-all duration-300 text-lg sm:text-xl transform hover:scale-105">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 mr-2 sm:mr-3 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        Ajukan Konsultasi Sekarang
                    </a>
                    <a href="#prosedur"
                       class="inline-flex items-center justify-center px-8 sm:px-12 py-4 sm:py-5 border-2 border-white/80 text-white font-bold rounded-2xl hover:bg-white hover:text-primary-900 transition-all duration-300 text-lg sm:text-xl backdrop-blur-sm">
                        Pelajari Prosedur
                    </a>
                </div>
            </div>
        </section>
@endsection