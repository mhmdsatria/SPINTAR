<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Konsultasi - SPINTAR</title>
    
    <!-- Tailwind CSS via CDN (Tanpa Build Tool / Vite) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
  tailwind.config = {
    theme: {
      extend: {
        colors: {
          primary: '#0f172a', // Ubah kode hex ini sesuai warna utama instansi/BPS
        }
      }
    }
  }
</script>
    <!-- CSS Internal Terpadu -->
    <style>
        /* Typography Apple / macOS System Font */
        body {
            font-family: -apple-system, BlinkMacSystemFont, "SF Pro Display", "SF Pro Text", "Helvetica Neue", Helvetica, Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Hero Section Overlay & Background */
        .hero-section {
            background-image: linear-gradient(to right, rgba(15, 23, 42, 0.85), rgba(15, 23, 42, 0.4)), url("{{ asset('storage/bg-scenery.webp') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        /* Style Tombol Apple-like */
        .btn-apple {
            background-color: #007AFF;
            transition: all 0.3s ease;
        }
        .btn-apple:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 4px 14px rgba(0, 122, 255, 0.4);
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">

    <x-navbar></x-navbar>

    <!-- Main Content -->
    <main class="hero-section flex-grow flex items-center min-h-[80vh]">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-12 items-center py-16 w-full">
            
            <!-- Kolom Kiri: Teks -->
            <div class="space-y-6">
                <h2 class="text-4xl md:text-5xl font-bold text-white leading-tight tracking-tight">
                    SPINTAR BPS Kota Sukabumi
                    <span class="block text-blue-400 mt-2 text-3xl md:text-4xl font-semibold">Layanan Konsultasi Statistik</span>
                </h2>
                
                <p class="text-lg text-gray-200 leading-relaxed font-light">
                    SPINTAR (Satu Pintu Informasi dan Konsultasi) merupakan layanan resmi Badan Pusat Statistik 
                    (BPS) Kota Sukabumi yang dirancang untuk memudahkan masyarakat dalam mengakses informasi, 
                    melakukan konsultasi, serta memperoleh layanan terkait data statistik secara cepat, mudah, dan profesional.
                </p>
                
                <div class="pt-4">
                    <a href="{{ route('konsultasi.create') }}"
                       class="btn-apple text-white font-medium px-8 py-3.5 rounded-full inline-block text-lg">
                       Ajukan Sekarang
                    </a>
                </div>
            </div>

            <!-- Kolom Kanan: Gambar -->
            <div class="flex justify-center md:justify-end">
                <img src="{{ asset('storage/C.png') }}" alt="Ilustrasi SPINTAR" 
                     class="w-full max-w-md drop-shadow-2xl hover:scale-105 transition-transform duration-500">
            </div>
        </div>
    </main>

    <x-layout>
        <x-form-pengajuan></x-form-pengajuan>
    </x-layout>

    <x-footer></x-footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('consultation-form');
            const successAlert = document.getElementById('success-alert');

            if (form) {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();
                    
                    form.style.display = 'none';
                    if (successAlert) {
                        successAlert.style.display = 'block';
                        successAlert.style.opacity = '1';
                    }
                });
            }
        });
    </script>
</body>
</html>