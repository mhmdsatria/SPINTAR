@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
  {{--
    </x-layout> --}}
    {{-- <div x-data="{
        sidebarOpen: false,
        activePage: '{{ $activePage ?? 'dashboard' }}'
    }" class="min-h-screen flex" @keydown.escape="sidebarOpen = false">

        <!-- Overlay -->
        <div x-show="sidebarOpen" @click="sidebarOpen = false"
            class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden" x-transition.opacity></div>

        <!-- Sidebar -->
        <aside
            class="fixed inset-y-0 left-0 z-50 w-64 bg-gray-800 transform transition-transform duration-300 ease-in-out md:translate-x-0"
            :class="{ 'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen }">
            <div class="flex items-center justify-between h-16 px-4 bg-gray-900">
                <span class="text-white text-lg font-bold">Superadmin</span>
                <button @click="sidebarOpen = false" class="text-white md:hidden">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <nav class="mt-5 overflow-y-auto h-[calc(100vh-4rem)]">
                <a href="#" @click.prevent="activePage = 'dashboard'; sidebarOpen = false"
                    class="flex items-center px-4 py-2 text-gray-100 hover:bg-gray-700"
                    :class="{ 'bg-gray-700': activePage === 'dashboard' }">
                    <i class="fas fa-tachometer-alt mr-3"></i>Dashboard
                </a>

                <!-- Users Menu -->
                <div x-data="{ open: ['all-users','add-user','user-roles'].includes(activePage) }">
                    <button @click="open = !open"
                        class="w-full flex items-center justify-between px-4 py-2 text-gray-100 hover:bg-gray-700">
                        <div class="flex items-center">
                            <i class="fas fa-users mr-3"></i>Users
                        </div>
                        <i class="fas" :class="open ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                    </button>
                    <div x-show="open" x-transition>
                        <a href="#" @click.prevent="activePage = 'all-users'; sidebarOpen = false"
                            class="block px-8 py-2 text-gray-200 hover:bg-gray-600"
                            :class="{ 'bg-gray-600': activePage === 'all-users' }">All Users</a>
                        <a href="#" @click.prevent="activePage = 'add-user'; sidebarOpen = false"
                            class="block px-8 py-2 text-gray-200 hover:bg-gray-600"
                            :class="{ 'bg-gray-600': activePage === 'add-user' }">Add User</a>
                        <a href="#" @click.prevent="activePage = 'user-roles'; sidebarOpen = false"
                            class="block px-8 py-2 text-gray-200 hover:bg-gray-600"
                            :class="{ 'bg-gray-600': activePage === 'user-roles' }">User Roles</a>
                    </div>
                </div>

                <a href="#" @click.prevent="activePage = 'analytics'; sidebarOpen = false"
                    class="flex items-center px-4 py-2 text-gray-100 hover:bg-gray-700"
                    :class="{ 'bg-gray-700': activePage === 'analytics' }">
                    <i class="fas fa-chart-bar mr-3"></i>Analytics
                </a>

                <a href="{{ url('/logout') }}" class="flex items-center px-4 py-2 text-gray-100 hover:bg-gray-700">
                    <i class="fas fa-sign-out-alt mr-3"></i>Logout
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col md:ml-64">
            <!-- Header -->
            <header
                class="bg-white shadow-sm h-16 flex items-center justify-between px-4 fixed top-0 right-0 left-0 md:left-64 z-30">
                <button @click="sidebarOpen = true" class="text-gray-500 md:hidden">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
                <div class="flex items-center">
                    <div class="relative">
                        <input type="text" placeholder="Search..."
                            class="pl-10 pr-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                    <div class="ml-4 flex items-center">
                        <button class="text-gray-500 mr-4"><i class="fas fa-bell"></i></button>
                        <div class="w-8 h-8 rounded-full bg-gray-300"></div>
                    </div>
                </div>
            </header>

            <!-- Main Sections -->
            <main class="p-6 mt-16 flex-1 overflow-y-auto">
                <!-- Alerts -->
                @foreach (['success' => 'green', 'warning' => 'yellow', 'error' => 'red'] as $msg => $color)
                @if(session($msg))
                <div class="bg-{{ $color }}-100 text-{{ $color }}-800 p-3 rounded mb-4">
                    {{ session($msg) }}
                </div>
                @endif
                @endforeach

                <!-- Dashboard -->
                <div x-show="activePage === 'dashboard'" x-transition>
                    <h1 class="text-2xl font-bold mb-6">Dashboard Overview</h1>

                    <!-- Statistik Dashboard -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                        <div class="bg-white p-6 rounded-lg shadow">
                            <div class="flex items-center">
                                <i class="fas fa-users text-blue-500 text-2xl mr-4"></i>
                                <div>
                                    <p class="text-gray-500">Total Konsultasi</p>
                                    <h3 class="text-xl font-bold">{{ $totalKonsultasi }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow">
                            <div class="flex items-center">
                                <i class="fas fa-check text-green-500 text-2xl mr-4"></i>
                                <div>
                                    <p class="text-gray-500">Diterima</p>
                                    <h3 class="text-xl font-bold">{{ $totalDiterima }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow">
                            <div class="flex items-center">
                                <i class="fas fa-times text-red-500 text-2xl mr-4"></i>
                                <div>
                                    <p class="text-gray-500">Ditolak</p>
                                    <h3 class="text-xl font-bold">{{ $totalDitolak }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow">
                            <div class="flex items-center">
                                <i class="fas fa-history text-yellow-500 text-2xl mr-4"></i>
                                <div>
                                    <p class="text-gray-500">Riwayat (Pending)</p>
                                    <h3 class="text-xl font-bold">{{ $totalRiwayat }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Konsultasi Terbaru -->
                    <div class="bg-white p-6 rounded-lg shadow mt-6">
                        <h2 class="text-xl font-bold mb-4">Konsultasi Terbaru</h2>
                        <table class="w-full border border-gray-300 text-left">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border p-2 text-center w-12">#</th>
                                    <th class="border p-2">Nama Lengkap</th>
                                    <th class="border p-2">Instansi</th>
                                    <th class="border p-2">Email</th>
                                    <th class="border p-2">Tanggal</th>
                                    <th class="border p-2">Nomor WhatsApp</th>
                                    <th class="border p-2 text-center">Status</th>
                                    <th class="border p-2 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($konsultasiTerbaru as $index => $konsul)
                                <tr class="hover:bg-gray-50">
                                    <td class="border p-2 text-center">{{ $index + 1 }}</td>
                                    <td class="border p-2">{{ $konsul->nama_lengkap }}</td>
                                    <td class="border p-2">{{ $konsul->instansi }}</td>
                                    <td class="border p-2">{{ $konsul->email }}</td>
                                    <td class="border p-2">{{ \Carbon\Carbon::parse($konsul->tanggal)->format('d M Y
                                        H:i') }}</td>
                                    <td class="border p-2">{{ $konsul->no_wa }}</td>
                                    <td class="border p-2 text-center">
                                        <span
                                            class="px-2 py-1 rounded text-sm 
                                            {{ $konsul->status == 'diterima' ? 'bg-green-200 text-green-800' : 
                                               ($konsul->status == 'ditolak' ? 'bg-red-200 text-red-800' : 'bg-yellow-200 text-yellow-800') }}">
                                            {{ ucfirst($konsul->status) }}
                                        </span>
                                    </td>
                                    <td class="border p-2 text-center">
                                        @if($konsul->status == 'pending')
                                        <div class="flex gap-2 justify-center">
                                            <form
                                                action="{{ route('konsultasi.verifikasi', [$konsul->id, 'status' => 'diterima']) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit"
                                                    class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm">
                                                    Terima
                                                </button>
                                            </form>
                                            <form
                                                action="{{ route('konsultasi.verifikasi', [$konsul->id, 'status' => 'ditolak']) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit"
                                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">
                                                    Tolak
                                                </button>
                                            </form>
                                        </div>
                                        @else
                                        <span class="text-gray-500 italic text-sm">Sudah divalidasi</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="border p-4 text-center text-gray-500">
                                        Tidak ada data konsultasi terbaru.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- All Users -->
                <div x-show="activePage === 'all-users'" x-transition>
                    <h1 class="text-2xl font-bold mb-6">All Users</h1>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <p class="text-lg mb-4">
                            Total Users: <span class="font-bold text-blue-600 text-xl">{{ $totalUsers }}</span>
                        </p>
                        <form method="GET" action="{{ url('/admin/super-admin') }}" class="mb-4 flex gap-2">
                            <input type="hidden" name="active" value="all-users">
                            <select name="role" class="border p-2 rounded">
                                <option value="">-- Semua Role --</option>
                                @foreach($roles as $role)
                                <option value="{{ $role }}" {{ $roleFilter==$role ? 'selected' : '' }}>
                                    {{ $role }}
                                </option>
                                @endforeach
                            </select>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Filter</button>
                            <a href="{{ url('/admin/super-admin?active=all-users') }}"
                                class="bg-gray-400 text-white px-4 py-2 rounded">Reset</a>
                        </form>
                        <table class="w-full border border-gray-300 text-left">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border p-2">#</th>
                                    <th class="border p-2">Nama</th>
                                    <th class="border p-2">Email</th>
                                    <th class="border p-2">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $index => $user)
                                <tr class="hover:bg-gray-50">
                                    <td class="border p-2">{{ $index + 1 }}</td>
                                    <td class="border p-2">{{ $user->name }}</td>
                                    <td class="border p-2">{{ $user->email }}</td>
                                    <td class="border p-2">{{ $user->role }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="border p-4 text-center text-gray-500">Tidak ada user
                                        ditemukan</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Add User -->
                <div x-show="activePage === 'add-user'" x-transition>
                    <h1 class="text-2xl font-bold mb-6">Add User</h1>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <a href="{{ url('/admin/super-admin/add-user') }}"
                            class="bg-blue-500 text-white px-4 py-2 rounded">+ Tambah User Baru</a>
                    </div>
                </div>

                <!-- User Roles -->
                <div x-show="activePage === 'user-roles'" x-transition>
                    <h1 class="text-2xl font-bold mb-6">User Roles</h1>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <p>Halaman untuk manajemen role user</p>
                    </div>
                </div>

                <!-- Analytics -->
                <div x-show="activePage === 'analytics'" x-transition>
                    <h1 class="text-2xl font-bold mb-6">Analytics</h1>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <p>Halaman laporan dan analitik</p>
                    </div>
                </div>
            </main>
        </div>
    </div> --}}