<!DOCTYPE html>
<html>
<head>
    <title>Daftar Konsultasi</title>
    <style>
        body { font-family: 'Arial', sans-serif; font-size: 12px; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .dates { text-align: center; margin-bottom: 20px; font-weight: bold; }
    </style>
</head>
<body>
    <h1>Laporan Daftar Konsultasi</h1>
    <div class="dates">
        Periode: {{ \Carbon\Carbon::parse($startDate)->format('d-m-Y') }} sampai {{ \Carbon\Carbon::parse($endDate)->format('d-m-Y') }}
    </div>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Nomor WA</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Status</th>
                <th>Petugas</th> </tr>
        </thead>
        <tbody>
            @foreach($konsultasi as $item)
            <tr>
                <td>{{ $item->nama_lengkap }}</td>
                <td>{{ $item->nomor_whatsapp }}</td>
                <td>
                    @if ($item->status == 'dijadwal_ulang')
                        {{ \Carbon\Carbon::parse($item->tanggal_baru)->format('d-m-Y') }}
                    @else
                        {{ \Carbon\Carbon::parse($item->tanggal_diajukan)->format('d-m-Y') }}
                    @endif
                </td>
                <td>
                    @if ($item->status == 'dijadwal_ulang')
                        {{ $item->jam_baru }}
                    @else
                        {{ $item->jam_diajukan }}
                    @endif
                </td>
                <td>{{ $item->status }}</td>
                <td>
                    {{-- Menampilkan nama admin jika sudah ditugaskan --}}
                    @if ($item->assignedToAdmin)
                        {{ $item->assignedToAdmin->name }}
                    @else
                        Belum Ditugaskan
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>