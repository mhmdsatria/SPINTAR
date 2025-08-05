<x-layout>
    <div class="p-6">
        <!-- Header -->
        <div class="w-full bg-white shadow mb-4">
            <div class="flex justify-between items-center px-6 py-4">
                <!-- Kiri: Judul + Nav -->
                <div class="flex items-center gap-8">
                    <h1 class="text-2xl font-bold text-gray-800">Konsultasi Admin</h1>
                    <nav class="flex gap-6 border-b border-gray-200">
                        <a href="#" class="pb-3 border-b-2 border-blue-600 text-blue-600 font-medium">Panel
                            Konfirmasi</a>
                        <a href="#" class="pb-3 text-gray-500 hover:text-gray-700">Riwayat</a>
                    </nav>
                </div>

                <!-- Kanan: Profil Admin -->
                <div class="flex items-center gap-4">
                    <span class="font-medium text-gray-700">Admin User</span>
                    <img src="https://i.pravatar.cc/40" alt="Admin" class="w-10 h-10 rounded-full border">
                </div>
            </div>
        </div>
        <!-- Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-white shadow rounded-lg p-4 flex items-center gap-4">
                <div>
                    <p class="text-gray-500 text-sm">Pending</p>
                    <p class="text-xl font-semibold">12</p>
                </div>
            </div>
            <div class="bg-white shadow rounded-lg p-4 flex items-center gap-4">
                <div>
                    <p class="text-gray-500 text-sm">Diterima</p>
                    <p class="text-xl font-semibold">45</p>
                </div>
            </div>
            <div class="bg-white shadow rounded-lg p-4 flex items-center gap-4">
                <div>
                    <p class="text-gray-500 text-sm">Ditolak</p>
                    <p class="text-xl font-semibold">8</p>
                </div>
            </div>
            <div class="bg-white shadow rounded-lg p-4 flex items-center gap-4">
                <div>
                    <p class="text-gray-500 text-sm">Total</p>
                    <p class="text-xl font-semibold">65</p>
                </div>
            </div>
        </div>

        <!-- Filter & Search -->
        <div class="bg-white shadow rounded-lg p-4 mb-4">
            <!-- Header -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <h2 class="font-medium text-xl">Permohonan Konsultasi</h2>

                <!-- Filter & Search -->
                <div class="flex flex-col md:flex-row md:items-center gap-4 w-full md:w-auto">
                    <!-- Search -->
                    <input type="text" placeholder="Cari berdasarkan nama atau email..."
                        class="border border-gray-300 rounded-lg px-4 py-2 w-full md:w-64 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                    <!-- Dropdown -->
                    <div class="relative w-full md:w-48">
                        <select
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none">
                            <option value="">Semua Status</option>
                            <option value="pending">Pending</option>
                            <option value="diterima">Diterima</option>
                            <option value="ditolak">Ditolak</option>
                        </select>
                        <!-- Icon panah dropdown -->
                        <span
                            class="absolute inset-y-0 right-3 flex items-center pointer-events-none text-gray-400 text-xs">
                            ▼
                        </span>

                    </div>
                    <a href="#" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 text-sm">
                        Export Excel
                    </a>
                </div>
            </div>
        </div>


        <!-- Tabel -->
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="p-4 text-sm font-medium text-gray-500">Pengaju</th>
                        <th class="p-4 text-sm font-medium text-gray-500">Email</th>
                        <th class="p-4 text-sm font-medium text-gray-500">Tanggal</th>
                        <th class="p-4 text-sm font-medium text-gray-500">Status</th>
                        <th class="p-4 text-sm font-medium text-gray-500 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-4 flex items-center gap-3">
                            <img src="https://i.pravatar.cc/40?img=1" class="w-10 h-10 rounded-full">
                            <div>
                                <p class="font-medium text-gray-800">Ahmad Rizki</p>
                                <p class="text-sm text-gray-500">+62 812-3456-7890</p>
                            </div>
                        </td>
                        <td class="p-4 text-gray-700">ahmad.rizki@email.com</td>
                        <td class="p-4 text-gray-700">15 Jan 2024</td>
                        <td class="p-4">
                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">Pending</span>
                        </td>
                        <td class="p-4 text-center flex justify-center gap-2">
                            <!-- Tombol Terima -->
                            <button class="text-green-500 hover:text-green-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </button>

                            <!-- Tombol Tolak -->
                            <button class="text-red-500 hover:text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>

                            <!-- Tombol Lihat -->
                            <button class="text-blue-500 hover:text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-4 flex items-center gap-3">
                            <img src="https://i.pravatar.cc/40?img=2" class="w-10 h-10 rounded-full">
                            <div>
                                <p class="font-medium text-gray-800">Sari Dewi</p>
                                <p class="text-sm text-gray-500">+62 831-8876-5432</p>
                            </div>
                        </td>
                        <td class="p-4 text-gray-700">sari.dewi@email.com</td>
                        <td class="p-4 text-gray-700">14 Jan 2024</td>
                        <td class="p-4">
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">Diterima</span>
                        </td>
                        <td class="p-4 text-center flex justify-center gap-2">
                            <!-- Tombol Terima -->
                            <button class="text-green-500 hover:text-green-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </button>

                            <!-- Tombol Tolak -->
                            <button class="text-red-500 hover:text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>

                            <!-- Tombol Lihat -->
                            <button class="text-blue-500 hover:text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="p-4 flex items-center gap-3">
                            <img src="https://i.pravatar.cc/40?img=3" class="w-10 h-10 rounded-full">
                            <div>
                                <p class="font-medium text-gray-800">Budi Santoso</p>
                                <p class="text-sm text-gray-500">+62 814-111-2222</p>
                            </div>
                        </td>
                        <td class="p-4 text-gray-700">budi.santoso@email.com</td>
                        <td class="p-4 text-gray-700">13 Jan 2024</td>
                        <td class="p-4">
                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">Pending</span>
                        </td>
                        <td class="p-4 text-center flex justify-center gap-2">
                            <!-- Tombol Terima -->
                            <button class="text-green-500 hover:text-green-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </button>

                            <!-- Tombol Tolak -->
                            <button class="text-red-500 hover:text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>

                            <!-- Tombol Lihat -->
                            <button class="text-blue-500 hover:text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex justify-between items-center mt-4 text-sm text-gray-600">
            <p>Menampilkan 1 hingga 3 dari 12 hasil</p>
            <div class="flex items-center gap-2">
                <button class="px-3 py-1 border rounded hover:bg-gray-100">&lt;</button>
                <button class="px-3 py-1 border rounded bg-blue-600 text-white">1</button>
                <button class="px-3 py-1 border rounded hover:bg-gray-100">2</button>
                <button class="px-3 py-1 border rounded hover:bg-gray-100">&gt;</button>
            </div>
        </div>
    </div>
</x-layout>