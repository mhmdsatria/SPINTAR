<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Status Konsultasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        .status {
            font-weight: bold;
            color: {{ $status == 'diterima' ? '#16a34a' : '#dc2626' }};
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Halo, {{ $konsultasi->nama_lengkap }}</h2>
        
        <p>
            Pengajuan konsultasi Anda telah <span class="status">{{ ucfirst($status) }}</span>.
        </p>

        @if($status == 'diterima')
            <p>
                Berikut adalah detail jadwal konsultasi Anda:
            </p>
            <ul>
                <li><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($konsultasi->tanggal)->translatedFormat('d F Y') }}</li>
                <li><strong>Waktu:</strong> {{ \Carbon\Carbon::parse($konsultasi->waktu)->format('H:i') }} WIB</li>
            </ul>
            <p>
                Mohon hadir sesuai jadwal yang telah ditentukan. Jika berhalangan, harap segera hubungi kami.
            </p>
        @else
            <p>
                Mohon maaf, pengajuan konsultasi Anda belum dapat kami terima untuk saat ini.  
                Silakan mengajukan kembali di lain waktu atau hubungi kami untuk informasi lebih lanjut.
            </p>
        @endif

        <p>
            <strong>Deskripsi Konsultasi:</strong><br>
            {{ $konsultasi->deskripsi }}
        </p>

        <p>
            Terima kasih telah menggunakan layanan kami.<br>
            Salam hormat,<br>
            <strong>BPS Kota Sukabumi</strong>
        </p>
    </div>
</body>
</html>
