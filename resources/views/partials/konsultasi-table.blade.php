<table class="w-full text-left border-collapse">
    <thead>
        <tr class="border-b text-gray-600 text-sm">
            <th>Nomor</th>
            <th>Nama Pengaju</th>
            <th>Instansi</th>
            <th>Email</th>
            <th>Tanggal</th>
            <th>WhatsApp</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody class="text-gray-700 text-sm">
        @forelse($konsultasiTerbaru as $index => $konsul)
        <tr class="border-b hover:bg-gray-50">
            <td class="p-2 text-center">{{ $konsultasiTerbaru->firstItem() + $index }}</td>
            <td class="p-2">{{ $konsul->nama_lengkap }}</td>
            <td class="p-2">{{ $konsul->instansi }}</td>
            <td class="p-2">{{ $konsul->email }}</td>
            <td class="p-2">{{ \Carbon\Carbon::parse($konsul->tanggal)->format('d M Y H:i') }}</td>
            <td class="p-2">{{ $konsul->no_wa }}</td>
            <td class="p-2 text-center">
                <span class="px-2 py-1 rounded text-sm 
                    {{ $konsul->status == 'diterima' ? 'bg-green-200 text-green-800' : 
                    ($konsul->status == 'ditolak' ? 'bg-red-200 text-red-800' : 'bg-yellow-200 text-yellow-800') }}">
                    {{ ucfirst($konsul->status) }}
                </span>
            </td>
            <td class="p-2 text-center">
                @if($konsul->status == 'pending')
                <div class="flex gap-2 justify-center">
                    <form action="{{ route('konsultasi.verifikasi', [$konsul->id, 'status' => 'diterima']) }}"
                        method="POST">
                        @csrf
                        <button type="submit"
                            class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm">
                            Terima
                        </button>
                    </form>
                    <form action="{{ route('konsultasi.verifikasi', [$konsul->id, 'status' => 'ditolak']) }}"
                        method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">
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
            <td colspan="8" class="text-center p-4 text-gray-500">
                Tidak ada data konsultasi.
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

<!-- Pagination -->
<div class="flex justify-between items-center mt-4 text-sm text-gray-600">
    <p>
        Menampilkan {{ $konsultasiTerbaru->firstItem() }} - {{ $konsultasiTerbaru->lastItem() }}
        dari {{ $konsultasiTerbaru->total() }} konsultasi
    </p>
    <div>
        {{ $konsultasiTerbaru->withQueryString()->links('pagination::tailwind') }}
    </div>
</div>