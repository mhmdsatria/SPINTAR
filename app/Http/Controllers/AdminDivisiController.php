<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Konsultasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // ✅ Tambahkan ini

class AdminDivisiController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // ✅ Pakai Auth::user()

        // Ambil data konsultasi khusus divisi admin ini
        $konsultasiTerbaru = Konsultasi::where('divisi_id', $user->divisi_id)
                                        ->orderBy('created_at', 'desc')
                                        ->take(5)
                                        ->get();

        $totalKonsultasi = Konsultasi::where('divisi_id', $user->divisi_id)->count();
        $totalDiterima   = Konsultasi::where('divisi_id', $user->divisi_id)->where('status', 'diterima')->count();
        $totalDitolak    = Konsultasi::where('divisi_id', $user->divisi_id)->where('status', 'ditolak')->count();
        $totalRiwayat    = Konsultasi::where('divisi_id', $user->divisi_id)->where('status', 'pending')->count();

        return view('admin', compact(
            'konsultasiTerbaru',
            'totalKonsultasi',
            'totalDiterima',
            'totalDitolak',
            'totalRiwayat'
        ))->with('activePage', 'dashboard');
    }
}
