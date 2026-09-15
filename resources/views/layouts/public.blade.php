<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Konsultasi Publik - BPS Kota Sukabumi</title>
    
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        // Konfigurasi Tailwind CSS untuk font Arial
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Arial', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#eff6ff', 100: '#dbeafe', 500: '#3b82f6', 600: '#2563eb', 700: '#1d4ed8', 800: '#1e40af', 900: '#1e3a8a'
                        },
                        accent: {
                            400: '#fbbf24', 500: '#f59e0b'
                        }
                    },
                    animation: {
                        'fade-in-up': 'fadeInUp 0.6s ease-out',
                        'fade-in': 'fadeIn 0.8s ease-out',
                        'scale-in': 'scaleIn 0.5s ease-out',
                    }
                }
            }
        }
    </script>
    
    <style>
        /* Mengatur font body agar konsisten di semua elemen */
        body {
            font-family: Arial, sans-serif;
        }

        /* Animasi Kustom */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
</head>

<body class="bg-gray-50 antialiased">
    <!-- Header -->
    <x-header/>

    <!-- Konten Utama Halaman -->
    <main>
        @yield('content')
    </main>
    <a href="https://wa.me/6285121312402?text=Hallo%20admin,%20apakah%20layanan%20di%20tanggal%20yang%20saya%20pilih%20tersedia%20?"
   target="_blank"
   class="fixed bottom-6 left-6 w-20 h-20 rounded-full bg-green-500 shadow-xl flex items-center justify-center z-50 hover:bg-green-600 transition transform hover:scale-110">
    
    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg"
         alt="WhatsApp"
         class="w-8 h-8">
</a>

    <!-- Footer -->
    <x-footer/>
</body>
</html>