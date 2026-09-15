<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konsultasi;

class KonsultasiController extends Controller
{
    public function create()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        // Validasi data, sesuaikan dengan name di form
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email',
            'nomor_whatsapp' => 'required|string',
            'deskripsi_masalah' => 'required|string',
            'tanggal_diajukan' => 'nullable|date', // optional, sesuai form
            'jam_diajukan' => 'nullable|date_format:H:i', // optional
            'lampiran' => 'nullable|file|max:5120|mimes:pdf,doc,docx,jpg,jpeg,png',
        ]);

        // Handle upload file
        if ($request->hasFile('lampiran')) {
            $path = $request->file('lampiran')->store('lampiran_konsultasi', 'public');
            $validated['file_path'] = $path; // simpan ke kolom file_path di DB
        }

        // Set status default jika diperlukan
        $validated['status'] = 'diajukan';

        // Simpan ke database
        Konsultasi::create($validated);

        // Redirect ke home dengan flash message
        return redirect()->route('home')->with('success', '✅ Konsultasi berhasil dikirim! Tim kami akan segera merespons.');
    }
}