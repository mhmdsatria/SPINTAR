<x-layout>
    <div class="p-6 bg-gray-50 min-h-screen">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Super Admin Dashboard</h1>
            <div class="flex items-center gap-4">
                <span class="font-medium text-gray-700">Super Admin</span>
                <img src="https://i.pravatar.cc/40" alt="Admin" class="w-10 h-10 rounded-full border">
            </div>
        </div>

        <!-- Statistik -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <div class="bg-white p-4 rounded-lg shadow">
                <p class="text-sm text-gray-500">Total Konsultasi</p>
                <h2 class="text-2xl font-bold">1,247</h2>
                <p class="text-xs text-green-500">+12% dari bulan lalu</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <p class="text-sm text-gray-500">Diterima</p>
                <h2 class="text-2xl font-bold">892</h2>
                <p class="text-xs text-gray-500">71.5% dari total</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <p class="text-sm text-gray-500">Ditolak</p>
                <h2 class="text-2xl font-bold">267</h2>
                <p class="text-xs text-gray-500">21.4% dari total</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <p class="text-sm text-gray-500">Pending</p>
                <h2 class="text-2xl font-bold">88</h2>
                <p class="text-xs text-gray-500">7.1% dari total</p>
            </div>
        </div>

        <!-- Grafik -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div class="bg-white p-6 rounded-lg shadow flex flex-col items-center justify-center text-gray-400">
                <p class="text-center">📊 <br> Pie Chart <br> <span class="text-sm">Diterima: 71.5%, Ditolak: 21.4%,
                        Pending: 7.1%</span></p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow flex flex-col items-center justify-center text-gray-400">
                <p class="text-center">📈 <br> Bar Chart <br> <span class="text-sm">Konsultasi per Bulan 2025</span></p>
            </div>
        </div>

        <!-- Tabel Riwayat -->
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-800">Riwayat Konsultasi Lengkap</h2>
                <div class="flex flex-wrap md:flex-nowrap items-center gap-2">
                    <!-- Search -->
                    <input type="text" placeholder="Cari konsultasi..."
                        class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none w-full md:w-auto">

                    <!-- Dropdown -->
                    <select
                        class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none w-full md:w-auto">
                        <option>Semua Status</option>
                        <option>Pending</option>
                        <option>Diterima</option>
                        <option>Ditolak</option>
                    </select>

                    <!-- Export Button -->
                    <a href="#"
                        class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 text-sm w-full md:w-auto text-center">
                        Export Excel
                    </a>
                </div>

            </div>

            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b text-gray-600 text-sm">
                        <th class="py-3">Nama Pengaju</th>
                        <th>Email</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Admin</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm">
                    <tr class="border-b">
                        <td class="py-3 flex items-center gap-2">
                            <img src="https://i.pravatar.cc/30" class="w-8 h-8 rounded-full"> Ahmad Rizki
                        </td>
                        <td>ahmad.rizki@email.com</td>
                        <td>15 Jan 2025</td>
                        <td><span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">Diterima</span></td>
                        <td>Admin A</td>
                        <td class="flex gap-2">
                            <butto class="text-blue-500 hover:text-blue-700">
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
                    <tr class="border-b">
                        <td class="py-3 flex items-center gap-2">
                            <img src="https://i.pravatar.cc/30" class="w-8 h-8 rounded-full"> Sari Dewi
                        </td>
                        <td>sari.dewi@email.com</td>
                        <td>14 Jan 2025</td>
                        <td><span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-700 rounded">Pending</span></td>
                        <td>-</td>
                        <td class="flex gap-2">
                            <butto class="text-blue-500 hover:text-blue-700">
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
                    <tr>
                        <td class="py-3 flex items-center gap-2">
                            <img src="https://i.pravatar.cc/30" class="w-8 h-8 rounded-full"> Budi Santoso
                        </td>
                        <td>budi.santoso@email.com</td>
                        <td>13 Jan 2025</td>
                        <td><span class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded">Ditolak</span></td>
                        <td>Admin B</td>
                        <td class="flex gap-2">
                            <butto class="text-blue-500 hover:text-blue-700">
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

            <!-- Pagination -->
            <div class="flex justify-between items-center mt-4 text-sm text-gray-600">
                <p>Menampilkan 1-10 dari 1,247 konsultasi</p>
                <div class="flex gap-2">
                    <button class="px-3 py-1 border rounded hover:bg-gray-100">Sebelumnya</button>
                    <button class="px-3 py-1 border rounded bg-blue-600 text-white">1</button>
                    <button class="px-3 py-1 border rounded hover:bg-gray-100">2</button>
                    <button class="px-3 py-1 border rounded hover:bg-gray-100">3</button>
                    <button class="px-3 py-1 border rounded hover:bg-gray-100">Selanjutnya</button>
                </div>
            </div>
        </div>
    </div>
</x-layout>