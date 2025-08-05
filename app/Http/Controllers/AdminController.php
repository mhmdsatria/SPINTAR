<?php

namespace App\Http\Controllers;

use App\Mail\KonsultasiStatusMail;
use App\Models\Konsultasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use view;

class AdminController extends Controller
{
    /**
     * Halaman Admin Divisi
     */
    public function index()
    {
        return view('admin');
    }

    /**
     * Halaman Super Admin Dashboard
     */
    public function superAdmin(Request $request)
    {
        // Filter role user
        $roleFilter = $request->query('role');
        $users = $roleFilter ? User::where('role', $roleFilter)->get() : User::all();

        // Statistik user & konsultasi
        $totalUsers = User::count();
        $roles = User::select('role')->distinct()->pluck('role');

        $totalKonsultasi = Konsultasi::count();
        $totalDiterima   = Konsultasi::where('status', 'diterima')->count();
        $totalDitolak    = Konsultasi::where('status', 'ditolak')->count();
        $totalRiwayat    = Konsultasi::where('status', 'pending')->count();

        $total = $totalKonsultasi > 0 ? $totalKonsultasi : 1;

        // 🔍 Filter Pencarian & Status untuk Riwayat Konsultasi
        $search = $request->query('search');
        $status = $request->query('status');

        $konsultasiQuery = Konsultasi::query();

        if (!empty($search)) {
            $konsultasiQuery->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%")
                    ->orWhere('instansi', 'like', "%$search%");
            });
        }

        if (!empty($status)) {
            $konsultasiQuery->where('status', $status);
        }

        // Ambil data konsultasi dengan pagination
        $konsultasiTerbaru = $konsultasiQuery->orderBy('created_at', 'desc')->paginate(10);

        // Data untuk Bar Chart
        $bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        $jumlahPerBulan = [];
        foreach (range(1, 12) as $i) {
            $jumlahPerBulan[] = Konsultasi::whereMonth('tanggal', $i)->count();
        }

        $activePage = $request->query('page', 'dashboard');
        if ($request->ajax()) {
            return view('partials.konsultasi-table', compact('konsultasiTerbaru'))->render();
        }

        return view('super-admin', compact(
            'users',
            'totalUsers',
            'roles',
            'roleFilter',
            'totalKonsultasi',
            'totalDiterima',
            'totalDitolak',
            'totalRiwayat',
            'konsultasiTerbaru',
            'bulan',
            'jumlahPerBulan',
            'total',
            'activePage'
        ));
    }



    /**
     * Verifikasi status konsultasi (Diterima/Ditolak)
     */
    public function verifikasiKonsultasi($id, Request $request)
    {
        $status = $request->query('status');
        $konsul = Konsultasi::findOrFail($id);

        // Update status konsultasi
        $konsul->status = $status;
        $konsul->save();

        // Kirim email notifikasi
        Mail::to($konsul->email)->send(new KonsultasiStatusMail($konsul, $status));

        // Siapkan pesan WhatsApp sesuai status
        if ($status === 'diterima') {
            $message = "Halo {$konsul->nama_lengkap},\n\n" .
                "Pengajuan konsultasi Anda *DITERIMA*. Berikut detail jadwal konsultasi Anda:\n\n" .
                "📅 Tanggal: {$konsul->tanggal}\n" .
                "⏰ Waktu: {$konsul->waktu}\n\n" .
                "Mohon hadir tepat waktu sesuai jadwal. Jika berhalangan, segera hubungi kami.\n\n" .
                "Terima kasih telah menggunakan layanan kami.";
        } elseif ($status === 'ditolak') {
            $message = "Halo {$konsul->nama_lengkap},\n\n" .
                "Mohon maaf, pengajuan konsultasi Anda *DITOLAK* untuk saat ini.\n\n" .
                "📄 Deskripsi: {$konsul->deskripsi}\n\n" .
                "Silakan ajukan kembali di lain waktu atau hubungi kami jika membutuhkan bantuan lebih lanjut.\n\n" .
                "Terima kasih.";
        } else {
            $message = "Halo {$konsul->nama_lengkap}, status konsultasi Anda telah diubah menjadi: *"
                . strtoupper($status) . "*.\n\n" .
                "📄 Deskripsi: {$konsul->deskripsi}\n\n" .
                "Terima kasih telah menggunakan layanan kami.";
        }

        // Kirim WhatsApp notifikasi
        $waResponse = $this->sendWhatsapp($konsul->no_wa, $message);

        // Notifikasi redirect
        if ($waResponse['success']) {
            return redirect()->back()->with('success', "Status berhasil diubah dan WhatsApp terkirim!");
        } else {
            return redirect()->back()->with('warning', "Status berhasil diubah, tetapi WhatsApp gagal terkirim. Cek log.");
        }
    }


    /**
     * Fungsi Kirim WhatsApp via API Fonnte
     */
    private function sendWhatsapp($no_wa, $message)
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.fonnte.com/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => [
                "target" => $no_wa,
                "message" => $message,
            ],
            CURLOPT_HTTPHEADER => [
                "Authorization: " . env('FONNTE_API_KEY')
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        // Logging hasil pengiriman
        if ($err) {
            Log::error("Gagal kirim WA ke {$no_wa}. Error: " . $err);
            return ['success' => false, 'message' => $err];
        }

        $result = json_decode($response, true);
        if (!empty($result['status']) && $result['status'] == true) {
            Log::info("WA terkirim ke {$no_wa}. Response: " . $response);
            return ['success' => true, 'message' => 'WA berhasil terkirim'];
        }

        Log::warning("WA gagal ke {$no_wa}. Response: " . $response);
        return ['success' => false, 'message' => $response];
    }

    /**
     * Halaman Admin Divisi
     */
    public function admin()
    {
        return view('admin');
    }

    /**
     * Form Tambah User
     */
    public function addUserForm()
    {
        return view('super-admin-add-user');
    }

    /**
     * Proses Tambah User
     */
    public function addUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|in:superadmin,admin-divisi',
            'divisi_id' => 'nullable|required_if:role,admin-divisi|exists:divisis,id',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'divisi_id' => $request->role === 'admin-divisi' ? $request->divisi_id : null,
        ]);

        return redirect()->back()->with('success', 'User berhasil ditambahkan!');
    }
}
